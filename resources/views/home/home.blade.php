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
            {{-- <p>{{ $role }}</p> --}}
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
    @endif
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $('#onload').modal('show');
        });
    </script>
@endpush
