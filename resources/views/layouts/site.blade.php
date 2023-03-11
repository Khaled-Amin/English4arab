<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="utf-8">
    <meta name="keywords" content="{{ settings('site_desk')->value }}" />
    <meta name="description" content="{{ settings('site_desk')->value }}" />
    <meta name="author" content="7AMOOOD" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="apple-touch-icon" sizes="180x180" href="{{ settings('favicon')->value }}" />
    <link rel="icon" type="image/png" sizes="32x32" href="{{ settings('favicon')->value }}" />
    <link rel="icon" type="image/png" sizes="16x16" href="{{ settings('favicon')->value }}" />
    <link rel="shortcut icon" href="{{ settings('favicon')->value }}" />

    <meta name="apple-mobile-web-app-title" content="{{ settings('site_name')->value }}" />
    <meta name="application-name" content="{{ settings('site_name')->value }}" />


    <title>{{ @$section->title }} – {{ settings('site_name')->value }}</title>
    <!-- Favicon -->
    <meta property="og:title" content="{{ settings('site_name')->value }}" />
    <meta property="og:description" content="{{ settings('site_desk')->value }}" />
    <meta property="og:locale" content="{{ app()->getLocale() }}" />
    <!-- CSS bootstrap-->
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="/assets/css/bootstrap.min.css" />
    <!--  Style -->
    <link rel="stylesheet" href="/assets/css/style.css" />
    <!--  Responsive -->
    <link rel="stylesheet" href="/assets/css/responsive.css" />
</head>

<body>

    <!--=========== Loader =============-->
    <div id="gen-loading">
        <div id="gen-loading-center">
            <img src="{{ settings('logo')->value }}" alt="loading">
        </div>
    </div>
    <!--=========== Loader =============-->

    <!--========== Header ==============-->
    <header id="gen-header" class="gen-header-style-1 gen-has-sticky">
        <div class="gen-bottom-header">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg navbar-light justify-content-center">
                            <a class="navbar-brand" href="/">
                                <img class="img-fluid logo" src="{{ settings('logo')->value }}" alt="{{ settings('site_name')->value }}">
                            </a>

                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!--========== Header ==============-->

    <!-- breadcrumb -->
    <div class="gen-breadcrumb" style="background-image: url('images/background/asset-25.jpeg');">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav aria-label="breadcrumb">
                        <div class="gen-breadcrumb-title">
                            <h1>
                                {{ settings('site_name')->value }}
                            </h1>
                        </div>
                        @isset($section)
                            <div class="gen-breadcrumb-container">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="/">
                                            <i class="fas fa-home ml-2"></i>الرئسية</a>
                                    </li>
                                    <li class="breadcrumb-item active">
                                       <a href="/{{ $section->slug }}">{{ $section->title }}</a>
                                    </li>
                                </ol>
                            </div>
                        @endisset
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->

    <!-- Videos Style 1 -->
        @yield('content')
    <!-- Videos Style 1 -->

    <!-- footer start -->
    <footer id="gen-footer">
        <div class="gen-footer-style-1">
            <div class="mt-3">
                    <div class=" justify-content-center text-center">
                        <img src="{{ settings('logo')->value }}" class="gen-footer-logo" alt="{{ settings('site_name')->value }}">
                    </div>
           </div>
            <div class="gen-copyright-footer">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 align-self-center">
                            <span class="gen-copyright"><a> {{ settings('footer_desk')->value }} </a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer End -->

    <!-- رجوع -to-Top start -->
    <div id="back-to-top">
        <a class="top" id="top" href="#top"> <i class="ion-ios-arrow-up"></i> </a>
    </div>
    <!-- رجوع -to-Top end -->

    <!-- js-min -->
    <script src="/assets/js/jquery-3.6.0.min.js"></script>
    <script src="/assets/js/asyncloader.min.js"></script>
    <!-- JS bootstrap -->
    <script src="/assets/js/bootstrap.min.js"></script>
    <!-- owl-carousel -->
    <script src="/assets/js/owl.carousel.min.js"></script>
    <!-- counter-js -->
    <script src="/assets/js/jquery.waypoints.min.js"></script>
    <script src="/assets/js/jquery.counterup.min.js"></script>
    <!-- popper-js -->
    <script src="/assets/js/popper.min.js"></script>
    <script src="/assets/js/swiper-bundle.min.js"></script>
    <!-- Iscotop -->
    <script src="/assets/js/isotope.pkgd.min.js"></script>

    <script src="/assets/js/jquery.magnific-popup.min.js"></script>

    <script src="/assets/js/slick.min.js"></script>

    <script src="/assets/js/streamlab-core.js"></script>

    <script src="/assets/js/script.js"></script>
    
    @stack('stack-js')

</body>

</html>
