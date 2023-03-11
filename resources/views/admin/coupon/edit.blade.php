@php
$title = 'قائمة الاكواد';
$active = 'الاكواد';
$li = [['الاكواد', route('coupon.index')], ['تعديل', '#']];
@endphp
@extends('layouts.admin')

@section('content')
    <div class="card card-custom gutter-b">
        <div class="card-header">
            <div class="card-title">
                <h3 class="card-label">
                    تعديل الكود : {{ $coupon->key }}
                </h3>
            </div>
        </div>
        <div class="card-body">


            <div class="modal-body scroll-y m-5">
                <!--begin::Stepper-->
                <div class="stepper stepper-links d-flex flex-column" id="kt_create_account_stepper">
                    <!--begin::Nav-->
                    <!--begin::Form-->

                    <form class="mx-auto mw-600px w-100 py-10 send-ajax" id="kt_create_account_form" method="post"
                        enctype="multipart/form-data" action="{{ route('coupon.update', $coupon) }}">

                        <!--begin::Step 1-->
                           @method('PUT')
                                 @csrf
                        <div class="w-100">
                            <div class="mb-10 fv-row">
                                <!--begin::Label-->
                                <label class="form-label mb-3">الكود</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" readonly class="form-control form-control-lg form-control-solid" name="key"
                                    placeholder="code" value="{{  $coupon->key }}" />
                                <!--end::Input-->
                            </div>

                            <div class="mb-10 fv-row">
                                <!--begin::Label-->
                                <label class="form-label mb-3">عدد الاجهزه</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="number" class="form-control form-control-lg form-control-solid"
                                    name="number" placeholder="number" value="{{  $coupon->number }}" />
                                <!--end::Input-->
                            </div>


                            <div class="mb-10 fv-row">
                                <!--begin::Label-->
                                <label class="form-label mb-3">الاقسام</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <select name="section_ids[]" class="form-select form-select-solid"
                                    data-control="select2" data-placeholder="Select an option" data-allow-clear="true"
                                    multiple="multiple">
                                    @foreach (App\Models\Section::select('title', 'id')->get() as $key => $item)
                                        <option value="{{ $item->id }}" {{ in_array($item->id , $coupon->sectionsIds()) ? 'selected' :''  }} >{{ $item->title }}</option>
                                    @endforeach
                                </select>
                                <!--end::Input-->
                            </div>

                        </div>
                        <!--begin::Actions-->
                        <div class="d-flex flex-stack pt-15">
                            <!--begin::Wrapper-->
                            <div class="mr-2">
                                <button type="button" class="btn btn-lg btn-light-primary me-3"
                                    data-kt-stepper-action="previous">
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr063.svg-->
                                    <span class="svg-icon svg-icon-4 me-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <rect opacity="0.5" x="6" y="11" width="13" height="2" rx="1" fill="currentColor"/>
                                            <path d="M8.56569 11.4343L12.75 7.25C13.1642 6.83579 13.1642 6.16421 12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75L5.70711 11.2929C5.31658 11.6834 5.31658 12.3166 5.70711 12.7071L11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25C13.1642 17.8358 13.1642 17.1642 12.75 16.75L8.56569 12.5657C8.25327 12.2533 8.25327 11.7467 8.56569 11.4343Z" fill="currentColor"/>
                                            </svg>
                                    </span>
                                    <!--end::Svg Icon-->رجوع 
                                </button>
                            </div>
                            <!--end::Wrapper-->
                            <!--begin::Wrapper-->
                            <div>
                                <button type="submit" class="btn btn-lg btn-primary me-3">
                                    <span class="indicator-label">ارسال 
                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
                                        <span class="svg-icon svg-icon-3 ms-2 me-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <rect opacity="0.5" x="6" y="11" width="13" height="2" rx="1" fill="currentColor"/>
                                            <path d="M8.56569 11.4343L12.75 7.25C13.1642 6.83579 13.1642 6.16421 12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75L5.70711 11.2929C5.31658 11.6834 5.31658 12.3166 5.70711 12.7071L11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25C13.1642 17.8358 13.1642 17.1642 12.75 16.75L8.56569 12.5657C8.25327 12.2533 8.25327 11.7467 8.56569 11.4343Z" fill="currentColor"/>
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </span>
                                    <span class="indicator-progress">الرجاء الانتظار...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                            </div>
                            <!--end::Wrapper-->
                        </div>
                   
 

                      
                    </form>

                </div>
                <!--end::Stepper-->
            </div>
        </div>
    </div>
@endsection
@push('stack-js')
    <script src="/admin/assets/js/custom/modals/create-account.js"></script>

    <input type="hidden" id="ckeditor_url" value="{{ route('ckeditor.upload') }}">
    <script src="/admin/assets/plugins/custom/tinymce/tinymce.bundle.js"></script>
    <script>
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
