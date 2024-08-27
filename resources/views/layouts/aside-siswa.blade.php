@php
    $path = explode('/', request()->path());
@endphp
<div class="aside-menu flex-column-fluid">
    <!--begin::Aside Menu-->
    <div class="hover-scroll-overlay-y px-2 my-5 my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="{default: '#kt_aside_toolbar, #kt_aside_footer', lg: '#kt_header, #kt_aside_toolbar, #kt_aside_footer'}" data-kt-scroll-wrappers="#kt_aside_menu" data-kt-scroll-offset="5px">
        <!--begin::Menu-->
        <div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500" id="#kt_aside_menu" data-kt-menu="true">


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





                <div
                  data-kt-menu-trigger="click"
                  class="menu-item menu-accordion {{ $path[0] == 'topik' ? 'hover show' : '' }}"
                    >
                  <span class="menu-link">
                    <span class="menu-icon">
                      <!--begin::Svg Icon | path: icons/duotune/abstract/abs042.svg-->
                      <span class="svg-icon svg-icon-2">
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          width="24"
                          height="24"
                          viewBox="0 0 24 24"
                          fill="none"
                        >
                          <path
                            d="M18 21.6C16.6 20.4 9.1 20.3 6.3 21.2C5.7 21.4 5.1 21.2 4.7 20.8L2 18C4.2 15.8 10.8 15.1 15.8 15.8C16.2 18.3 17 20.5 18 21.6ZM18.8 2.8C18.4 2.4 17.8 2.20001 17.2 2.40001C14.4 3.30001 6.9 3.2 5.5 2C6.8 3.3 7.4 5.5 7.7 7.7C9 7.9 10.3 8 11.7 8C15.8 8 19.8 7.2 21.5 5.5L18.8 2.8Z"
                            fill="black"
                          />
                          <path
                            opacity="0.3"
                            d="M21.2 17.3C21.4 17.9 21.2 18.5 20.8 18.9L18 21.6C15.8 19.4 15.1 12.8 15.8 7.8C18.3 7.4 20.4 6.70001 21.5 5.60001C20.4 7.00001 20.2 14.5 21.2 17.3ZM8 11.7C8 9 7.7 4.2 5.5 2L2.8 4.8C2.4 5.2 2.2 5.80001 2.4 6.40001C2.7 7.40001 3.00001 9.2 3.10001 11.7C3.10001 15.5 2.40001 17.6 2.10001 18C3.20001 16.9 5.3 16.2 7.8 15.8C8 14.2 8 12.7 8 11.7Z"
                            fill="black"
                          />
                        </svg>
                      </span>
                      <!--end::Svg Icon-->
                    </span>
                    <span class="menu-title">E-Library </span>
                    <span class="menu-arrow"></span>
                  </span>
                  <div class="menu-sub menu-sub-accordion menu-active-bg">
                    <div class="menu-item">

                        @foreach ($topics as $topic)
                            <a
                                class="menu-link {{ $path[0] == "{ $topic->topik }" ? 'active' : '' }}"
                                href="{{ route('siswa.library.index', $topic->id) }}">
                                <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">{{ $topic->topik }}</span>
                            </a>
                        @endforeach


                    </div>

                  </div>
                </div>


            </div>


        </div>
        <!--end::Menu-->
    </div>
    <!--end::Aside Menu-->
</div>
