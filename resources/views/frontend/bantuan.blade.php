@extends('frontend.layouts.app')

@section('title', 'Bantuan - E-Library Sulawesi Selatan')

@section('content')
  <main class="page">
    <div class="breadcrumb">
      <a href="{{ route('home') }}">Beranda</a> / Bantuan
    </div>

    <div class="page-header" style="text-align: center; max-width: 700px; margin: 0 auto 48px;">
      <h1>Pusat Bantuan</h1>
      <p>Temukan jawaban atas pertanyaan umum atau hubungi kami untuk bantuan lebih lanjut.</p>
    </div>

    <div class="help-grid">
      <div class="faq-section">
        <h2>Pertanyaan Umum (FAQ)</h2>

        <div class="faq-list">
          <details class="faq-item">
            <summary>Apa itu E-Library Sulsel?</summary>
            <p>E-Library Sulsel adalah perpustakaan digital resmi yang dikelola oleh Dinas Pendidikan Provinsi Sulawesi
              Selatan. Platform ini menyediakan materi pembelajaran berupa ebook dan video untuk siswa SMA/SMK di seluruh
              Sulawesi Selatan.</p>
          </details>

          <details class="faq-item">
            <summary>Apakah E-Library gratis?</summary>
            <p>Ya, E-Library Sulsel sepenuhnya gratis untuk semua siswa dan guru di Sulawesi Selatan. Anda dapat mengakses
              semua materi tanpa biaya apapun.</p>
          </details>

          <details class="faq-item">
            <summary>Bagaimana cara mencari materi?</summary>
            <p>Anda dapat menggunakan fitur pencarian di halaman utama atau halaman Koleksi. Ketik kata kunci seperti
              judul materi, nama topik, atau mata pelajaran. Anda juga dapat memfilter berdasarkan kategori (ebook/video)
              dan topik.</p>
          </details>

          <details class="faq-item">
            <summary>Bagaimana cara membuka materi ebook?</summary>
            <p>Klik tombol "Lihat Detail" pada materi yang ingin Anda baca, lalu klik tombol "Buka Materi". File PDF akan
              terbuka di tab baru browser Anda.</p>
          </details>

          <details class="faq-item">
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
              <div class="contact-value">info@disdik-sulsel.go.id</div>
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
      background: var(--surface);
      border: 1px solid var(--border);
      border-radius: 14px;
      overflow: hidden;
    }

    .faq-item summary {
      padding: 16px 20px;
      font-weight: 600;
      cursor: pointer;
      list-style: none;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .faq-item summary::after {
      content: "+";
      font-size: 20px;
      color: var(--muted);
    }

    .faq-item[open] summary::after {
      content: "−";
    }

    .faq-item p {
      padding: 0 20px 16px;
      margin: 0;
      color: var(--muted);
      line-height: 1.6;
    }

    .contact-section {
      padding: 24px;
      position: sticky;
      top: 100px;
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
    }

    .contact-icon {
      width: 40px;
      height: 40px;
      background: var(--surface-soft);
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
      .help-grid {
        grid-template-columns: 1fr;
      }

      .contact-section {
        position: static;
      }
    }
  </style>
@endsection
