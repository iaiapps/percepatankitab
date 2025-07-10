@extends('layouts.app')

@section('title', 'Data Semua Pesan Terkirim')
@section('content')


    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show"> {{ $message }} <button type="button"
                class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div>
        <a href="{{ route('tracking.index') }}" class="btn btn-primary mb-3">
            Kembali</a>
        <a href="{{ route('manualrun') }}" class="btn btn-primary mb-3">
            Kirim Manual Pada Hari Ini</a>
    </div>

    <p class="fs-4 mb-3">Dashboard Monitoring Video</p>
    <hr>
    <div class="card mb-4">
        <div class="card-header">1️⃣ User yang Belum Dikirimi Semua Video</div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>No HP</th>
                        <th>Dikirim</th>
                        <th>Harusnya</th>
                        <th>Sisa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        @if ($user->trackvideos_count < $totalVideos)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->no_hp }}</td>
                                <td>{{ $user->trackvideos_count }}</td>
                                <td>{{ $totalVideos }}</td>
                                <td>{{ $totalVideos - $user->trackvideos_count }}</td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-header">2️⃣ Deteksi Video yang Tidak Terkirim (Missing)</div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Video yang Hilang</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($missing as $row)
                        <tr>
                            <td>{{ $row['user']->name }}</td>
                            <td>
                                @foreach ($row['missing_courses'] as $course)
                                    <span class="badge bg-danger">#{{ $course->id }} - {{ $course->name }}</span>
                                @endforeach
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2">✅ Semua video terkirim dengan urut.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-header">3️⃣ Statistik Total Kiriman Video</div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Dikirim</th>
                        <th>Total Video</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->trackvideos_count }}</td>
                            <td>{{ $totalVideos }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


@endsection
@push('css')
    <link rel="stylesheet" href="{{ asset('assets/datatables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pagination.css') }}">

    <style>
        .img-thumbnail {
            width: 90%;
        }
    </style>
@endpush
@push('scripts')
    <script src="{{ asset('assets/datatables/datatables.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#table').DataTable({
                "pageLength": 50
            });
        });
    </script>
@endpush
