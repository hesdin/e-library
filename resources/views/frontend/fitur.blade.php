@extends('frontend.layouts.app')

@section('title', 'Fitur - E-Library Sulawesi Selatan')

@section('content')
  <main class="page">
    <div class="breadcrumb">
      <a href="{{ route('home') }}">Beranda</a> / Fitur
    </div>

    <div class="page-header" style="text-align: center; max-width: 700px; margin: 0 auto 48px;">
      <h1>Kenapa E-Library Sulsel?</h1>
      <p>Platform ini dirancang untuk membantu siswa belajar lebih cepat dengan konten resmi dan berkualitas.</p>
    </div>

    <div class="features-grid">
      <div class="feature-card card">
        <div class="feature-icon" style="background: linear-gradient(135deg, #3b82f6, #60a5fa);">📚</div>
        <h3>Koleksi Lengkap</h3>
        <p>Ribuan materi ebook dan video dari berbagai sekolah dalam satu pusat belajar digital yang mudah diakses.</p>
      </div>
      <div class="feature-card card">
        <div class="feature-icon" style="background: linear-gradient(135deg, #22c55e, #34d399);">⚡</div>
        <h3>Akses Cepat</h3>
        <p>Dirancang ringan dan responsif agar mudah diakses dari perangkat siswa di seluruh provinsi Sulawesi Selatan.
        </p>
      </div>
      <div class="feature-card card">
        <div class="feature-icon" style="background: linear-gradient(135deg, #f59e0b, #fbbf24);">🔄</div>
        <h3>Update Berkala</h3>
        <p>Konten diperbarui secara rutin sesuai kurikulum terbaru dan kebutuhan pembelajaran setiap semester.</p>
      </div>
      <div class="feature-card card">
        <div class="feature-icon" style="background: linear-gradient(135deg, #8b5cf6, #a78bfa);">🎓</div>
        <h3>Konten Resmi</h3>
        <p>Semua materi berasal dari sumber resmi dan telah diverifikasi oleh Dinas Pendidikan Provinsi.</p>
      </div>
      <div class="feature-card card">
        <div class="feature-icon" style="background: linear-gradient(135deg, #ec4899, #f472b6);">🔍</div>
        <h3>Pencarian Mudah</h3>
        <p>Temukan materi dengan cepat menggunakan fitur pencarian dan filter berdasarkan kategori, topik, atau kelas.</p>
      </div>
      <div class="feature-card card">
        <div class="feature-icon" style="background: linear-gradient(135deg, #06b6d4, #22d3ee);">📱</div>
        <h3>Responsif</h3>
        <p>Akses E-Library dari perangkat apapun - laptop, tablet, atau smartphone dengan tampilan yang optimal.</p>
      </div>
    </div>

    <section class="cta-section">
      <div class="cta-content">
        <h2>Siap Mulai Belajar?</h2>
        <p>Jelajahi ribuan materi pembelajaran gratis untuk mendukung perjalanan belajarmu.</p>
        <div class="cta-actions">
          <a href="{{ route('koleksi') }}" class="btn primary">Jelajahi Koleksi</a>
          <a href="{{ route('kategori') }}" class="btn ghost">Lihat Kategori</a>
        </div>
      </div>
    </section>
  </main>
@endsection

@section('styles')
  <style>
    .features-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 24px;
    }

    .feature-card {
      text-align: center;
      padding: 32px 24px;
    }

    .feature-icon {
      width: 64px;
      height: 64px;
      border-radius: 18px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 28px;
      margin: 0 auto 20px;
    }

    .feature-card h3 {
      margin: 0 0 12px;
      font-size: 18px;
    }

    .feature-card p {
      margin: 0;
      color: var(--muted);
      line-height: 1.6;
    }

    .cta-section {
      margin-top: 64px;
      background: linear-gradient(135deg, var(--primary), #38bdf8);
      border-radius: 28px;
      padding: 48px;
      text-align: center;
      color: #fff;
    }

    .cta-content h2 {
      margin: 0 0 12px;
      font-family: "Space Grotesk", sans-serif;
      font-size: 32px;
    }

    .cta-content p {
      margin: 0 0 24px;
      opacity: 0.9;
      font-size: 16px;
    }

    .cta-actions {
      display: flex;
      gap: 12px;
      justify-content: center;
      flex-wrap: wrap;
    }

    .cta-actions .btn.primary {
      background: #fff;
      color: var(--primary);
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    }

    .cta-actions .btn.ghost {
      background: transparent;
      border-color: rgba(255, 255, 255, 0.5);
      color: #fff;
    }

    @media (max-width: 720px) {
      .cta-section {
        padding: 32px 24px;
      }

      .cta-content h2 {
        font-size: 24px;
      }
    }
  </style>
@endsection
