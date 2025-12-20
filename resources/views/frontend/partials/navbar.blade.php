<div class="nav-wrapper">
  <div class="nav-container">
    <header class="nav">
      <a href="{{ route('home') }}" class="brand">
        <div class="brand-mark">EL</div>
        <div>
          <span class="brand-title">E-Library Smart School</span>
          <span class="brand-sub">Dinas Pendidikan Provinsi Sulawesi Selatan</span>
        </div>
      </a>
      <nav class="nav-links">
        <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Beranda</a>
        <a href="{{ route('kategori') }}" class="{{ request()->routeIs('kategori*') ? 'active' : '' }}">Kategori</a>
        <a href="{{ route('koleksi') }}" class="{{ request()->routeIs('koleksi*') ? 'active' : '' }}">Koleksi</a>
        <a href="{{ route('rilis') }}" class="{{ request()->routeIs('rilis') ? 'active' : '' }}">Rilis</a>
        <a href="{{ route('fitur') }}" class="{{ request()->routeIs('fitur') ? 'active' : '' }}">Fitur</a>
        {{-- <a href="{{ route('testimoni') }}" class="{{ request()->routeIs('testimoni') ? 'active' : '' }}">Testimoni</a> --}}
        <a href="{{ route('bantuan') }}" class="{{ request()->routeIs('bantuan') ? 'active' : '' }}">Bantuan</a>
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

<style>
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
    gap: 8px;
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

  .nav-links a:hover,
  .nav-links a.active {
    background: var(--surface);
    color: var(--ink);
  }

  .nav-links a.active {
    background: var(--primary);
    color: #fff;
  }

  .nav-actions {
    display: flex;
    gap: 10px;
  }

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

  @media (max-width: 900px) {

    .nav-links,
    .nav-actions {
      display: none;
    }

    .hamburger {
      display: flex;
    }
  }
</style>
