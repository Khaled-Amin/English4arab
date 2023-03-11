<!DOCTYPE html>
<html lang="ar" dir="rtl">
<!--begin::Head-->
<head>
    <title> {{  settings('site_name')->value }} </title>
    <meta charset="utf-8" />
    <link rel="shortcut icon" href="{{ settings('favicon')->value }}" />
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tajawal:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Page Vendor Stylesheets(used by this page)-->
    <link href="/admin/assets/plugins/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Page Vendor Stylesheets-->
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="/admin/assets/plugins/global/plugins.bundle.rtl.css" rel="stylesheet" type="text/css" />
    <link href="/admin/assets/css/style.bundle.rtl.css" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->
    <style>.select2{width:100% !important}*:not(i):not(.fa):not(.fas){font-family: 'Tajawal', sans-serif;}</style>
</head>
<!--end::Head-->
<!--begin::Body-->
<body id="kt_body" class="page-bg">
<!--begin::Main-->
<div class="d-flex flex-column flex-root">
    <!--begin::Page-->
    <div class="page launcher d-flex flex-row flex-column-fluid me-lg-5" id="kt_page">
        <!--begin::Content-->
        <div class="d-flex flex-row-fluid">
            <!--begin::Container-->
            <div class="d-flex flex-column flex-row-fluid align-items-center">
                <!--begin::Menu-->
                <div class="d-flex flex-column flex-column-fluid mb-5 mb-lg-10">
                    <!--begin::Brand-->
                    <div class="d-flex flex-center pt-10 pt-lg-0 mb-10 mb-lg-0 h-lg-225px">
                        <!--begin::Sidebar toggle-->
                        <div class="btn btn-icon btn-active-color-primary w-30px h-30px d-lg-none me-4 ms-n15" id="kt_sidebar_toggle">
                            <!--begin::Svg Icon | path: icons/duotune/abstract/abs015.svg-->
                            <span class="svg-icon svg-icon-1">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
											<path d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z" fill="black" />
											<path opacity="0.3" d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z" fill="black" />
										</svg>
									</span>
                            <!--end::Svg Icon-->
                        </div>
                        <!--end::Sidebar toggle-->
                        <!--begin::Logo-->
                        <a >
                            <img alt="Logo" src="{{ settings('logo')->value }}" class="h-75px h-lg-80px" />
                        </a>
                        <!--end::Logo-->
                    </div>
                    <!--end::Brand-->
                    <!--begin::Row-->
                    <div class="row g-7 w-xxl-850px">
                        <!--begin::Col-->

                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-xxl-12">
                            <!--begin::Row-->
                            <div class="row g-lg-7">
                                <!--begin::Col-->
                                <div class="col-sm-6">
                                    <!--begin::Card-->
                                    <a href="{{ route('section.index') }}"  class="card border-0 shadow-none min-h-200px mb-7" style="background-color: #F9666E">
                                        <!--begin::Card body-->
                                        <div class="card-body d-flex flex-column flex-center text-center">
                                            <!--begin::Illustrations-->
                                            <img class="mw-100 h-100px mb-7 mx-auto" src="/admin/assets/media/illustrations/sigma-1/4.png" />
                                            <!--end::Illustrations-->
                                            <!--begin::Heading-->
                                            <h4 class="text-white fw-bolder text-uppercase">الاقسام</h4>
                                            <!--end::Heading-->
                                        </div>
                                        <!--end::Card body-->
                                    </a>
                                    <!--end::Card-->
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-sm-6">
                                    <!--begin::Card-->
                                    <a href="{{ route('coupon.index') }}"  class="card border-0 shadow-none min-h-200px mb-7" style="background-color: #35D29A">
                                        <!--begin::Card body-->
                                        <div class="card-body d-flex flex-column flex-center text-center">
                                            <!--begin::Illustrations-->
                                            <img class="mw-100 h-100px mb-7 mx-auto" src="/admin/assets/media/illustrations/sigma-1/5.png" />
                                            <!--end::Illustrations-->
                                            <!--begin::Heading-->
                                            <h4 class="text-white fw-bolder text-uppercase">كوبونات</h4>
                                            <!--end::Heading-->
                                        </div>
                                        <!--end::Card body-->
                                    </a>
                                    <!--end::Card-->
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Row-->
                            <!--begin::Card-->
                            <div class="card border-0 shadow-none min-h-200px" style="background-color: #D5D83D">
                                <!--begin::Card body-->
                                <div class="card-body d-flex flex-center flex-wrap">
                                    <!--begin::Illustrations-->
                                    <img class="mw-100 h-200px me-4 mb-5 mb-lg-0" src="/admin/assets/media/illustrations/sigma-1/11.png" />
                                    <!--end::Illustrations-->
                                    <!--begin::Wrapper-->
                                    <div class="d-flex flex-column align-items-center align-items-md-start flex-grow-1">
                                        <!--begin::Heading-->
                                        <h3 class="text-gray-900 fw-boldest text-uppercase mb-5"> الدروس </h3>
                                        <!--end::Heading-->
                                        <!--begin::List-->
                                        <!--end::List-->
                                        <!--begin::Link-->
                                        <a href="{{ route('lesson.index') }}"  class="btn btn-hover-rise text-gray-900 text-uppercase fs-7 fw-bolder" style="background-color: #EBEE51">القائمة</a>
                                        <!--end::Link-->
                                    </div>
                                    <!--end::Wrapper-->
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Card-->
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Row-->
                </div>
                <!--end::Menu-->
                <!--begin::Footer-->
                <div class="d-flex flex-column-auto flex-center">
                    <!--begin::Navs-->
                    <ul class="menu fw-bold order-1">
                        <li class="menu-item">
                            <a href="{{route('section.index')}}" target="_blank" class="menu-link text-white opacity-50 opacity-100-hover px-3">الاقسام</a>
                        </li>
                        <li class="menu-item">
                            <a href="{{route('lesson.index')}}" target="_blank" class="menu-link text-white opacity-50 opacity-100-hover px-3">الدروس</a>
                        </li>
                        <li class="menu-item">
                            <a href="{{route('book.index')}}" target="_blank" class="menu-link text-white opacity-50 opacity-100-hover px-3">الكتب</a>
                        </li>
                        <li class="menu-item">
                            <a href="{{route('coupon.index')}}" target="_blank" class="menu-link text-white opacity-50 opacity-100-hover px-3">الكوبونات</a>
                        </li>

                    </ul>
                    <!--end::Navs-->
                </div>
                <!--end::Footer-->
            </div>
            <!--begin::Content-->
        </div>
        <!--begin::Content-->
        <!--begin::Sidebar-->

        <!--end::Sidebar-->
    </div>
    <!--end::Page-->
    <!--begin::Modals-->
    <!--end::Modals-->
</div>
<!--end::Main-->
<script>var hostUrl = "/admin/assets/";</script>
<!--begin::Javascript-->
<!--begin::Global Javascript Bundle(used by all pages)-->
<script src="/admin/assets/plugins/global/plugins.bundle.js"></script>
<script src="/admin/assets/js/scripts.bundle.js"></script>
<!--end::Global Javascript Bundle-->
<!--begin::Page Vendors Javascript(used by this page)-->
<script src="/admin/assets/plugins/custom/fullcalendar/fullcalendar.bundle.js"></script>
<!--end::Page Vendors Javascript-->
<!--begin::Page Custom Javascript(used by this page)-->
<script src="/admin/assets/js/custom/modals/create-project.bundle.js"></script>
<script src="/admin/assets/js/custom/modals/create-account.js"></script>
<!--end::Page Custom Javascript-->
<!--end::Javascript-->
</body>
<!--end::Body-->
</html>
