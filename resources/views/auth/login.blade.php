@extends('layouts.app-auth')
@section('title', 'Login')
@section('content')
    <div class="auth-main">
        <div class="auth-wrapper v3">
            <div class="auth-form">

                <div class="card my-5">
                    <div class="text-center mt-3 px-3">
                        <img src="{{ asset('img/logo.png') }}" alt="img" style="width: 100px">
                        <p class="fs-3">Percepatan Baca Kitab</p>
                        <hr>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="d-flex justify-content-between align-items-end mb-4">
                                <h3 class="mb-0"><b>Login</b></h3>
                                {{-- <a href="{{ route('register') }}" class="link-primary">Tidak punya akun?</a> --}}
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Alamat Email</label>
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Password</label>
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password" required
                                    autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            {{-- <div class="d-flex mt-1 justify-content-between">
                                <div class="form-check">
                                    <input class="form-check-input input-primary" type="checkbox" id="customCheckc1"
                                        checked="">
                                    <label class="form-check-label text-muted" for="customCheckc1">Keep me sign in</label>
                                </div>
                                <h5 class="text-secondary f-w-400">Forgot Password?</h5>
                            </div> --}}
                            <div class="d-grid mt-5">
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>
                        </form>
                    </div>
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
