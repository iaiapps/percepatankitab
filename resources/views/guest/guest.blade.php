<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Percepatan Baca Kitab') }}</title>

    <!-- [Favicon] icon -->
    <link rel="icon" href={{ asset('img/logo.png') }} type="image/x-icon">

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

    <link rel="stylesheet" href={{ asset('mantis/dist/assets/fonts/feather.css') }}>

    <!-- [Template CSS Files] -->
    <link rel="stylesheet" href={{ asset('mantis/dist/assets/css/style.css') }} id="main-style-link">
    <link rel="stylesheet" href={{ asset('mantis/dist/assets/css/style-preset.css') }}>
    {{-- endthemes --}}
    @stack('css')
</head>

<body data-pc-preset="preset-1" data-pc-direction="ltr" data-pc-theme="light">
    <div id="app">
        <div class="text-center">
            <div class="mb-1 pt-3 text-center">
                <a href="{{ route('home') }}" class="b-brand text-primary">
                    <img src="{{ asset('img/logo.png') }}" alt="logo" style="width: 100px">
                </a>
                <p class="mb-0 mt-1 fs-5">PERCEPATAN BACA KITAB</p>
            </div>
            <hr>
            <div class="text-center">
                <p class="fs-5"> {{ $user->name }}</p>
            </div>

            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show"> {{ $message }} <button
                        type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ $error }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endforeach
            @endif

            <div class="card">
                <div class="card-body">
                    <p class="mb-1 fs-4">Selamat Datang di Aplikasi Percepatan Baca Kitab</p>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <p class="mb-3 fs-5 ">Sebelum melanjutkan, silahkan upload bukti pembayaran
                        terlebih
                        dahulu!
                    </p>
                    <hr>
                    @if (isset($user->payment))
                        <p class="bg-warning rounded p-2">bukti pembayaran sudah diupload</p>
                        <button type="button" class="btn btn-primary mb-3" disabled data-bs-toggle="modal"
                            data-bs-target="#upload">
                            Upload Pembayaran
                        </button>
                    @else
                        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal"
                            data-bs-target="#upload">
                            Upload Pembayaran
                        </button>
                    @endif
                    <p class="mb-3 fs-5">Akun akan aktif dalam 1x24 jam</p>
                    <p class="mb-3 fs-5">Jika Akun belum aktif silahkan hubungi admin</p>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit" class="ms-2 btn btn-danger">logout</button>
                    </form>
                </div>
            </div>
            @include('guest.create')
        </div>
    </div>
</body>

</html>
