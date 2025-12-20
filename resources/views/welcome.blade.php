<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>E-Library Sulawesi Selatan</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&family=Space+Grotesk:wght@600;700&display=swap"
    rel="stylesheet">
  <style>
    :root {
      --bg: #f7f9fc;
      --ink: #0f172a;
      --muted: #475569;
      --primary: #1d4ed8;
      --primary-dark: #1e3a8a;
      --accent: #f59e0b;
      --surface: #ffffff;
      --surface-soft: #f1f5fb;
      --border: rgba(15, 23, 42, 0.06);
      --shadow: 0 18px 36px rgba(15, 23, 42, 0.12);
      --shadow-soft: 0 12px 24px rgba(15, 23, 42, 0.08);
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
      background: radial-gradient(600px 280px at 8% 0%, rgba(59, 130, 246, 0.12) 0%, transparent 60%),
        linear-gradient(180deg, #f7f9fc 0%, #eef2ff 100%);
      min-height: 100vh;
    }

    a {
      color: inherit;
      text-decoration: none;
    }

    section {
      scroll-margin-top: 120px;
    }

    .nav-wrapper {
      position: sticky;
      top: 0;
      z-index: 200;
      background: rgba(247, 249, 252, 0.92);
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

    .nav {
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 20px;
      flex-wrap: wrap;
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
      box-shadow: 0 10px 20px rgba(29, 78, 216, 0.2);
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

    .btn.disabled {
      background: #e2e8f0;
      color: #94a3b8;
      cursor: not-allowed;
      box-shadow: none;
    }

    .page {
      max-width: 1200px;
      margin: 0 auto;
      padding: 32px 24px 80px;
    }

    .hero {
      display: grid;
      grid-template-columns: 1.15fr 0.85fr;
      gap: 32px;
      align-items: center;
    }

    .eyebrow {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      padding: 6px 12px;
      border-radius: 999px;
      background: rgba(29, 78, 216, 0.12);
      color: var(--primary-dark);
      font-size: 12px;
      font-weight: 700;
      letter-spacing: 0.08em;
      text-transform: uppercase;
    }

    .hero h1 {
      font-family: "Space Grotesk", sans-serif;
      font-size: 42px;
      line-height: 1.15;
      margin: 16px 0 12px;
    }

    .hero p {
      font-size: 16px;
      line-height: 1.7;
      color: var(--muted);
      margin: 0;
    }

    .search {
      margin-top: 18px;
      display: flex;
      align-items: center;
      gap: 10px;
      background: var(--surface);
      border-radius: 999px;
      padding: 6px 8px 6px 18px;
      border: 1px solid var(--border);
      box-shadow: var(--shadow-soft);
    }

    .search input {
      border: none;
      outline: none;
      flex: 1;
      font-size: 14px;
      background: transparent;
      color: var(--ink);
    }

    .search button {
      width: 40px;
      height: 40px;
      border-radius: 999px;
      border: none;
      background: var(--primary);
      color: #fff;
      font-weight: 700;
      cursor: pointer;
    }

    .hero-actions {
      margin-top: 16px;
      display: flex;
      gap: 12px;
      flex-wrap: wrap;
    }

    .hero-tags {
      margin-top: 16px;
      display: flex;
      gap: 12px;
      flex-wrap: wrap;
    }

    .hero-tag {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      padding: 8px 12px;
      border-radius: 999px;
      background: var(--surface);
      border: 1px solid var(--border);
      font-size: 12px;
      color: var(--muted);
    }

    .hero-tag .dot {
      width: 8px;
      height: 8px;
      border-radius: 50%;
      background: var(--accent);
    }

    .hero-card {
      position: relative;
      background: linear-gradient(180deg, #ffffff 0%, #f1f5ff 100%);
      border-radius: 28px;
      padding: 26px;
      border: 1px solid rgba(15, 23, 42, 0.08);
      box-shadow: 0 28px 60px rgba(15, 23, 42, 0.14);
      overflow: hidden;
    }

    .hero-card::before {
      content: "";
      position: absolute;
      inset: 0;
      background: radial-gradient(120px 120px at 15% 15%, rgba(59, 130, 246, 0.12), transparent 60%),
        radial-gradient(160px 160px at 80% 20%, rgba(16, 185, 129, 0.12), transparent 60%);
      opacity: 0.8;
      pointer-events: none;
    }

    .hero-card::after {
      content: "";
      position: absolute;
      top: -40px;
      right: -40px;
      width: 140px;
      height: 140px;
      border-radius: 50%;
      background: radial-gradient(circle at 30% 30%, rgba(29, 78, 216, 0.12), rgba(29, 78, 216, 0.02));
    }

    .hero-card>* {
      position: relative;
      z-index: 1;
    }

    .hero-card-header {
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 12px;
    }

    .hero-card-visual {
      margin-top: 14px;
      padding: 14px;
      border-radius: 20px;
      background: linear-gradient(135deg, rgba(59, 130, 246, 0.08), rgba(14, 165, 233, 0.08));
      border: 1px solid rgba(15, 23, 42, 0.08);
    }

    .hero-illustration {
      width: 100%;
      height: 160px;
      border-radius: 16px;
      display: flex;
      align-items: center;
      justify-content: center;
      background: radial-gradient(140px 80px at 50% 30%, rgba(99, 102, 241, 0.18), transparent 70%),
        linear-gradient(180deg, #f8fafc 0%, #eef2ff 100%);
    }

    .hero-illustration svg {
      width: min(260px, 100%);
      height: auto;
      display: block;
    }

    .hero-icon {
      width: 64px;
      height: 64px;
      border-radius: 18px;
      background: linear-gradient(135deg, var(--primary), #38bdf8);
      color: #fff;
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: 700;
      font-family: "Space Grotesk", sans-serif;
      letter-spacing: 1px;
      box-shadow: 0 12px 24px rgba(29, 78, 216, 0.25);
    }

    .hero-card-badge {
      padding: 6px 12px;
      border-radius: 999px;
      font-size: 11px;
      font-weight: 700;
      letter-spacing: 0.08em;
      text-transform: uppercase;
      background: rgba(15, 23, 42, 0.06);
      color: var(--muted);
      border: 1px solid rgba(15, 23, 42, 0.08);
    }

    .hero-stat {
      margin-top: 18px;
    }

    .hero-stat-value {
      font-family: "Space Grotesk", sans-serif;
      font-size: 32px;
    }

    .hero-stat-label {
      color: var(--muted);
      font-size: 14px;
    }

    .hero-card-divider {
      height: 1px;
      background: rgba(15, 23, 42, 0.08);
      margin: 18px 0 12px;
    }

    .metric-grid {
      display: grid;
      grid-template-columns: repeat(2, minmax(0, 1fr));
      gap: 14px 24px;
    }

    .metric-item {
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 12px;
      padding: 6px 0 12px;
      position: relative;
    }

    .metric-item::after {
      content: "";
      position: absolute;
      left: 0;
      right: 0;
      bottom: 0;
      height: 1px;
      background: linear-gradient(90deg, rgba(15, 23, 42, 0.16), rgba(15, 23, 42, 0.04), transparent);
    }

    .metric-item:nth-last-child(-n + 2)::after {
      display: none;
    }

    .metric-left {
      display: inline-flex;
      align-items: center;
      gap: 8px;
    }

    .metric-dot {
      width: 8px;
      height: 8px;
      border-radius: 50%;
      background: var(--metric-color, var(--primary));
      box-shadow: 0 0 0 4px rgba(15, 23, 42, 0.04);
    }

    .metric-label {
      font-size: 11px;
      letter-spacing: 0.08em;
      text-transform: uppercase;
      color: var(--muted);
    }

    .metric-value {
      font-weight: 700;
      font-size: 16px;
      color: var(--ink);
      padding: 4px 10px;
      border-radius: 999px;
      background: rgba(15, 23, 42, 0.06);
    }

    .metric-item.ebook {
      --metric-color: var(--ebook-color);
    }

    .metric-item.video {
      --metric-color: var(--video-color);
    }

    .metric-item.topik {
      --metric-color: #0ea5e9;
    }

    .metric-item.mapel {
      --metric-color: #10b981;
    }

    .section {
      margin-top: 64px;
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

    .section-actions {
      display: flex;
      gap: 8px;
    }

    .circle-btn {
      width: 36px;
      height: 36px;
      border-radius: 50%;
      border: 1px solid var(--border);
      background: var(--surface);
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: 700;
    }

    .chip-group {
      margin-top: 18px;
      display: flex;
      gap: 10px;
      flex-wrap: wrap;
    }

    .chip {
      padding: 8px 14px;
      border-radius: 999px;
      background: var(--surface);
      border: 1px solid var(--border);
      font-size: 13px;
      font-weight: 600;
      color: var(--muted);
      display: inline-flex;
      align-items: center;
    }

    .chip.active {
      background: var(--primary);
      color: #fff;
      border-color: transparent;
      box-shadow: 0 12px 24px rgba(29, 78, 216, 0.25);
    }

    .collection-grid {
      margin-top: 22px;
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(230px, 1fr));
      gap: 20px;
    }

    .collection-card {
      background: var(--surface);
      border-radius: 22px;
      padding: 16px;
      border: 1px solid var(--border);
      box-shadow: var(--shadow-soft);
      display: flex;
      flex-direction: column;
      gap: 12px;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .collection-card:hover {
      transform: translateY(-4px);
      box-shadow: var(--shadow);
    }

    .cover {
      height: 180px;
      border-radius: 16px;
      background: var(--cover, var(--surface-soft));
      background-size: cover;
      background-position: center;
      overflow: hidden;
    }

    .cover img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      display: block;
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
      gap: 8px;
      font-size: 12px;
      color: var(--muted);
    }

    .collection-tags {
      display: flex;
      gap: 8px;
      flex-wrap: wrap;
    }

    .badge {
      padding: 4px 10px;
      border-radius: 999px;
      font-size: 11px;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 0.06em;
      background: rgba(29, 78, 216, 0.1);
      color: var(--primary);
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

    .collection-action {
      margin-top: auto;
    }

    .release-grid {
      margin-top: 22px;
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
      gap: 20px;
    }

    .release-card {
      background: var(--surface);
      border-radius: 20px;
      padding: 16px;
      border: 1px solid var(--border);
      box-shadow: var(--shadow-soft);
      display: flex;
      flex-direction: column;
      gap: 12px;
    }

    .release-cover {
      height: 150px;
      border-radius: 14px;
      background: var(--cover, var(--surface-soft));
      background-size: cover;
      background-position: center;
      overflow: hidden;
    }

    .release-cover img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      display: block;
    }

    .release-card h3 {
      margin: 0;
      font-size: 16px;
    }

    .release-card p {
      margin: 0;
      font-size: 13px;
      color: var(--muted);
    }

    .feature-grid {
      margin-top: 22px;
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
      gap: 18px;
    }

    .feature-card {
      background: var(--surface);
      border-radius: 20px;
      padding: 18px;
      border: 1px solid var(--border);
      box-shadow: var(--shadow-soft);
    }

    .feature-icon {
      width: 44px;
      height: 44px;
      border-radius: 14px;
      background: rgba(29, 78, 216, 0.12);
      color: var(--primary);
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: 700;
      font-family: "Space Grotesk", sans-serif;
    }

    .feature-card h3 {
      margin: 12px 0 6px;
      font-size: 16px;
    }

    .feature-card p {
      margin: 0;
      font-size: 13px;
      color: var(--muted);
      line-height: 1.6;
    }

    .testimonial-grid {
      margin-top: 22px;
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
      gap: 18px;
    }

    .testimonial-card {
      background: var(--surface);
      border-radius: 18px;
      padding: 18px;
      border: 1px solid var(--border);
      box-shadow: var(--shadow-soft);
    }

    .testimonial-head {
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .avatar {
      width: 38px;
      height: 38px;
      border-radius: 50%;
      background: linear-gradient(135deg, #38bdf8, #22c55e);
      color: #fff;
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: 700;
      font-size: 12px;
    }

    .stars {
      color: var(--accent);
      font-size: 12px;
      letter-spacing: 2px;
    }

    .testimonial-card p {
      margin: 12px 0 0;
      font-size: 13px;
      color: var(--muted);
      line-height: 1.6;
    }

    .footer {
      margin-top: 80px;
      padding-top: 28px;
      border-top: 1px solid var(--border);
      display: flex;
      justify-content: space-between;
      gap: 20px;
      flex-wrap: wrap;
      color: var(--muted);
      font-size: 13px;
    }

    .footer-col {
      min-width: 200px;
    }

    .footer-title {
      font-weight: 700;
      color: var(--ink);
      margin-bottom: 8px;
    }

    .footer-links {
      display: grid;
      gap: 6px;
    }

    .empty-state {
      padding: 16px;
      border-radius: 16px;
      border: 1px dashed var(--border);
      background: var(--surface);
      color: var(--muted);
    }

    .reveal {
      animation: fadeUp 0.7s ease both;
    }

    @keyframes fadeUp {
      from {
        opacity: 0;
        transform: translateY(18px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    @media (max-width: 1024px) {
      .hero {
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
      .hero h1 {
        font-size: 34px;
      }

      .search {
        flex-direction: column;
        align-items: stretch;
        border-radius: 20px;
        padding: 12px;
      }

      .search button {
        width: 100%;
      }

      .section-head {
        flex-direction: column;
        align-items: flex-start;
      }
    }

    @media (prefers-reduced-motion: reduce) {
      * {
        animation: none !important;
        transition: none !important;
      }
    }
  </style>
</head>

<body>
  @php
    $coverGradients = [
        'linear-gradient(135deg, #c7d2fe 0%, #bfdbfe 100%)',
        'linear-gradient(135deg, #a7f3d0 0%, #bbf7d0 100%)',
        'linear-gradient(135deg, #fde68a 0%, #fed7aa 100%)',
        'linear-gradient(135deg, #bfdbfe 0%, #dbeafe 100%)',
        'linear-gradient(135deg, #99f6e4 0%, #bae6fd 100%)',
        'linear-gradient(135deg, #fecdd3 0%, #fed7aa 100%)',
    ];

    $thumbnailFor = function ($koleksi) {
        if (!empty($koleksi->thumb_img)) {
            $thumb = $koleksi->thumb_img;
            return \Illuminate\Support\Str::startsWith($thumb, ['http://', 'https://']) ? $thumb : asset($thumb);
        }

        if ($koleksi->kategori === 'video' && !empty($koleksi->youtube_url)) {
            $url = $koleksi->youtube_url;
            parse_str(parse_url($url, PHP_URL_QUERY) ?? '', $query);
            $videoId = $query['v'] ?? null;

            if (!$videoId) {
                $host = parse_url($url, PHP_URL_HOST);
                $path = parse_url($url, PHP_URL_PATH);

                if ($host && \Illuminate\Support\Str::contains($host, 'youtu.be')) {
                    $videoId = ltrim($path ?? '', '/');
                } elseif ($path) {
                    $parts = array_values(array_filter(explode('/', $path)));
                    if (isset($parts[0], $parts[1]) && $parts[0] === 'embed') {
                        $videoId = $parts[1];
                    } elseif (isset($parts[0], $parts[1]) && $parts[0] === 'shorts') {
                        $videoId = $parts[1];
                    }
                }
            }

            return $videoId ? "https://img.youtube.com/vi/{$videoId}/hqdefault.jpg" : null;
        }

        return null;
    };
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
          <a href="{{ route('home') }}#beranda">Beranda</a>
          <a href="{{ route('kategori') }}">Kategori</a>
          <a href="{{ route('koleksi') }}">Koleksi</a>
          <a href="{{ route('rilis') }}">Rilis</a>
          <a href="{{ route('fitur') }}">Fitur</a>
          {{-- <a href="{{ route('testimoni') }}">Testimoni</a> --}}
          <a href="{{ route('bantuan') }}">Bantuan</a>
        </nav>
        <div class="nav-actions">
          <a class="btn ghost" href="{{ route('kategori') }}">Lihat Kategori</a>
          <a class="btn primary" href="{{ route('koleksi') }}">Jelajahi Koleksi</a>
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
        <a href="{{ route('home') }}#beranda">Beranda</a>
        <a href="{{ route('kategori') }}">Kategori</a>
        <a href="{{ route('koleksi') }}">Koleksi</a>
        <a href="{{ route('rilis') }}">Rilis Terbaru</a>
        <a href="{{ route('fitur') }}">Fitur</a>
        {{-- <a href="{{ route('testimoni') }}">Testimoni</a> --}}
        <a href="{{ route('bantuan') }}">Bantuan</a>
      </nav>
      <div class="mobile-menu-actions">
        <a class="btn ghost" href="{{ route('kategori') }}">Lihat Kategori</a>
        <a class="btn primary" href="{{ route('koleksi') }}">Jelajahi Koleksi</a>
      </div>
    </div>
  </div>

  <main class="page">
    <section class="hero" id="beranda">
      <div class="hero-copy reveal">
        <span class="eyebrow">Perpustakaan Digital Smart School</span>
        <h1>Temukan dan Baca Sumber Belajar Favoritmu.</h1>
        <p>
          Akses koleksi ebook dan video pembelajaran untuk seluruh siswa di Sulawesi Selatan.
          Materi diperbarui dari database resmi sekolah dan dinas pendidikan.
        </p>
        <form class="search" action="{{ route('koleksi') }}" method="GET">
          <input type="text" name="q" value="{{ $searchQuery }}"
            placeholder="Cari judul, topik, atau mata pelajaran..." aria-label="Cari materi">
          @if ($topikFilter)
            <input type="hidden" name="topik" value="{{ $topikFilter }}">
          @endif
          <button type="submit">Cari</button>
        </form>
        <div class="hero-actions">
          <a class="btn primary" href="{{ route('koleksi') }}">Jelajahi Koleksi</a>
          <a class="btn ghost" href="{{ route('kategori') }}">Lihat Kategori</a>
        </div>
        <div class="hero-tags">
          <div class="hero-tag">
            <span class="dot"></span>
            Materi resmi dan terkurasi
          </div>
          <div class="hero-tag">
            <span class="dot"></span>
            Akses cepat di seluruh sekolah
          </div>
          <div class="hero-tag">
            <span class="dot"></span>
            Pembaruan rutin tiap semester
          </div>
        </div>
      </div>

      <div class="hero-card reveal" style="animation-delay: 0.1s;">
        {{-- <div class="hero-card-header">
          <div class="hero-icon">BK</div>
          <span class="hero-card-badge">Ringkasan</span>
        </div> --}}
        <div class="hero-stat">
          <div class="hero-stat-value">{{ number_format($stats['sumber_belajar']) }}+</div>
          <div class="hero-stat-label">Sumber belajar tersedia</div>
        </div>
        <div class="hero-card-visual">
          <div class="hero-illustration" aria-hidden="true">
            <svg viewBox="0 0 320 200" role="presentation">
              <defs>
                <linearGradient id="bookCover" x1="0" y1="0" x2="1" y2="1">
                  <stop offset="0%" stop-color="#2563eb" />
                  <stop offset="100%" stop-color="#38bdf8" />
                </linearGradient>
                <linearGradient id="pageFill" x1="0" y1="0" x2="0" y2="1">
                  <stop offset="0%" stop-color="#ffffff" />
                  <stop offset="100%" stop-color="#e2e8f0" />
                </linearGradient>
              </defs>
              <rect x="28" y="22" width="264" height="156" rx="22" fill="#e0f2fe" />
              <rect x="52" y="40" width="120" height="120" rx="16" fill="url(#bookCover)" />
              <rect x="64" y="54" width="96" height="18" rx="9" fill="rgba(255,255,255,0.7)" />
              <rect x="64" y="80" width="72" height="12" rx="6" fill="rgba(255,255,255,0.6)" />
              <rect x="176" y="52" width="96" height="108" rx="16" fill="url(#pageFill)" />
              <rect x="190" y="72" width="68" height="10" rx="5" fill="#cbd5f5" />
              <rect x="190" y="92" width="54" height="10" rx="5" fill="#c7d2fe" />
              <rect x="190" y="112" width="62" height="10" rx="5" fill="#cbd5f5" />
              <circle cx="84" cy="158" r="10" fill="#facc15" />
              <circle cx="230" cy="154" r="12" fill="#22c55e" opacity="0.6" />
            </svg>
          </div>
        </div>
        <div class="hero-card-divider"></div>
        <div class="metric-grid">
          <div class="metric-item ebook">
            <div class="metric-left">
              <span class="metric-dot" aria-hidden="true"></span>
              <div class="metric-label">Ebook</div>
            </div>
            <div class="metric-value">{{ number_format($stats['ebook']) }}</div>
          </div>
          <div class="metric-item video">
            <div class="metric-left">
              <span class="metric-dot" aria-hidden="true"></span>
              <div class="metric-label">Video</div>
            </div>
            <div class="metric-value">{{ number_format($stats['video']) }}</div>
          </div>
          <div class="metric-item topik">
            <div class="metric-left">
              <span class="metric-dot" aria-hidden="true"></span>
              <div class="metric-label">Topik</div>
            </div>
            <div class="metric-value">{{ number_format($stats['topik']) }}</div>
          </div>
          <div class="metric-item mapel">
            <div class="metric-left">
              <span class="metric-dot" aria-hidden="true"></span>
              <div class="metric-label">Mapel</div>
            </div>
            <div class="metric-value">{{ number_format($stats['mata_pelajaran']) }}</div>
          </div>
        </div>
      </div>
    </section>

    <section class="section" id="kategori">
      <div class="section-head">
        <div>
          <h2>Kategori Populer</h2>
          <p>Pilih topik belajar yang paling sering diakses oleh siswa di Sulawesi Selatan.</p>
        </div>
      </div>
      <div class="chip-group">
        <a class="chip {{ $topikFilter ? '' : 'active' }}"
          href="{{ route('landing', array_filter(['q' => $searchQuery])) }}#hasil">Semua</a>
        @forelse ($topikPopuler as $topik)
          <a class="chip {{ (string) $topikFilter === (string) $topik->id ? 'active' : '' }}"
            href="{{ route('landing', array_filter(['topik' => $topik->id, 'q' => $searchQuery])) }}#hasil">{{ $topik->topik }}</a>
        @empty
          <div class="empty-state">Kategori belum tersedia.</div>
        @endforelse
      </div>
    </section>

    @if ($isFiltering)
      <section class="section" id="hasil">
        <div class="section-head">
          <div>
            <h2>Hasil Pencarian</h2>
            <p>
              @if ($searchQuery && $topikAktif)
                Menampilkan hasil untuk "{{ $searchQuery }}" pada topik {{ $topikAktif->topik }}.
              @elseif ($searchQuery)
                Menampilkan hasil untuk "{{ $searchQuery }}".
              @elseif ($topikAktif)
                Menampilkan koleksi untuk topik {{ $topikAktif->topik }}.
              @else
                Menampilkan hasil sesuai filter yang dipilih.
              @endif
            </p>
          </div>
        </div>
        <div class="collection-grid">
          @forelse ($hasilPencarian as $koleksi)
            <article class="collection-card reveal" style="animation-delay: {{ $loop->index * 0.05 }}s;">
              @php
                $thumb = $thumbnailFor($koleksi);
              @endphp
              <div class="cover" style="--cover: {{ $coverGradients[$loop->index % count($coverGradients)] }};">
                @if ($thumb)
                  <img src="{{ $thumb }}" alt="Thumbnail {{ $koleksi->judul }}" loading="lazy">
                @endif
              </div>
              <div class="collection-body">
                <h3>{{ $koleksi->judul }}</h3>
                <p>{{ \Illuminate\Support\Str::limit(strip_tags($koleksi->deskripsi), 120) }}</p>
              </div>
              <div class="collection-meta">
                <span>{{ $koleksi->mataPelajaran?->mata_pelajaran ?? 'Mata pelajaran umum' }}</span>
                <span>{{ $koleksi->topik?->topik ?? 'Topik umum' }}</span>
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
            <div class="empty-state">Belum ada materi yang cocok dengan filter ini.</div>
          @endforelse
        </div>
      </section>
    @endif

    <section class="section" id="koleksi">
      <div class="section-head">
        <div>
          <h2>Koleksi Pilihan</h2>
          <p>Rekomendasi sumber belajar terpilih yang siap digunakan untuk pembelajaran harian.</p>
        </div>
      </div>
      <div class="collection-grid">
        @forelse ($koleksiKurasi as $koleksi)
          <article class="collection-card reveal" style="animation-delay: {{ $loop->index * 0.06 }}s;">
            @php
              $thumb = $thumbnailFor($koleksi);
            @endphp
            <div class="cover" style="--cover: {{ $coverGradients[$loop->index % count($coverGradients)] }};">
              @if ($thumb)
                <img src="{{ $thumb }}" alt="Thumbnail {{ $koleksi->judul }}" loading="lazy">
              @endif
            </div>
            <div class="collection-body">
              <h3>{{ $koleksi->judul }}</h3>
              <p>{{ \Illuminate\Support\Str::limit(strip_tags($koleksi->deskripsi), 120) }}</p>
            </div>
            <div class="collection-meta">
              <span>{{ $koleksi->mataPelajaran?->mata_pelajaran ?? 'Mata pelajaran umum' }}</span>
              <span>{{ $koleksi->topik?->topik ?? 'Topik umum' }}</span>
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
          <div class="empty-state">Belum ada koleksi pilihan.</div>
        @endforelse
      </div>
    </section>

    <section class="section" id="rilis">
      <div class="section-head">
        <div>
          <h2>Baru Rilis</h2>
          <p>Tambahan terbaru dari perpustakaan digital yang siap dipelajari.</p>
        </div>
        <div class="section-actions">
          <div class="circle-btn">&#8592;</div>
          <div class="circle-btn">&#8594;</div>
        </div>
      </div>
      <div class="release-grid">
        @forelse ($koleksiBaru as $koleksi)
          <article class="release-card reveal" style="animation-delay: {{ $loop->index * 0.08 }}s;">
            @php
              $thumb = $thumbnailFor($koleksi);
            @endphp
            <div class="release-cover"
              style="--cover: {{ $coverGradients[$loop->index % count($coverGradients)] }};">
              @if ($thumb)
                <img src="{{ $thumb }}" alt="Thumbnail {{ $koleksi->judul }}" loading="lazy">
              @endif
            </div>
            <h3>{{ $koleksi->judul }}</h3>
            <p>{{ $koleksi->mataPelajaran?->mata_pelajaran ?? 'Mata pelajaran umum' }} -
              {{ strtoupper($koleksi->kategori) }}</p>
            <div class="collection-action">
              <a class="btn ghost mini" href="{{ route('koleksi.show', $koleksi) }}">Detail Materi</a>
            </div>
          </article>
        @empty
          <div class="empty-state">Belum ada rilis terbaru.</div>
        @endforelse
      </div>
    </section>

    <section class="section" id="fitur">
      <div class="section-head">
        <div>
          <h2>Kenapa E-Library Smart School?</h2>
          <p>Platform ini dirancang untuk membantu siswa belajar lebih cepat dengan konten resmi.</p>
        </div>
      </div>
      <div class="feature-grid">
        <div class="feature-card reveal">
          <div class="feature-icon">KL</div>
          <h3>Koleksi Lengkap</h3>
          <p>Materi ebook dan video dari berbagai sekolah dalam satu pusat belajar.</p>
        </div>
        <div class="feature-card reveal" style="animation-delay: 0.05s;">
          <div class="feature-icon">AC</div>
          <h3>Akses Cepat</h3>
          <p>Dirancang ringan agar mudah diakses dari perangkat siswa di seluruh provinsi.</p>
        </div>
        <div class="feature-card reveal" style="animation-delay: 0.1s;">
          <div class="feature-icon">UP</div>
          <h3>Update Berkala</h3>
          <p>Konten diperbarui sesuai kurikulum dan kebutuhan sekolah setiap semester.</p>
        </div>
      </div>
    </section>

    {{-- <section class="section" id="testimoni">
      <div class="section-head">
        <div>
          <h2>Kata Mereka</h2>
          <p>Cerita singkat dari siswa dan guru yang memanfaatkan e-library.</p>
        </div>
      </div>
      <div class="testimonial-grid">
        <div class="testimonial-card reveal">
          <div class="testimonial-head">
            <div class="avatar">SP</div>
            <div>
              <div><strong>Sari Putri</strong></div>
              <div class="stars">*****</div>
            </div>
          </div>
          <p>Koleksi topiknya lengkap, jadi saya lebih mudah mencari materi untuk tugas.</p>
        </div>
        <div class="testimonial-card reveal" style="animation-delay: 0.05s;">
          <div class="testimonial-head">
            <div class="avatar">AR</div>
            <div>
              <div><strong>Ahmad Ridwan</strong></div>
              <div class="stars">*****</div>
            </div>
          </div>
          <p>Video pembelajarannya sangat membantu, apalagi untuk persiapan ujian.</p>
        </div>
        <div class="testimonial-card reveal" style="animation-delay: 0.1s;">
          <div class="testimonial-head">
            <div class="avatar">DK</div>
            <div>
              <div><strong>Diana Kusuma</strong></div>
              <div class="stars">*****</div>
            </div>
          </div>
          <p>Platform ini terasa resmi dan rapi, jadi nyaman dipakai di sekolah.</p>
        </div>
      </div>
    </section> --}}

    <footer class="footer" id="bantuan">
      <div class="footer-col">
        <div class="footer-title">E-Library Smart School</div>
        <div>Perpustakaan digital resmi untuk seluruh siswa di Sulawesi Selatan.</div>
        <div style="margin-top: 12px; font-size: 12px; color: var(--muted);">
          &copy; {{ date('Y') }} Dinas Pendidikan Provinsi Sulawesi Selatan. All rights reserved.
        </div>
      </div>
      <div class="footer-col">
        <div class="footer-title">Bantuan</div>
        <div class="footer-links">
          <span>Kontak Dinas Pendidikan</span>
          <span>Panduan Penggunaan</span>
          <span>FAQ</span>
        </div>
      </div>
      <div class="footer-col">
        <div class="footer-title">Layanan</div>
        <div class="footer-links">
          <span>Topik Pembelajaran</span>
          <span>Koleksi Terbaru</span>
          <span>Materi Pilihan</span>
        </div>
      </div>
    </footer>
  </main>

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
