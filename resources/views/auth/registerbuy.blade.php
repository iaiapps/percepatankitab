@extends('layouts.app-auth')

@section('content')
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>

    <div class="auth-main">
        <div class="auth-wrapper v3">
            <div class="auth-form">

                <div class="card my-5">
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ $error }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endforeach
                    @endif
                    <form method="POST" action="{{ route('register') }}">
                        <div class="card-body">
                            @csrf
                            <div class="d-flex justify-content-between align-items-end mb-4">
                                <h3 class="mb-0"><b>Isi Formulir Pembelian</b></h3>
                                {{-- <a href="{{ route('login') }}" class="link-primary">Sudah punya akun?</a> --}}
                            </div>
                            <input type="text" value="passwordformbuy" name="formbuy" readonly>
                            <div class="form-group mb-3">
                                <label class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" placeholder="Nama Lengkap" name="name">
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">alamat Email</label>
                                <input type="email" class="form-control" placeholder="Alamat Email" name="email">
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Nomor Hp (aktif WA)</label>
                                <input type="text" class="form-control" placeholder="085123xxxxxx" name="no_hp">
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Alamat Lengkap</label>
                                <textarea class="form-control" aria-label="With textarea" name="address"></textarea>
                            </div>

                            <div class="d-grid mt-3">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="auth-footer row">

                    <div class="col my-1 text-center">
                        <p class="m-0">Copyright © <a href="#">Percepatan Baca Kitab</a></p>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
