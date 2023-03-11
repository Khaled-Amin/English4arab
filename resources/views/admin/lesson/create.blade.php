<div class="modal fade" id="{{ $id }}" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-fullscreen p-9">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header header-bg">
                <!--begin::Modal title-->
                <h2 class="text-white">اضافة {{ $title }}
                </h2>
                <!--end::Modal title-->
                <!--begin::Close-->
                <div class="btn btn-sm btn-icon btn-color-white btn-active-color-primary" data-bs-dismiss="modal">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                transform="rotate(-45 6 17.3137)" fill="black" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)"
                                fill="black" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </div>
                <!--end::Close-->
            </div>
            <!--end::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body scroll-y m-5">
                <!--begin::Stepper-->
                <div class="stepper stepper-links d-flex flex-column" id="kt_create_account_stepper">
                    <!--begin::Nav-->
                    <div class="stepper-nav py-5">
                        <!--begin::Step 1-->
                        <div class="stepper-item current" data-kt-stepper-element="nav">
                            <h3 class="stepper-title">الرابط</h3>
                        </div>
                        <div class="stepper-item " data-kt-stepper-element="nav">
                            <h3 class="stepper-title">الوصف</h3>
                        </div>
                        <div class="stepper-item " data-kt-stepper-element="nav">
                            <h3 class="stepper-title">المحتوى</h3>
                        </div>

                        <!--end::Step 1-->
                    </div>
                    <!--end::Nav-->
                    <!--begin::Form-->
                    <form class="mx-auto mw-600px w-100 py-10 send-ajax" id="kt_create_account_form" method="post"
                        enctype="multipart/form-data" action="{{ $route }}">
                        <!--begin::Step 1-->
                        <div class="current row" data-kt-stepper-element="content">
                            <!--begin::Wrapper-->
                            @csrf
                            <div class="w-100">

                                <div class="mb-10 fv-row">
                                    <!--begin::Label-->
                                    <label class="form-label mb-3">العنوان</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" class="form-control form-control-lg form-control-solid"
                                        name="title" placeholder="title" />
                                    <!--end::Input-->
                                </div>


                                <div class="mb-10 fv-row">
                                    <!--begin::Label-->
                                    <label class="form-label mb-3">القسم</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <select name="section_id" class="form-select" data-control="select2"
                                        data-placeholder="Select an option">
                                        @foreach (App\Models\Section::select('title', 'id')->get() as $key => $item)
                                            <option value="{{ $item->id }}">{{ $item->title }}</option>
                                        @endforeach
                                    </select>
                                    <!--end::Input-->
                                </div>



                                <div class="fv-row mb-8">
                                    <label class="col-form-label text-right "> الصوره</label>
                                    <div class="custom-file">
                                        <input type="file" name="image" class="custom-file-input form-control" />
                                    </div>

                                </div>

                            </div>

                        </div>
                        <!--end::Step 1-->
                        <!--begin::Step 2-->
                        <div data-kt-stepper-element="content">
                            <!--begin::Wrapper-->
                            <div class="w-100">
                                <div class="mb-10 fv-row">
                                    <!--begin::Label-->
                                    <label class="form-label mb-3"> وصف مختصر </label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" class="form-control form-control-lg form-control-solid"
                                        name="desk" placeholder="" value="" />

                                </div>

                                <div class="mb-10 fv-row">
                                    <!--begin::Label-->
                                    <label class="form-label mb-3"> رابط الفديو </label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="url" class="form-control form-control-lg form-control-solid"
                                        name="link" />

                                </div>

                                <div class="mb-10 fv-row">
                                    <!--begin::Label-->
                                    <label class="form-label mb-3">نوع الفديو</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <select class="form-select" name="type" data-control="select2"
                                        data-placeholder="Select an option">
                                        @foreach (['vimeo' => 'vimeo', 'youtube' => 'youtube' , 'pdf' => 'pdf'] as $key => $item)
                                            <option value="{{ $key }}">{{ $item }}</option>
                                        @endforeach
                                    </select>
                                    <!--end::Input-->
                                </div>

                                <div class="mb-10 fv-row">
                                    <!--begin::Label-->
                                    <label class="form-label mb-3"> ترتيب الدرس </label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="number" class="form-control form-control-lg form-control-solid"
                                        name="index" />

                                </div>


                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Step 2-->
                        <!--begin::Step 2-->
                        <div data-kt-stepper-element="content">
                            <!--begin::Wrapper-->
                            <div class="w-100">
                                <div class="mb-10 fv-row">
                                    <!--begin::Label-->
                                    <label class="form-label mb-3"> Body </label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <textarea name="body" class="tox-target tinymce"></textarea>

                                </div>
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Step 2-->
                        <!--begin::Actions-->
                        <div class="d-flex flex-stack pt-15">
                            <!--begin::Wrapper-->
                            <div class="mr-2">
                                <button type="button" class="btn btn-lg btn-light-primary me-3"
                                    data-kt-stepper-action="previous">
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr063.svg-->
                                    <span class="svg-icon svg-icon-4 me-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1" transform="rotate(-180 18 13)" fill="currentColor"/>
                                        <path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z" fill="currentColor"/>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->رجوع
                                </button>
                            </div>
                            <!--end::Wrapper-->
                            <!--begin::Wrapper-->
                            <div>
                                <button type="submit" class="btn btn-lg btn-primary me-3"
                                    data-kt-stepper-action="submit">
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
                                <button type="button" class="btn btn-lg btn-primary" data-kt-stepper-action="next">
                                    التالى
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
                                    <span class="svg-icon svg-icon-4 ms-1 me-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <rect opacity="0.5" x="6" y="11" width="13" height="2" rx="1" fill="currentColor"/>
                                            <path d="M8.56569 11.4343L12.75 7.25C13.1642 6.83579 13.1642 6.16421 12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75L5.70711 11.2929C5.31658 11.6834 5.31658 12.3166 5.70711 12.7071L11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25C13.1642 17.8358 13.1642 17.1642 12.75 16.75L8.56569 12.5657C8.25327 12.2533 8.25327 11.7467 8.56569 11.4343Z" fill="currentColor"/>
                                            </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </button>
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Actions-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Stepper-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
@push('stack-js')
    <script src="/admin/assets/js/custom/modals/create-account.js"></script>
    <script>
                document.addEventListener('focusin', (e) => {
          if (e.target.closest(".tox-tinymce-aux, .moxman-window, .tam-assetmanager-root") !== null) {
            e.stopImmediatePropagation();
          }
        });
    </script>
@endpush
