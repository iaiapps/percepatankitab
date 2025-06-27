@extends('layouts.app')

@section('title', 'Data Ebook')
@section('content')
    <div class="btn-group">
        <a href="{{ route('ebook.create') }}" class="btn btn-primary mb-3"><i class="bi bi-plus-circle"></i>
            Tambah Data</a>
    </div>

    {{-- @if (empty($ebooks) || count($ebooks) === 0)
        <div class="card">
            <div class="card-body">
                <p class="text-center fs-5 mb-0">Belum ada data ...</p>
            </div>
        </div>
    @else
        <div class="row">
            @foreach ($ebooks as $ebook)
                <div class="col-12 col-md-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h4 class="mb-3">{{ $ebook->name }}</h4>
                            <img class="img-thumbnail" src="{{ $ebook->thumbnail_path }}" alt="thumbnail">
                            <p class="mt-3">{{ Str::limit($ebook->description, 150) }}</p>
                        </div>
                        <div class="card-footer">
                            <form onsubmit="return confirm('Apakah anda yakin untuk menghapus data ?');"
                                action="{{ route('ebook.destroy', $ebook->id) }}" method="post" class="d-inline">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">
                                    hapus
                                </button>
                            </form>

                            <a href="{{ route('ebook.show', $ebook->id) }}" class="btn btn-primary">lihat</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif --}}
    <div class="table-responsive bg-white rounded">
        <table id="table" class="table table-striped align-middle" style="width: 100%">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">File</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Actions</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($ebooks as $ebook)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $ebook->ebook_name }} <a href="{{ route('ebook.show', $ebook->id) }}"
                                class="btn btn-primary btn-sm ms-3">
                                lihat</a></td>
                        <td><img class="img-thumbnail" src="{{ $ebook->thumbnail_path }}" alt="thumbnail"></td>
                        <td> {{ $ebook->description }}</td>

                        <td>
                            <a href="{{ route('ebook.edit', $ebook->id) }}" class="btn btn-warning btn-sm"><i
                                    class="bi bi-pencil-square"></i>
                                edit</a>

                            <form onsubmit="return confirm('Apakah anda yakin untuk menghapus data ?');"
                                action="{{ route('ebook.destroy', $ebook->id) }}" method="post" class="d-inline">
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
