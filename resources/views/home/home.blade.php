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
            <h4 class="mb-2 f-w-400 ">Selamat Datang di Aplikasi Manajemen Percepatan Baca Kitab</h4>
        </div>
    </div>
    @if ($role !== 'admin' and $role !== 'operator')
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
