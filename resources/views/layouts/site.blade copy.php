<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="robots" content="index, follow" />
    <meta name="googlebot" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1" />
    <meta name="bingbot" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1" />

    <link rel="apple-touch-icon" sizes="180x180" href="{{ settings('favicon')->value }}" />
    <link rel="icon" type="image/png" sizes="32x32" href="{{ settings('favicon')->value }}" />
    <link rel="icon" type="image/png" sizes="16x16" href="{{ settings('favicon')->value }}" />
    <link rel="shortcut icon" href="{{ settings('favicon')->value }}" />
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="{{ settings('site_color')->value }}" />

    <meta name="apple-mobile-web-app-title" content="{{ settings('site_name')->value }}" />
    <meta name="application-name" content="Alshark" />

    <meta name="msapplication-TileColor" content="{{ settings('site_color')->value }}" />
    <meta name="theme-color" content="{{ settings('site_color')->value }}" />

    <title>{{ @$page->meta_title }} – {{ settings('site_name')->value }}</title>
    <meta name="description" content="" />

    <meta property="og:url" content="site index | http://127.0.0.1:8000/" />
    <meta property="og:type" content="" />
    <meta property="og:title" content="{{ @$page->meta_title }}" />
    <meta property="og:description" content="{{ @$page->desk }}" />
    <meta property="og:image" content="{{ $page && $page->imageUrl ? $page->ImageUrl : settings('logo')->value }}" />
    <meta property="og:image:width" content="880" />
    <meta property="og:image:height" content="660" />
    <meta property="og:locale" content="en_US" />


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;1,100;1,300;1,400&display=swap"
        rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="/assets/css/bootstrap.rtl.min.css" rel="stylesheet">

    <link href="/assets/css/style.css" rel="stylesheet">
</head>

<body class="bg-light">
    <section id="nav" class="bg-primary py-3">
        <div class="container">
            <div class="row">
                <div class="col-8 col-md-6 d-flex justify-content-start align-items-center overflow-hidden">
                    @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                        @if ($localeCode != app()->getLocale())
                            <a hreflang="{{ $localeCode }}"
                                href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"
                                class="lang-select bg-secondary me-4 text-white py-1 px-4 rounded">
                                {{ $properties['native'] }}
                            </a>
                        @endif
                    @endforeach
                    <div class="search-group">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
                            <path d="M0 0h24v24H0V0z" fill="none" />
                            <path
                                d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z" />
                        </svg>
                        <input type="search" value="{{ isset($_GET['search']) ? $_GET['search'] : '' }}"
                            placeholder="بحث" class="py-1">
                    </div>
                </div>
                <div class="col-4 col-md-6 d-flex justify-content-end align-items-center">
                    <a href="/">
                        <img src="{{ settings('logo')->value }}" alt="Alshark" height="100">
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section id="menu">
        <div class="container pt-3 position-relative">
            <div class="d-block d-lg-none">
                <button title="Menu" data-toggle="header-mobile-drop" class="header-toggle">
                    <i aria-hidden="true"></i>
                </button>
            </div>
            <ul class="list-group list-group-horizontal menu-ul hide d-lg-flex">
                @if (loadMenu('top'))
                    @foreach (loadMenu('top') as $item)
                        @include('layouts.navLi', ['item' => $item])
                    @endforeach
                @endif
            </ul>
        </div>
    </section>

    @yield('content')

    <section id="footer" class="bg-primary">
        <div class="container py-3">
            <div class="row">
                <div class="col-12 col-md-4 order-md-first order-last">
                    <ul class="list-group list-group-horizontal justify-content-center justify-content-md-start">
                        <li class="list-group-item bg-transparent border-0 p-1">
                            <a href="{{ settings('linked_in')->value }}">
                                <img src="/assets/img/social/s1.png" alt="linked in" height="32">
                            </a>
                        </li>
                        <li class="list-group-item bg-transparent border-0 p-1">
                            <a href="{{ settings('youtube')->value }}">
                                <img src="/assets/img/social/s2.png" alt="linked in" height="32">
                            </a>
                        </li>
                        <li class="list-group-item bg-transparent border-0 p-1">
                            <a href="{{ settings('twitter')->value }}">
                                <img src="/assets/img/social/s3.png" alt="linked in" height="32">
                            </a>
                        </li>
                        <li class="list-group-item bg-transparent border-0 p-1">
                            <a href="{{ settings('instagram')->value }}">
                                <img src="/assets/img/social/s4.png" alt="linked in" height="32">
                            </a>
                        </li>
                        <li class="list-group-item bg-transparent border-0 p-1">
                            <a href="{{ settings('fb')->value }}">
                                <img src="/assets/img/social/s5.png" alt="linked in" height="32">
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-12 col-md-8">
                    <ul
                        class="list-group contact-menu list-group-horizontal flex-column flex-sm-row mb-4 mb-md-0 justify-content-center justify-content-md-end">
                        <li class="list-group-item p-0 me-sm-3 mb-2 mb-sm-0">
                            <a href="/contact" class="text-dark py-1 px-3 d-block pe-0">
                                {{ lang('site.E-Mail') }}
                                <span class="bg-light p-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"
                                        style="fill:var(--bs-dark)">
                                        <path d="M0 0h24v24H0V0z" fill="none" />
                                        <path d="M22 4H2v16h20V4zm-2 4l-8 5-8-5V6l8 5 8-5v2z" />
                                    </svg>
                                </span>
                            </a>
                        </li>
                        <li class="list-group-item p-0 me-sm-3 mb-2 mb-sm-0">
                            <a href="/contact" class="text-dark py-1 px-3 d-block pe-0">
                                {{ lang('site.Contact US') }}
                                <span class="bg-light p-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"
                                        style="fill:var(--bs-dark)">
                                        <path d="M0 0h24v24H0V0z" fill="none" />
                                        <path
                                            d="M21 15.46l-5.27-.61-2.52 2.52c-2.83-1.44-5.15-3.75-6.59-6.59l2.53-2.53L8.54 3H3.03C2.45 13.18 10.82 21.55 21 20.97v-5.51z" />
                                    </svg>
                                </span>
                            </a>
                        </li>
                        <li class="list-group-item p-0">
                            <a href="/contact" class="text-dark py-1 px-3 d-block pe-0">
                                {{ lang('site.Address and Map') }}
                                <span class="bg-light p-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"
                                        style="fill:var(--bs-dark)">
                                        <path d="M0 0h24v24H0z" fill="none" />
                                        <path
                                            d="M12 12c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2zm0-10c-4.2 0-8 3.22-8 8.2 0 3.32 2.67 7.25 8 11.8 5.33-4.55 8-8.48 8-11.8C20 5.22 16.2 2 12 2z" />
                                    </svg>
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-12 text-center text-light order-last mt-3 border-top pt-3">
                    {{ settings('footer_word')->value }}
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.min.js"></script>
    <script src="/assets/js/scripts.js"></script>





    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"
        integrity="sha512-37T7leoNS06R80c8Ulq7cdCDU5MNQBwlYoy1TX/WUsLFC2eYNqtKlV0QjH7r8JpG/S0GUMZwebnVFLPd6SU5yg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $(".send-ajax").submit(function(e) {
            e.preventDefault();

            let form = this;
            $(form).find('[type="submit"]').append('<span class="spinner-border"></span>')
            $(form).find('[type="submit"]').attr('disabled', 'disabled')
            $(form).find('.error').remove();
            $.ajax({
                type: $(form).attr('method'),
                url: $(form).attr('action'),
                data: $(form).serialize(),
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
    @stack('stack-js')

</body>

</html>
