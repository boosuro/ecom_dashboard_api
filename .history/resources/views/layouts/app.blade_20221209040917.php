<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('dist/iconfont/material-icons.css') }}">

    <link rel="stylesheet" href="{{ asset('dist/css/custom.css') }}">


    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('dist/css/vendor.styles.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/demo/light-template.css') }}">

    <link rel="stylesheet" href="{{ asset('dist/css/custom_material.css') }}">

    <link rel="stylesheet" href="{{ asset('css/dropify.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sweetalert2.css') }}">

    <link rel="stylesheet" href="{{ asset('plugins/lightbox/css/lightbox.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sweetalert2.css') }}">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    @stack('additional_css')

    <script src="{{ asset('js/getFile.js') }}"></script>


</head>

<body>
    @include('layouts.components.preloader')

    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <div id="ModalShowHandler"></div>
    <!-- inject:js -->
    <script src="{{ asset('dist/js/vendor.base.js') }}"></script>
    <script src="{{ asset('dist/js/vendor.bundle.js') }}"></script>
    <!-- endinject -->
    <!-- ChartJS - Text inside Circle -->
    <script src="{{ asset('dist/js/vendor-override/chartjs-doughnut.js') }}"></script>
    <!-- ChartJS End -->
    <!-- Custom js for this page-->
    <script src="{{ asset('dist/js/components/common-msb.js') }}"></script>
    <script src="{{ asset('dist/js/vendor-override/tooltip.js') }}"></script>
    <script src="{{ asset('js/dropify.js') }}"></script>
    <script src="{{ asset('dist/js/components/dropify.js') }}"></script>
    <script src="{{ asset('js/sweetalert2.all.js') }}"></script>
    <script src="{{ asset('dist/js/components/sweet-alert.js') }}"></script>
    <script src="{{ asset('dist/js/components/bootstrap-select.js') }}"></script>
    <script src="{{ asset('js/bootstrap-notify.js') }}"></script>
    <script src="{{ asset('plugins/lightbox/js/lightbox.js') }}"></script>
    <script src="{{ asset('js/sweetalert2.all.js') }}"></script>
    <script src="{{ asset('dist/js/components/sweet-alert.js') }}"></script>

    <script type="text/javascript">
        hidePreloader();

        $('div.alert').not('.alert-important').delay(7000).fadeToggle(300);
    </script>
    <!-- End custom js for this page-->

    @stack('additional_scripts')


</body>

</html>