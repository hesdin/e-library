@extends('frontend.layouts.app')

@section('title', $topik->topik . ' - E-Library Sulawesi Selatan')

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
      <a href="{{ route('home') }}">Beranda</a> /
      <a href="{{ route('kategori') }}">Kategori</a> /
      {{ $topik->topik }}
    </div>

    <div class="page-header">
      <h1>{{ $topik->topik }}</h1>
      <p>Daftar materi pembelajaran untuk topik {{ $topik->topik }}.</p>
    </div>

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
          Belum ada materi untuk topik ini.
        </div>
      @endforelse
    </div>

    @if ($materi->hasPages())
      <div class="pagination">
        {{ $materi->links() }}
      </div>
    @endif
  </main>
@endsection

@section('styles')
  <style>
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
  </style>
@endsection
