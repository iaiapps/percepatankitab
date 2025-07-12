@extends('layouts.app')

@section('title', 'Data Pembayaran Mingguan')
@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show"> {{ $message }} <button type="button"
                class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="mb-3">
        <a href="{{ route('commission.index') }}" class="btn btn-primary">Kembali</a>
    </div>

    <div class="card p-4">
        <h3>Rekap Komisi Mingguan</h4>
            <p class="fs-5 mb-0">Periode: <strong>{{ $start->format('d M Y') }}</strong> s.d
                <strong>{{ $end->format('d M Y') }}</strong>
            </p>
            <hr>
            @if ($resellerGrouped->isEmpty() && $affiliatorGrouped->isEmpty())
                <div class="alert alert-info">Tidak ada komisi yang belum dibayar minggu ini.</div>
            @else
                {{-- Ringkasan --}}
                <div class="row mb-4">
                    <div class="col-md-4">
                        <div class="card bg-success text-white">
                            <div class="card-body py-2">
                                <h5>Reseller</h5>
                                <p>Total: <strong>Rp {{ number_format($totalReseller, 0, ',', '.') }}</strong></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card bg-info text-white">
                            <div class="card-body py-2">
                                <h5>Affiliator</h5>
                                <p>Total: <strong>Rp {{ number_format($totalAffiliator, 0, ',', '.') }}</strong></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card bg-dark text-white">
                            <div class="card-body py-2">
                                <h5 class="text-white">Total Semua</h5>
                                <p>Total: <strong>Rp {{ number_format($total, 0, ',', '.') }}</strong></p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Komisi Reseller --}}
                <h5 class="mb-0">Komisi Reseller</h5>
                <hr>
                @foreach ($resellerGrouped as $referralUser => $items)
                    <div class="mb-4">
                        <p>Referral: <strong>{{ $referralUser }}</strong> |
                            Nama Bank : <strong>{{ $items->first()->referral->nama_bank }}</strong> |
                            Nomor Rekening : <strong>{{ $items->first()->referral->no_rekening }}</strong>
                        </p>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Pembeli</th>
                                    <th>Tanggal</th>
                                    <th>Nominal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $subtotal = 0; @endphp
                                @foreach ($items as $i => $item)
                                    @php $subtotal += $item->nominal; @endphp
                                    <tr>
                                        <td>{{ $i + 1 }}</td>
                                        <td>{{ $item->payment->user->name ?? '-' }}</td>
                                        <td>{{ $item->created_at->format('d M Y') }}</td>
                                        <td>Rp {{ number_format($item->nominal, 0, ',', '.') }}</td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <th colspan="3" class="text-end">Total untuk {{ $referralUser }}:</th>
                                    <th>Rp {{ number_format($subtotal, 0, ',', '.') }}</th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                @endforeach

                {{-- Komisi Affiliator --}}
                <h5 class="mb-0">Komisi Affiliator</h5>
                <hr>
                @foreach ($affiliatorGrouped as $referralUser => $items)
                    <div class="mb-4">
                        <p>Referral: <strong>{{ $referralUser }}</strong> |
                            Nama Bank : <strong>{{ $items->first()->referral->nama_bank }}</strong> |
                            Nomor Rekening : <strong>{{ $items->first()->referral->no_rekening }}</strong>
                        </p>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Pembeli</th>
                                    <th>Tanggal</th>
                                    <th>Nominal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $subtotal = 0; @endphp
                                @foreach ($items as $i => $item)
                                    @php $subtotal += $item->nominal; @endphp
                                    <tr>
                                        <td>{{ $i + 1 }}</td>
                                        <td>{{ $item->payment->user->name ?? '-' }}</td>
                                        <td>{{ $item->created_at->format('d M Y') }}</td>
                                        <td>Rp {{ number_format($item->nominal, 0, ',', '.') }}</td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <th colspan="3" class="text-end">Total untuk {{ $referralUser }}:</th>
                                    <th>Rp {{ number_format($subtotal, 0, ',', '.') }}</th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                @endforeach

                <form action="{{ route('commissions.payWeekly') }}" method="POST"
                    onsubmit="return confirm('Yakin ingin membayar semua komisi minggu ini?')">
                    @csrf
                    <button type="submit" class="btn btn-danger float-end">Konfirmasi & Bayar Semua Komisi</button>
                </form>
            @endif
    </div>
@endsection
