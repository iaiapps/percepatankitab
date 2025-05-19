@extends('layouts.app-auth')

@section('content')
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    <!-- [ Pre-loader ] End -->

    <div class="auth-main">
        <div class="auth-wrapper v3">
            <div class="auth-form">
                <div class="card my-5">
                    <form method="POST" action="{{ route('register') }}">
                        <div class="card-body">
                            @csrf
                            <div class="d-flex justify-content-between align-items-end mb-4">
                                <h3 class="mb-0"><b>Daftar</b></h3>
                                <a href="#" class="link-primary">Sudah punya akun?</a>
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" placeholder="First Name">
                            </div>
                            {{-- <div class="form-group mb-3">
                                <label class="form-label">Alamat</label>
                                <input type="text" class="form-control" placeholder="Alamat">
                            </div> --}}
                            <div class="form-group mb-3">
                                <label class="form-label">Email Address*</label>
                                <input type="email" class="form-control" placeholder="Email Address">
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Nomor Hp</label>
                                <input type="email" class="form-control" placeholder="Nomor Hp">
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control" placeholder="Password">
                            </div>
                            <p class="mt-4 text-sm text-muted">By Signing up, you agree to our <a href="#"
                                    class="text-primary"> Terms of Service </a> and <a href="#" class="text-primary">
                                    Privacy Policy</a></p>
                            <div class="d-grid mt-3">
                                <button type="submit" class="btn btn-primary">Create Account</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="auth-footer row">

                    <div class="col my-1 text-center">
                        <p class="m-0">Copyright © <a href="#">Percepatan Baca Kitab</a></p>
                    </div>
                    {{-- <div class="col-auto my-1">
                        <ul class="list-inline footer-link mb-0">
                            <li class="list-inline-item"><a href="#">Home</a></li>
                            <li class="list-inline-item"><a href="#">Privacy Policy</a></li>
                            <li class="list-inline-item"><a href="#">Contact us</a></li>
                        </ul>
                    </div> --}}

                </div>
            </div>
        </div>
    </div>
@endsection
