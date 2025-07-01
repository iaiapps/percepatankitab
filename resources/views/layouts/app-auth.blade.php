<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Percepatan Baca Kitab') }} | @yield ('title')</title>

    <!-- [Favicon] icon -->
    <link rel="icon" href={{ asset('mantis/dist/assets/images/favicon.svg') }} type="image/x-icon">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <!-- [Google Font] Family -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap"
        id="main-font-link">

    <!-- [Template CSS Files] -->
    <link rel="stylesheet" href={{ asset('mantis/dist/assets/css/style.css') }} id="main-style-link">
    <link rel="stylesheet" href={{ asset('mantis/dist/assets/css/style-preset.css') }}>
    {{-- endthemes --}}

    @stack('css')
</head>

<body>
    <div id="app">
        @yield('content')
    </div>
    @stack('scripts')
</body>

</html>
