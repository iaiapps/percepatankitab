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
            <p class="mb-2 fs-4">Selamat Datang di Aplikasi Manajemen Percepatan Baca Kitab</p>
        </div>
    </div>



    @if ($role !== 'admin' and $role !== 'operator')
        <div class="card">
            <div class="card-body">
                <a href="" class="btn btn-primary">menuju kelas</a>
            </div>
        </div>

        @if ($user->status !== '1')
            @include('home.user_welcome')
        @endif
    @else
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="card">
                    <div class="card-body pb-0 d-flex justify-content-between">
                        <p class="mb-0 fs-5">Pembayaran Baru :</p>
                        <p class="mb-0 fs-5 badge text-bg-primary">9999</p>

                    </div>
                    <hr>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="card">
                    <div class="card-body pb-0 d-flex justify-content-between">
                        <p class="mb-0 fs-5">Jumlah Pengguna :</p>
                        <p class="mb-0 fs-5 badge text-bg-primary">9999</p>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
    @endif
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $('#onload').modal('show');
        });
    </script>
@endpush
