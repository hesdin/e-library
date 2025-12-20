<footer class="footer">
  <div class="footer-inner">
    <div class="footer-col">
      <div class="footer-brand">
        <div class="brand-mark">EL</div>
        <div>
          <div class="footer-title">E-Library Smart School</div>
          <div class="footer-sub">Perpustakaan digital resmi untuk siswa di Sulawesi Selatan.</div>
        </div>
      </div>
      <div class="footer-copyright">
        &copy; {{ date('Y') }} Dinas Pendidikan Provinsi Sulawesi Selatan. All rights reserved.
      </div>
    </div>
    <div class="footer-col">
      <div class="footer-heading">Navigasi</div>
      <div class="footer-links">
        <a href="{{ route('home') }}">Beranda</a>
        <a href="{{ route('kategori') }}">Kategori</a>
        <a href="{{ route('koleksi') }}">Koleksi</a>
        <a href="{{ route('rilis') }}">Rilis Terbaru</a>
      </div>
    </div>
    <div class="footer-col">
      <div class="footer-heading">Informasi</div>
      <div class="footer-links">
        <a href="{{ route('fitur') }}">Fitur</a>
        {{-- <a href="{{ route('testimoni') }}">Testimoni</a> --}}
        <a href="{{ route('bantuan') }}">Bantuan & FAQ</a>
      </div>
    </div>
    <div class="footer-col">
      <div class="footer-heading">Kontak</div>
      <div class="footer-links">
        <span>Jl. Perintis Kemerdekaan KM.10</span>
        <span>Makassar, Sulawesi Selatan</span>
        <span>info@disdik-Smart School.go.id</span>
      </div>
    </div>
  </div>
</footer>

<style>
  .footer {
    background: var(--ink);
    color: rgba(255, 255, 255, 0.8);
    margin-top: 80px;
    padding: 48px 24px 32px;
  }

  .footer-inner {
    max-width: 1200px;
    margin: 0 auto;
    display: grid;
    grid-template-columns: 1.5fr repeat(3, 1fr);
    gap: 40px;
  }

  .footer-brand {
    display: flex;
    align-items: flex-start;
    gap: 12px;
  }

  .footer-brand .brand-mark {
    width: 44px;
    height: 44px;
    border-radius: 14px;
    background: linear-gradient(135deg, var(--primary), #38bdf8);
    color: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
    font-family: "Space Grotesk", sans-serif;
  }

  .footer-title {
    font-family: "Space Grotesk", sans-serif;
    font-size: 18px;
    font-weight: 700;
    color: #fff;
  }

  .footer-sub {
    font-size: 13px;
    margin-top: 4px;
    line-height: 1.5;
  }

  .footer-copyright {
    margin-top: 20px;
    font-size: 12px;
    color: rgba(255, 255, 255, 0.5);
  }

  .footer-heading {
    font-weight: 700;
    color: #fff;
    margin-bottom: 16px;
    font-size: 14px;
  }

  .footer-links {
    display: flex;
    flex-direction: column;
    gap: 10px;
    font-size: 14px;
  }

  .footer-links a {
    color: rgba(255, 255, 255, 0.7);
    transition: color 0.2s ease;
  }

  .footer-links a:hover {
    color: #fff;
  }

  @media (max-width: 900px) {
    .footer-inner {
      grid-template-columns: 1fr 1fr;
    }
  }

  @media (max-width: 600px) {
    .footer-inner {
      grid-template-columns: 1fr;
    }
  }
</style>
