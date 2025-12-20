<?php

namespace App\Http\Controllers;

use App\Models\MataPelajaran;
use App\Models\Siswa;
use App\Models\SumberBelajar;
use App\Models\Topik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FrontendController extends Controller
{
    /**
     * Homepage - uses original welcome.blade.php design
     */
    public function home()
    {
        $stats = [
            'siswa' => Siswa::count(),
            'sumber_belajar' => SumberBelajar::count(),
            'topik' => Topik::count(),
            'mata_pelajaran' => MataPelajaran::count(),
            'ebook' => SumberBelajar::where('kategori', 'ebook')->count(),
            'video' => SumberBelajar::where('kategori', 'video')->count(),
        ];

        $topikPopuler = Topik::orderBy('topik')->take(8)->get();

        $koleksiBaru = SumberBelajar::with(['mataPelajaran', 'topik'])
            ->latest()
            ->take(4)
            ->get();

        $koleksiKurasi = SumberBelajar::with(['mataPelajaran', 'topik'])
            ->latest()
            ->skip(4)
            ->take(6)
            ->get();

        if ($koleksiKurasi->isEmpty()) {
            $koleksiKurasi = SumberBelajar::with(['mataPelajaran', 'topik'])
                ->latest()
                ->take(6)
                ->get();
        }

        // For original welcome.blade.php compatibility
        $searchQuery = request('q', '');
        $topikFilter = request('topik');
        $topikAktif = $topikFilter ? Topik::find($topikFilter) : null;
        $isFiltering = $searchQuery || $topikFilter;

        $hasilPencarian = collect();
        if ($isFiltering) {
            $query = SumberBelajar::with(['mataPelajaran', 'topik']);
            if ($searchQuery) {
                $query->where(function ($q) use ($searchQuery) {
                    $q->where('judul', 'like', '%' . $searchQuery . '%')
                        ->orWhere('deskripsi', 'like', '%' . $searchQuery . '%');
                });
            }
            if ($topikFilter) {
                $query->where('topik_id', $topikFilter);
            }
            $hasilPencarian = $query->latest()->take(12)->get();
        }

        return view('welcome', compact(
            'stats',
            'topikPopuler',
            'koleksiKurasi',
            'koleksiBaru',
            'searchQuery',
            'topikFilter',
            'topikAktif',
            'isFiltering',
            'hasilPencarian'
        ));
    }

    /**
     * Kategori list
     */
    public function kategori()
    {
        $topik = Topik::withCount('sumberBelajar')
            ->orderBy('topik')
            ->paginate(12);

        $gradients = [
            'linear-gradient(135deg, #60a5fa 0%, #38bdf8 100%)',
            'linear-gradient(135deg, #34d399 0%, #22c55e 100%)',
            'linear-gradient(135deg, #fbbf24 0%, #f97316 100%)',
            'linear-gradient(135deg, #0ea5e9 0%, #2563eb 100%)',
            'linear-gradient(135deg, #14b8a6 0%, #06b6d4 100%)',
            'linear-gradient(135deg, #fb7185 0%, #f59e0b 100%)',
            'linear-gradient(135deg, #8b5cf6 0%, #a78bfa 100%)',
            'linear-gradient(135deg, #ec4899 0%, #f472b6 100%)',
        ];

        return view('frontend.kategori.index', compact('topik', 'gradients'));
    }

    /**
     * Kategori detail with materials
     */
    public function kategoriShow(Topik $topik)
    {
        $materi = SumberBelajar::with(['mataPelajaran', 'topik'])
            ->where('topik_id', $topik->id)
            ->latest()
            ->paginate(12);

        return view('frontend.kategori.show', compact('topik', 'materi'));
    }

    /**
     * Koleksi list with search/filter
     */
    public function koleksi(Request $request)
    {
        $query = SumberBelajar::with(['mataPelajaran', 'topik']);

        if ($request->filled('q')) {
            $search = $request->get('q');
            $query->where(function ($q) use ($search) {
                $q->where('judul', 'like', '%' . $search . '%')
                    ->orWhere('deskripsi', 'like', '%' . $search . '%')
                    ->orWhereHas('mataPelajaran', function ($rel) use ($search) {
                        $rel->where('mata_pelajaran', 'like', '%' . $search . '%');
                    })
                    ->orWhereHas('topik', function ($rel) use ($search) {
                        $rel->where('topik', 'like', '%' . $search . '%');
                    });
            });
        }

        if ($request->filled('kategori')) {
            $query->where('kategori', $request->get('kategori'));
        }

        if ($request->filled('topik')) {
            $query->where('topik_id', $request->get('topik'));
        }

        $materi = $query->latest()->paginate(12);
        $topikList = Topik::orderBy('topik')->get();

        return view('frontend.koleksi.index', compact('materi', 'topikList'));
    }

    /**
     * Koleksi detail
     */
    public function koleksiShow(SumberBelajar $sumberBelajar)
    {
        $sumberBelajar->load(['mataPelajaran', 'topik']);

        $previewUrl = $this->resolvePreviewUrl($sumberBelajar);
        $youtubeEmbedUrl = $this->buildYoutubeEmbed($sumberBelajar->youtube_url);
        $openUrl = $sumberBelajar->file_url || $sumberBelajar->youtube_url
            ? route('koleksi.open', $sumberBelajar)
            : null;

        $related = SumberBelajar::with(['mataPelajaran', 'topik'])
            ->where('id', '!=', $sumberBelajar->id)
            ->where(function ($query) use ($sumberBelajar) {
                $query->where('topik_id', $sumberBelajar->topik_id)
                    ->orWhere('mata_pelajaran_id', $sumberBelajar->mata_pelajaran_id);
            })
            ->latest()
            ->take(4)
            ->get();

        return view('frontend.koleksi.show', [
            'sumber' => $sumberBelajar,
            'previewUrl' => $previewUrl,
            'youtubeEmbedUrl' => $youtubeEmbedUrl,
            'openUrl' => $openUrl,
            'related' => $related,
        ]);
    }

    /**
     * Open/serve material file
     */
    public function koleksiOpen(SumberBelajar $sumberBelajar)
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

    /**
     * Rilis Terbaru
     */
    public function rilis()
    {
        $materi = SumberBelajar::with(['mataPelajaran', 'topik'])
            ->latest()
            ->paginate(15);

        return view('frontend.rilis', compact('materi'));
    }

    /**
     * Fitur page
     */
    public function fitur()
    {
        return view('frontend.fitur');
    }

    /**
     * Testimoni page
     */
    public function testimoni()
    {
        return view('frontend.testimoni');
    }

    /**
     * Bantuan/FAQ page
     */
    public function bantuan()
    {
        return view('frontend.bantuan');
    }

    /**
     * Build YouTube embed URL
     */
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

    /**
     * Resolve preview URL for material
     */
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

    /**
     * Serve file from storage or public path
     */
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

    /**
     * Check if URL is remote
     */
    private function isRemoteUrl(string $url): bool
    {
        return (bool) preg_match('#^https?://#i', $url);
    }
}
