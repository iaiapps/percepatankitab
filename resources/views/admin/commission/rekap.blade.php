@extends('layouts.app')

@section('title', 'Data Pembayaran Mingguan')
@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show"> {{ $message }} <button type="button"
                class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="mb-0">
        <a href="{{ route('commission.index') }}" class="btn btn-primary mb-3">
            kembali
        </a>
    </div>
    <div class="card p-3 rounded">
        <div class="container">
            <h4>Rekap Komisi Mingguan</h3>
                <p>Periode: <strong>{{ $start->format('d M Y') }}</strong> s.d <strong>{{ $end->format('d M Y') }}</strong>
                </p>

                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @if ($commissions->isEmpty())
                    <div class="alert alert-info">Tidak ada komisi yang belum dibayar minggu ini.</div>
                @else
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Referral</th>
                                <th>Jenis</th>
                                <th>User Pembeli</th>
                                <th>Tanggal Komisi</th>
                                <th>Nominal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($commissions as $i => $item)
                                <tr>
                                    <td>{{ $i + 1 }}</td>
                                    <td>{{ $item->referral->user->name ?? '-' }}</td>
                                    <td>{{ ucfirst($item->referral->user->type ?? '-') }}</td>
                                    <td>{{ $item->payment->user->name ?? '-' }}</td>
                                    <td>{{ $item->created_at->format('d M Y') }}</td>
                                    <td>Rp {{ number_format((int) str_replace('.', '', $item->nominal), 0, ',', '.') }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="5" class="text-end">Total Komisi:</th>
                                <th><strong>Rp
                                        {{ number_format((int) str_replace('.', '', $total), 0, ',', '.') }}</strong>
                                </th>
                            </tr>
                        </tfoot>
                    </table>

                    <form action="{{ route('commissions.payWeekly') }}" method="POST"
                        onsubmit="return confirm('Yakin ingin membayar semua komisi minggu ini?')">
                        @csrf
                        <button type="submit" class="btn btn-danger float-end">Konfirmasi dan Bayar Semua</button>
                    </form>
                @endif
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
