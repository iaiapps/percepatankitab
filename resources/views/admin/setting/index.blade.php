@extends('layouts.app')

@section('title', 'Data Setting')
@section('content')
    <div class="card p-3 rounded">

        <div class="table-responsive">
            <div class="mb-3">
                <div class="btn-group">
                    <a href="{{ route('setting.create') }}" class="btn btn-primary"><i class="bi bi-plus-circle"></i>
                        Tambah Data</a>
                </div>
            </div>
            <div class="table-responsive">
                <table id="table" class="table table-striped align-middle" style="width: 100%">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Setting</th>
                            <th scope="col">Nilai</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Actions</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($settings as $setting)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $setting->name }}</td>
                                <td>{{ $setting->value }}</td>
                                <td> {{ $setting->description }}</td>

                                <td>
                                    <a href="{{ route('setting.edit', $setting->id) }}" class="btn btn-warning btn-sm"><i
                                            class="bi bi-pencil-square"></i>
                                        edit</a>

                                    <form onsubmit="return confirm('Apakah anda yakin untuk menghapus data ?');"
                                        action="{{ route('setting.destroy', $setting->id) }}" method="post"
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
