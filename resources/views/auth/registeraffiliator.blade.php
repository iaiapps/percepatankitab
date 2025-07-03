@extends('layouts.app-auth')
@section('title', 'Pendaftaran Reseller')

@section('content')
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
                                <h3 class="mb-0"><b>Formulir Pendaftaran Affiliator </b></h3>
                            </div>
                            <input type="text" value="affiliator" name="type" readonly hidden>
                            <input type="text" value="affiliator" name="formbuy" readonly hidden>
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
                            <div class="form-group mb-3">
                                <label class="form-label">Password (minimal 8 karakter)</label>
                                <input type="password" class="form-control" placeholder="********" name="password">
                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label">Ulangi Password</label>
                                <input type="password" class="form-control" placeholder="********"
                                    name="password_confirmation">
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
