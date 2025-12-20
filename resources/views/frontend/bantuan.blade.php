@extends('frontend.layouts.app')

@section('title', 'Bantuan - E-Library Sulawesi Selatan')

@section('content')
  <main class="page help-page">
    <div class="breadcrumb">
      <a href="{{ route('home') }}">Beranda</a> / Bantuan
    </div>

    <section class="help-hero">
      <div class="hero-copy">
        <span class="hero-eyebrow">Pusat Bantuan</span>
        <h1>Butuh panduan cepat?</h1>
        <p>Temukan jawaban atas pertanyaan umum atau hubungi kami untuk bantuan lebih lanjut.</p>
        <div class="hero-actions">
          <a href="{{ route('koleksi') }}" class="btn primary">Jelajahi Koleksi</a>
          <a href="#faq" class="btn ghost">Lihat FAQ</a>
        </div>
        <div class="hero-highlights">
          <div class="highlight-item">Gratis untuk siswa & guru</div>
          <div class="highlight-item">Konten resmi terverifikasi</div>
          <div class="highlight-item">Akses cepat di semua perangkat</div>
        </div>
      </div>
      <div class="hero-panel">
        <div class="panel-title">Topik Populer</div>
        <div class="panel-links">
          <a href="#faq-cari">Cara mencari materi</a>
          <a href="#faq-ebook">Membuka ebook (PDF)</a>
          <a href="#faq-video">Menonton video pembelajaran</a>
          <a href="#faq-gratis">Akses & biaya</a>
        </div>
        <div class="panel-note">
          Punya pertanyaan lain? Gunakan informasi kontak di sebelah kanan.
        </div>
      </div>
    </section>

    <div class="help-grid">
      <div class="faq-section" id="faq">
        <h2>Pertanyaan Umum (FAQ)</h2>

        <div class="faq-list">
          <details class="faq-item">
            <summary>Apa itu E-Library Smart School?</summary>
            <p>E-Library Smart School adalah perpustakaan digital resmi yang dikelola oleh Dinas Pendidikan Provinsi
              Sulawesi
              Selatan. Platform ini menyediakan materi pembelajaran berupa ebook dan video untuk siswa SMA/SMK di seluruh
              Sulawesi Selatan.</p>
          </details>

          <details class="faq-item" id="faq-gratis">
            <summary>Apakah E-Library gratis?</summary>
            <p>Ya, E-Library Smart School sepenuhnya gratis untuk semua siswa dan guru di Sulawesi Selatan. Anda dapat
              mengakses
              semua materi tanpa biaya apapun.</p>
          </details>

          <details class="faq-item" id="faq-cari">
            <summary>Bagaimana cara mencari materi?</summary>
            <p>Anda dapat menggunakan fitur pencarian di halaman utama atau halaman Koleksi. Ketik kata kunci seperti
              judul materi, nama topik, atau mata pelajaran. Anda juga dapat memfilter berdasarkan kategori (ebook/video)
              dan topik.</p>
          </details>

          <details class="faq-item" id="faq-ebook">
            <summary>Bagaimana cara membuka materi ebook?</summary>
            <p>Klik tombol "Lihat Detail" pada materi yang ingin Anda baca, lalu klik tombol "Buka Materi". File PDF akan
              terbuka di tab baru browser Anda.</p>
          </details>

          <details class="faq-item" id="faq-video">
            <summary>Bagaimana cara menonton video pembelajaran?</summary>
            <p>Video pembelajaran dapat ditonton langsung di halaman detail materi. Jika video berasal dari YouTube, Anda
              dapat menontonnya dalam iframe atau klik "Buka Materi" untuk membuka di YouTube.</p>
          </details>

          <details class="faq-item">
            <summary>Apakah saya perlu membuat akun?</summary>
            <p>Tidak, Anda tidak perlu membuat akun untuk mengakses materi pembelajaran. Semua konten dapat diakses secara
              bebas oleh publik.</p>
          </details>

          <details class="faq-item">
            <summary>Materi apa saja yang tersedia?</summary>
            <p>E-Library menyediakan materi untuk berbagai mata pelajaran SMA/SMK mulai dari kelas X hingga XII. Materi
              tersedia dalam format ebook (PDF) dan video pembelajaran.</p>
          </details>
        </div>
      </div>

      <div class="contact-section card">
        <h2>Hubungi Kami</h2>
        <p>Jika Anda memerlukan bantuan lebih lanjut, silakan hubungi kami melalui:</p>

        <div class="contact-list">
          <div class="contact-item">
            <div class="contact-icon">📍</div>
            <div>
              <div class="contact-label">Alamat</div>
              <div class="contact-value">Jl. Perintis Kemerdekaan KM.10, Makassar, Sulawesi Selatan 90245</div>
            </div>
          </div>
          <div class="contact-item">
            <div class="contact-icon">📧</div>
            <div>
              <div class="contact-label">Email</div>
              <div class="contact-value">info@disdik-Smart School.go.id</div>
            </div>
          </div>
          <div class="contact-item">
            <div class="contact-icon">📞</div>
            <div>
              <div class="contact-label">Telepon</div>
              <div class="contact-value">(0411) 123-4567</div>
            </div>
          </div>
          <div class="contact-item">
            <div class="contact-icon">🕒</div>
            <div>
              <div class="contact-label">Jam Operasional</div>
              <div class="contact-value">Senin - Jumat, 08:00 - 16:00 WITA</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
@endsection

@section('styles')
  <style>
    .help-page {
      position: relative;
      overflow: hidden;
    }

    .help-page::before,
    .help-page::after {
      content: "";
      position: absolute;
      width: 420px;
      height: 420px;
      border-radius: 50%;
      z-index: 0;
      filter: blur(12px);
      opacity: 0.35;
    }

    .help-page::before {
      top: -220px;
      left: -160px;
      background: radial-gradient(circle at 30% 30%, #38bdf8 0%, rgba(56, 189, 248, 0) 60%);
    }

    .help-page::after {
      bottom: -240px;
      right: -180px;
      background: radial-gradient(circle at 40% 40%, #f59e0b 0%, rgba(245, 158, 11, 0) 60%);
    }

    .help-page>* {
      position: relative;
      z-index: 1;
    }

    .help-hero {
      display: grid;
      grid-template-columns: minmax(0, 1.1fr) minmax(0, 0.9fr);
      gap: 28px;
      padding: 32px;
      border-radius: 28px;
      background: linear-gradient(135deg, rgba(219, 234, 254, 0.85), rgba(240, 253, 250, 0.85));
      border: 1px solid rgba(148, 163, 184, 0.2);
      box-shadow: 0 24px 50px rgba(15, 23, 42, 0.08);
      margin-bottom: 40px;
    }

    .hero-eyebrow {
      display: inline-flex;
      align-items: center;
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
      font-size: 34px;
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
      margin-bottom: 18px;
    }

    .hero-highlights {
      display: flex;
      flex-wrap: wrap;
      gap: 10px;
    }

    .highlight-item {
      padding: 6px 12px;
      border-radius: 999px;
      background: #fff;
      border: 1px solid rgba(226, 232, 240, 0.9);
      font-size: 12px;
      font-weight: 600;
      color: var(--ink);
    }

    .hero-panel {
      background: #fff;
      border-radius: 22px;
      padding: 22px;
      border: 1px solid rgba(226, 232, 240, 0.9);
      box-shadow: 0 18px 40px rgba(15, 23, 42, 0.08);
      display: flex;
      flex-direction: column;
      gap: 14px;
    }

    .panel-title {
      font-family: "Space Grotesk", sans-serif;
      font-size: 18px;
      font-weight: 700;
      margin: 0;
    }

    .panel-links {
      display: flex;
      flex-direction: column;
      gap: 10px;
    }

    .panel-links a {
      padding: 10px 12px;
      border-radius: 12px;
      background: var(--surface);
      color: var(--ink);
      font-weight: 600;
      border: 1px solid var(--border);
      transition: background 0.2s ease, transform 0.2s ease;
    }

    .panel-links a:hover {
      background: var(--surface-soft);
      transform: translateX(4px);
    }

    .panel-note {
      font-size: 12px;
      color: var(--muted);
    }

    .help-grid {
      display: grid;
      grid-template-columns: 1.5fr 1fr;
      gap: 32px;
      align-items: start;
    }

    .faq-section h2,
    .contact-section h2 {
      font-family: "Space Grotesk", sans-serif;
      font-size: 24px;
      margin: 0 0 20px;
    }

    .faq-list {
      display: flex;
      flex-direction: column;
      gap: 12px;
    }

    .faq-item {
      background: #fff;
      border: 1px solid rgba(226, 232, 240, 0.9);
      border-radius: 16px;
      overflow: hidden;
      box-shadow: 0 12px 30px rgba(15, 23, 42, 0.06);
      transition: border-color 0.2s ease, box-shadow 0.2s ease;
    }

    .faq-item[open] {
      border-color: rgba(59, 130, 246, 0.35);
      box-shadow: 0 20px 40px rgba(15, 23, 42, 0.12);
    }

    .faq-item summary {
      padding: 16px 20px;
      font-weight: 600;
      cursor: pointer;
      list-style: none;
      display: flex;
      justify-content: space-between;
      align-items: center;
      gap: 12px;
    }

    .faq-item summary::after {
      content: "+";
      font-size: 20px;
      color: var(--muted);
      transition: transform 0.2s ease, color 0.2s ease;
    }

    .faq-item[open] summary::after {
      content: "-";
      color: var(--primary);
    }

    .faq-item p {
      padding: 0 20px 16px;
      margin: 0;
      color: var(--muted);
      line-height: 1.6;
    }

    .contact-section {
      padding: 26px;
      position: sticky;
      top: 100px;
      border: 1px solid rgba(226, 232, 240, 0.9);
      background: linear-gradient(180deg, rgba(255, 255, 255, 0.96), rgba(239, 246, 255, 0.9));
    }

    .contact-section p {
      color: var(--muted);
      margin: 0 0 20px;
    }

    .contact-list {
      display: flex;
      flex-direction: column;
      gap: 16px;
    }

    .contact-item {
      display: flex;
      gap: 14px;
      padding: 12px;
      border-radius: 14px;
      background: #fff;
      border: 1px solid rgba(226, 232, 240, 0.9);
    }

    .contact-icon {
      width: 40px;
      height: 40px;
      background: rgba(59, 130, 246, 0.12);
      border-radius: 12px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 18px;
      flex-shrink: 0;
    }

    .contact-label {
      font-size: 12px;
      color: var(--muted);
      margin-bottom: 2px;
    }

    .contact-value {
      font-weight: 600;
      font-size: 14px;
    }

    @media (max-width: 900px) {
      .help-hero {
        grid-template-columns: 1fr;
        padding: 24px;
      }

      .hero-copy h1 {
        font-size: 26px;
      }

      .help-grid {
        grid-template-columns: 1fr;
      }

      .contact-section {
        position: static;
      }
    }
  </style>
@endsection
