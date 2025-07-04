@extends('layouts.app')

@section('title', 'Data Bank')

@section('content')
    <div class="card">
        <div class="card-body p-md-4 px-3">
            <form method="POST" action="{{ route('storedatabank', $referral->id) }}">
                @csrf
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="mb-3">
                            <label for="nama_bank" class="form-label text-md-end">Nama Bank</label>
                            <input id="nama_bank" type="text"
                                class="form-control @error('nama_bank') is-invalid @enderror" name="nama_bank"
                                value="{{ old('nama_bank') }}" required autocomplete="nama_bank" autofocus>
                            @error('nama_bank')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="mb-3">
                            <label for="no_rekening" class="form-label text-md-end">Nomor Rekening</label>
                            <input id="no_rekening" type="no_rekening"
                                class="form-control @error('no_rekening') is-invalid @enderror" name="no_rekening"
                                value="{{ old('no_rekening') }}" required autocomplete="no_rekening">
                            @error('no_rekening')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>


                <div class="my-3">
                    <button type="submit" class="btn btn-primary w-100"> Simpan Data Bank </button>
                </div>
            </form>
        </div>
    </div>
@endsection
