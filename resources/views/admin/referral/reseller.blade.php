@extends('layouts.app')

@section('title', 'Data Reseller')
@section('content')
    <div class="card p-3 rounded">

        <div class="table-responsive">

            <div class="table-responsive">
                <table id="table" class="table table-striped align-middle" style="width: 100%">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Kode reseller</th>
                            <th scope="col">Komisi</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($resellers as $reseller)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $reseller->user->name }}</td>
                                <td>{{ $reseller->kode_reseller }}</td>
                                <td><a href="{{ route('referral.show', $reseller->id) }}" class="btn btn-primary btn-sm"><i
                                            class="bi bi-card-checklist"></i>
                                        lihat</a></td>
                                <td>
                                    <a href="{{ route('referral.edit', $reseller->id) }}" class="btn btn-warning btn-sm"><i
                                            class="bi bi-pencil-square"></i>
                                        edit</a>
                                    <form onsubmit="return confirm('Apakah anda yakin untuk menghapus data ?');"
                                        action="{{ route('referral.destroy', $reseller->id) }}" method="post"
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
