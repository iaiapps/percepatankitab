@extends('layouts.app')

@section('title', 'Lihat Pembayaran')

@section('content')

    <a href="{{ route('reseller') }}" class="btn btn-primary mb-3">kembali</a>

    {{-- @dd($referral) --}}

    <div class="card">
        <div class="card-body ">
            <p class="fs-5 fw-bold mb-2 text-center"> Komisi dari reseller {{ $referral->user->name }}</p>
            <div class="table-responsive">
                <table class="table table-bordered" id="table">
                    <thead>
                        <tr>
                            <td>komisi ke-</td>
                            <td>nominal</td>
                            <td>dibayarkan</td>
                            <td>status</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($referral->commission as $com)
                            <tr>
                                <td> {{ $loop->iteration }}</td>
                                <td> {{ $com->nominal }}</td>
                                <td> {{ $com->paid_at ? \Carbon\Carbon::parse($com->paid_at)->isoFormat('DD MMMM YYYY, HH:MM') : ' - ' }}
                                </td>
                                <td> {{ $com->status }}</td>
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
