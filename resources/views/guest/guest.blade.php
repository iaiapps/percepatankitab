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
    <style>
        .region-option {
            cursor: pointer;
            transition: all 0.2s;
            border: 2px solid transparent;
        }

        .region-option:hover {
            transform: scale(1.02);
            border-color: #0d6efd;
        }

        .region-option.active {
            border-color: #0d6efd;
            background-color: #f8f9fa;
        }

        .upload-btn {
            position: relative;
            overflow: hidden;
        }

        .upload-btn input[type="file"] {
            position: absolute;
            top: 0;
            right: 0;
            min-width: 100%;
            min-height: 100%;
            font-size: 100px;
            text-align: right;
            opacity: 0;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div id="app">
        <div class="container">
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

            {{-- <div class="card">
                <div class="card-body">
                    <p class="mb-1 fs-4">Selamat Datang di Aplikasi Percepatan Baca Kitab</p>
                </div>
            </div> --}}
            <div class="card">
                <div class="card-body">

                    @if (!isset($user->payment))
                        <p class="mb-3 fs-5 ">Sebelum melanjutkan, silahkan melakukan pembayaran terlebih dahulu dan
                            upload
                            bukti pembayaran!
                        </p>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#paymentModal">
                            Cara Pembayaran
                        </button>
                        <hr>
                    @else
                        <p class="bg-warning rounded p-2 text-center">Bukti pembayaran sudah diupload</p>

                        <p class="mb-3">Bukti Pembayaran akan diverifikasi dalam 1x24 jam. <br> <br> Setelah
                            berhasil,
                            akun
                            akan aktif. Jika akun belum aktif
                            silahkan hubungi admin.
                        </p>
                    @endif


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
            @include('guest.upload')
        </div>
    </div>

    {{-- modal --}}
    <div class="modal fade" id="paymentModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="paymentModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-primary ">
                    <h5 class="text-white mb-0">Pilih Wilayah Pengiriman</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Region Selection -->
                    <div id="regionSelection">
                        <div class="row mb-3">
                            <div class="col-md-6 mb-2">
                                <div class="p-3 region-option text-center bg-primary-subtle"
                                    onclick="selectRegion('jawa')">
                                    <h5>Pembayaran dalam Pulau Jawa</h5>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="p-3 region-option text-center bg-primary-subtle"
                                    onclick="selectRegion('luarJawa')">
                                    <h5>Pembayaran luar Pulau Jawa</h5>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Jawa Content (Hidden by default) -->
                    <div id="jawaContent" class="d-none">
                        <h5 class="mb-3">Pembayaran dalam Pulau Jawa</h5>
                        <ul class="mb-1 list-group">
                            <li class="list-group-item p-2">Harga buku: Rp 350.000</li>
                            <li class="list-group-item p-2">Ongkos kirim: Rp 15.000</li>
                            <li class="list-group-item p-2">kode unik "8" (cantumkan di akhir digit)</li>
                            <li class="list-group-item p-2">Metode pembayaran: Transfer Bank </li>
                            <li class="list-group-item p-2">Transfer ke rekening Bank BRI <span
                                    class="bg-warning p-1 rounded">623101025711536</span>
                                a/n
                                <span>MOCH ILYAS</span>
                            </li>
                        </ul>

                        <p class="mb-3 p-2 border border-primary">
                            Transfer sejumlah : <br> Rp. 350.000 + ongkir Rp. 15.000 + kode unik 8 <br> Total <span
                                class="p-1 bg-warning fs-5 rounded">Rp.
                                365.008</span>
                        </p>

                        <p class="mb-1 text-danger"> <i>Catatan: Estimasi pengiriman: 1-3 hari</i>
                        </p>
                        <hr>
                        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal"
                            data-bs-target="#upload">
                            Upload Pembayaran
                        </button>
                    </div>

                    <!-- Luar Jawa Content (Hidden by default) -->
                    <div id="luarJawaContent" class="d-none">
                        <h5 class="mb-3">Pembayaran luar Pulau Jawa</h5>
                        <ul class="mb-1 list-group">
                            <li class="list-group-item p-2">Harga buku: Rp 350.000</li>
                            <li class="list-group-item p-2">Ongkos kirim: Rp 25.000</li>
                            <li class="list-group-item p-2">kode unik "8" (cantumkan di akhir digit)</li>
                            <li class="list-group-item p-2">Metode pembayaran: Transfer Bank </li>
                            <li class="list-group-item p-2">Transfer ke rekening Bank BRI <span
                                    class="bg-warning p-1 rounded">623101025711536</span>
                                a/n
                                <span>MOCH ILYAS</span>
                            </li>
                        </ul>

                        <p class="mb-3 p-2 border border-primary">
                            Transfer sejumlah : <br> Rp. 350.000 + ongkir Rp. 25.000 + kode unik 8 <br> Total <span
                                class="p-1 bg-warning fs-5 rounded">Rp.
                                375.008</span>
                        </p>

                        <p class="mb-1 text-danger"> <i>Catatan: Estimasi pengiriman: 3-5 hari</i>
                        </p>
                        <hr>
                        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal"
                            data-bs-target="#upload">
                            Upload Pembayaran
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        function selectRegion(region) {
            // Hide region selection
            document.getElementById('regionSelection').classList.add('d-none');

            // Hide all content first
            document.getElementById('jawaContent').classList.add('d-none');
            document.getElementById('luarJawaContent').classList.add('d-none');

            // Show selected region content
            document.getElementById(region + 'Content').classList.remove('d-none');
        }

        function confirmPayment() {
            alert('Pembayaran berhasil dikonfirmasi!');
            // Close modal
            var modal = bootstrap.Modal.getInstance(document.getElementById('paymentModal'));
            modal.hide();

            // Reset view
            setTimeout(() => {
                document.getElementById('regionSelection').classList.remove('d-none');
                document.getElementById('jawaContent').classList.add('d-none');
                document.getElementById('luarJawaContent').classList.add('d-none');
            }, 500);
        }
    </script>
</body>

</html>
