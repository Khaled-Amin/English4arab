@extends ('layouts.site')

@section('content')
    <section class="position-relative pb-0">
        <div class="gen-register-page-background" style="background-image: url('images/background/asset-3.jpeg');">
        </div>
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-sm-12 col-md-8">
                    <div class="text-center">
                        <form id="send-code" class="pms-form" method="POST" action="{{ route('setCoupon') }}">
                            <h4 class="text-center">
الرجاء ادخل الكود لفتح القسم                              
                            </h4>
                            @csrf
                            <input type="hidden" name="section" value="{{ @$section->slug }}" />
                            <ul class="pms-form-fields-wrapper pl-0 mb-5">
                                <li class="pms-field pms-user-login-field ">
                                    <label for="pms_user_login">
الكود *                                       
                                    </label>
                                    <div class="input-group flex-nowrap">
                                        <input id="code" name="key" type="text" required value="">
                                        <input type="submit" value="ارسال" class="btn">
                                    </div>

                                </li>
                            </ul>
                            <span id="pms-submit-button-loading-placeholder-text" class="d-none">
الرجاء الانتظار                                 
                            </span>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('stack-js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        let visitorId = "";
        const fpPromise = import('https://openfpcdn.io/fingerprintjs/v3')
            .then(FingerprintJS => FingerprintJS.load())
        fpPromise
            .then(fp => fp.get())
            .then(result => {
                // This is the visitor identifier:
                visitorId = result.visitorId
                console.log(visitorId);

            })

        $("#send-code").submit(function(e) {
            e.preventDefault();

            let form = this;
            var fd = {};
            $.each($(form).serializeArray(), function(key, input) {
                fd[input.name] = input.value;
            });
            fd["visitor_id"] = visitorId;
            $(form).find('[type="submit"]').append('<span class="spinner-border"></span>')
            $(form).find('[type="submit"]').attr('disabled', 'disabled')
            $(form).find('.error').remove();
            $.ajax({
                type: $(form).attr('method'),
                url: $(form).attr('action'),
                data: fd,
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
                    $(form).trigger("reset");
                    if (response.url)
                        location = response.url;
                }
                $(form).find('[type="submit"]').removeAttr('disabled');
                $(form).find('[type="submit"] .spinner-border').remove();
            }).
            fail(function(xhr, status, error) {
                if (xhr.responseJSON.message) {
                    Swal.fire({
                        title: xhr.responseJSON.message,
                        text: '{{ lang('site.Please try again') }}',
                        icon: 'error',
                        confirmButtonText: '{{ lang('site.OK') }}'
                    })
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
                    })
                    setTimeout(function() {
                        if ($('label.error').length > 0) {
                            $('label.error').remove();
                        }
                    }, 3000)
                }
                $(form).find('[type="submit"]').removeAttr('disabled');
                $(form).find('[type="submit"] .spinner-border').remove();
            });
        });
    </script>
@endpush
