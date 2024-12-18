@php
    $path = explode('/', request()->path());
@endphp
<div class="aside-menu flex-column-fluid">
    <!--begin::Aside Menu-->
    <div class="hover-scroll-overlay-y px-2 my-5 my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="{default: '#kt_aside_toolbar, #kt_aside_footer', lg: '#kt_header, #kt_aside_toolbar, #kt_aside_footer'}" data-kt-scroll-wrappers="#kt_aside_menu" data-kt-scroll-offset="5px">
        <!--begin::Menu-->
        <div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500" id="#kt_aside_menu" data-kt-menu="true">


              @if(auth()->user()->role == 'admin')
                  @include('layouts.aside.admin')
              @endif

              @if(auth()->user()->role == 'guru')
                  @include('layouts.aside.guru')
              @endif

        </div>
        <!--end::Menu-->
    </div>
    <!--end::Aside Menu-->
</div>
