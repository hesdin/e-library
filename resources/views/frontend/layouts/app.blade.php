<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'E-Library Sulawesi Selatan')</title>
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
      --ebook-color: #3b82f6;
      --video-color: #ef4444;
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
      background: radial-gradient(520px 220px at 10% 12%, #e0f2fe 0%, transparent 60%),
        radial-gradient(420px 240px at 90% 2%, #fef3c7 0%, transparent 55%),
        var(--bg);
      min-height: 100vh;
    }

    a {
      color: inherit;
      text-decoration: none;
    }

    section {
      scroll-margin-top: 100px;
    }

    .page {
      max-width: 1200px;
      margin: 0 auto;
      padding: 32px 24px 80px;
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
      cursor: pointer;
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

    .btn.mini {
      padding: 8px 12px;
      font-size: 13px;
    }

    .section {
      margin-top: 48px;
    }

    .section-head {
      display: flex;
      align-items: flex-end;
      justify-content: space-between;
      gap: 16px;
      flex-wrap: wrap;
    }

    .section-head h2 {
      font-family: "Space Grotesk", sans-serif;
      font-size: 28px;
      margin: 0;
    }

    .section-head p {
      margin: 8px 0 0;
      color: var(--muted);
      max-width: 560px;
    }

    .card {
      background: var(--surface);
      border-radius: 22px;
      padding: 20px;
      border: 1px solid var(--border);
      box-shadow: 0 18px 30px rgba(15, 23, 42, 0.08);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card:hover {
      transform: translateY(-6px);
      box-shadow: 0 24px 40px rgba(15, 23, 42, 0.14);
    }

    .badge {
      padding: 4px 10px;
      border-radius: 999px;
      font-size: 11px;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 0.06em;
    }

    .badge.ebook {
      background: rgba(59, 130, 246, 0.12);
      color: var(--ebook-color);
    }

    .badge.video {
      background: rgba(239, 68, 68, 0.12);
      color: var(--video-color);
    }

    .badge.outline {
      background: transparent;
      border: 1px solid var(--border);
      color: var(--muted);
    }

    .grid-3 {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: 20px;
    }

    .grid-4 {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(230px, 1fr));
      gap: 20px;
    }

    .empty-state {
      padding: 40px 20px;
      border-radius: 16px;
      border: 1px dashed var(--border);
      background: var(--surface);
      color: var(--muted);
      text-align: center;
    }

    .page-header {
      margin-bottom: 32px;
    }

    .page-header h1 {
      font-family: "Space Grotesk", sans-serif;
      font-size: 36px;
      margin: 0 0 12px;
    }

    .page-header p {
      color: var(--muted);
      margin: 0;
      font-size: 16px;
    }

    .breadcrumb {
      font-size: 13px;
      color: var(--muted);
      margin-bottom: 16px;
    }

    .breadcrumb a {
      color: var(--primary);
    }

    .breadcrumb a:hover {
      text-decoration: underline;
    }

    .pagination {
      margin-top: 32px;
      display: flex;
      justify-content: center;
      gap: 8px;
    }

    .pagination a,
    .pagination span {
      padding: 8px 14px;
      border-radius: 8px;
      background: var(--surface);
      border: 1px solid var(--border);
      font-size: 14px;
    }

    .pagination .active {
      background: var(--primary);
      color: #fff;
      border-color: var(--primary);
    }

    @media (max-width: 720px) {
      .page-header h1 {
        font-size: 28px;
      }

      .section-head {
        flex-direction: column;
        align-items: flex-start;
      }
    }

    @yield('styles')
  </style>
</head>

<body>
  @include('frontend.partials.navbar')
  @include('frontend.partials.mobile-menu')

  @yield('content')

  @include('frontend.partials.footer')

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
      if (e.target === mobileMenu) closeMobileMenu();
    });

    document.querySelectorAll('.mobile-menu-links a, .mobile-menu-actions a').forEach(link => {
      link.addEventListener('click', closeMobileMenu);
    });

    // Navbar scroll shadow
    const navWrapper = document.querySelector('.nav-wrapper');
    window.addEventListener('scroll', function() {
      navWrapper.classList.toggle('scrolled', window.scrollY > 10);
    });
  </script>

  @yield('scripts')
</body>

</html>
