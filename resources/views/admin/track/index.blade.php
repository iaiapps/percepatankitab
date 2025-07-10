@extends('layouts.app')

@section('title', 'Data Semua Pesan Terkirim')
@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show"> {{ $message }} <button type="button"
                class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="mb-3">
        {{-- <a href="{{ route('manualrun') }}" class="btn btn-primary">
            Manual Run</a> --}}

        <a href="{{ route('laporan') }}" class="btn btn-primary">Statistik Pengiriman</a>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="table" class="table table-striped align-middle" style="width: 100%">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama User</th>
                            <th scope="col">Nama Video</th>
                            {{-- <th scope="col">Status</th> --}}
                            <th scope="col">Terkirim pada</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tracks as $track)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $track->user->name }}</td>
                                <td>{{ $track->course->name }}</td>
                                {{-- <td> {{ $track->sent }}</td> --}}
                                <td> {{ \Carbon\Carbon::parse($track->sent_at)->isoFormat('DD MMMM YYYY') . ' - ' . \Carbon\Carbon::parse($track->sent_at)->isoFormat('HH:MM') }}
                                </td>

                                <td>
                                    <a href="{{ route('tracking.edit', $track->id) }}" class="btn btn-warning btn-sm"><i
                                            class="bi bi-pencil-square"></i>
                                        edit</a>
                                    <form onsubmit="return confirm('Apakah anda yakin untuk menghapus data ?');"
                                        action="{{ route('tracking.destroy', $track->id) }}" method="post"
                                        class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="bi bi-trash3"></i> del
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
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
