<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Vetsoft') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">



    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('/assets/img/favicons/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/img/favicons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/img/favicons/favicon-16x16.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicons/favicon.ico') }}">
    <link rel="manifest" href="{{ asset('assets/img/favicons/manifest.json') }}">
    <meta name="msapplication-TileImage" content="{{ asset('assets/img/favicons/mstile-150x150.png') }}">
    <meta name="theme-color" content="#ffffff">


    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700%7cPoppins:300,400,500,600,700,800,900&amp;display=swap" rel="stylesheet">
    <link href="{{ asset('/assets/vendors/overlayscrollbars/OverlayScrollbars.min.css" rel="') }}stylesheet">
    <link href="{{ asset('/assets/css/theme-rtl.min.css') }}" rel="stylesheet" id="style-rtl">
    <link href="{{ asset('/assets/css/theme.css') }}" rel="stylesheet" id="style-default">
    <link href="{{ asset('/assets/css/user-rtl.min.css') }}" rel="stylesheet" id="user-style-rtl">
    <link href="{{ asset('/assets/css/user.min.css') }}" rel="stylesheet" id="user-style-default">
    <script>
      var isRTL = JSON.parse(localStorage.getItem('isRTL'));
      if (isRTL) {
        var linkDefault = document.getElementById('style-default');
        var userLinkDefault = document.getElementById('user-style-default');
        linkDefault.setAttribute('disabled', true);
        userLinkDefault.setAttribute('disabled', true);
        document.querySelector('html').setAttribute('dir', 'rtl');
      } else {
        var linkRTL = document.getElementById('style-rtl');
        var userLinkRTL = document.getElementById('user-style-rtl');
        linkRTL.setAttribute('disabled', true);
        userLinkRTL.setAttribute('disabled', true);
      }
    </script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <script>
    var isFluid = JSON.parse(localStorage.getItem('isFluid'));
    if (isFluid) {
      var container = document.querySelector('[data-layout]');
      container.classList.remove('container');
      container.classList.add('container-fluid');
    }
  </script>

  
    
    @yield('styles')
</head>
<body>
   <div id="app">
        <main class="main content" id="top">
            <div class="container-fluid" data-layout="container">
                @include('layouts.navbar')
                <div class="content">
                    @include('layouts.header')
                    @yield('content')
                    @include('layouts.footer')
                </div>
            </div>
        </main>
    </div>
    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    <script src="{{ asset('/assets/js/config.js') }}"></script>
    <script src="{{ asset('/assets/vendors/overlayscrollbars/OverlayScrollbars.min.js') }}"></script>
    <script src="{{ asset('/assets/vendors/popper/popper.min.js') }}"></script>
    <script src="{{ asset('/assets/vendors/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/assets/vendors/anchorjs/anchor.min.js') }}"></script>
    <script src="{{ asset('/assets/vendors/is/is.min.js') }}"></script>
    <script src="{{ asset('/assets/vendors/fontawesome/all.min.js') }}"></script>
    <script src="{{ asset('/assets/vendors/lodash/lodash.min.js') }}"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <script src="{{ asset('/assets/vendors/list.js/list.min.js') }}"></script>
    <script src="{{ asset('/assets/js/theme.js') }}"></script>
    <script src="{{ asset('js/app.js') }}" ></script>

    <script>
      var navbarStyle = localStorage.getItem("navbarStyle");
      if (navbarStyle && navbarStyle !== 'transparent') {
        document.querySelector('.navbar-vertical').classList.add(`navbar-${navbarStyle}`);
      }
    </script>
    
    @yield('scripts')
</body>
</html>
