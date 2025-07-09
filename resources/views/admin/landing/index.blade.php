@extends('layouts.app')

@section('title', 'Setting Landing Page')
@section('content')
    <div class="card p-3 rounded">

        <div class="table-responsive">
            {{-- <div class="mb-3">
                <div class="btn-group">
                    <a href="{{ route('settinglanding.create') }}" class="btn btn-primary"><i class="bi bi-plus-circle"></i>
                        Tambah Data</a>
                </div>
            </div> --}}
            <div class="table-responsive">
                <table id="#" class="table table-striped align-middle" style="width: 100%">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Nilai</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Actions</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($landings as $landing)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $landing->name }}</td>
                                <td>{{ $landing->value }}</td>
                                <td> {{ $landing->description }}</td>

                                <td>
                                    <a href="{{ route('settinglanding.edit', $landing->id) }}"
                                        class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i>
                                        edit</a>

                                    {{-- <form onsubmit="return confirm('Apakah anda yakin untuk menghapus data ?');"
                                        action="{{ route('landing.destroy', $landing->id) }}" method="post"
                                        class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="bi bi-trash3"></i> del
                                        </button>
                                    </form> --}}
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
