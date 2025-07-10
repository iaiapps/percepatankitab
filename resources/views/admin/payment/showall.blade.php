@extends('layouts.app')
@section('title', 'Lihat Alamat')
@section('content')
    <a href="{{ route('payment.index') }}" class="btn btn-primary mb-3">kembali</a>
    <div class="card border" id="print-area">
        <div class="card-body">
            <div class="border p-3 rounded mb-3">
                <p class="mb-0">Nama Penerima : {{ $payment->user->name }}</p>
                <hr>
                <p class="mb-0">No Hp Penerima : {{ $payment->user->no_hp }}</p>
                <hr>
                <p class="mb-0">Alamat Penerima :</p>
                <p>{{ $payment->user->address }}</p>
            </div>

            <div class="border p-3 rounded">
                <p class="mb-0">Nama Pengirim : Muhammad Ilyas</p>
                <hr>
                <p class="mb-0">No Hp Pengirim : 081298440068</p>
            </div>
        </div>
    </div>
    <a href="{{ route('downloadDoc', $payment->id) }}" class="btn btn-primary">Download as DOC</a>
@endsection
