<div class="menu-item">
  <a class="menu-link {{ $path[0] == 'dashboard' ? 'active' : '' }}" href="{{ url('/dashboard') }}">
    <span class="menu-icon">
      <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
      <span class="svg-icon svg-icon-2">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
          <rect x="2" y="2" width="9" height="9" rx="2" fill="black"></rect>
          <rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="black"></rect>
          <rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="black"></rect>
          <rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="black"></rect>
        </svg>
      </span>
      <!--end::Svg Icon-->
    </span>
    <span class="menu-title">Dashboard</span>
  </a>

  <div data-kt-menu-trigger="click"
    class="menu-item menu-accordion {{ in_array($path[0], ['kompetensi-dasar', 'jurnal']) ? 'hover show' : '' }}">
    <span class="menu-link">
      <span class="menu-icon">
        <!--begin::Svg Icon | path: icons/duotune/graphs/gra006.svg-->
        <span class="svg-icon svg-icon-2">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
            <path
              d="M13 5.91517C15.8 6.41517 18 8.81519 18 11.8152C18 12.5152 17.9 13.2152 17.6 13.9152L20.1 15.3152C20.6 15.6152 21.4 15.4152 21.6 14.8152C21.9 13.9152 22.1 12.9152 22.1 11.8152C22.1 7.01519 18.8 3.11521 14.3 2.01521C13.7 1.91521 13.1 2.31521 13.1 3.01521V5.91517H13Z"
              fill="black"></path>
            <path opacity="0.3"
              d="M19.1 17.0152C19.7 17.3152 19.8 18.1152 19.3 18.5152C17.5 20.5152 14.9 21.7152 12 21.7152C9.1 21.7152 6.50001 20.5152 4.70001 18.5152C4.30001 18.0152 4.39999 17.3152 4.89999 17.0152L7.39999 15.6152C8.49999 16.9152 10.2 17.8152 12 17.8152C13.8 17.8152 15.5 17.0152 16.6 15.6152L19.1 17.0152ZM6.39999 13.9151C6.19999 13.2151 6 12.5152 6 11.8152C6 8.81517 8.2 6.41515 11 5.91515V3.01519C11 2.41519 10.4 1.91519 9.79999 2.01519C5.29999 3.01519 2 7.01517 2 11.8152C2 12.8152 2.2 13.8152 2.5 14.8152C2.7 15.4152 3.4 15.7152 4 15.3152L6.39999 13.9151Z"
              fill="black"></path>
          </svg>
        </span>
        <!--end::Svg Icon-->
      </span>
      <span class="menu-title">E-Absensi</span>
      <span class="menu-arrow"></span>
    </span>
    <div class="menu-sub menu-sub-accordion menu-active-bg">
      <div class="menu-item">

        <a class="menu-link {{ $path[0] == 'kompetensi-dasar' ? 'active' : '' }}"
          href="{{ route('kompetensi_dasar.index') }}">
          <span class="menu-bullet">
            <span class="bullet bullet-dot"></span>
          </span>
          <span class="menu-title">Kompetensi Dasar</span>
        </a>

        <a class="menu-link {{ $path[0] == 'jurnal' ? 'active' : '' }}" href="{{ route('jurnal.index') }}">
          <span class="menu-bullet">
            <span class="bullet bullet-dot"></span>
          </span>
          <span class="menu-title">Jurnal</span>
        </a>

      </div>

    </div>
  </div>


  <div data-kt-menu-trigger="click"
    class="menu-item menu-accordion {{ in_array($path[0], $topics->pluck('topik')->toArray()) ? 'hover show' : '' }}">
    <span class="menu-link">
      <span class="menu-icon">
        <!--begin::Svg Icon | path: icons/duotune/abstract/abs042.svg-->
        <span class="svg-icon svg-icon-2">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
            <path
              d="M18 21.6C16.6 20.4 9.1 20.3 6.3 21.2C5.7 21.4 5.1 21.2 4.7 20.8L2 18C4.2 15.8 10.8 15.1 15.8 15.8C16.2 18.3 17 20.5 18 21.6ZM18.8 2.8C18.4 2.4 17.8 2.20001 17.2 2.40001C14.4 3.30001 6.9 3.2 5.5 2C6.8 3.3 7.4 5.5 7.7 7.7C9 7.9 10.3 8 11.7 8C15.8 8 19.8 7.2 21.5 5.5L18.8 2.8Z"
              fill="black" />
            <path opacity="0.3"
              d="M21.2 17.3C21.4 17.9 21.2 18.5 20.8 18.9L18 21.6C15.8 19.4 15.1 12.8 15.8 7.8C18.3 7.4 20.4 6.70001 21.5 5.60001C20.4 7.00001 20.2 14.5 21.2 17.3ZM8 11.7C8 9 7.7 4.2 5.5 2L2.8 4.8C2.4 5.2 2.2 5.80001 2.4 6.40001C2.7 7.40001 3.00001 9.2 3.10001 11.7C3.10001 15.5 2.40001 17.6 2.10001 18C3.20001 16.9 5.3 16.2 7.8 15.8C8 14.2 8 12.7 8 11.7Z"
              fill="black" />
          </svg>
        </span>
        <!--end::Svg Icon-->
      </span>
      <span class="menu-title">E-Library</span>
      <span class="menu-arrow"></span>
    </span>
    <div class="menu-sub menu-sub-accordion menu-active-bg">
      <div class="menu-item">
        @foreach ($topics as $topic)
          <a class="menu-link {{ $path[0] == $topic->topik ? 'active' : '' }}"
            href="{{ route('library.library', $topic->id) }}">
            <span class="menu-bullet">
              <span class="bullet bullet-dot"></span>
            </span>
            <span class="menu-title">{{ $topic->topik }}</span>
          </a>
        @endforeach
      </div>
    </div>
  </div>


  <div data-kt-menu-trigger="click"
    class="menu-item menu-accordion hover {{ $path[0] == 'capaian-kompetensi' || $path[0] == 'penilaian-sikap' ? 'hover show' : '' }}">
    <span class="menu-link">
      <span class="menu-icon">
        <!--begin::Svg Icon | path: icons/duotune/graphs/gra006.svg-->
        <span class="svg-icon svg-icon-2">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
            <path
              d="M13 5.91517C15.8 6.41517 18 8.81519 18 11.8152C18 12.5152 17.9 13.2152 17.6 13.9152L20.1 15.3152C20.6 15.6152 21.4 15.4152 21.6 14.8152C21.9 13.9152 22.1 12.9152 22.1 11.8152C22.1 7.01519 18.8 3.11521 14.3 2.01521C13.7 1.91521 13.1 2.31521 13.1 3.01521V5.91517H13Z"
              fill="black"></path>
            <path opacity="0.3"
              d="M19.1 17.0152C19.7 17.3152 19.8 18.1152 19.3 18.5152C17.5 20.5152 14.9 21.7152 12 21.7152C9.1 21.7152 6.50001 20.5152 4.70001 18.5152C4.30001 18.0152 4.39999 17.3152 4.89999 17.0152L7.39999 15.6152C8.49999 16.9152 10.2 17.8152 12 17.8152C13.8 17.8152 15.5 17.0152 16.6 15.6152L19.1 17.0152ZM6.39999 13.9151C6.19999 13.2151 6 12.5152 6 11.8152C6 8.81517 8.2 6.41515 11 5.91515V3.01519C11 2.41519 10.4 1.91519 9.79999 2.01519C5.29999 3.01519 2 7.01517 2 11.8152C2 12.8152 2.2 13.8152 2.5 14.8152C2.7 15.4152 3.4 15.7152 4 15.3152L6.39999 13.9151Z"
              fill="black"></path>
          </svg>
        </span>
        <!--end::Svg Icon-->
      </span>
      <span class="menu-title">E-Rapor</span>
      <span class="menu-arrow"></span>
    </span>
    <div class="menu-sub menu-sub-accordion menu-active-bg">
      <div class="menu-item">

        <a class="menu-link {{ $path[0] == 'capaian-kompetensi' ? 'active' : '' }}"
          href="{{ route('capaian_kompetensi.index') }}">
          <span class="menu-bullet">
            <span class="bullet bullet-dot"></span>
          </span>
          <span class="menu-title">Capaian Kompetensi</span>
        </a>

        <a class="menu-link {{ $path[0] == 'penilaian-sikap' ? 'active' : '' }}"
          href="{{ route('penilaian_sikap.index') }}">
          <span class="menu-bullet">
            <span class="bullet bullet-dot"></span>
          </span>
          <span class="menu-title">Penilaian Sikap</span>
        </a>

        <a class="menu-link {{ $path[0] == 'jurnal' ? 'active' : '' }}" href="{{ route('jurnal.index') }}">
          <span class="menu-bullet">
            <span class="bullet bullet-dot"></span>
          </span>
          <span class="menu-title">Penilaian Angka</span>
        </a>

      </div>

    </div>
  </div>

</div>
