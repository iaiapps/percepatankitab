@extends('layouts.app')

@section('title', 'Lihat Pembayaran')

@section('content')

    <a href="{{ route('reseller.index') }}" class="btn btn-primary mb-3">kembali</a>

    @dd($reseller)

    <div class="card">
        <div class="card-body text-center">
            <img class="img" src="{{ asset('img-pembayaran/' . $payment->img) }}" alt="bukti pembayaran">
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
