@extends('layouts.app')

@section('title', 'Data Pembayaran')
@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show"> {{ $message }} <button type="button"
                class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    {{-- <div class="mb-3">
        <div class="btn-group">
            <a href="{{ route('payment.create') }}" class="btn btn-primary"><i class="bi bi-plus-circle"></i>
                Tambah Data</a>
        </div>
    </div> --}}
    <div class="card p-3 rounded">
        <div class="mb-3">
            <ul class="list-group">
                <li class="list-group-item py-2">Untuk Verifikasi Pembeli ada 3 macam</li>
                <li class="list-group-item py-2">Normal : Untuk pembeli Biasa</li>
                <li class="list-group-item py-2">Res : Untuk pembeli dari Reseller, komisi Rp. 50.000</li>
                <li class="list-group-item py-2">Aff : Untuk pembeli dari Affiliator komisi Rp. 12.000</li>
            </ul>
        </div>
        <div class="table-responsive">

            <div class="table-responsive">
                <table id="table" class="table table-striped align-middle align-middle text-center" style="width: 100%">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">No</th>
                            <th scope="col" class="text-center">Nama</th>
                            <th scope="col" class="text-center">No Hp</th>
                            <th scope="col" class="text-center">Bukti Pembayaran</th>
                            <th scope="col" class="text-center">Status Pembayaran</th>
                            <th scope="col" class="text-center">Token</th>
                            <th scope="col" class="text-center">Kode Referral</th>
                            <th scope="col" class="text-center">Normal/Res/Aff</th>
                            <th scope="col" class="text-center">Status WA</th>
                            <th scope="col" class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($payments as $payment)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $payment->name }} </td>
                                <td>{{ $payment->user->no_hp ?? '-' }}
                                    <a href="{{ route('payment.show', $payment->id) }}"
                                        class="bg-warning text-black text-center rounded w-100 d-inline-block">alamat</a>
                                </td>
                                <td>
                                    @php
                                        if (isset($payment->img)) {
                                            $img = asset('img-pembayaran/' . $payment->img);
                                            $id = $payment->id;
                                        } else {
                                            $img = asset('img/404.png');
                                            $id = 'tidak ada';
                                        }
                                    @endphp
                                    @if (isset($payment->img))
                                        <img class="img-pembayaran" src="{{ $img }}" alt="bukti">
                                        <br>
                                        {{-- <a href="{{ route('payment.show', $id) ?? 'belum' }}" --}}
                                        <a href="{{ route('paymentimg', $id) ?? 'belum' }}"
                                            class=" mt-2 bg-success text-black p-1 rounded">lihat
                                            bukti</a>
                                    @else
                                        <p class="mb-0 bg-danger text-center text-white rounded">belum upload</p>
                                    @endif

                                </td>
                                <td>
                                    @if ($payment->status == 'pending')
                                        <p class="mb-0 bg-danger text-center text-white rounded">unverified</p>
                                    @elseif ($payment->status == 'verified')
                                        <p class="mb-0 bg-primary text-center text-white rounded">verified</p>
                                    @else
                                        <p>tidak dapat menentukan status ...</p>
                                    @endif

                                </td>
                                <td>{{ $payment->token_code ?? '-' }}</td>
                                <td>{{ $payment->kode_referral ?? '-' }}</td>

                                <td>
                                    @php
                                        $kode = $payment->kode_referral;
                                        $word = Str::take($kode, 3);
                                        if ($word == 'RES') {
                                            $tipe_pembelian = 'reseller';
                                        } elseif ($word == 'RES') {
                                            $tipe_pembelian = 'affiliator';
                                        } else {
                                            $tipe_pembelian = 'normal';
                                        }
                                    @endphp
                                    <form class="d-block"
                                        onsubmit="return confirm('Apakah anda yakin untuk mengubah data?');"
                                        action="{{ route('activate', $payment->id) }}" method="POST">
                                        @csrf
                                        <input type="text" value="{{ $tipe_pembelian }}" name="tipe_pembelian" readonly
                                            hidden>
                                        <button type="submit" class="btn btn-primary btn-sm w-100"> verifikasi
                                            {{ $tipe_pembelian }}</button>
                                    </form>
                                </td>
                                <td><small>
                                        {{ $payment->wa_notified ? 'terkirim' . ' ' . \Carbon\Carbon::parse($payment->wa_sent_at)->isoFormat('DD MMMM YYYY : HH:MM') ?? '-' : 'belum terkirim' }}
                                    </small>
                                </td>
                                <td>
                                    <form class="d-block"
                                        onsubmit="return confirm('Apakah anda yakin untuk menghapus data ?');"
                                        action="{{ route('payment.destroy', $payment->id) }}" method="post"
                                        class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm ">
                                            <i class="bi bi-trash3"></i>
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
    <style>
        .img-pembayaran {
            width: 70px;
        }
    </style>
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
