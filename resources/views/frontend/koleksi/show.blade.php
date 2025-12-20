@extends('frontend.layouts.app')

@section('title', $sumber->judul . ' - E-Library Sulawesi Selatan')

@section('content')
  @php
    $kategoriLabel = $sumber->kategori === 'video' ? 'Video' : 'Ebook';
    $topikLabel = $sumber->topik?->topik ?? 'Topik umum';
    $mapelLabel = $sumber->mataPelajaran?->mata_pelajaran ?? 'Mata pelajaran umum';
    $coverGradients = [
        'linear-gradient(135deg, #c7d2fe 0%, #bfdbfe 100%)',
        'linear-gradient(135deg, #a7f3d0 0%, #bbf7d0 100%)',
        'linear-gradient(135deg, #fde68a 0%, #fed7aa 100%)',
        'linear-gradient(135deg, #bfdbfe 0%, #dbeafe 100%)',
        'linear-gradient(135deg, #99f6e4 0%, #bae6fd 100%)',
        'linear-gradient(135deg, #fecdd3 0%, #fed7aa 100%)',
    ];
    $coverGradient = $coverGradients[$sumber->id % count($coverGradients)];
    $thumbnail = null;
    if (!empty($sumber->thumb_img)) {
        $thumb = $sumber->thumb_img;
        $thumbnail = \Illuminate\Support\Str::startsWith($thumb, ['http://', 'https://']) ? $thumb : asset($thumb);
    } elseif ($sumber->kategori === 'video' && !empty($sumber->youtube_url)) {
        $url = $sumber->youtube_url;
        parse_str(parse_url($url, PHP_URL_QUERY) ?? '', $query);
        $videoId = $query['v'] ?? null;
        if (!$videoId) {
            $host = parse_url($url, PHP_URL_HOST);
            $path = parse_url($url, PHP_URL_PATH);
            if ($host && \Illuminate\Support\Str::contains($host, 'youtu.be')) {
                $videoId = ltrim($path ?? '', '/');
            } elseif ($path) {
                $parts = array_values(array_filter(explode('/', $path)));
                if (isset($parts[0], $parts[1]) && $parts[0] === 'embed') {
                    $videoId = $parts[1];
                } elseif (isset($parts[0], $parts[1]) && $parts[0] === 'shorts') {
                    $videoId = $parts[1];
                }
            }
        }
        $thumbnail = $videoId ? "https://img.youtube.com/vi/{$videoId}/hqdefault.jpg" : null;
    }
  @endphp

  <main class="page">
    <div class="breadcrumb">
      <a href="{{ route('home') }}">Beranda</a> /
      <a href="{{ route('koleksi') }}">Koleksi</a> /
      {{ $sumber->judul }}
    </div>

    <div class="detail-grid">
      <section class="detail-info card">
        <div class="detail-hero">
          <div class="detail-copy">
            <div class="detail-badges">
              <span class="badge {{ $sumber->kategori }}">{{ strtoupper($kategoriLabel) }}</span>
              <span class="badge outline">Kelas {{ $sumber->tingkatan }}</span>
            </div>
            <h1>{{ $sumber->judul }}</h1>
            <p class="description">{{ strip_tags($sumber->deskripsi) }}</p>
            <div class="detail-meta-line">
              <span>{{ $topikLabel }}</span>
              <span class="dot" aria-hidden="true"></span>
              <span>{{ $mapelLabel }}</span>
              <span class="dot" aria-hidden="true"></span>
              <span>Update {{ $sumber->updated_at?->format('d M Y') }}</span>
            </div>
          </div>
          <div class="detail-cover" style="--cover: {{ $coverGradient }};">
            @if ($thumbnail)
              <img src="{{ $thumbnail }}" alt="Thumbnail {{ $sumber->judul }}" loading="lazy">
            @else
              <div class="cover-fallback">
                <div class="cover-mark">EL</div>
                <div class="cover-text">{{ $kategoriLabel }}</div>
              </div>
            @endif
          </div>
        </div>

        <div class="detail-actions">
          @if ($openUrl)
            <a class="btn primary" href="{{ $openUrl }}" target="_blank" rel="noopener">Buka Materi</a>
          @else
            <span class="btn disabled">Materi belum tersedia</span>
          @endif
          <a class="btn ghost" href="{{ route('koleksi') }}">Lihat Koleksi Lain</a>
        </div>
      </section>

      <aside class="viewer-card card" id="viewerCard">
        <div class="viewer-header">
          <div class="viewer-title">Pratinjau Materi</div>
          <button class="info-toggle" type="button" id="infoToggle" aria-expanded="true" aria-controls="infoPanel">
            Info Materi
            <span class="toggle-icon" aria-hidden="true"></span>
          </button>
        </div>
        <div class="viewer-layout">
          <div class="viewer-main">
            @if ($sumber->kategori === 'video')
              @if ($youtubeEmbedUrl)
                <div class="video-frame">
                  <iframe src="{{ $youtubeEmbedUrl }}" title="{{ $sumber->judul }}" allowfullscreen></iframe>
                </div>
              @elseif ($previewUrl)
                <video class="video-player" controls>
                  <source src="{{ $previewUrl }}">
                  Browser Anda tidak mendukung pemutar video.
                </video>
              @else
                <div class="empty-viewer">Video belum tersedia untuk materi ini.</div>
              @endif
            @else
              @if ($previewUrl)
                <div class="doc-frame">
                  <iframe src="{{ $previewUrl }}" title="Ebook {{ $sumber->judul }}"></iframe>
                </div>
              @else
                <div class="empty-viewer">Ebook belum tersedia untuk materi ini.</div>
              @endif
            @endif
          </div>
          <div class="info-panel" id="infoPanel">
            <div class="info-title">Info Materi</div>
            <div class="meta-grid compact">
              <div class="meta-card">
                <div class="meta-label">Kategori</div>
                <div class="meta-value">{{ $kategoriLabel }}</div>
              </div>
              <div class="meta-card">
                <div class="meta-label">Tingkatan</div>
                <div class="meta-value">Kelas {{ $sumber->tingkatan }}</div>
              </div>
              <div class="meta-card">
                <div class="meta-label">Topik</div>
                <div class="meta-value">{{ $topikLabel }}</div>
              </div>
              <div class="meta-card">
                <div class="meta-label">Mata Pelajaran</div>
                <div class="meta-value">{{ $mapelLabel }}</div>
              </div>
              <div class="meta-card">
                <div class="meta-label">Terakhir Update</div>
                <div class="meta-value">{{ $sumber->updated_at?->format('d M Y') }}</div>
              </div>
              <div class="meta-card">
                <div class="meta-label">Sumber</div>
                <div class="meta-value">E-Library Smart School</div>
              </div>
            </div>
          </div>
        </div>
      </aside>
    </div>

    @if ($related->isNotEmpty())
      <section class="section">
        <div class="section-head">
          <h2>Materi Terkait</h2>
        </div>
        <div class="grid-4" style="margin-top: 20px;">
          @foreach ($related as $item)
            <a class="card related-card" href="{{ route('koleksi.show', $item) }}">
              <h3>{{ $item->judul }}</h3>
              <p>{{ $item->mataPelajaran?->mata_pelajaran ?? 'Umum' }} - {{ strtoupper($item->kategori) }}</p>
            </a>
          @endforeach
        </div>
      </section>
    @endif
  </main>
@endsection

@section('styles')
  <style>
    .detail-grid {
      display: grid;
      grid-template-columns: minmax(0, 1.1fr) minmax(0, 0.9fr);
      gap: 32px;
      margin-top: 24px;
      align-items: start;
    }

    .detail-info.card {
      background: linear-gradient(180deg, rgba(255, 255, 255, 0.96), rgba(239, 246, 255, 0.9));
      border-radius: 26px;
    }

    .detail-info.card:hover {
      transform: none;
      box-shadow: 0 22px 40px rgba(15, 23, 42, 0.12);
    }

    .detail-hero {
      display: grid;
      grid-template-columns: minmax(0, 1fr) 220px;
      gap: 18px;
      align-items: center;
      margin-bottom: 20px;
    }

    .detail-copy h1 {
      font-family: "Space Grotesk", sans-serif;
      font-size: 30px;
      margin: 12px 0 12px;
      line-height: 1.2;
    }

    .detail-badges {
      display: flex;
      flex-wrap: wrap;
      gap: 8px;
      align-items: center;
    }

    .description {
      color: var(--muted);
      line-height: 1.7;
      margin: 0;
    }

    .detail-meta-line {
      margin-top: 12px;
      display: flex;
      flex-wrap: wrap;
      gap: 10px;
      align-items: center;
      color: var(--muted);
      font-size: 13px;
    }

    .detail-meta-line .dot {
      width: 4px;
      height: 4px;
      border-radius: 999px;
      background: rgba(15, 23, 42, 0.25);
      display: inline-block;
    }

    .detail-cover {
      height: 200px;
      border-radius: 20px;
      overflow: hidden;
      background: var(--cover);
      border: 1px solid var(--border);
      display: flex;
      align-items: center;
      justify-content: center;
      position: relative;
    }

    .detail-cover img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      display: block;
    }

    .cover-fallback {
      height: 100%;
      width: 100%;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      gap: 10px;
      color: rgba(15, 23, 42, 0.65);
    }

    .cover-mark {
      width: 52px;
      height: 52px;
      border-radius: 14px;
      background: rgba(15, 23, 42, 0.12);
      color: var(--ink);
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: 700;
      font-family: "Space Grotesk", sans-serif;
      letter-spacing: 0.08em;
    }

    .cover-text {
      font-size: 12px;
      letter-spacing: 0.08em;
      text-transform: uppercase;
    }

    .meta-grid {
      margin-top: 18px;
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      gap: 10px 14px;
    }

    .meta-grid.compact {
      grid-template-columns: 1fr;
      margin-top: 0;
    }

    .meta-card {
      background: rgba(255, 255, 255, 0.75);
      border-radius: 14px;
      padding: 12px 14px;
      border: 1px solid var(--border);
    }

    .meta-label {
      font-size: 11px;
      text-transform: uppercase;
      color: var(--muted);
    }

    .meta-value {
      margin-top: 6px;
      font-weight: 700;
      font-size: 14px;
    }

    .detail-actions {
      margin-top: 24px;
      display: flex;
      gap: 12px;
      flex-wrap: wrap;
    }

    .viewer-header {
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 12px;
      margin-bottom: 16px;
    }

    .viewer-title {
      font-weight: 700;
      font-family: "Space Grotesk", sans-serif;
      font-size: 18px;
    }

    .viewer-card.card {
      border-radius: 24px;
      background: linear-gradient(180deg, #ffffff 0%, #f1f5ff 100%);
      margin-top: 12px;
    }

    .viewer-layout {
      display: grid;
      grid-template-columns: minmax(0, 1fr) minmax(180px, 220px);
      gap: 16px;
      align-items: start;
    }

    .viewer-main {
      min-width: 0;
    }

    .info-toggle {
      border: 1px solid var(--border);
      background: rgba(255, 255, 255, 0.85);
      color: var(--muted);
      border-radius: 999px;
      padding: 6px 12px;
      font-size: 12px;
      font-weight: 600;
      display: inline-flex;
      align-items: center;
      gap: 8px;
      cursor: pointer;
      transition: background 0.2s ease, color 0.2s ease;
    }

    .info-toggle:hover {
      color: var(--ink);
      background: #fff;
    }

    .toggle-icon {
      width: 8px;
      height: 8px;
      border-right: 2px solid currentColor;
      border-bottom: 2px solid currentColor;
      transform: rotate(45deg);
      transition: transform 0.2s ease;
    }

    .info-toggle[aria-expanded="false"] .toggle-icon {
      transform: rotate(-45deg);
    }

    .info-panel {
      margin-top: 0;
      padding: 16px;
      border-radius: 18px;
      border: 1px solid var(--border);
      background: rgba(255, 255, 255, 0.9);
      transition: max-height 0.3s ease, opacity 0.3s ease, margin-top 0.3s ease, padding 0.3s ease;
      max-height: 620px;
      overflow: hidden;
      opacity: 1;
      position: relative;
    }

    .info-panel.collapsed {
      max-height: 0;
      opacity: 0;
      margin-top: 0;
      padding: 0 10px;
      border-color: transparent;
      border-width: 0;
      pointer-events: none;
    }

    .viewer-card.info-collapsed .viewer-layout {
      grid-template-columns: minmax(0, 1fr);
    }

    .viewer-card.info-collapsed .info-panel {
      padding: 0;
      border-color: transparent;
    }

    .info-title {
      font-weight: 700;
      font-size: 14px;
      margin-bottom: 12px;
      font-family: "Space Grotesk", sans-serif;
    }

    .video-frame,
    .doc-frame {
      width: 100%;
      border-radius: 16px;
      overflow: hidden;
      border: 1px solid var(--border);
      background: #0f172a;
    }

    .video-frame iframe {
      width: 100%;
      height: 320px;
      border: 0;
      display: block;
    }

    .video-player {
      width: 100%;
      height: 320px;
      display: block;
      background: #0f172a;
    }

    .doc-frame iframe {
      width: 100%;
      height: 420px;
      border: 0;
      display: block;
      background: #fff;
    }

    .empty-viewer {
      padding: 40px 20px;
      border-radius: 16px;
      border: 1px dashed var(--border);
      color: var(--muted);
      background: var(--surface-soft);
      text-align: center;
    }

    .btn.disabled {
      background: #e2e8f0;
      color: #94a3b8;
      cursor: not-allowed;
    }

    .related-card h3 {
      margin: 0 0 6px;
      font-size: 15px;
    }

    .related-card p {
      margin: 0;
      font-size: 13px;
      color: var(--muted);
    }

    @media (max-width: 980px) {
      .detail-grid {
        grid-template-columns: 1fr;
      }

      .detail-hero {
        grid-template-columns: 1fr;
      }

      .detail-cover {
        height: 220px;
      }

      .viewer-layout {
        grid-template-columns: 1fr;
      }

      .viewer-card.info-collapsed .viewer-layout {
        grid-template-columns: 1fr;
      }
    }

    @media (max-width: 720px) {
      .meta-grid {
        grid-template-columns: 1fr;
      }

      .viewer-header {
        flex-wrap: wrap;
        align-items: flex-start;
      }

      .detail-copy h1 {
        font-size: 26px;
      }

      .detail-cover {
        height: 200px;
      }

      .video-frame iframe,
      .video-player {
        height: 240px;
      }

      .doc-frame iframe {
        height: 320px;
      }
    }
  </style>
@endsection

@section('scripts')
  <script>
    const infoToggle = document.getElementById('infoToggle');
    const infoPanel = document.getElementById('infoPanel');
    const viewerCard = document.getElementById('viewerCard');

    if (infoToggle && infoPanel && viewerCard) {
      infoToggle.addEventListener('click', () => {
        const isExpanded = infoToggle.getAttribute('aria-expanded') === 'true';
        infoToggle.setAttribute('aria-expanded', String(!isExpanded));
        infoPanel.classList.toggle('collapsed', isExpanded);
        viewerCard.classList.toggle('info-collapsed', isExpanded);
      });
    }
  </script>
@endsection
