@extends('layouts.app')
@section('title', 'Home')
@section('content')

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
            <h4 class="mb-2 f-w-400 ">Selamat Datang di Aplikasi Manajemen Percepatan Baca Kitab</h4>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <p class="mb-3 fs-5">Sebelum melanjutkan, silahkan upload bukti pembayaran terlebih dahulu!</p>

            <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#upload">
                Upload Pembayaran
            </button>

            <p class="mb-3 fs-5">Akun akan aktif dalam 1x24 jam</p>
        </div>
    </div>

    @include('guest.create')
@endsection
