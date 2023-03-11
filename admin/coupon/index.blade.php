@php
$title = 'قائمة الكوبونات';
$active = 'الكوبونات';
$li = [['الكوبونات', route('coupon.index')], ['اضافة', route('coupon.create')]];
@endphp

@extends('layouts.admin')

@section('content')

    <div class="card card-custom gutter-b   ">
        <div class="card-header">
            <div class="card-title">
                <h3 class="card-label">
                    قائمة الكوبونات
                </h3>
            </div>
            <div class="card-toolbar">
                <a class="btn btn-md btn-primary" data-bs-toggle="modal" data-bs-target="#create_Lesson">
                    <span class="svg-icon svg-icon-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1"
                                transform="rotate(-90 11.364 20.364)" fill="black"></rect>
                            <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black"></rect>
                        </svg>
                    </span> اضافة
                </a>
            </div>
        </div>
        @if (count($Coupons))
            <div class="card-body">

                <table
                    class="datatable datatable-bordered datatable-head-custom table align-middle table-row-dashed fs-6 gy-5"
                    id="kt_datatable">
                    <thead>
                        <tr>
                            <th title="Slug">الكوبون </th>
                            <th title="Title">عدد الاجهزه</th>
                            <th title="Title">الاقسام</th>
                            <th title="تاريخ الانشاء ">تاريخ الانشاء </th>
                            <th title="التحكم ">التحكم </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($Coupons as $coupon)
                            <tr>
                                <td>{{ $coupon->key }}</td>
                                <td>{{ $coupon->number }}</td>
                                <td>
                                    @foreach ($coupon->sections as $section)
                                        <li> {{ $section->title }}</li>
                                    @endforeach
                                </td>
                                <td>{{ $coupon->created_at->diffForHumans() }}</td>
                                <td class="text-end">


                                    <a href="{{ route('coupon.change', $coupon) }}"
                                        class="btn btn-md btn-icon btn-{{ $coupon->status ? 'danger' : 'success' }} mr-2">
                                        @if ($coupon->status)
                                            <i class="fas fa-undo"></i>
                                        @else
                                            <i class="fa fa-upload" aria-hidden="true"></i>
                                        @endif
                                    </a>
                                    <a data-id="{{ $coupon->id }}" data-title="{{ $coupon->key }}"
                                        data-action="{{ route('coupon.destroy', $coupon) }}" data-bs-toggle="modal"
                                        data-bs-target="#deleteModel" class="btn btn-md btn-icon btn-danger mr-2">
                                        <span class="svg-icon svg-icon-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none">
                                                <path
                                                    d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z"
                                                    fill="black"></path>
                                                <path opacity="0.5"
                                                    d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z"
                                                    fill="black"></path>
                                                <path opacity="0.5"
                                                    d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z"
                                                    fill="black"></path>
                                            </svg>
                                        </span>
                                    </a>
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
                    <h2 class="fs-2x fw-bolder mb-10">Oops ...</h2>
                    <!--end::Title-->
                    <!--begin::Description-->
                    <p class="text-gray-400 fs-4 fw-bold mb-10">
                        لا يوجد محتوى
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

    @include('admin.coupon.create', [
        'id' => 'create_Lesson',
        'title' => 'كوبون',
        'route' => route('coupon.store'),
    ])

    @include('layouts.elements.deleteModel')

@endsection

@push('stack-js')
    <input type="hidden" id="ckeditor_url" value="{{ route('ckeditor.upload') }}">
    <script>
        var datatable = $('#kt_datatable').DataTable({}).on('draw', function() {
            KTMenu.createInstances();
        });

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
