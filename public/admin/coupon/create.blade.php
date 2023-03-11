<div class="modal fade" id="{{ $id }}" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-fullscreen p-9">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header header-bg">
                <!--begin::Modal title-->
                <h2 class="text-white"> اضافة {{ $title }}
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
                    <h3 class="stepper-title">اضافة كوبون</h3>
                    <!--end::Nav-->
                    <!--begin::Form-->
                    <form class="mx-auto mw-600px w-100 py-10 send-ajax" id="kt_create_account_form" method="post"
                        enctype="multipart/form-data" action="{{ $route }}">
                        <!--begin::Step 1-->
                        @csrf
                        <div class="w-100">
                            <div class="mb-10 fv-row">
                                <!--begin::Label-->
                                <label class="form-label mb-3">الكوبون</label>
                                <!--end::Label-->
                                <!--begin::Input-->

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend" id="g_code">
                                        <span class="input-group-text" id="basic-addon1">@</span>
                                    </div>
                                    <input type="text" class="form-control" id="code" placeholder="code"
                                        aria-label="code" name="key" aria-describedby="basic-addon1">
                                </div>
                            </div>

                            <div class="mb-10 fv-row">
                                <!--begin::Label-->
                                <label class="form-label mb-3">عدد الاجهزه</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="number" class="form-control form-control-lg form-control-solid"
                                    name="number" placeholder="number" />
                                <!--end::Input-->
                            </div>


                            <div class="mb-10 fv-row">
                                <!--begin::Label-->
                                <label class="form-label mb-3"> الاقسام</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <select name="section_ids[]" class="form-select form-select-solid"
                                    data-control="select2" data-placeholder="Select an option" data-allow-clear="true"
                                    multiple="multiple">
                                    @foreach (App\Models\Section::select('title', 'id')->get() as $key => $item)
                                        <option value="{{ $item->id }}">{{ $item->title }}</option>
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
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <rect opacity="0.5" x="6" y="11" width="13" height="2" rx="1"
                                                fill="black" />
                                            <path
                                                d="M8.56569 11.4343L12.75 7.25C13.1642 6.83579 13.1642 6.16421 12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75L5.70711 11.2929C5.31658 11.6834 5.31658 12.3166 5.70711 12.7071L11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25C13.1642 17.8358 13.1642 17.1642 12.75 16.75L8.56569 12.5657C8.25327 12.2533 8.25327 11.7467 8.56569 11.4343Z"
                                                fill="black" />
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
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none">
                                                <rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1"
                                                    transform="rotate(-180 18 13)" fill="black" />
                                                <path
                                                    d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z"
                                                    fill="black" />
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
        function makeid(length) {
            var result = '';
            var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            var charactersLength = characters.length;
            for (var i = 0; i < length; i++) {
                result += characters.charAt(Math.floor(Math.random() *
                    charactersLength));
            }
            return result;
        }

        $("#g_code").click(function() {
            $("#code").val(makeid(16));
        });
    </script>
@endpush
