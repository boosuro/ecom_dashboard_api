<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('dist/images/favicon.png') }}" />

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

    <div class="container-fluid page-body-wrapper full-page-wrapper">
        @yield('content')
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