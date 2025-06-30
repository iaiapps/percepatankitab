<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Percepatan Baca Kitab') }} | @yield ('title')</title>

    <!-- [Favicon] icon -->
    <link rel="icon" href={{ asset('img/logo.png') }} type="image/x-icon">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap"
        id="main-font-link">

    <link rel="stylesheet" href={{ asset('mantis/dist/assets/css/style.css') }} id="main-style-link">
    <link rel="stylesheet" href={{ asset('mantis/dist/assets/css/style-preset.css') }}>

    @stack('css')
</head>

<body data-pc-preset="preset-1" data-pc-direction="ltr" data-pc-theme="light">
    <div id="app">
        @include('layouts.partials.loader')
        @include('layouts.partials.sidebar')
        @include('layouts.partials.header')

        <div class="pc-container">
            <div class="pc-content">
                @include('layouts.partials.title')
                @yield('content')
            </div>
        </div>
        @include('layouts.partials.footer')
    </div>

    <script src="{{ asset('assets/jquery/jquery-3.6.4.min.js') }}"></script>
    <script src="{{ asset('mantis/dist/assets/js/plugins/simplebar.min.js') }}"></script>
    <script src="{{ asset('mantis/dist/assets/js/pcoded.js') }}"></script>
    <script src="{{ asset('mantis/dist/assets/js/plugins/feather.min.js') }}"></script>


    @stack('scripts')
</body>

</html>
