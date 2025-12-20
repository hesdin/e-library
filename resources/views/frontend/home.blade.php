@extends('frontend.layouts.app')

@section('title', 'E-Library Sulawesi Selatan - Perpustakaan Digital')

@section('content')
  @php
    $coverGradients = [
        'linear-gradient(135deg, #60a5fa 0%, #38bdf8 100%)',
        'linear-gradient(135deg, #34d399 0%, #22c55e 100%)',
        'linear-gradient(135deg, #fbbf24 0%, #f97316 100%)',
        'linear-gradient(135deg, #0ea5e9 0%, #2563eb 100%)',
        'linear-gradient(135deg, #14b8a6 0%, #06b6d4 100%)',
        'linear-gradient(135deg, #fb7185 0%, #f59e0b 100%)',
    ];
  @endphp

  <main class="page">
    <!-- Hero Section -->
    <section class="hero">
      <div class="hero-copy">
        <span class="eyebrow">Perpustakaan Digital Sulsel</span>
        <h1>Temukan dan Baca Sumber Belajar Favoritmu.</h1>
        <p>
          Akses koleksi ebook dan video pembelajaran untuk seluruh siswa di Sulawesi Selatan.
          Materi diperbarui dari database resmi sekolah dan dinas pendidikan.
        </p>
        <form class="search-box" action="{{ route('koleksi') }}" method="GET">
          <input type="text" name="q" placeholder="Cari judul, topik, atau mata pelajaran..."
            aria-label="Cari materi">
          <button type="submit">Cari</button>
        </form>
        <div class="hero-actions">
          <a class="btn primary" href="{{ route('koleksi') }}">Jelajahi Koleksi</a>
          <a class="btn ghost" href="{{ route('kategori') }}">Lihat Kategori</a>
        </div>
      </div>

      <div class="hero-card">
        <div class="hero-icon">BK</div>
        <div class="hero-stat">
          <div class="hero-stat-value">{{ number_format($stats['sumber_belajar']) }}+</div>
          <div class="hero-stat-label">Sumber belajar tersedia</div>
        </div>
        <div class="metric-grid">
          <div class="metric-card">
            <div class="metric-label">Ebook</div>
            <div class="metric-value">{{ number_format($stats['ebook']) }}</div>
          </div>
          <div class="metric-card">
            <div class="metric-label">Video</div>
            <div class="metric-value">{{ number_format($stats['video']) }}</div>
          </div>
          <div class="metric-card">
            <div class="metric-label">Topik</div>
            <div class="metric-value">{{ number_format($stats['topik']) }}</div>
          </div>
          <div class="metric-card">
            <div class="metric-label">Mapel</div>
            <div class="metric-value">{{ number_format($stats['mata_pelajaran']) }}</div>
          </div>
        </div>
      </div>
    </section>

    <!-- Kategori Populer -->
    <section class="section">
      <div class="section-head">
        <div>
          <h2>Kategori Populer</h2>
          <p>Pilih topik belajar yang paling sering diakses oleh siswa.</p>
        </div>
        <a class="btn ghost" href="{{ route('kategori') }}">Lihat Semua</a>
      </div>
      <div class="chip-group">
        @forelse ($topikPopuler as $topik)
          <a class="chip" href="{{ route('kategori.show', $topik) }}">{{ $topik->topik }}</a>
        @empty
          <div class="empty-state">Kategori belum tersedia.</div>
        @endforelse
      </div>
    </section>

    <!-- Koleksi Pilihan -->
    <section class="section">
      <div class="section-head">
        <div>
          <h2>Koleksi Pilihan</h2>
          <p>Rekomendasi sumber belajar terpilih yang siap digunakan.</p>
        </div>
        <a class="btn ghost" href="{{ route('koleksi') }}">Lihat Semua</a>
      </div>
      <div class="grid-3" style="margin-top: 20px;">
        @forelse ($koleksiKurasi as $koleksi)
          <article class="card collection-card">
            <div class="cover" style="background: {{ $coverGradients[$loop->index % count($coverGradients)] }};"></div>
            <div class="collection-body">
              <h3>{{ $koleksi->judul }}</h3>
              <p>{{ \Illuminate\Support\Str::limit($koleksi->deskripsi, 80) }}</p>
            </div>
            <div class="collection-meta">
              <span>{{ $koleksi->mataPelajaran?->mata_pelajaran ?? 'Umum' }}</span>
              <span>{{ $koleksi->topik?->topik ?? 'Umum' }}</span>
            </div>
            <div class="collection-tags">
              <span class="badge {{ $koleksi->kategori }}">{{ strtoupper($koleksi->kategori) }}</span>
              <span class="badge outline">Kelas {{ $koleksi->tingkatan }}</span>
            </div>
            <div class="collection-action">
              <a class="btn primary mini" href="{{ route('koleksi.show', $koleksi) }}">Lihat Detail</a>
            </div>
          </article>
        @empty
          <div class="empty-state">Belum ada koleksi pilihan.</div>
        @endforelse
      </div>
    </section>

    <!-- Rilis Terbaru -->
    <section class="section">
      <div class="section-head">
        <div>
          <h2>Baru Rilis</h2>
          <p>Tambahan terbaru dari perpustakaan digital.</p>
        </div>
        <a class="btn ghost" href="{{ route('rilis') }}">Lihat Semua</a>
      </div>
      <div class="grid-4" style="margin-top: 20px;">
        @forelse ($koleksiBaru as $koleksi)
          <article class="card release-card">
            <div class="release-cover" style="background: {{ $coverGradients[$loop->index % count($coverGradients)] }};">
            </div>
            <h3>{{ $koleksi->judul }}</h3>
            <p>{{ $koleksi->mataPelajaran?->mata_pelajaran ?? 'Umum' }} - {{ strtoupper($koleksi->kategori) }}</p>
            <a class="btn ghost mini" href="{{ route('koleksi.show', $koleksi) }}">Detail</a>
          </article>
        @empty
          <div class="empty-state">Belum ada rilis terbaru.</div>
        @endforelse
      </div>
    </section>
  </main>
@endsection

@section('styles')
  <style>
    .hero {
      display: grid;
      grid-template-columns: 1.15fr 0.85fr;
      gap: 32px;
      align-items: center;
    }

    .eyebrow {
      display: inline-block;
      padding: 6px 12px;
      border-radius: 999px;
      background: rgba(29, 78, 216, 0.12);
      color: var(--primary-dark);
      font-size: 12px;
      font-weight: 700;
      letter-spacing: 0.08em;
      text-transform: uppercase;
    }

    .hero h1 {
      font-family: "Space Grotesk", sans-serif;
      font-size: 42px;
      line-height: 1.15;
      margin: 16px 0 12px;
    }

    .hero p {
      font-size: 16px;
      line-height: 1.7;
      color: var(--muted);
      margin: 0;
    }

    .search-box {
      margin-top: 18px;
      display: flex;
      align-items: center;
      gap: 10px;
      background: var(--surface);
      border-radius: 999px;
      padding: 6px 8px 6px 18px;
      border: 1px solid var(--border);
      box-shadow: 0 14px 28px rgba(15, 23, 42, 0.08);
    }

    .search-box input {
      border: none;
      outline: none;
      flex: 1;
      font-size: 14px;
      background: transparent;
      color: var(--ink);
    }

    .search-box button {
      width: 80px;
      height: 40px;
      border-radius: 999px;
      border: none;
      background: var(--primary);
      color: #fff;
      font-weight: 600;
      cursor: pointer;
    }

    .hero-actions {
      margin-top: 16px;
      display: flex;
      gap: 12px;
      flex-wrap: wrap;
    }

    .hero-card {
      background: linear-gradient(180deg, rgba(255, 255, 255, 0.95), rgba(239, 246, 255, 0.95));
      border-radius: 28px;
      padding: 26px;
      border: 1px solid var(--border);
      box-shadow: var(--shadow);
    }

    .hero-icon {
      width: 64px;
      height: 64px;
      border-radius: 18px;
      background: linear-gradient(135deg, var(--primary), #38bdf8);
      color: #fff;
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: 700;
      font-family: "Space Grotesk", sans-serif;
    }

    .hero-stat {
      margin-top: 16px;
    }

    .hero-stat-value {
      font-family: "Space Grotesk", sans-serif;
      font-size: 32px;
    }

    .hero-stat-label {
      color: var(--muted);
      font-size: 14px;
    }

    .metric-grid {
      margin-top: 18px;
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      gap: 12px;
    }

    .metric-card {
      background: var(--surface);
      border-radius: 14px;
      padding: 12px 14px;
      border: 1px solid var(--border);
    }

    .metric-label {
      font-size: 11px;
      text-transform: uppercase;
      color: var(--muted);
    }

    .metric-value {
      margin-top: 4px;
      font-weight: 700;
    }

    .chip-group {
      margin-top: 18px;
      display: flex;
      gap: 10px;
      flex-wrap: wrap;
    }

    .chip {
      padding: 10px 16px;
      border-radius: 999px;
      background: var(--surface);
      border: 1px solid var(--border);
      font-size: 14px;
      font-weight: 600;
      color: var(--muted);
      transition: all 0.2s ease;
    }

    .chip:hover {
      background: var(--primary);
      color: #fff;
      border-color: var(--primary);
    }

    .collection-card {
      display: flex;
      flex-direction: column;
      gap: 12px;
    }

    .collection-body h3 {
      margin: 0;
      font-size: 16px;
    }

    .collection-body p {
      margin: 6px 0 0;
      font-size: 13px;
      color: var(--muted);
    }

    .collection-meta {
      display: flex;
      justify-content: space-between;
      font-size: 12px;
      color: var(--muted);
    }

    .collection-tags {
      display: flex;
      gap: 8px;
      flex-wrap: wrap;
    }

    .collection-action {
      margin-top: auto;
    }

    .cover {
      height: 140px;
      border-radius: 16px;
    }

    .release-cover {
      height: 120px;
      border-radius: 14px;
    }

    .release-card h3 {
      margin: 12px 0 4px;
      font-size: 15px;
    }

    .release-card p {
      margin: 0 0 12px;
      font-size: 13px;
      color: var(--muted);
    }

    @media (max-width: 1024px) {
      .hero {
        grid-template-columns: 1fr;
      }
    }

    @media (max-width: 720px) {
      .hero h1 {
        font-size: 32px;
      }

      .search-box {
        flex-direction: column;
        border-radius: 20px;
        padding: 12px;
      }

      .search-box button {
        width: 100%;
      }
    }
  </style>
@endsection
