@extends('layouts.app-landing')

@section('title', 'Input Data')
@section('content')
    <div class="container">
        <div class="text-center">
            <img src="{{ asset('img/logo.png') }}" class="logo" alt="logo">
        </div>
        <div class="row justify-content-center align-items-center">
            <div class="col-md-6 col-12">
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ $error }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endforeach
                @endif
                <p class="fs-5 text-center bg-primary-subtle rounded p-3 ">Sebelum lanjut mohon mengisi data
                    berikut ini ...
                </p>
                <hr>
                <div class="card p-3">
                    <form action="{{ route('quizzdatastore') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama" name="name">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Password</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                        <div class="mb-3">
                            <label for="no_hp" class="form-label">No Hp</label>
                            <input type="text" class="form-control" id="no_hp" name="no_hp">
                        </div>
                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-primary w-50">Mulai Test!</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('css')
    <style>
        .logo {
            width: 100px;
            margin-top: 20px;
            margin-bottom: 20px;
        }
    </style>
@endpush
