<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Percepatan Baca Kitab') }}</title>

    <!-- [Favicon] icon -->
    <link rel="icon" href={{ asset('mantis/dist/assets/images/favicon.svg') }} type="image/x-icon">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    {{-- themes --}}

    <!-- [Google Font] Family -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap"
        id="main-font-link">
    <!-- [Tabler Icons] https://tablericons.com -->
    <link rel="stylesheet" href={{ asset('mantis/dist/assets/fonts/tabler-icons.min.css') }}>
    <!-- [Feather Icons] https://feathericons.com -->
    <link rel="stylesheet" href={{ asset('mantis/dist/assets/fonts/feather.css') }}>
    <!-- [Font Awesome Icons] https://fontawesome.com/icons -->
    <link rel="stylesheet" href={{ asset('mantis/dist/assets/fonts/fontawesome.css') }}>
    <!-- [Material Icons] https://fonts.google.com/icons -->
    <link rel="stylesheet" href={{ asset('mantis/dist/assets/fonts/material.css') }}>
    <!-- [Template CSS Files] -->
    <link rel="stylesheet" href={{ asset('mantis/dist/assets/css/style.css') }} id="main-style-link">
    <link rel="stylesheet" href={{ asset('mantis/dist/assets/css/style-preset.css') }}>
    {{-- endthemes --}}
    @stack('css')
</head>

<body data-pc-preset="preset-1" data-pc-direction="ltr" data-pc-theme="light">
    <div id="app">
        @include('layouts.partials.loader')
        @include('layouts.partials.sidebar')
        @include('layouts.partials.header')

        <!-- [ Main Content ] start -->
        <div class="pc-container">
            <div class="pc-content">

                <!-- [ breadcrumb ] start -->
                @include('layouts.partials.title')
                <!-- [ breadcrumb ] end -->
                @yield('content')

                <!-- [ Main Content ] start -->

            </div>
        </div>
        @include('layouts.partials.footer')
    </div>

    <!-- [Page Specific JS] start -->
    <script src={{ asset('mantis/dist/assets/js/plugins/apexcharts.min.js') }}></script>
    <script src={{ asset('mantis/dist/assets/js/pages/dashboard-default.js') }}></script>
    <!-- [Page Specific JS] end -->
    <!-- Required Js -->
    <script src={{ asset('mantis/dist/assets/js/plugins/popper.min.js') }}></script>
    <script src={{ asset('mantis/dist/assets/js/plugins/simplebar.min.js') }}></script>
    <script src={{ asset('mantis/dist/assets/js/plugins/bootstrap.min.js') }}></script>
    <script src={{ asset('mantis/dist/assets/js/fonts/custom-font.js') }}></script>
    <script src={{ asset('mantis/dist/assets/js/fonts/custom-ant-icon.js') }}></script>
    <script src={{ asset('mantis/dist/assets/js/pcoded.js') }}></script>
    <script src={{ asset('mantis/dist/assets/js/plugins/feather.min.js') }}></script>


    <script>
        layout_change('light');
    </script>

    <script>
        change_box_container('false');
    </script>

    <script>
        layout_rtl_change('false');
    </script>

    <script>
        preset_change('preset-1');
    </script>

    <script>
        font_change('Public-Sans');
    </script>
    @stack('scripts')
</body>

</html>
