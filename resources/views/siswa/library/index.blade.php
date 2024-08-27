@extends('layouts.app')

@section('content')

@push('styles')

<style>
    .alternative-thumbnail {
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #007bff; /* Warna biru sebagai background */
    color: white;
    text-align: center;
    min-height: 375px;
    border-radius: 10px;
}

.alternative-thumbnail h3 {
    margin: 0;
    font-size: 1.5rem;
}

.alternative-thumbnail p {
    margin: 0;
    font-size: 1rem;
}

</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" integrity="sha512-H9jrZiiopUdsLpg94A333EfumgUBpO9MdbxStdeITo+KEIMaNfHNvwyjjDJb+ERPaRS6DpyRlKbvPUasNItRyw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

@endpush


<div id="kt_content_container" class="container-xxl mt-10">
    <!--begin::Home card-->
    <div class="card">
        <!--begin::Body-->
        <div class="card-body p-lg-20">
            <!--begin::Section-->
            <div class="mb-17">
                <!--begin::Content-->
                <div class="d-flex flex-stack mb-5">
                    <!--begin::Title-->
                    <h3 class="text-dark">Video Pembelajaran</h3>
                    <!--end::Title-->
                    <!--begin::Link-->
                    <a href="#" class="fs-6 fw-bold link-primary">View All</a>
                    <!--end::Link-->
                </div>
                <!--end::Content-->
                <!--begin::Separator-->
                <div class="separator separator-dashed mb-9"></div>
                <!--end::Separator-->
                <!--begin::Row-->
                <div class="row g-10">

                    @foreach ($learningResources as $video)

                        @if ($video->kategori == 'video')

                       @php
                            function getYouTubeVideoId($url) {
                                parse_str(parse_url($url, PHP_URL_QUERY), $query);
                                return $query['v'] ?? null;
                            }

                            $videoUrl = $video->youtube_url;
                            $videoId = getYouTubeVideoId($videoUrl);
                            $thumbnailUrl = $videoId ? "https://img.youtube.com/vi/{$videoId}/mqdefault.jpg" : '';
                        @endphp

                            <!--begin::Col-->
                            <div class="col-md-4">
                                <!--begin::Feature post-->
                                <div class="card-xl-stretch me-md-6">
                                    <!--begin::Image-->
                                    <a class="d-block bgi-no-repeat bgi-size-cover bgi-position-center card-rounded position-relative min-h-175px mb-5" style="background-image:url('{{ $thumbnailUrl }}')" data-fslightbox="lightbox-video-tutorials" href="{{ $video->youtube_url }}">
                                        <img src="{{ asset('assets/media/svg/misc/video-play.svg') }}" class="position-absolute top-50 start-50 translate-middle" alt="">
                                    </a>
                                    <!--end::Image-->
                                    <!--begin::Body-->
                                    <div class="m-0">
                                        <!--begin::Title-->
                                        <a href="#" class="fs-4 text-dark fw-bolder text-hover-primary text-dark lh-base">{{ $video->judul }}</a>
                                        <!--end::Title-->
                                        <!--begin::Text-->
                                        <div class="fw-bold fs-5 text-gray-600 text-dark my-4">{{ $video->deskripsi }}</div>
                                        <!--end::Text-->
                                        <!--begin::Content-->
                                        <div class="fs-6 fw-bolder">
                                            <!--begin::Author-->
                                            <a href="#" class="text-gray-700 text-hover-primary">Jane Miller</a>
                                            <!--end::Author-->
                                            <!--begin::Date-->
                                            <span class="text-muted">on Mar 21 2021</span>
                                            <!--end::Date-->
                                        </div>
                                        <!--end::Content-->
                                    </div>
                                    <!--end::Body-->
                                </div>
                                <!--end::Feature post-->
                            </div>
                            <!--end::Col-->
                        @endif

                    @endforeach

                </div>
                <!--end::Row-->
            </div>
            <!--end::Section-->
            <!--begin::Section-->
            <div class="mb-17">
                <!--begin::Content-->
                <div class="d-flex flex-stack mb-5">
                    <!--begin::Title-->
                    <h3 class="text-dark">Ebook Pembelajaran</h3>
                    <!--end::Title-->
                    <!--begin::Link-->
                    <a href="#" class="fs-6 fw-bold link-primary">View All</a>
                    <!--end::Link-->
                </div>
                <!--end::Content-->
                <!--begin::Separator-->
                <div class="separator separator-dashed mb-9"></div>
                <!--end::Separator-->
                <!--begin::Row-->
                <div class="row g-10">


                        @foreach ($learningResources as $ebook)
                        @if ($ebook->kategori == 'ebook')
                            <!--begin::Col-->
                            <div class="col-md-4">
                                <!--begin::Hot sales post-->
                                <div class="card-xl-stretch me-md-6">
                                    <!--begin::Overlay-->
                                    <a class="d-block overlay iframe" href="https://pdfobject.com/pdf/sample.pdf">
                                        <!--begin::Image-->
                                        {{-- <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-375px" style="background-image:url(https://storage.googleapis.com/gcp-depo/demosiplah/IP/02MBBS0901.png)"></div> --}}
                                        <!--end::Image-->

                                        <!-- Alternatif Thumbnail -->
                                        <div class="overlay-wrapper card-rounded min-h-350px d-flex align-items-center justify-content-center bg-primary text-white text-center" style="display: none;">
                                            <div>
                                                <h3 class="text-white">{{ $ebook->judul }}</h3>
                                                {{-- <p>{{ $ebook->deskripsi  }}</p> --}}
                                            </div>
                                        </div>
                                        <!--end::Image-->

                                        <!--begin::Action-->
                                        <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                            <i class="bi bi-eye-fill fs-2x text-white"></i>
                                        </div>
                                        <!--end::Action-->
                                    </a>
                                    <!--end::Overlay-->
                                    <!--begin::Body-->
                                    <div class="mt-5">
                                        <!--begin::Title-->
                                        <a href="#" class="fs-4 text-dark fw-bolder text-hover-primary text-dark lh-base">{{ $ebook->judul }}</a>
                                        <!--end::Title-->
                                        <!--begin::Text-->
                                        <div class="fw-bold fs-5 text-gray-600 text-dark mt-3">{{ $ebook->deskripsi }}</div>
                                        <!--end::Text-->
                                        <!--begin::Text-->
                                        <div class="fs-6 fw-bolder mt-5 d-flex flex-stack">
                                            <!--begin::Label-->
                                            <span class="badge border border-dashed fs-2 fw-bolder text-dark p-2">
                                            {{-- <span class="fs-6 fw-bold text-gray-400">$</span>28</span> --}}
                                            <!--end::Label-->
                                            <!--begin::Action-->
                                            {{-- <a href="#" class="btn btn-sm btn-primary">Purchase</a> --}}
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Text-->
                                    </div>
                                    <!--end::Body-->
                                </div>
                                <!--end::Hot sales post-->
                            </div>
                            <!--end::Col-->
                        @endif


                        @endforeach



                </div>
                <!--end::Row-->
            </div>
            <!--end::Section-->
            <!--begin::latest instagram-->
            {{-- <div class="">
                <!--begin::Section-->
                <div class="m-0">
                    <!--begin::Content-->
                    <div class="d-flex flex-stack">
                        <!--begin::Title-->
                        <h3 class="text-dark">Latest Instagram Posts</h3>
                        <!--end::Title-->
                        <!--begin::Link-->
                        <a href="#" class="fs-6 fw-bold link-primary">View Instagram</a>
                        <!--end::Link-->
                    </div>
                    <!--end::Content-->
                    <!--begin::Separator-->
                    <div class="separator separator-dashed border-gray-300 mb-9 mt-5"></div>
                    <!--end::Separator-->
                </div>
                <!--end::Section-->
                <!--begin::Row-->
                <div class="row g-10 row-cols-2 row-cols-lg-5">
                    <!--begin::Col-->
                    <div class="col">
                        <!--begin::Overlay-->
                        <a class="d-block overlay" data-fslightbox="lightbox-hot-sales" href="assets/media/stock/900x600/16.jpg">
                            <!--begin::Image-->
                            <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-175px" style="background-image:url('{{ asset('assets/media/stock/900x600/16.jpg') }}')"></div>
                            <!--end::Image-->
                            <!--begin::Action-->
                            <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                <i class="bi bi-eye-fill fs-2x text-white"></i>
                            </div>
                            <!--end::Action-->
                        </a>
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col">
                        <!--begin::Overlay-->
                        <a class="d-block overlay" data-fslightbox="lightbox-hot-sales" href="assets/media/stock/900x600/13.jpg">
                            <!--begin::Image-->
                            <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-175px" style="background-image:url('{{ asset('assets/media/stock/900x600/13.jpg') }}')"></div>
                            <!--end::Image-->
                            <!--begin::Action-->
                            <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                <i class="bi bi-eye-fill fs-2x text-white"></i>
                            </div>
                            <!--end::Action-->
                        </a>
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col">
                        <!--begin::Overlay-->
                        <a class="d-block overlay" data-fslightbox="lightbox-hot-sales" href="assets/media/stock/900x600/19.jpg">
                            <!--begin::Image-->
                            <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-175px" style="background-image:url('{{ asset('assets/media/stock/900x600/19.jpg') }}')"></div>
                            <!--end::Image-->
                            <!--begin::Action-->
                            <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                <i class="bi bi-eye-fill fs-2x text-white"></i>
                            </div>
                            <!--end::Action-->
                        </a>
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col">
                        <!--begin::Overlay-->
                        <a class="d-block overlay" data-fslightbox="lightbox-hot-sales" href="assets/media/stock/900x600/15.jpg">
                            <!--begin::Image-->
                            <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-175px" style="background-image:url('{{ asset('assets/media/stock/900x600/15.jpg') }}')"></div>
                            <!--end::Image-->
                            <!--begin::Action-->
                            <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                <i class="bi bi-eye-fill fs-2x text-white"></i>
                            </div>
                            <!--end::Action-->
                        </a>
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col">
                        <!--begin::Overlay-->
                        <a class="d-block overlay" data-fslightbox="lightbox-hot-sales" href="assets/media/stock/900x600/12.jpg">
                            <!--begin::Image-->
                            <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-175px" style="background-image:url('{{ asset('assets/media/stock/900x600/12.jpg') }}')"></div>
                            <!--end::Image-->
                            <!--begin::Action-->
                            <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                <i class="bi bi-eye-fill fs-2x text-white"></i>
                            </div>
                            <!--end::Action-->
                        </a>
                    </div>
                    <!--end::Col-->
                </div>
                <!--begin::Row-->
            </div> --}}
            <!--end::latest instagram-->
        </div>
        <!--end::Body-->
    </div>
    <!--end::Home card-->
</div>
@endSection

@push('scripts')

<!--begin::Page Vendors Javascript(used by this page)-->
<script src="{{ asset('assets/plugins/custom/fslightbox/fslightbox.bundle.js') }}"></script>
<script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js" integrity="sha512-uURl+ZXMBrF4AwGaWmEetzrd+J5/8NRkWAvJx5sbPSSuOb0bZLqf+tOzniObO00BjHa/dD7gub9oCGMLPQHtQA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    $(document).ready(function() {
/* Apply fancybox to multiple items */

$("a.iframe").fancybox({
  iframe: {
    css: {
      width: '100%',
      height: '100%'
    }
  },
  buttons: [
    'zoom',
    'close'
  ],
  width: '100%',
  height: '100%',
  fullScreen: true // Tambahkan ini untuk mendukung tombol fullscreen
});

});
</script>

<!--end::Page Vendors Javascript-->
<!--begin::Page Custom Javascript(used by this page)-->
<script src="{{ asset('assets/js/widgets.bundle.js') }}"></script>
<script src="{{ asset('assets/js/custom/widgets.js') }}"></script>
<script src="{{ asset('assets/js/custom/apps/chat/chat.js') }}"></script>
<script src="{{ asset('assets/js/custom/utilities/modals/users-search.js') }}"></script>



@endpush
