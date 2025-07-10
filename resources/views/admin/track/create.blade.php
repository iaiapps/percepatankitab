@extends('layouts.app')

@section('title', 'Buat Data Video')

@section('content')
    <div class="card">
        <div class="card-body p-md-4 px-3">
            <form method="POST" action="{{ route('course.store') }}">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label text-md-end">Judul Video</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                        name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="youtube_url" class="form-label text-md-end">Youtube Url</label>
                    <input id="youtube_url" type="text" class="form-control @error('youtube_url') is-invalid @enderror"
                        name="youtube_url" value="{{ old('youtube_url') }}" required autocomplete="youtube_url">
                    @error('youtube_url')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                {{-- <div class="mb-3">
                    <label for="description" class="form-label text-md-end">Deskripsi Kelas</label>
                    <input id="description" type="text" class="form-control @error('description') is-invalid @enderror"
                        name="description" value="{{ old('description') }}" required autocomplete="description">
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div> --}}
                <div class="my-3">
                    <button type="submit" class="btn btn-primary w-100"> Tambah Video </button>
                </div>
            </form>
        </div>
    </div>
@endsection
