@extends('frontend.layouts.app')

@section('title', 'Kategori - E-Library Sulawesi Selatan')

@section('content')
  <main class="page">
    <div class="breadcrumb">
      <a href="{{ route('home') }}">Beranda</a> / Kategori
    </div>

    <div class="page-header">
      <h1>Kategori Pembelajaran</h1>
      <p>Jelajahi berbagai topik pembelajaran yang tersedia di E-Library Sulsel.</p>
    </div>

    <div class="grid-3">
      @forelse ($topik as $item)
        <a href="{{ route('kategori.show', $item) }}" class="card kategori-card">
          <div class="kategori-icon" style="background: {{ $gradients[$loop->index % count($gradients)] }};">
            {{ strtoupper(substr($item->topik, 0, 2)) }}
          </div>
          <div class="kategori-info">
            <h3>{{ $item->topik }}</h3>
            <p>{{ $item->sumber_belajar_count ?? 0 }} materi tersedia</p>
          </div>
          <div class="kategori-arrow">&rarr;</div>
        </a>
      @empty
        <div class="empty-state" style="grid-column: 1/-1;">
          Belum ada kategori tersedia.
        </div>
      @endforelse
    </div>

    @if ($topik->hasPages())
      <div class="pagination">
        {{ $topik->links() }}
      </div>
    @endif
  </main>
@endsection

@section('styles')
  <style>
    .kategori-card {
      display: flex;
      align-items: center;
      gap: 16px;
      padding: 20px;
    }

    .kategori-icon {
      width: 56px;
      height: 56px;
      border-radius: 16px;
      color: #fff;
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: 700;
      font-family: "Space Grotesk", sans-serif;
      font-size: 18px;
      flex-shrink: 0;
    }

    .kategori-info {
      flex: 1;
    }

    .kategori-info h3 {
      margin: 0;
      font-size: 16px;
    }

    .kategori-info p {
      margin: 4px 0 0;
      font-size: 13px;
      color: var(--muted);
    }

    .kategori-arrow {
      font-size: 20px;
      color: var(--muted);
      transition: transform 0.2s ease;
    }

    .kategori-card:hover .kategori-arrow {
      transform: translateX(4px);
      color: var(--primary);
    }
  </style>
@endsection
