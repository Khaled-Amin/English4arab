<div class="toolbar d-flex flex-stack mb-3 mb-lg-5" id="kt_toolbar">
    <!--begin::Container-->
    <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack flex-wrap">
        <!--begin::Page title-->
        <div class="page-title d-flex flex-column me-5 py-2">
            <!--begin::Title-->
            <h1 class="d-flex flex-column text-dark fw-bolder fs-3 mb-0">{{ @$title }}</h1>
            <!--end::Title-->
            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 pt-1">
                @isset($li)
                @foreach($li as $item)
                <li class="breadcrumb-item text-muted">
                    <a href="{{@$item[1]}}" class="text-muted text-hover-primary">{{@$item[0]}}</a>
                </li>
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-200 w-5px h-2px"></span>
                </li>
                @endforeach
                @endisset
            </ul>
            <!--end::Breadcrumb-->
        </div>
        <!--end::Page title-->
        <!--begin::Actions-->
        <div class="d-flex align-items-center py-2">
            @yield('options')
        </div>
        <!--end::Actions-->
    </div>
    <!--end::Container-->
</div>