@extends('layouts.app')

@section('title', 'Edit Data')

@section('content')
    <div class="card">
        <div class="card-body mt-3">
            <form method="POST" action="{{ route('settinglanding.update', $landing->id) }}">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Setting</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                        name="name" value="{{ old('name', $landing->name) }}" readonly>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="value" class="form-label">Value Setting [1 = true], [0 = false]</label>
                    <input id="value" type="text" class="form-control @error('value') is-invalid @enderror"
                        name="value" value="{{ old('value', $landing->value) }}">
                    @error('value')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <input id="description" type="text" class="form-control @error('description') is-invalid @enderror"
                        name="description" value="{{ old('value', $landing->description) }}">
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-success">
                    {{ __('Simpan landing') }}
                </button>
            </form>
        </div>
    </div>
@endsection
