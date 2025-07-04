@extends('layouts.app')
@section('title', 'Home')
@section('content')

    @php
        $user = Auth::user();
        $role = $user->getRoleNames()->first();
        // dd($role);
    @endphp
    <div class="card">
        <div class="card-body">
            <p class="mb-0 fs-5">Selamat Datang di Aplikasi Manajemen Percepatan Baca Kitab</p>
        </div>
    </div>


    @switch($role)
        @case($role == 'admin' or $role == 'operator')
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="card">
                        <div class="card-body pb-0 d-flex justify-content-between">
                            <p class="mb-0 fs-5">Pembayaran Baru :</p>
                            <p class="mb-0 fs-5 badge text-bg-primary">{{ count($payment->where('status', 'pending')) }}</p>

                        </div>
                        <hr>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="card">
                        <div class="card-body pb-0 d-flex justify-content-between">
                            <p class="mb-0 fs-5">Jumlah Pembeli :</p>
                            <p class="mb-0 fs-5 badge text-bg-primary">{{ count($users->where('type', 'pembeli')) }}</p>
                        </div>
                        <hr>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="card">
                        <div class="card-body pb-0 d-flex justify-content-between">
                            <p class="mb-0 fs-5">Jumlah Reseller :</p>
                            <p class="mb-0 fs-5 badge text-bg-primary">{{ count($users->where('type', 'reseller')) }}</p>

                        </div>
                        <hr>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="card">
                        <div class="card-body pb-0 d-flex justify-content-between">
                            <p class="mb-0 fs-5">Jumlah Affiliator :</p>
                            <p class="mb-0 fs-5 badge text-bg-primary">{{ count($users->where('type', 'affiliator')) }}</p>
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
        @break

        @case($role == 'user' and $user->status !== '1')
            @include('home.user_welcome')
        @break

        @case($role == 'user')
            <div class="card">
                <div class="card-body">
                    <p class="mb-2">Link menuju kelas</p>
                    <a href="{{ route('usercourse') }}" class="btn btn-primary mt-2">kelas</a>
                </div>
            </div>
        @break

        @case($role == 'reseller' and $user->status !== '1')
            @include('home.ref_welcome')
        @break

        @case($role == 'affiliator' and $user->status !== '1')
            @include('home.ref_welcome')
        @break

        @case($role == 'reseller')
            @if ($user->referral->nama_bank == 0)
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    Lengkapi bank dan nomor rekening! <a href="{{ route('databankres') }}" class="btn btn-secondary btn-sm">klik
                        disini</a>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="card">
                <div class="card-body">
                    <p class="mb-2">Link Reseller Anda adalah :</p>
                    <div class="mb-2 fs-5 p-2 bg-primary-subtle rounded"> <input type="text" id="inputToCopy"
                            class="form-control w-100 text-black" value="{{ url('formbuy?ref=') . $user->referral->kode_referral }}"
                            readonly>

                        <button class="btn btn-primary mt-2" onclick="copyInput()">Salin Teks</button>
                    </div>
                </div>

            </div>
        @break

        @case($role == 'affiliator')
            @if ($user->referral->nama_bank == 0)
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    Lengkapi bank dan nomor rekening! <a href="{{ route('databankaff') }}" class="btn btn-secondary btn-sm">klik
                        disini</a>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="card">
                <div class="card-body">
                    <p class="mb-2">Link Affiliate Anda adalah :</p>
                    <div class="mb-2 fs-5 p-2 bg-primary-subtle rounded"> <input type="text" id="inputToCopy"
                            class="form-control w-100 text-black" value="{{ url('formbuy?ref=') . $user->referral->kode_referral }}"
                            readonly>
                        <button class="btn btn-primary mt-2" onclick="copyInput()">Salin Teks</button>
                    </div>
                </div>

            </div>
        @break

        <div class="card text-center">
            <div class="card-body">
                <p class="mb-0 fs-5">Halaman yang dicari tidak ditemukan ...</p>
            </div>
        </div>

        @default
    @endswitch






@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $('#onload').modal('show');
        });



        function copyInput() {
            const input = document.getElementById('inputToCopy');
            input.select();
            document.execCommand('copy');
            alert('Teks disalin: ' + input.value);
        }
    </script>
@endpush
