@extends('frontend.layouts.app')

@section('title', 'Testimoni - E-Library Sulawesi Selatan')

@section('content')
  <main class="page">
    <div class="breadcrumb">
      <a href="{{ route('home') }}">Beranda</a> / Testimoni
    </div>

    <div class="page-header" style="text-align: center; max-width: 700px; margin: 0 auto 48px;">
      <h1>Kata Mereka</h1>
      <p>Cerita dari siswa dan guru yang memanfaatkan E-Library Smart School dalam pembelajaran.</p>
    </div>

    <div class="testimonial-grid">
      <div class="testimonial-card card">
        <div class="testimonial-head">
          <div class="avatar" style="background: linear-gradient(135deg, #3b82f6, #60a5fa);">SP</div>
          <div>
            <div class="testimonial-name">Sari Putri</div>
            <div class="testimonial-role">Siswa Kelas XI, SMAN 1 Makassar</div>
          </div>
        </div>
        <div class="stars">★★★★★</div>
        <p>"Koleksi topiknya lengkap, jadi saya lebih mudah mencari materi untuk tugas. Sangat membantu!"</p>
      </div>

      <div class="testimonial-card card">
        <div class="testimonial-head">
          <div class="avatar" style="background: linear-gradient(135deg, #22c55e, #34d399);">AR</div>
          <div>
            <div class="testimonial-name">Ahmad Ridwan</div>
            <div class="testimonial-role">Siswa Kelas XII, SMAN 5 Makassar</div>
          </div>
        </div>
        <div class="stars">★★★★★</div>
        <p>"Video pembelajarannya sangat membantu, apalagi untuk persiapan ujian. Kualitasnya bagus!"</p>
      </div>

      <div class="testimonial-card card">
        <div class="testimonial-head">
          <div class="avatar" style="background: linear-gradient(135deg, #f59e0b, #fbbf24);">DK</div>
          <div>
            <div class="testimonial-name">Diana Kusuma</div>
            <div class="testimonial-role">Siswa Kelas X, SMAN 3 Makassar</div>
          </div>
        </div>
        <div class="stars">★★★★★</div>
        <p>"Platform ini terasa resmi dan rapi, jadi nyaman dipakai di sekolah maupun di rumah."</p>
      </div>

      <div class="testimonial-card card">
        <div class="testimonial-head">
          <div class="avatar" style="background: linear-gradient(135deg, #8b5cf6, #a78bfa);">BH</div>
          <div>
            <div class="testimonial-name">Budi Hartono, S.Pd</div>
            <div class="testimonial-role">Guru Matematika, SMAN 2 Makassar</div>
          </div>
        </div>
        <div class="stars">★★★★★</div>
        <p>"E-Library memudahkan saya dalam menyediakan referensi tambahan untuk siswa. Sangat praktis!"</p>
      </div>

      <div class="testimonial-card card">
        <div class="testimonial-head">
          <div class="avatar" style="background: linear-gradient(135deg, #ec4899, #f472b6);">NF</div>
          <div>
            <div class="testimonial-name">Nurul Fadhilah</div>
            <div class="testimonial-role">Siswa Kelas XI, SMAN 7 Makassar</div>
          </div>
        </div>
        <div class="stars">★★★★★</div>
        <p>"Bisa belajar kapan saja dan di mana saja. Materinya juga sesuai dengan kurikulum yang diajarkan."</p>
      </div>

      <div class="testimonial-card card">
        <div class="testimonial-head">
          <div class="avatar" style="background: linear-gradient(135deg, #06b6d4, #22d3ee);">RS</div>
          <div>
            <div class="testimonial-name">Rahmat Syahputra</div>
            <div class="testimonial-role">Siswa Kelas XII, SMAN 4 Makassar</div>
          </div>
        </div>
        <div class="stars">★★★★★</div>
        <p>"Pencariannya mudah dan cepat. Tidak perlu pusing lagi cari materi pembelajaran yang berkualitas."</p>
      </div>
    </div>
  </main>
@endsection

@section('styles')
  <style>
    .testimonial-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
      gap: 24px;
    }

    .testimonial-card {
      padding: 24px;
    }

    .testimonial-head {
      display: flex;
      align-items: center;
      gap: 14px;
      margin-bottom: 12px;
    }

    .avatar {
      width: 48px;
      height: 48px;
      border-radius: 50%;
      color: #fff;
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: 700;
      font-size: 14px;
    }

    .testimonial-name {
      font-weight: 700;
      font-size: 15px;
    }

    .testimonial-role {
      font-size: 12px;
      color: var(--muted);
    }

    .stars {
      color: var(--accent);
      font-size: 14px;
      letter-spacing: 2px;
      margin-bottom: 12px;
    }

    .testimonial-card p {
      margin: 0;
      color: var(--muted);
      line-height: 1.6;
      font-style: italic;
    }
  </style>
@endsection
