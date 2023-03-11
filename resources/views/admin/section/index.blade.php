@php
$title = "قائمة الاقسام";
$active = "الاقسام";
$li = [
[ 'الاقسام' , route('section.index')]

];
@endphp

@extends('layouts.admin')

@section('content')

<div class="card card-custom gutter-b   ">
    <div class="card-header">
        <div class="card-title">
            <h3 class="card-label">
                القائمة
            </h3>
        </div>
        <div class="card-toolbar">
            <a class="btn btn-md btn-primary" data-bs-toggle="modal" data-bs-target="#create_Section">
                <span class="svg-icon svg-icon-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="black"></rect>
                        <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black"></rect>
                    </svg>
                </span> 
                اضافة
            </a>
        </div>
    </div>
    @if( count($Sections) )
    <div class="card-body">

        <table class="datatable datatable-bordered datatable-head-custom table align-middle table-row-dashed fs-6 gy-5" id="kt_datatable">
            <thead>
                <tr>
                    <th title="Slug">الرابط</th>
                    <th title="Title">العنوان</th>
                    <th title="تاريخ الانشاء ">تاريخ الانشاء </th>
                    <th title="التحكم ">التحكم </th>
                </tr>
            </thead>
            <tbody>
                @foreach($Sections as $Section)
                <tr>
                    <td>{{$Section->slug}}</td>
                    <td>{{$Section->title}}</td>
                    <td>{{$Section->created_at->diffForHumans()}}</td>
                    <td class="text-end">
                        <a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">خيارات
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                            <span class="svg-icon svg-icon-5 m-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="black" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </a>
                        <!--begin::Menu-->
                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="/{{$Section->slug}}" target="_blank" class="menu-link px-3">عرض</a>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="{{ route('section.edit' , $Section)  }}" class="menu-link px-3">تعديل</a>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu item-->
                            @if($Section->base == 0)
                            <div class="menu-item px-3">
                                <a data-id="{{$Section->id}}" data-title="{{$Section->title}}" data-action="{{ route('section.destroy',$Section) }}" data-bs-toggle="modal" data-bs-target="#deleteModel" class="menu-link px-3">مسح</a>
                            </div>
                            @endif
                            <!--end::Menu item-->
                        </div>
                        <!--end::Menu-->
                    </td>


                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
    @else
    <div class="card-body p-0">
        <!--begin::Wrapper-->
        <div class="card-px text-center py-20 my-10">
            <!--begin::Title-->
            <h2 class="fs-2x fw-bolder mb-10">للاسف ...</h2>
            <!--end::Title-->
            <!--begin::Description-->
            <p class="text-gray-400 fs-4 fw-bold mb-10">
                No content Available
            </p>
            <!--end::Description-->
        </div>
        <!--end::Wrapper-->
        <!--begin::Illustration-->
        <div class="text-center px-4">
            <img class="mw-100 mh-300px" alt="" src="/admin/assets/media/illustrations/sigma-1/2.png">
        </div>
        <!--end::Illustration-->
    </div>
    @endif
</div>

@include('admin.section.create' , ['id' => 'create_Section' ,'title' => 'قسم' , 'route' => route('section.store') ])

@include('layouts.elements.deleteModel')

@endsection

@push('stack-js')
<input type="hidden" id="ckeditor_url" value="{{ route('ckeditor.upload') }}">
<script>
    var datatable = $('#kt_datatable').DataTable({}).on('draw',function(){KTMenu.createInstances();});

    if ($('.tinymce'))
        createCK('.tinymce')

    function createCK(selectore) {
        tinymce.init({
            selector: selectore,
            menubar: false,
            automatic_uploads: true,
            images_upload_handler: function(blobInfo, success, failure) {
                var xhr, formData;
                xhr = new XMLHttpRequest();
                xhr.withCredentials = false;
                var url = $("#ckeditor_url").val();
                xhr.open('POST', url);
                var token = '{{ csrf_token() }}';
                xhr.setRequestHeader("X-CSRF-Token", token);
                xhr.onload = function() {
                    var json;
                    if (xhr.status != 200) {
                        failure('HTTP Error: ' + xhr.status);
                        return;
                    }
                    json = JSON.parse(xhr.responseText);

                    if (!json || typeof json.location != 'string') {
                        failure('Invalid JSON: ' + xhr.responseText);
                        return;
                    }
                    success(json.location);
                };
                formData = new FormData();
                formData.append('file', blobInfo.blob(), blobInfo.filename());
                xhr.send(formData);
            },

            //            images_upload_url: '/upload',
            toolbar: ['styleselect fontselect fontsizeselect',
                'undo redo | cut copy paste | bold italic | link image | alignleft aligncenter alignright alignjustify',
                'bullist numlist | outdent indent | blockquote subscript superscript | advlist | autolink | lists charmap | print preview |  code | forecolor backcolor'
            ],
            plugins: 'advlist autolink link image lists charmap print preview code'
        });
    }
</script>
@endpush