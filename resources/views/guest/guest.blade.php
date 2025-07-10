@extends('layouts.app-auth')
@section('title', 'Pembayaran')
@section('content')

    <div class="row justify-content-center">
        <div class="col-12 col-md-6 ">
            <div class="p-3 bg-light-subtle border-bottom position-relative w-100">
                <div class="position-relative d-flex justify-content-end">
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm">logout</button>
                    </form>
                </div>
            </div>

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
                    <div class="alert alert-success alert-dismissible fade show"> {{ $message }} <button type="button"
                            class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
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
                        @if (!isset($user->payment->img))
                            <p>Selamat datang di aplikasi Percepatan Baca Kitab</p>
                            <p class="mb-3">Sebelum melanjutkan, silahkan melakukan pembayaran terlebih dahulu
                            </p>
                            <p>Kemudian upload bukti pembayaran!</p>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal"
                                data-bs-target="#paymentModal">
                                Cara Pembayaran
                            </button>
                            <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal"
                                data-bs-target="#upload">
                                Upload Bukti Pembayaran
                            </button>
                            <hr>
                        @else
                            <p class="bg-warning rounded p-2 text-center">Bukti pembayaran sudah diupload</p>
                            <p>Bukti Pembayaran akan diverifikasi dalam 1x24 jam.</p>
                            <p> Setelah berhasil verifikasi, akun akan aktif.</p>
                            <p>Notifikasi akan dikirim melalui nomor Whatsapp yang
                                telah didaftarkan
                            </p>
                            <p>Jika akun belum aktif silahkan hubungi admin.</p>
                            <p class="text-danger"><i>Anda bisa logout untuk menunggu notifikasi</i></p>
                        @endif
                    </div>
                </div>

            </div>
        </div>
        @include('guest.pembayaran')
        @include('guest.upload')

    </div>


@endsection

@push('css')
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
@endpush
@push('scripts')
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

        // function confirmPayment() {
        //     alert('Pembayaran berhasil dikonfirmasi!');
        //     // Close modal
        //     var modal = bootstrap.Modal.getInstance(document.getElementById('paymentModal'));
        //     modal.hide();

        //     // Reset view
        //     setTimeout(() => {
        //         document.getElementById('regionSelection').classList.remove('d-none');
        //         document.getElementById('jawaContent').classList.add('d-none');
        //         document.getElementById('luarJawaContent').classList.add('d-none');
        //     }, 500);
        // }
    </script>
@endpush
