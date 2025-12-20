<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Detail Sumber Belajar - {{ $sumber->judul }}</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&family=Space+Grotesk:wght@600;700&display=swap"
    rel="stylesheet">
  <style>
    :root {
      --bg: #f4f7ff;
      --ink: #0f172a;
      --muted: #475569;
      --primary: #1d4ed8;
      --primary-dark: #1e3a8a;
      --accent: #f59e0b;
      --surface: #ffffff;
      --surface-soft: #eef3ff;
      --border: rgba(15, 23, 42, 0.08);
      --shadow: 0 24px 50px rgba(15, 23, 42, 0.12);
    }

    * {
      box-sizing: border-box;
    }

    html {
      scroll-behavior: smooth;
    }

    body {
      margin: 0;
      font-family: "Plus Jakarta Sans", sans-serif;
      color: var(--ink);
      background: radial-gradient(500px 220px at 10% 12%, #e0f2fe 0%, transparent 60%),
        radial-gradient(420px 220px at 90% 0%, #fef3c7 0%, transparent 55%),
        var(--bg);
      min-height: 100vh;
    }

    a {
      color: inherit;
      text-decoration: none;
    }

    .nav-wrapper {
      position: sticky;
      top: 0;
      z-index: 200;
      background: rgba(244, 247, 255, 0.92);
      backdrop-filter: blur(10px);
      border-bottom: 1px solid var(--border);
      transition: box-shadow 0.3s ease;
    }

    .nav-wrapper.scrolled {
      box-shadow: 0 4px 20px rgba(15, 23, 42, 0.1);
    }

    .nav-container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 16px 24px;
    }

    .page {
      max-width: 1200px;
      margin: 0 auto;
      padding: 32px 24px 70px;
    }

    .nav {
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 20px;
      flex-wrap: wrap;
    }

    .brand {
      display: flex;
      align-items: center;
      gap: 12px;
    }

    .brand-mark {
      width: 44px;
      height: 44px;
      border-radius: 14px;
      background: linear-gradient(135deg, var(--primary), #38bdf8);
      color: #fff;
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: 700;
      letter-spacing: 1px;
      font-family: "Space Grotesk", sans-serif;
    }

    .brand-title {
      display: block;
      font-family: "Space Grotesk", sans-serif;
      font-size: 16px;
    }

    .brand-sub {
      display: block;
      font-size: 12px;
      color: var(--muted);
    }

    .nav-links {
      display: flex;
      gap: 12px;
      font-weight: 600;
      font-size: 14px;
      flex-wrap: wrap;
    }

    .nav-links a {
      padding: 6px 12px;
      border-radius: 999px;
      color: var(--muted);
      transition: background 0.2s ease, color 0.2s ease;
    }

    .nav-links a:hover {
      background: var(--surface);
      color: var(--ink);
    }

    .nav-actions {
      display: flex;
      gap: 10px;
    }

    /* Mobile Hamburger Menu */
    .hamburger {
      display: none;
      width: 40px;
      height: 40px;
      border-radius: 12px;
      background: var(--surface);
      border: 1px solid var(--border);
      cursor: pointer;
      align-items: center;
      justify-content: center;
      flex-direction: column;
      gap: 5px;
      padding: 10px;
    }

    .hamburger span {
      display: block;
      width: 100%;
      height: 2px;
      background: var(--ink);
      border-radius: 2px;
      transition: all 0.3s ease;
    }

    .hamburger.active span:nth-child(1) {
      transform: rotate(45deg) translate(5px, 5px);
    }

    .hamburger.active span:nth-child(2) {
      opacity: 0;
    }

    .hamburger.active span:nth-child(3) {
      transform: rotate(-45deg) translate(5px, -5px);
    }

    .mobile-menu {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: rgba(15, 23, 42, 0.5);
      backdrop-filter: blur(4px);
      z-index: 300;
      opacity: 0;
      visibility: hidden;
      transition: all 0.3s ease;
    }

    .mobile-menu.active {
      opacity: 1;
      visibility: visible;
    }

    .mobile-menu-content {
      position: absolute;
      right: 0;
      top: 0;
      bottom: 0;
      width: 280px;
      background: var(--surface);
      padding: 24px;
      transform: translateX(100%);
      transition: transform 0.3s ease;
      display: flex;
      flex-direction: column;
      gap: 8px;
    }

    .mobile-menu.active .mobile-menu-content {
      transform: translateX(0);
    }

    .mobile-menu-header {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-bottom: 20px;
      padding-bottom: 16px;
      border-bottom: 1px solid var(--border);
    }

    .mobile-menu-close {
      width: 36px;
      height: 36px;
      border-radius: 50%;
      background: var(--surface-soft);
      border: none;
      cursor: pointer;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 20px;
      color: var(--muted);
    }

    .mobile-menu-links {
      display: flex;
      flex-direction: column;
      gap: 4px;
    }

    .mobile-menu-links a {
      padding: 12px 16px;
      border-radius: 12px;
      font-weight: 600;
      color: var(--ink);
      transition: background 0.2s ease;
    }

    .mobile-menu-links a:hover {
      background: var(--surface-soft);
    }

    .mobile-menu-actions {
      margin-top: auto;
      display: flex;
      flex-direction: column;
      gap: 10px;
    }

    .btn {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      padding: 10px 18px;
      border-radius: 999px;
      font-weight: 600;
      border: 1px solid transparent;
      transition: transform 0.2s ease, box-shadow 0.2s ease, background 0.2s ease;
    }

    .btn.primary {
      background: var(--primary);
      color: #fff;
      box-shadow: 0 16px 30px rgba(29, 78, 216, 0.25);
    }

    .btn.primary:hover {
      background: var(--primary-dark);
      transform: translateY(-1px);
    }

    .btn.ghost {
      background: var(--surface);
      border-color: var(--border);
      color: var(--ink);
    }

    .btn.disabled {
      background: #e2e8f0;
      color: #94a3b8;
      cursor: not-allowed;
      box-shadow: none;
    }

    .detail {
      margin-top: 32px;
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 32px;
    }

    .detail-info {
      background: var(--surface);
      border-radius: 24px;
      padding: 24px;
      border: 1px solid var(--border);
      box-shadow: var(--shadow);
    }

    .breadcrumb {
      font-size: 12px;
      color: var(--muted);
      margin-bottom: 10px;
    }

    .detail-info h1 {
      font-family: "Space Grotesk", sans-serif;
      font-size: 28px;
      margin: 0 0 12px;
    }

    .detail-info p {
      margin: 0;
      color: var(--muted);
      line-height: 1.7;
    }

    .meta-grid {
      margin-top: 18px;
      display: grid;
      grid-template-columns: repeat(2, minmax(0, 1fr));
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
      letter-spacing: 0.08em;
      color: var(--muted);
    }

    .meta-value {
      margin-top: 6px;
      font-weight: 700;
    }

    .detail-actions {
      margin-top: 20px;
      display: flex;
      gap: 12px;
      flex-wrap: wrap;
    }

    .viewer-card {
      background: var(--surface);
      border-radius: 24px;
      padding: 20px;
      border: 1px solid var(--border);
      box-shadow: var(--shadow);
    }

    .viewer-title {
      font-weight: 700;
      margin-bottom: 12px;
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
      height: 360px;
      border: 0;
      display: block;
    }

    .video-player {
      width: 100%;
      height: 360px;
      display: block;
      background: #0f172a;
    }

    .doc-frame iframe {
      width: 100%;
      height: 460px;
      border: 0;
      display: block;
      background: #fff;
    }

    .empty-viewer {
      padding: 20px;
      border-radius: 16px;
      border: 1px dashed var(--border);
      color: var(--muted);
      background: var(--surface-soft);
    }

    .section {
      margin-top: 60px;
    }

    .section-head {
      display: flex;
      align-items: flex-end;
      justify-content: space-between;
      gap: 12px;
      flex-wrap: wrap;
    }

    .section-head h2 {
      font-family: "Space Grotesk", sans-serif;
      font-size: 24px;
      margin: 0;
    }

    .related-grid {
      margin-top: 18px;
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
      gap: 16px;
    }

    .related-card {
      background: var(--surface);
      border-radius: 18px;
      padding: 16px;
      border: 1px solid var(--border);
      box-shadow: 0 16px 26px rgba(15, 23, 42, 0.08);
    }

    .related-card h3 {
      margin: 0 0 6px;
      font-size: 15px;
    }

    .related-card p {
      margin: 0;
      font-size: 12px;
      color: var(--muted);
    }

    .footer {
      margin-top: 70px;
      padding-top: 24px;
      border-top: 1px solid var(--border);
      color: var(--muted);
      font-size: 13px;
    }

    @media (max-width: 980px) {
      .detail {
        grid-template-columns: 1fr;
      }
    }

    @media (max-width: 900px) {

      .nav-links,
      .nav-actions {
        display: none;
      }

      .hamburger {
        display: flex;
      }

      .mobile-menu {
        display: block;
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
        height: 360px;
      }
    }
  </style>
</head>

<body>
  @php
    $kategoriLabel = $sumber->kategori === 'video' ? 'Video' : 'Ebook';
    $topikLabel = $sumber->topik?->topik ?? 'Topik umum';
    $mapelLabel = $sumber->mataPelajaran?->mata_pelajaran ?? 'Mata pelajaran umum';
  @endphp

  <div class="nav-wrapper">
    <div class="nav-container">
      <header class="nav">
        <div class="brand">
          <div class="brand-mark">EL</div>
          <div>
            <span class="brand-title">E-Library Smart School</span>
            <span class="brand-sub">Dinas Pendidikan Provinsi Sulawesi Selatan</span>
          </div>
        </div>
        <nav class="nav-links">
          <a href="{{ route('landing') }}#beranda">Beranda</a>
          <a href="{{ route('landing') }}#kategori">Kategori</a>
          <a href="{{ route('landing') }}#koleksi">Koleksi</a>
          <a href="{{ route('landing') }}#rilis">Rilis</a>
          <a href="{{ route('landing') }}#fitur">Fitur</a>
          <a href="{{ route('landing') }}#bantuan">Bantuan</a>
        </nav>
        <div class="nav-actions">
          <a class="btn ghost" href="{{ route('landing') }}">Kembali ke Beranda</a>
          @if ($openUrl)
            <a class="btn primary" href="{{ $openUrl }}" target="_blank" rel="noopener">Buka Materi</a>
          @else
            <span class="btn disabled">Materi belum tersedia</span>
          @endif
        </div>
        <button class="hamburger" id="hamburgerBtn" aria-label="Menu">
          <span></span>
          <span></span>
          <span></span>
        </button>
      </header>
    </div>
  </div>

  <!-- Mobile Menu Overlay -->
  <div class="mobile-menu" id="mobileMenu">
    <div class="mobile-menu-content">
      <div class="mobile-menu-header">
        <div class="brand">
          <div class="brand-mark">EL</div>
          <span class="brand-title">E-Library</span>
        </div>
        <button class="mobile-menu-close" id="mobileMenuClose">&times;</button>
      </div>
      <nav class="mobile-menu-links">
        <a href="{{ route('landing') }}#beranda">Beranda</a>
        <a href="{{ route('landing') }}#kategori">Kategori</a>
        <a href="{{ route('landing') }}#koleksi">Koleksi</a>
        <a href="{{ route('landing') }}#rilis">Rilis Terbaru</a>
        <a href="{{ route('landing') }}#fitur">Fitur</a>
        <a href="{{ route('landing') }}#bantuan">Bantuan</a>
      </nav>
      <div class="mobile-menu-actions">
        <a class="btn ghost" href="{{ route('landing') }}">Kembali ke Beranda</a>
        @if ($openUrl)
          <a class="btn primary" href="{{ $openUrl }}" target="_blank" rel="noopener">Buka Materi</a>
        @endif
      </div>
    </div>
  </div>

  <div class="page">
    <main class="detail">
      <section class="detail-info">
        <div class="breadcrumb">Beranda / Koleksi / {{ $sumber->judul }}</div>
        <h1>{{ $sumber->judul }}</h1>
        <p>{{ $sumber->deskripsi }}</p>

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
            <div class="meta-value">E-Library Smart School</div>
          </div>
        </div>

        <div class="detail-actions">
          @if ($openUrl)
            <a class="btn primary" href="{{ $openUrl }}" target="_blank" rel="noopener">Buka Materi</a>
          @else
            <span class="btn disabled">Materi belum tersedia</span>
          @endif
          <a class="btn ghost" href="{{ route('landing') }}#koleksi">Lihat Koleksi Lain</a>
        </div>
      </section>

      <aside class="viewer-card">
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
    </main>

    @if ($related->isNotEmpty())
      <section class="section">
        <div class="section-head">
          <h2>Materi Terkait</h2>
        </div>
        <div class="related-grid">
          @foreach ($related as $item)
            <a class="related-card" href="{{ route('koleksi.show', $item) }}">
              <h3>{{ $item->judul }}</h3>
              <p>{{ $item->mataPelajaran?->mata_pelajaran ?? 'Mata pelajaran umum' }} -
                {{ strtoupper($item->kategori) }}</p>
            </a>
          @endforeach
        </div>
      </section>
    @endif

    <footer class="footer">
      E-Library Smart School - Perpustakaan digital resmi untuk siswa di Sulawesi Selatan.
      <div style="margin-top: 8px; font-size: 11px;">&copy; {{ date('Y') }} Dinas Pendidikan Provinsi Sulawesi
        Selatan.</div>
    </footer>
  </div>

  <script>
    // Mobile Menu Toggle
    const hamburgerBtn = document.getElementById('hamburgerBtn');
    const mobileMenu = document.getElementById('mobileMenu');
    const mobileMenuClose = document.getElementById('mobileMenuClose');

    function openMobileMenu() {
      hamburgerBtn.classList.add('active');
      mobileMenu.classList.add('active');
      document.body.style.overflow = 'hidden';
    }

    function closeMobileMenu() {
      hamburgerBtn.classList.remove('active');
      mobileMenu.classList.remove('active');
      document.body.style.overflow = '';
    }

    hamburgerBtn.addEventListener('click', openMobileMenu);
    mobileMenuClose.addEventListener('click', closeMobileMenu);
    mobileMenu.addEventListener('click', function(e) {
      if (e.target === mobileMenu) {
        closeMobileMenu();
      }
    });

    // Close mobile menu when clicking on a link
    document.querySelectorAll('.mobile-menu-links a, .mobile-menu-actions a').forEach(link => {
      link.addEventListener('click', closeMobileMenu);
    });

    // Navbar scroll shadow effect
    const navWrapper = document.querySelector('.nav-wrapper');
    window.addEventListener('scroll', function() {
      if (window.scrollY > 10) {
        navWrapper.classList.add('scrolled');
      } else {
        navWrapper.classList.remove('scrolled');
      }
    });
  </script>
</body>

</html>
