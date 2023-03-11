<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
<!--begin::Head-->

<head>
    <meta charset="utf-8" />
    <title> {{ settings('site_name')->value }} | لوحة الاداره </title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="csrf_token" content="{{ csrf_token() }}" />

    <link rel="shortcut icon" href="{{ settings('favicon')->value }}" />
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tajawal:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Page Vendor Stylesheets(used by this page)-->
    <link href="{{url('../admin/assets')}}/plugins/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Page Vendor Stylesheets-->
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="{{url('../admin/assets')}}/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="{{url('../admin/assets')}}/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->

    <style>.select2{width:100% !important}*:not(i):not(.fa):not(.fas){font-family: 'Tajawal', sans-serif;}</style>
</head>
<body id="kt_body" class="header-tablet-and-mobile-fixed aside-enabled">
<!--begin::Main-->
<!--begin::Root-->
<div class="d-flex flex-column flex-root">
    <!--begin::Page-->
    <div class="page d-flex flex-row flex-column-fluid">
        <!--begin::Aside-->
        <div id="kt_aside" class="aside py-9" data-kt-drawer="true" data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_toggle">
            <!--begin::Aside menu-->
            <div class="aside-menu flex-column-fluid ps-5 pe-3 mb-7" id="kt_aside_menu">
                <!--begin::Aside Menu-->
                <div class="w-100 hover-scroll-overlay-y d-flex pe-2" id="kt_aside_menu_wrapper" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_aside_footer, #kt_header" data-kt-scroll-wrappers="#kt_aside, #kt_aside_menu, #kt_aside_menu_wrapper" data-kt-scroll-offset="102">
                    <!--begin::Menu-->
                    <div class="menu menu-column menu-rounded fw-bold" id="#kt_aside_menu" data-kt-menu="true">
                        <div class="menu-item">
                            <a class="menu-link" href="{{ route('dashboard') }}">
										<span class="menu-icon">
											<!--begin::Svg Icon | path: icons/duotune/arrows/arr001.svg-->
                                            <span class="svg-icon svg-icon-5"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path d="M9.60001 11H21C21.6 11 22 11.4 22 12C22 12.6 21.6 13 21 13H9.60001V11Z" fill="currentColor"/>
                                            <path opacity="0.3" d="M9.6 20V4L2.3 11.3C1.9 11.7 1.9 12.3 2.3 12.7L9.6 20Z" fill="currentColor"/>
                                            </svg></span>
                                            <!--end::Svg Icon-->
										</span>
                                <span class="menu-title">الرئسية</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="{{ route('section.index') }}">
										<span class="menu-icon">
											<!--begin::Svg Icon | path: icons/duotune/arrows/arr001.svg-->
                                            <span class="svg-icon svg-icon-5"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path d="M9.60001 11H21C21.6 11 22 11.4 22 12C22 12.6 21.6 13 21 13H9.60001V11Z" fill="currentColor"/>
                                            <path opacity="0.3" d="M9.6 20V4L2.3 11.3C1.9 11.7 1.9 12.3 2.3 12.7L9.6 20Z" fill="currentColor"/>
                                            </svg></span>
                                            <!--end::Svg Icon-->
										</span>
                                <span class="menu-title">الاقسام</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="{{ route('book.index') }}">
										<span class="menu-icon">
											<!--begin::Svg Icon | path: icons/duotune/arrows/arr001.svg-->
                                            <span class="svg-icon svg-icon-5"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path d="M9.60001 11H21C21.6 11 22 11.4 22 12C22 12.6 21.6 13 21 13H9.60001V11Z" fill="currentColor"/>
                                            <path opacity="0.3" d="M9.6 20V4L2.3 11.3C1.9 11.7 1.9 12.3 2.3 12.7L9.6 20Z" fill="currentColor"/>
                                            </svg></span>
                                            <!--end::Svg Icon-->
										</span>
                                <span class="menu-title">الكتب</span>
                            </a>
                        </div>

                                                <div class="menu-item">
                            <a class="menu-link" href="{{ route('lesson.index') }}">
										<span class="menu-icon">
											<!--begin::Svg Icon | path: icons/duotune/arrows/arr001.svg-->
                                            <span class="svg-icon svg-icon-5"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path d="M9.60001 11H21C21.6 11 22 11.4 22 12C22 12.6 21.6 13 21 13H9.60001V11Z" fill="currentColor"/>
                                            <path opacity="0.3" d="M9.6 20V4L2.3 11.3C1.9 11.7 1.9 12.3 2.3 12.7L9.6 20Z" fill="currentColor"/>
                                            </svg></span>
                                            <!--end::Svg Icon-->
										</span>
                                <span class="menu-title">الدروس</span>
                            </a>
                        </div>
                                                <div class="menu-item">
                            <a class="menu-link" href="{{ route('coupon.index') }}">
										<span class="menu-icon">
											<!--begin::Svg Icon | path: icons/duotune/arrows/arr001.svg-->
                                            <span class="svg-icon svg-icon-5"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path d="M9.60001 11H21C21.6 11 22 11.4 22 12C22 12.6 21.6 13 21 13H9.60001V11Z" fill="currentColor"/>
                                            <path opacity="0.3" d="M9.6 20V4L2.3 11.3C1.9 11.7 1.9 12.3 2.3 12.7L9.6 20Z" fill="currentColor"/>
                                            </svg></span>
                                            <!--end::Svg Icon-->
										</span>
                                <span class="menu-title">الاكواد</span>
                            </a>
                        </div>




                    </div>
                </div>
            </div>
        </div>
        <!--end::Aside-->
        <!--begin::Wrapper-->
        <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
            <!--begin::Header-->
            <div id="kt_header" class="header header-bg">
                <!--begin::Container-->
                <div class="container-fluid">
                    <!--begin::Brand-->
                    <div class="header-brand me-5">
                        <!--begin::Aside toggle-->
                        <div class="d-flex align-items-center d-lg-none ms-n2 me-2" title="Show aside menu">
                            <div class="btn btn-icon btn-active-color-primary w-30px h-30px" id="kt_aside_toggle">
                                <!--begin::Svg Icon | path: icons/duotune/abstract/abs015.svg-->
                                <span class="svg-icon svg-icon-1">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
												<path d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z" fill="black" />
												<path opacity="0.3" d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z" fill="black" />
											</svg>
										</span>
                                <!--end::Svg Icon-->
                            </div>
                        </div>
                        <!--end::Aside toggle-->
                        <!--begin::Logo-->
                        <a href="{{route('dashboard')}}">
                            <img alt="Logo" src="{{ settings('logo')->value }}" class="h-25px h-lg-30px d-none d-md-block" />
                            <img alt="Logo" src="{{ settings('logo')->value }}" class="h-25px d-block d-md-none" />
                        </a>
                        <!--end::Logo-->
                    </div>
                    <!--end::Brand-->
                    <!--begin::Topbar-->
                    <div class="topbar d-flex align-items-stretch">
                        <!--begin::Item-->
                        <!--end::Item-->
                        <!--begin::Item-->
                        <div class="d-flex align-items-center ms-2 ms-lg-4">
                            <a href="/" target="_blank" class="btn btn-icon btn-borderless btn-active-primary bg-white bg-opacity-10" >
                                <!--begin::Svg Icon | path: icons/duotune/general/gen007.svg-->
                                <span class="svg-icon svg-icon-primary svg-icon-2x"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><path d="M13,18.9450712 L13,20 L14,20 C15.1045695,20 16,20.8954305 16,22 L8,22 C8,20.8954305 8.8954305,20 10,20 L11,20 L11,18.9448245 C9.02872877,18.7261967 7.20827378,17.866394 5.79372555,16.5182701 L4.73856106,17.6741866 C4.36621808,18.0820826 3.73370941,18.110904 3.32581341,17.7385611 C2.9179174,17.3662181 2.88909597,16.7337094 3.26143894,16.3258134 L5.04940685,14.367122 C5.46150313,13.9156769 6.17860937,13.9363085 6.56406875,14.4106998 C7.88623094,16.037907 9.86320756,17 12,17 C15.8659932,17 19,13.8659932 19,10 C19,7.73468744 17.9175842,5.65198725 16.1214335,4.34123851 C15.6753081,4.01567657 15.5775721,3.39010038 15.903134,2.94397499 C16.228696,2.49784959 16.8542722,2.4001136 17.3003976,2.72567554 C19.6071362,4.40902808 21,7.08906798 21,10 C21,14.6325537 17.4999505,18.4476269 13,18.9450712 Z" fill="#000000" fill-rule="nonzero"></path><circle fill="#000000" opacity="0.3" cx="12" cy="10" r="6"></circle></g></svg></span>
                                <!--end::Svg Icon-->
                                <span class="bullet bullet-dot bg-success h-6px w-6px position-absolute translate-middle top-0 start-100 animation-blink"></span>
                            </a>
                        </div>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <div class="d-flex align-items-center ms-2 ms-lg-4">
                            <a href="#" class="btn btn-icon btn-borderless btn-active-primary bg-white bg-opacity-10" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
                                <!--begin::Svg Icon | path: icons/duotune/communication/com013.svg-->
                                <span class="svg-icon svg-icon-1 svg-icon-white">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
												<path d="M6.28548 15.0861C7.34369 13.1814 9.35142 12 11.5304 12H12.4696C14.6486 12 16.6563 13.1814 17.7145 15.0861L19.3493 18.0287C20.0899 19.3618 19.1259 21 17.601 21H6.39903C4.87406 21 3.91012 19.3618 4.65071 18.0287L6.28548 15.0861Z" fill="black" />
												<rect opacity="0.3" x="8" y="3" width="8" height="8" rx="4" fill="black" />
											</svg>
										</span>
                                <!--end::Svg Icon-->
                            </a>
                            <!--begin::Menu-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-primary fw-bold py-4 fs-6 w-275px" data-kt-menu="true">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <div class="menu-content d-flex align-items-center px-3">
                                        <!--begin::Avatar-->
                                        <div class="symbol symbol-50px me-5">
                                            <img src="{{ auth()->user()->imageUrl }}"
                                                 alt="{{ auth()->user()->name }}">
                                        </div>
                                        <!--end::Avatar-->
                                        <!--begin::Username-->
                                        <div class="d-flex flex-column">
                                            <div class="fw-bolder d-flex align-items-center fs-5">
                                                {{ auth()->user()->name }}
                                            </div>
                                        </div>
                                        <!--end::Username-->
                                    </div>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-5">
                                    <a href="{{route('profile')}}" class="menu-link px-5">الاعدادات</a>
                                </div>

                                <!--begin::Menu item-->
                                <div class="menu-item px-5 my-1">
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button  class="menu-link px-5" style="background: transparent;border: 0;" type="submit">
                                            تسجيل الخرزج
                                        </button>

                                    </form>

                                </div>

                                <!--end::Menu item-->

                            </div>
                            <!--end::Menu-->
                        </div>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <div class="d-flex align-items-center">
                            <a href="{{ route('dashboard') }}" class="btn btn-icon btn-color-white btn-active-color-primary border-0 me-n3" data-bs-toggle="tooltip" data-bs-placement="left" title="Return to launcher">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen034.svg-->
                                <span class="svg-icon svg-icon-2x">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
												<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="black" />
												<rect x="7" y="15.3137" width="12" height="2" rx="1" transform="rotate(-45 7 15.3137)" fill="black" />
												<rect x="8.41422" y="7" width="12" height="2" rx="1" transform="rotate(45 8.41422 7)" fill="black" />
											</svg>
										</span>
                                <!--end::Svg Icon-->
                            </a>
                        </div>
                        <!--end::Item-->
                    </div>
                    <!--end::Topbar-->
                </div>
                <!--end::Container-->
            </div>
            <!--end::Header-->
            <!--begin::Content-->
            <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                <!--begin::Toolbar-->
                    @include('layouts.elements.subheader')
                <!--end::Toolbar-->

                <!--begin::Post-->
                <div class="post d-flex flex-column-fluid" id="kt_post">
                    <!--begin::Container-->

                    <div id="kt_content_container" class="container-xxl">
                        @yield('content')
                    </div>
                    <!--end::Container-->
                </div>
                <!--end::Post-->
            </div>
            <!--end::Content-->

            <!--begin::Footer-->
            <div class="footer py-4 d-flex flex-lg-column" id="kt_footer">
                <!--begin::Container-->
                <div class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between">

                </div>
                <!--end::Container-->
            </div>
            <!--end::Footer-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Page-->
</div>

<!--end::Main-->
<script>var hostUrl = "/admin/assets/";</script>
<!--begin::Javascript-->
<!--begin::Global Javascript Bundle(used by all pages)-->
<script src="/admin/assets/plugins/global/plugins.bundle.js"></script>
<script src="/admin/assets/js/scripts.bundle.js"></script>
<!--end::Global Javascript Bundle-->

<!--begin::Page Vendors Javascript(used by this page)-->
<script src="/admin/assets/plugins/custom/datatables/datatables.bundle.js"></script>
<!--end::Page Vendors Javascript-->
<script src="/admin/assets/plugins/custom/tinymce/tinymce.bundle.js"></script>

@yield('js-files')
@yield('js')

<script>
    $(".send-ajax").submit(function(e){
        e.preventDefault();
        if(tinyMCE)
            tinyMCE.triggerSave();
        let form = this;
        $(form).find('[type="submit"]').attr('data-kt-indicator', 'on')
        $(form).find('.error').remove();
        $.ajax({
            type: $(form).attr('method'),
            url: $(form).attr('action'),
            processData: false,
            contentType: false,
            enctype: 'multipart/form-data',
            // data: $(form).serialize(),
            data: new FormData(this),
            dataType: 'json'
        }).
        done(function(response) {
            $(form).find('.error').remove();
            if (response.message) {
                Swal.fire({
                    title: response.message,
                    text: '',
                    icon: 'success',
                    confirmButtonText: '{{ lang('site.OK') }}'
                })
                toastr.success(response.message);
                $(form).trigger("reset");
            }
            $(form).find('[type="submit"]').removeAttr('data-kt-indicator')
            location.reload();
        }).
        fail(function(xhr, status, error) {
            if (xhr.responseJSON.message) {
                //Swal.fire({
                  //  title: xhr.responseJSON.message,
                    //text: '{{ lang('site.Please try again') }}',
                   // icon: 'error',
                    //confirmButtonText: '{{ lang('site.OK') }}'
               // })
            }
            if (xhr.responseJSON.errors) {
                var errors = xhr.responseJSON.errors
                Object.keys(errors).forEach(value => {
                    if (value.indexOf('0') > -1) {
                        let keyes = value.split(".");
                        if ($(`[name='${keyes[0]}[${keyes[1]}][${keyes[2]}]']`)) {
                            $(`[name='${keyes[0]}[${keyes[1]}][${keyes[2]}]']`).closest('div')
                                .append(
                                    `<label for="${value}" class="error alert alert-danger d-block mt-2">${errors[value]}</label>`
                                )
                        }
                    } else if ($(`[name='${value}']`)) {
                        $(`[name='${value}']`).closest('div').append(
                            `<label for="${value}" class="error alert alert-danger d-block mt-2">${errors[value]}</label>`
                        )
                    }
                    toastr.error(errors[value]);
                })
                setTimeout(function() {
                    if ($('label.error').length > 0) {
                        $('label.error').remove();
                    }
                }, 5000)
            }
            $(form).find('[type="submit"]').removeAttr('disabled');
            $(form).find('[type="submit"] .spinner-border').remove();
        });
    });
</script>
@stack('stack-js')

</body>


</html>
