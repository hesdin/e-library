@extends('layouts.app')

@section('content')
  <div id="kt_content" class="content d-flex flex-column flex-column-fluid">
    <div id="kt_post" class="post d-flex flex-column-fluid">
      <div id="kt_content_container" class="container-xxl">
        <div class="card mb-6">
          <div class="card-body pt-9 pb-0 pb-6">
            <!--begin::Details-->
            <div class="d-flex flex-wrap flex-sm-nowrap">
              <!--begin: Pic-->
              <div class="me-7 mb-4">
                <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
                  <img src="{{ asset('assets/media/avatars/blank.png') }}" alt="image">
                  <div
                    class="position-absolute translate-middle bottom-0 start-100 mb-6 bg-success rounded-circle border border-4 border-white h-20px w-20px">
                  </div>
                </div>
              </div>
              <!--end::Pic-->
              <!--begin::Info-->
              <div class="flex-grow-1">
                <!--begin::Title-->
                <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                  <!--begin::User-->
                  <div class="d-flex flex-column">
                    <!--begin::Name-->
                    <div class="d-flex align-items-center mb-2">
                      <a href="#"
                        class="text-gray-900 text-hover-primary fs-2 fw-bolder me-1">{{ $siswa->nama }}</a>
                      <a href="#">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen026.svg-->
                        <span class="svg-icon svg-icon-1 svg-icon-primary">
                          <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24">
                            <path
                              d="M10.0813 3.7242C10.8849 2.16438 13.1151 2.16438 13.9187 3.7242V3.7242C14.4016 4.66147 15.4909 5.1127 16.4951 4.79139V4.79139C18.1663 4.25668 19.7433 5.83365 19.2086 7.50485V7.50485C18.8873 8.50905 19.3385 9.59842 20.2758 10.0813V10.0813C21.8356 10.8849 21.8356 13.1151 20.2758 13.9187V13.9187C19.3385 14.4016 18.8873 15.491 19.2086 16.4951V16.4951C19.7433 18.1663 18.1663 19.7433 16.4951 19.2086V19.2086C15.491 18.8873 14.4016 19.3385 13.9187 20.2758V20.2758C13.1151 21.8356 10.8849 21.8356 10.0813 20.2758V20.2758C9.59842 19.3385 8.50905 18.8873 7.50485 19.2086V19.2086C5.83365 19.7433 4.25668 18.1663 4.79139 16.4951V16.4951C5.1127 15.491 4.66147 14.4016 3.7242 13.9187V13.9187C2.16438 13.1151 2.16438 10.8849 3.7242 10.0813V10.0813C4.66147 9.59842 5.1127 8.50905 4.79139 7.50485V7.50485C4.25668 5.83365 5.83365 4.25668 7.50485 4.79139V4.79139C8.50905 5.1127 9.59842 4.66147 10.0813 3.7242V3.7242Z"
                              fill="#00A3FF"></path>
                            <path class="permanent"
                              d="M14.8563 9.1903C15.0606 8.94984 15.3771 8.9385 15.6175 9.14289C15.858 9.34728 15.8229 9.66433 15.6185 9.9048L11.863 14.6558C11.6554 14.9001 11.2876 14.9258 11.048 14.7128L8.47656 12.4271C8.24068 12.2174 8.21944 11.8563 8.42911 11.6204C8.63877 11.3845 8.99996 11.3633 9.23583 11.5729L11.3706 13.4705L14.8563 9.1903Z"
                              fill="white"></path>
                          </svg>
                        </span>
                        <!--end::Svg Icon-->
                      </a>
                    </div>
                    <!--end::Name-->
                    <!--begin::Info-->
                    <div class="d-flex flex-wrap fw-bold fs-6 mb-4 pe-2">
                      <a href="#" class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
                        <!--begin::Svg Icon | path: icons/duotune/communication/com006.svg-->
                        <span class="svg-icon svg-icon-4 me-1">
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none">
                            <path opacity="0.3"
                              d="M22 12C22 17.5 17.5 22 12 22C6.5 22 2 17.5 2 12C2 6.5 6.5 2 12 2C17.5 2 22 6.5 22 12ZM12 7C10.3 7 9 8.3 9 10C9 11.7 10.3 13 12 13C13.7 13 15 11.7 15 10C15 8.3 13.7 7 12 7Z"
                              fill="black"></path>
                            <path
                              d="M12 22C14.6 22 17 21 18.7 19.4C17.9 16.9 15.2 15 12 15C8.8 15 6.09999 16.9 5.29999 19.4C6.99999 21 9.4 22 12 22Z"
                              fill="black"></path>
                          </svg>
                        </span>
                        <!--end::Svg Icon-->{{ $siswa->nisn }}</a>
                      <a href="#" class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen018.svg-->
                        <span class="svg-icon svg-icon-4 me-1">
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none">
                            <path opacity="0.3"
                              d="M4.05424 15.1982C8.34524 7.76818 13.5782 3.26318 20.9282 2.01418C21.0729 1.98837 21.2216 1.99789 21.3618 2.04193C21.502 2.08597 21.6294 2.16323 21.7333 2.26712C21.8372 2.37101 21.9144 2.49846 21.9585 2.63863C22.0025 2.7788 22.012 2.92754 21.9862 3.07218C20.7372 10.4222 16.2322 15.6552 8.80224 19.9462L4.05424 15.1982ZM3.81924 17.3372L2.63324 20.4482C2.58427 20.5765 2.5735 20.7163 2.6022 20.8507C2.63091 20.9851 2.69788 21.1082 2.79503 21.2054C2.89218 21.3025 3.01536 21.3695 3.14972 21.3982C3.28408 21.4269 3.42387 21.4161 3.55224 21.3672L6.66524 20.1802L3.81924 17.3372ZM16.5002 5.99818C16.2036 5.99818 15.9136 6.08615 15.6669 6.25097C15.4202 6.41579 15.228 6.65006 15.1144 6.92415C15.0009 7.19824 14.9712 7.49984 15.0291 7.79081C15.0869 8.08178 15.2298 8.34906 15.4396 8.55884C15.6494 8.76862 15.9166 8.91148 16.2076 8.96935C16.4986 9.02723 16.8002 8.99753 17.0743 8.884C17.3484 8.77046 17.5826 8.5782 17.7474 8.33153C17.9123 8.08486 18.0002 7.79485 18.0002 7.49818C18.0002 7.10035 17.8422 6.71882 17.5609 6.43752C17.2796 6.15621 16.8981 5.99818 16.5002 5.99818Z"
                              fill="black" />
                            <path
                              d="M4.05423 15.1982L2.24723 13.3912C2.15505 13.299 2.08547 13.1867 2.04395 13.0632C2.00243 12.9396 1.9901 12.8081 2.00793 12.679C2.02575 12.5498 2.07325 12.4266 2.14669 12.3189C2.22013 12.2112 2.31752 12.1219 2.43123 12.0582L9.15323 8.28918C7.17353 10.3717 5.4607 12.6926 4.05423 15.1982ZM8.80023 19.9442L10.6072 21.7512C10.6994 21.8434 10.8117 21.9129 10.9352 21.9545C11.0588 21.996 11.1903 22.0083 11.3195 21.9905C11.4486 21.9727 11.5718 21.9252 11.6795 21.8517C11.7872 21.7783 11.8765 21.6809 11.9402 21.5672L15.7092 14.8442C13.6269 16.8245 11.3061 18.5377 8.80023 19.9442ZM7.04023 18.1832L12.5832 12.6402C12.7381 12.4759 12.8228 12.2577 12.8195 12.032C12.8161 11.8063 12.725 11.5907 12.5653 11.4311C12.4057 11.2714 12.1901 11.1803 11.9644 11.1769C11.7387 11.1736 11.5205 11.2583 11.3562 11.4132L5.81323 16.9562L7.04023 18.1832Z"
                              fill="black" />
                          </svg>
                        </span>
                        <!--end::Svg Icon-->{{ $siswa->kelas->kelas }}</a>
                      <a href="#" class="d-flex align-items-center text-gray-400 text-hover-primary mb-2">
                        <!--begin::Svg Icon | path: icons/duotune/communication/com011.svg-->
                        <span class="svg-icon svg-icon-4 me-1">
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none">
                            <path opacity="0.3"
                              d="M5.78001 21.115L3.28001 21.949C3.10897 22.0059 2.92548 22.0141 2.75004 21.9727C2.57461 21.9312 2.41416 21.8418 2.28669 21.7144C2.15923 21.5869 2.06975 21.4264 2.0283 21.251C1.98685 21.0755 1.99507 20.892 2.05201 20.7209L2.886 18.2209L7.22801 13.879L10.128 16.774L5.78001 21.115Z"
                              fill="black" />
                            <path
                              d="M21.7 8.08899L15.911 2.30005C15.8161 2.2049 15.7033 2.12939 15.5792 2.07788C15.455 2.02637 15.3219 1.99988 15.1875 1.99988C15.0531 1.99988 14.92 2.02637 14.7958 2.07788C14.6717 2.12939 14.5589 2.2049 14.464 2.30005L13.74 3.02295C13.548 3.21498 13.4402 3.4754 13.4402 3.74695C13.4402 4.01849 13.548 4.27892 13.74 4.47095L14.464 5.19397L11.303 8.35498C10.1615 7.80702 8.87825 7.62639 7.62985 7.83789C6.38145 8.04939 5.2293 8.64265 4.332 9.53601C4.14026 9.72817 4.03256 9.98855 4.03256 10.26C4.03256 10.5315 4.14026 10.7918 4.332 10.984L13.016 19.667C13.208 19.859 13.4684 19.9668 13.74 19.9668C14.0115 19.9668 14.272 19.859 14.464 19.667C15.3575 18.77 15.9509 17.618 16.1624 16.3698C16.374 15.1215 16.1932 13.8383 15.645 12.697L18.806 9.53601L19.529 10.26C19.721 10.452 19.9814 10.5598 20.253 10.5598C20.5245 10.5598 20.785 10.452 20.977 10.26L21.7 9.53601C21.7952 9.44108 21.8706 9.32825 21.9221 9.2041C21.9737 9.07995 22.0002 8.94691 22.0002 8.8125C22.0002 8.67809 21.9737 8.54505 21.9221 8.4209C21.8706 8.29675 21.7952 8.18392 21.7 8.08899Z"
                              fill="black" />
                          </svg>
                        </span>
                        <!--end::Svg Icon-->{{ $siswa->nomor_whatsaap }}</a>
                    </div>
                    <!--end::Info-->
                  </div>
                  <!--end::User-->
                  <!--begin::Actions-->
                
                  <!--end::Actions-->
                </div>
                <!--end::Title-->
                <!--begin::Stats-->
                <div class="d-flex flex-wrap flex-stack">
                  <!--begin::Wrapper-->
                  <div class="d-flex flex-column flex-grow-1 pe-8">

                    <!--begin::Stats-->
                    <div class="d-flex flex-wrap">
                      <!--begin::Stat-->
                      <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                        <!--begin::Number-->
                        <div class="d-flex align-items-center">
                          <div class="fs-2 fw-bolder counted" data-kt-countup="true"
                            data-kt-countup-value="{{ $count_ebooks }}">{{ $count_ebooks }}
                          </div>
                        </div>
                        <!--end::Number-->
                        <!--begin::Label-->
                        <div class="fw-bold fs-6 text-gray-400">Ebooks</div>
                        <!--end::Label-->
                      </div>
                      <!--end::Stat-->
                      <!--begin::Stat-->
                      <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                        <!--begin::Number-->
                        <div class="d-flex align-items-center">
                          <div class="fs-2 fw-bolder counted" data-kt-countup="true"
                            data-kt-countup-value="{{ $count_videos }}">
                            {{ $count_videos }}
                          </div>
                        </div>
                        <!--end::Number-->
                        <!--begin::Label-->
                        <div class="fw-bold fs-6 text-gray-400">Videos</div>
                        <!--end::Label-->
                      </div>
                      <!--end::Stat-->
                      <!--begin::Stat-->
                      {{-- <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                        <!--begin::Number-->
                        <div class="d-flex align-items-center">
                          <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
                          <span class="svg-icon svg-icon-3 svg-icon-success me-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                              fill="none">
                              <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1"
                                transform="rotate(90 13 6)" fill="black"></rect>
                              <path
                                d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
                                fill="black"></path>
                            </svg>
                          </span>
                          <!--end::Svg Icon-->
                          <div class="fs-2 fw-bolder counted" data-kt-countup="true" data-kt-countup-value="60"
                            data-kt-countup-prefix="%">%60</div>
                        </div>
                        <!--end::Number-->
                        <!--begin::Label-->
                        <div class="fw-bold fs-6 text-gray-400">Success Rate</div>
                        <!--end::Label-->
                      </div> --}}
                      <!--end::Stat-->
                    </div>
                    <!--end::Stats-->
                  </div>
                  <!--end::Wrapper-->

                </div>
                <!--end::Stats-->
              </div>
              <!--end::Info-->
            </div>
            <!--end::Details-->

          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
