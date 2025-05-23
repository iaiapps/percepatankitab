@extends('layouts.app')

@section('title', 'Data Kelas')
@section('content')

    @if ($permit == false)
        <div class="card">
            <div class="card-body">
                <p class="text-center fs-5 mb-0">Anda tidak diijinkan mengakses halaman ini...</p>
                <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#kode">
                    Masukkan Kode
                </button>
            </div>
        </div>
    @elseif($permit == true)
        @if (empty($courses) || count($courses) === 0)
            <div class="card">
                <div class="card-body">
                    <p class="text-center fs-5 mb-0">Belum ada kelas ...</p>
                </div>
            </div>
        @else
            <div class="row">
                @foreach ($courses as $course)
                    <div class="col-12 col-md-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <h4 class="mb-3">{{ $course->name }}</h4>
                                <img class="img-thumbnail" src="{{ $course->thumbnail_path }}" alt="thumbnail">
                                <p class="mt-3">{{ Str::limit($course->description, 150) }}</p>
                            </div>
                            <div class="card-footer text-center">
                                <button class="btn btn-primary">lihat</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    @endif

    @include('user.course.create')
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
