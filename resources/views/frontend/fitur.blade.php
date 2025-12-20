@extends('frontend.layouts.app')

@section('title', 'Fitur - E-Library Sulawesi Selatan')

@section('content')
  <main class="page feature-page">
    <div class="breadcrumb">
      <a href="{{ route('home') }}">Beranda</a> / Fitur
    </div>

    <section class="feature-hero">
      <div class="hero-copy">
        <span class="hero-eyebrow">Fitur Unggulan</span>
        <h1>Kenapa E-Library Smart School?</h1>
        <p>Platform ini dirancang untuk membantu siswa belajar lebih cepat dengan konten resmi dan berkualitas.</p>
        <div class="hero-actions">
          <a href="{{ route('koleksi') }}" class="btn primary">Mulai Jelajah</a>
          <a href="{{ route('rilis') }}" class="btn ghost">Rilis Terbaru</a>
        </div>
      </div>
      <div class="hero-panel">
        <div class="panel-card">
          <div class="panel-icon">✅</div>
          <div class="panel-text">Materi resmi & terverifikasi</div>
        </div>
        <div class="panel-card">
          <div class="panel-icon">⚡</div>
          <div class="panel-text">Akses cepat untuk semua perangkat</div>
        </div>
        <div class="panel-card">
          <div class="panel-icon">🔎</div>
          <div class="panel-text">Pencarian mudah & terstruktur</div>
        </div>
      </div>
    </section>

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
    .feature-page {
      position: relative;
      overflow: hidden;
    }

    .feature-page::before,
    .feature-page::after {
      content: "";
      position: absolute;
      width: 420px;
      height: 420px;
      border-radius: 50%;
      z-index: 0;
      filter: blur(10px);
      opacity: 0.35;
    }

    .feature-page::before {
      top: -220px;
      right: -120px;
      background: radial-gradient(circle at 30% 30%, #38bdf8 0%, rgba(56, 189, 248, 0) 60%);
    }

    .feature-page::after {
      bottom: -260px;
      left: -160px;
      background: radial-gradient(circle at 40% 40%, #facc15 0%, rgba(250, 204, 21, 0) 60%);
    }

    .feature-page>* {
      position: relative;
      z-index: 1;
    }

    .feature-hero {
      display: grid;
      grid-template-columns: minmax(0, 1.1fr) minmax(0, 0.9fr);
      gap: 32px;
      align-items: center;
      padding: 32px;
      border-radius: 28px;
      background: linear-gradient(135deg, rgba(219, 234, 254, 0.8), rgba(240, 253, 250, 0.8));
      border: 1px solid rgba(148, 163, 184, 0.2);
      box-shadow: 0 24px 50px rgba(15, 23, 42, 0.08);
      margin-bottom: 40px;
    }

    .hero-eyebrow {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      padding: 6px 12px;
      border-radius: 999px;
      background: rgba(59, 130, 246, 0.12);
      color: var(--primary);
      font-size: 12px;
      letter-spacing: 0.08em;
      text-transform: uppercase;
      margin-bottom: 16px;
      font-weight: 600;
    }

    .hero-copy h1 {
      margin: 0 0 12px;
      font-family: "Space Grotesk", sans-serif;
      font-size: 36px;
      line-height: 1.15;
    }

    .hero-copy p {
      margin: 0 0 20px;
      color: var(--muted);
      font-size: 16px;
      line-height: 1.7;
    }

    .hero-actions {
      display: flex;
      gap: 12px;
      flex-wrap: wrap;
    }

    .hero-panel {
      display: grid;
      gap: 16px;
    }

    .panel-card {
      display: flex;
      align-items: center;
      gap: 12px;
      padding: 16px 18px;
      border-radius: 18px;
      background: #fff;
      border: 1px solid rgba(226, 232, 240, 0.9);
      box-shadow: 0 12px 24px rgba(15, 23, 42, 0.08);
    }

    .panel-icon {
      width: 40px;
      height: 40px;
      border-radius: 12px;
      display: flex;
      align-items: center;
      justify-content: center;
      background: rgba(59, 130, 246, 0.12);
      font-size: 18px;
    }

    .panel-text {
      font-size: 14px;
      font-weight: 600;
      color: var(--ink);
    }

    .features-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 24px;
    }

    .feature-card {
      text-align: left;
      padding: 28px 26px;
      border-radius: 22px;
      border: 1px solid rgba(226, 232, 240, 0.9);
      background: #fff;
      box-shadow: 0 18px 40px rgba(15, 23, 42, 0.08);
      transition: transform 0.2s ease, box-shadow 0.2s ease, border-color 0.2s ease;
    }

    .feature-card:hover {
      transform: translateY(-6px);
      border-color: rgba(59, 130, 246, 0.35);
      box-shadow: 0 26px 50px rgba(15, 23, 42, 0.14);
    }

    .feature-icon {
      width: 64px;
      height: 64px;
      border-radius: 18px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 28px;
      margin: 0 0 18px;
      color: #fff;
      box-shadow: 0 14px 24px rgba(15, 23, 42, 0.18);
    }

    .feature-card h3 {
      margin: 0 0 12px;
      font-size: 20px;
    }

    .feature-card p {
      margin: 0;
      color: var(--muted);
      line-height: 1.6;
    }

    .cta-section {
      margin-top: 64px;
      background: linear-gradient(135deg, #0ea5e9, #2563eb);
      border-radius: 28px;
      padding: 48px;
      text-align: center;
      color: #fff;
      position: relative;
      overflow: hidden;
    }

    .cta-section::before {
      content: "";
      position: absolute;
      inset: 0;
      background: radial-gradient(circle at 20% 20%, rgba(255, 255, 255, 0.35), rgba(255, 255, 255, 0));
      opacity: 0.7;
    }

    .cta-content {
      position: relative;
      z-index: 1;
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
      .feature-hero {
        grid-template-columns: 1fr;
        padding: 24px;
      }

      .hero-copy h1 {
        font-size: 28px;
      }

      .cta-section {
        padding: 32px 24px;
      }

      .cta-content h2 {
        font-size: 24px;
      }
    }
  </style>
@endsection
