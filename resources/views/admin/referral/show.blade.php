@extends('layouts.app')

@section('title', 'Lihat Pembayaran')

@section('content')

    <a href="{{ route('reseller') }}" class="btn btn-primary mb-3">kembali</a>

    {{-- @dd($referral) --}}

    <div class="card">
        <div class="card-body ">
            <p> Komisi dari reseller {{ $referral->user->name }}</p>

            <table class="table">
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
                            <td> {{ $com->paid_at }}</td>
                            <td> {{ $com->status }}</td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection

@push('css')
    <style>
        .img {
            width: 80%;
        }
    </style>
@endpush
