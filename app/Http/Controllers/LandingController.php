<?php

namespace App\Http\Controllers;

use App\Models\MataPelajaran;
use App\Models\Siswa;
use App\Models\SumberBelajar;
use App\Models\Topik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class LandingController extends Controller
{
    public function index(Request $request)
    {
        $searchQuery = trim((string) $request->get('q', ''));
        $topikFilter = $request->filled('topik') ? $request->get('topik') : null;
        $isFiltering = $searchQuery !== '' || !is_null($topikFilter);

        $stats = [
            'siswa' => Siswa::count(),
            'sumber_belajar' => SumberBelajar::count(),
            'topik' => Topik::count(),
            'mata_pelajaran' => MataPelajaran::count(),
            'ebook' => SumberBelajar::where('kategori', 'ebook')->count(),
            'video' => SumberBelajar::where('kategori', 'video')->count(),
        ];

        $topikPopuler = Topik::orderBy('topik')->take(6)->get();
        $topikAktif = null;
        if (!is_null($topikFilter)) {
            $topikAktif = Topik::find($topikFilter);
        }

        $hasilPencarian = collect();
        if ($isFiltering) {
            $hasilQuery = SumberBelajar::with(['mataPelajaran', 'topik']);

            if ($searchQuery !== '') {
                $hasilQuery->where(function ($query) use ($searchQuery) {
                    $query->where('judul', 'like', '%' . $searchQuery . '%')
                        ->orWhere('deskripsi', 'like', '%' . $searchQuery . '%')
                        ->orWhereHas('mataPelajaran', function ($relation) use ($searchQuery) {
                            $relation->where('mata_pelajaran', 'like', '%' . $searchQuery . '%');
                        })
                        ->orWhereHas('topik', function ($relation) use ($searchQuery) {
                            $relation->where('topik', 'like', '%' . $searchQuery . '%');
                        });
                });
            }

            if (!is_null($topikFilter)) {
                $hasilQuery->where('topik_id', $topikFilter);
            }

            $hasilPencarian = $hasilQuery->latest()->take(12)->get();
        }

        $koleksiBaru = SumberBelajar::with(['mataPelajaran', 'topik'])
            ->latest()
            ->take(3)
            ->get();

        $koleksiKurasi = SumberBelajar::with(['mataPelajaran', 'topik'])
            ->latest()
            ->skip($koleksiBaru->count())
            ->take(6)
            ->get();

        if ($koleksiKurasi->isEmpty()) {
            $koleksiKurasi = SumberBelajar::with(['mataPelajaran', 'topik'])
                ->latest()
                ->take(6)
                ->get();
        }

        return view('welcome', compact(
            'stats',
            'topikPopuler',
            'koleksiKurasi',
            'koleksiBaru',
            'hasilPencarian',
            'isFiltering',
            'searchQuery',
            'topikFilter',
            'topikAktif'
        ));
    }

    public function show(SumberBelajar $sumberBelajar)
    {
        $sumberBelajar->load(['mataPelajaran', 'topik']);

        $previewUrl = $this->resolvePreviewUrl($sumberBelajar);

        $youtubeEmbedUrl = $this->buildYoutubeEmbed($sumberBelajar->youtube_url);

        $related = SumberBelajar::with(['mataPelajaran', 'topik'])
            ->where('id', '!=', $sumberBelajar->id)
            ->where(function ($query) use ($sumberBelajar) {
                $query->where('topik_id', $sumberBelajar->topik_id)
                    ->orWhere('mata_pelajaran_id', $sumberBelajar->mata_pelajaran_id);
            })
            ->latest()
            ->take(4)
            ->get();

        return view('library.show', [
            'sumber' => $sumberBelajar,
            'previewUrl' => $previewUrl,
            'youtubeEmbedUrl' => $youtubeEmbedUrl,
            'openUrl' => route('koleksi.open', $sumberBelajar),
            'related' => $related,
        ]);
    }

    public function open(SumberBelajar $sumberBelajar)
    {
        if ($sumberBelajar->kategori === 'video') {
            if ($sumberBelajar->youtube_url) {
                return redirect()->away($sumberBelajar->youtube_url);
            }

            if ($sumberBelajar->file_url) {
                return $this->serveFile($sumberBelajar->file_url);
            }
        }

        if ($sumberBelajar->file_url) {
            return $this->serveFile($sumberBelajar->file_url);
        }

        if ($sumberBelajar->youtube_url) {
            return redirect()->away($sumberBelajar->youtube_url);
        }

        abort(404);
    }

    private function buildYoutubeEmbed(?string $url): ?string
    {
        if (!$url) {
            return null;
        }

        $trimmed = trim($url);
        if (str_contains($trimmed, 'youtube.com/embed/')) {
            return $trimmed;
        }

        $host = parse_url($trimmed, PHP_URL_HOST);
        $path = parse_url($trimmed, PHP_URL_PATH);
        $query = parse_url($trimmed, PHP_URL_QUERY);

        $videoId = null;
        if ($host && str_contains($host, 'youtu.be')) {
            $videoId = ltrim($path ?? '', '/');
        } elseif ($query) {
            parse_str($query, $params);
            $videoId = $params['v'] ?? null;
        }

        if (!$videoId && $path) {
            $parts = array_values(array_filter(explode('/', $path)));
            if (isset($parts[0], $parts[1]) && $parts[0] === 'embed') {
                $videoId = $parts[1];
            } elseif (isset($parts[0], $parts[1]) && $parts[0] === 'shorts') {
                $videoId = $parts[1];
            }
        }

        return $videoId ? "https://www.youtube.com/embed/{$videoId}" : null;
    }

    private function resolvePreviewUrl(SumberBelajar $sumberBelajar): ?string
    {
        if (!$sumberBelajar->file_url) {
            return null;
        }

        if ($this->isRemoteUrl($sumberBelajar->file_url)) {
            return $sumberBelajar->file_url;
        }

        return route('koleksi.open', $sumberBelajar);
    }

    private function serveFile(string $path)
    {
        if ($this->isRemoteUrl($path)) {
            return redirect()->away($path);
        }

        $clean = ltrim($path, '/');
        if (Str::startsWith($clean, 'storage/')) {
            $clean = Str::after($clean, 'storage/');
        }
        if (Str::startsWith($clean, 'public/')) {
            $clean = Str::after($clean, 'public/');
        }

        if (Storage::disk('public')->exists($clean)) {
            return response()->file(Storage::disk('public')->path($clean));
        }

        $publicPath = public_path($clean);
        if (is_file($publicPath)) {
            return response()->file($publicPath);
        }

        abort(404);
    }

    private function isRemoteUrl(string $url): bool
    {
        return (bool) preg_match('#^https?://#i', $url);
    }
}
