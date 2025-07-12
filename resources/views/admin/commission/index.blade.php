@extends('layouts.app')

@section('title', 'Data Pembayaran')
@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show"> {{ $message }} <button type="button"
                class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card p-3 rounded">
        <div class="table-responsive">
            <div class="mb-3">
                <a href="{{ route('commissions.rekap') }}" class="btn btn-primary mb-3">
                    Rekap & Bayar Mingguan
                </a>
            </div>
            <div class="table-responsive">
                <table id="table" class="table table-striped align-middle align-middle" style="width: 100%">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Referral</th>
                            <th scope="col">Pembayaran</th>
                            <th scope="col">Komisi</th>
                            <th scope="col">Bayar</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($commissions as $commission)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $commission->referral->user->name }}</td>
                                <td>{{ $commission->referral->tipe }}</td>
                                <td>{{ $commission->status }} :
                                    {{ $commission->paid_at ? \Carbon\Carbon::parse($commission->paid_at)->isoFormat('DD MMMM YYYY, HH:MM') : '-' }}
                                </td>
                                <td> Rp {{ number_format((int) str_replace('.', '', $commission->nominal), 0, ',', '.') }}
                                </td>
                                <td>
                                    @if ($commission->status == 'pending')
                                        <form class="d-block"
                                            onsubmit="return confirm('Apakah anda yakin untuk mengubah data?');"
                                            action="{{ route('commissions.pay', $commission->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-primary btn-sm"> bayar
                                            </button>
                                        </form>
                                    @elseif ($commission->status == 'paid')
                                        <button type="submit" class="btn btn-primary btn-sm" disabled> bayar
                                        </button>
                                    @else
                                        <p>tidak dapat menentukan status ...</p>
                                    @endif

                                </td>
                                <td>
                                    <form class="d-block"
                                        onsubmit="return confirm('Apakah anda yakin untuk menghapus data ?');"
                                        action="{{ route('commission.destroy', $commission->id) }}" method="post"
                                        class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="bi bi-trash3"></i> hapus
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
