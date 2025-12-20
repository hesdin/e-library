@extends('frontend.layouts.app')

@section('title', $sumber->judul . ' - E-Library Sulawesi Selatan')

@section('content')
  @php
    $kategoriLabel = $sumber->kategori === 'video' ? 'Video' : 'Ebook';
    $topikLabel = $sumber->topik?->topik ?? 'Topik umum';
    $mapelLabel = $sumber->mataPelajaran?->mata_pelajaran ?? 'Mata pelajaran umum';
  @endphp

  <main class="page">
    <div class="breadcrumb">
      <a href="{{ route('home') }}">Beranda</a> /
      <a href="{{ route('koleksi') }}">Koleksi</a> /
      {{ $sumber->judul }}
    </div>

    <div class="detail-grid">
      <section class="detail-info card">
        <h1>{{ $sumber->judul }}</h1>
        <p class="description">{{ $sumber->deskripsi }}</p>

        <div class="meta-grid">
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
            <div class="meta-value">E-Library Sulsel</div>
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

      <aside class="viewer-card card">
        <div class="viewer-title">Pratinjau Materi</div>
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
      grid-template-columns: 1fr 1fr;
      gap: 32px;
      margin-top: 24px;
    }

    .detail-info h1 {
      font-family: "Space Grotesk", sans-serif;
      font-size: 28px;
      margin: 0 0 16px;
    }

    .description {
      color: var(--muted);
      line-height: 1.7;
      margin: 0;
    }

    .meta-grid {
      margin-top: 24px;
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      gap: 12px;
    }

    .meta-card {
      background: var(--surface-soft);
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
    }

    .detail-actions {
      margin-top: 24px;
      display: flex;
      gap: 12px;
      flex-wrap: wrap;
    }

    .viewer-title {
      font-weight: 700;
      margin-bottom: 16px;
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
    }

    @media (max-width: 720px) {
      .meta-grid {
        grid-template-columns: 1fr;
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
