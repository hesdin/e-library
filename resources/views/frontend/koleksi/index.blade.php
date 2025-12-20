@extends('frontend.layouts.app')

@section('title', 'Koleksi - E-Library Sulawesi Selatan')

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
    <div class="breadcrumb">
      <a href="{{ route('home') }}">Beranda</a> / Koleksi
    </div>

    <div class="page-header">
      <h1>Koleksi Materi</h1>
      <p>Jelajahi semua sumber belajar yang tersedia di E-Library Sulsel.</p>
    </div>

    <!-- Search & Filter -->
    <div class="filter-bar">
      <form class="search-form" action="{{ route('koleksi') }}" method="GET">
        <input type="text" name="q" value="{{ request('q') }}" placeholder="Cari materi...">
        <select name="kategori">
          <option value="">Semua Kategori</option>
          <option value="ebook" {{ request('kategori') == 'ebook' ? 'selected' : '' }}>Ebook</option>
          <option value="video" {{ request('kategori') == 'video' ? 'selected' : '' }}>Video</option>
        </select>
        <select name="topik">
          <option value="">Semua Topik</option>
          @foreach ($topikList as $t)
            <option value="{{ $t->id }}" {{ request('topik') == $t->id ? 'selected' : '' }}>{{ $t->topik }}
            </option>
          @endforeach
        </select>
        <button type="submit" class="btn primary">Filter</button>
      </form>
    </div>

    @if (request('q'))
      <p style="color: var(--muted); margin-bottom: 20px;">
        Menampilkan hasil untuk: <strong>"{{ request('q') }}"</strong>
        ({{ $materi->total() }} hasil)
      </p>
    @endif

    <div class="grid-3">
      @forelse ($materi as $koleksi)
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
        <div class="empty-state" style="grid-column: 1/-1;">
          Tidak ada materi yang ditemukan.
        </div>
      @endforelse
    </div>

    @if ($materi->hasPages())
      <div class="pagination">
        {{ $materi->appends(request()->query())->links() }}
      </div>
    @endif
  </main>
@endsection

@section('styles')
  <style>
    .filter-bar {
      background: var(--surface);
      border-radius: 16px;
      padding: 16px 20px;
      margin-bottom: 24px;
      border: 1px solid var(--border);
    }

    .search-form {
      display: flex;
      gap: 12px;
      flex-wrap: wrap;
      align-items: center;
    }

    .search-form input,
    .search-form select {
      padding: 10px 14px;
      border-radius: 10px;
      border: 1px solid var(--border);
      font-size: 14px;
      background: var(--bg);
    }

    .search-form input {
      flex: 1;
      min-width: 200px;
    }

    .search-form select {
      min-width: 150px;
    }

    .cover {
      height: 140px;
      border-radius: 16px;
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
      line-height: 1.5;
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

    @media (max-width: 720px) {
      .search-form {
        flex-direction: column;
      }

      .search-form input,
      .search-form select {
        width: 100%;
      }
    }
  </style>
@endsection
