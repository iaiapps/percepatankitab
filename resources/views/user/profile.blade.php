@extends('layouts.app')

@section('title', 'Data Pengguna')
@section('content')

    <div class="mb-3">
        <div class="btn-group">
            <a href="{{ route('home') }}" class="btn btn-primary"> kembali</a>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row">
        <!-- Profil Card -->
        <div class="col-xl-4 col-lg-5">
            <div class="profile-card shadow p-3 text-center rounded">
                <div>
                    <img src="{{ asset('img/user.png') }}" alt="user" style="width: 70px">
                </div>
                <hr>
                <div class="text-start">
                    <div class="mb-3">
                        <label class="form-label text-muted">Email</label>
                        <p class="font-weight-bold">{{ $user->email }}</p>
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-muted">No Hp.</label>
                        <p class="font-weight-bold">{{ $user->no_hp ?? '-' }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Detail Profil -->
        <div class="col-xl-8 col-lg-7">
            <div class="profile-card shadow mb-3 p-3 rounded">
                <div class="card-header d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Informasi Profil</h6>
                    <button class="btn btn-sm btn-primary">
                        Edit
                    </button>
                </div>
                <hr>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label text-muted">Nama Lengkap</label>
                                <p class="font-weight-bold">{{ $user->name }}</p>
                            </div>
                            <div class="mb-3">
                                <label class="form-label text-muted">Bergabung Sejak</label>
                                <p class="font-weight-bold">{{ $user->created_at }}</p>
                            </div>
                            @if ($user->type == 'reseller' or $user->type == 'affiliator')
                                <div class="mb-3">
                                    <label class="form-label text-muted">Nama Bank</label>
                                    <p class="font-weight-bold">{{ $user->referral->nama_bank }}</p>
                                </div>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label text-muted">Username</label>
                                <p class="font-weight-bold">{{ $user->name }}</p>
                            </div>

                            <div class="mb-3">
                                <label class="form-label text-muted">Status</label>
                                <p class="font-weight-bold text-success">{{ $user->status == 1 ? 'Aktif' : 'Belum Aktif' }}
                                </p>
                            </div>
                            @if ($user->type == 'reseller' or $user->type == 'affiliator')
                                <div class="mb-3">
                                    <label class="form-label text-muted">Nomor Rekening</label>
                                    <p class="font-weight-bold ">{{ $user->referral->no_rekening }}
                                    </p>
                                </div>
                            @endif
                        </div>



                        <div class="mb-3">
                            <label class="form-label text-muted">Alamat</label>
                            <p class="text-muted mb-0">{{ $user->address ?? '-' }}</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
