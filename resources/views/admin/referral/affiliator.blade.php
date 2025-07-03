@extends('layouts.app')

@section('title', 'Data Affiliator')
@section('content')
    <div class="card p-3 rounded">

        <div class="table-responsive">

            <div class="table-responsive">
                <table id="table" class="table table-striped align-middle" style="width: 100%">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Kode affiliator</th>
                            <th scope="col">Komisi</th>
                            <th scope="col">Status</th>
                            <th scope="col">Aktifkan</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($affiliators as $affiliator)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $affiliator->user->name }}</td>
                                <td>{{ $affiliator->kode_referral }}</td>
                                <td><a href="{{ route('referral.show', $affiliator->id) }}"
                                        class="btn btn-primary btn-sm"><i class="bi bi-card-checklist"></i>
                                        lihat</a>
                                </td>
                                <td>{{ $affiliator->user->status == 1 ? 'aktif' : 'tidak aktif' }}</td>
                                <td>
                                    <form onsubmit="return confirm('Apakah anda yakin untuk mengubah data ?');"
                                        action="{{ route('activatereferral', $affiliator->id) }}" method="post"
                                        class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            aktifkan
                                        </button>
                                    </form>
                                </td>
                                <td>
                                    <a href="{{ route('referral.edit', $affiliator->id) }}"
                                        class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i>
                                        edit</a>


                                    <form onsubmit="return confirm('Apakah anda yakin untuk menghapus data ?');"
                                        action="{{ route('referral.destroy', $affiliator->id) }}" method="post"
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
