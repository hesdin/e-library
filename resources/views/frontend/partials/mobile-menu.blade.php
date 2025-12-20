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
      <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Beranda</a>
      <a href="{{ route('kategori') }}" class="{{ request()->routeIs('kategori*') ? 'active' : '' }}">Kategori</a>
      <a href="{{ route('koleksi') }}" class="{{ request()->routeIs('koleksi*') ? 'active' : '' }}">Koleksi</a>
      <a href="{{ route('rilis') }}" class="{{ request()->routeIs('rilis') ? 'active' : '' }}">Rilis Terbaru</a>
      <a href="{{ route('fitur') }}" class="{{ request()->routeIs('fitur') ? 'active' : '' }}">Fitur</a>
      <a href="{{ route('testimoni') }}" class="{{ request()->routeIs('testimoni') ? 'active' : '' }}">Testimoni</a>
      <a href="{{ route('bantuan') }}" class="{{ request()->routeIs('bantuan') ? 'active' : '' }}">Bantuan</a>
    </nav>
    <div class="mobile-menu-actions">
      <a class="btn ghost" href="{{ route('kategori') }}">Lihat Kategori</a>
      <a class="btn primary" href="{{ route('koleksi') }}">Jelajahi Koleksi</a>
    </div>
  </div>
</div>

<style>
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

  .mobile-menu-links a:hover,
  .mobile-menu-links a.active {
    background: var(--surface-soft);
  }

  .mobile-menu-links a.active {
    background: var(--primary);
    color: #fff;
  }

  .mobile-menu-actions {
    margin-top: auto;
    display: flex;
    flex-direction: column;
    gap: 10px;
  }

  @media (max-width: 900px) {
    .mobile-menu {
      display: block;
    }
  }
</style>
