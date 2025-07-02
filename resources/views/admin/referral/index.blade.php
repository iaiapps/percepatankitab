@extends('layouts.app')

@section('title', 'Data Master Referral')
@section('content')
    <div class="card p-3 rounded">

        <div class="table-responsive">
            {{-- <div class="mb-3">
                <div class="btn-group">
                    <a href="{{ route('referral.create') }}" class="btn btn-primary"><i class="bi bi-plus-circle"></i>
                        Tambah Data</a>
                </div>
            </div> --}}
            <div class="table-responsive">
                <table id="table" class="table table-striped align-middle" style="width: 100%">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Kode Referral</th>
                            <th scope="col">Komisi</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($referrals->where('tipe', 'reseller') as $referral)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $referral->user->name }}</td>
                                <td>{{ $referral->kode_referral }}</td>
                                <td><a href="{{ route('referral.show', $referral->id) }}" class="btn btn-primary btn-sm"><i
                                            class="bi bi-card-checklist"></i>
                                        lihat</a></td>
                                <td>
                                    <a href="{{ route('referral.edit', $referral->id) }}" class="btn btn-warning btn-sm"><i
                                            class="bi bi-pencil-square"></i>
                                        edit</a>
                                    {{-- <form class="d-inline-block"
                                        onsubmit="return confirm('Apakah anda yakin untuk mereset password ?');"
                                        action="{{ route('reset.pass', ['id' => $referral->id]) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-secondary btn-sm"><i
                                                class="bi bi-arrow-clockwise"></i> reset
                                        </button>
                                    </form> --}}
                                    <form onsubmit="return confirm('Apakah anda yakin untuk menghapus data ?');"
                                        action="{{ route('referral.destroy', $referral->id) }}" method="post"
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
