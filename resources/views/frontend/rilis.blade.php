@extends('frontend.layouts.app')

@section('title', 'Rilis Terbaru - E-Library Sulawesi Selatan')

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
      <a href="{{ route('home') }}">Beranda</a> / Rilis Terbaru
    </div>

    <div class="page-header">
      <h1>Rilis Terbaru</h1>
      <p>Materi pembelajaran terbaru yang baru ditambahkan ke E-Library Sulsel.</p>
    </div>

    <div class="timeline">
      @php $currentMonth = null; @endphp
      @forelse ($materi as $koleksi)
        @php $month = $koleksi->created_at->format('F Y'); @endphp
        @if ($month !== $currentMonth)
          @php $currentMonth = $month; @endphp
          <div class="timeline-month">{{ $month }}</div>
        @endif
        <article class="timeline-item">
          <div class="timeline-date">
            <span class="date-day">{{ $koleksi->created_at->format('d') }}</span>
            <span class="date-month">{{ $koleksi->created_at->format('M') }}</span>
          </div>
          <div class="timeline-content card">
            <div class="timeline-cover" style="background: {{ $coverGradients[$loop->index % count($coverGradients)] }};">
            </div>
            <div class="timeline-info">
              <div class="timeline-tags">
                <span class="badge {{ $koleksi->kategori }}">{{ strtoupper($koleksi->kategori) }}</span>
                <span class="badge outline">Kelas {{ $koleksi->tingkatan }}</span>
              </div>
              <h3>{{ $koleksi->judul }}</h3>
              <p>{{ \Illuminate\Support\Str::limit($koleksi->deskripsi, 100) }}</p>
              <div class="timeline-meta">
                {{ $koleksi->mataPelajaran?->mata_pelajaran ?? 'Umum' }} • {{ $koleksi->topik?->topik ?? 'Umum' }}
              </div>
              <a class="btn primary mini" href="{{ route('koleksi.show', $koleksi) }}">Lihat Detail</a>
            </div>
          </div>
        </article>
      @empty
        <div class="empty-state">Belum ada materi terbaru.</div>
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
    .timeline {
      margin-top: 32px;
    }

    .timeline-month {
      font-family: "Space Grotesk", sans-serif;
      font-size: 20px;
      font-weight: 700;
      color: var(--primary);
      margin: 32px 0 16px;
      padding-bottom: 8px;
      border-bottom: 2px solid var(--border);
    }

    .timeline-month:first-child {
      margin-top: 0;
    }

    .timeline-item {
      display: flex;
      gap: 20px;
      margin-bottom: 20px;
    }

    .timeline-date {
      width: 60px;
      text-align: center;
      flex-shrink: 0;
    }

    .date-day {
      display: block;
      font-family: "Space Grotesk", sans-serif;
      font-size: 28px;
      font-weight: 700;
      color: var(--ink);
    }

    .date-month {
      display: block;
      font-size: 12px;
      color: var(--muted);
      text-transform: uppercase;
    }

    .timeline-content {
      flex: 1;
      display: flex;
      gap: 20px;
      padding: 20px;
    }

    .timeline-cover {
      width: 160px;
      height: 120px;
      border-radius: 12px;
      flex-shrink: 0;
    }

    .timeline-info {
      flex: 1;
    }

    .timeline-tags {
      display: flex;
      gap: 8px;
      margin-bottom: 10px;
    }

    .timeline-info h3 {
      margin: 0 0 8px;
      font-size: 18px;
    }

    .timeline-info p {
      margin: 0 0 10px;
      font-size: 14px;
      color: var(--muted);
      line-height: 1.5;
    }

    .timeline-meta {
      font-size: 12px;
      color: var(--muted);
      margin-bottom: 12px;
    }

    @media (max-width: 720px) {
      .timeline-item {
        flex-direction: column;
        gap: 12px;
      }

      .timeline-date {
        width: 100%;
        text-align: left;
        display: flex;
        gap: 8px;
        align-items: baseline;
      }

      .date-day {
        font-size: 20px;
      }

      .timeline-content {
        flex-direction: column;
      }

      .timeline-cover {
        width: 100%;
        height: 140px;
      }
    }
  </style>
@endsection
