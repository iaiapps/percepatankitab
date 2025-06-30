@extends('layouts.app')

@section('title', 'Upload Ebook')

@section('content')
    <div class="card">
        <div class="card-body p-md-4 px-3">

            <form method="POST" action="{{ route('ebook.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="form-group mb-3">
                    <label for="ebook_name">Ebook ebook_name</label>
                    <input id="ebook_name" type="text" class="form-control @error('ebook_name') is-invalid @enderror"
                        name="ebook_name" value="{{ old('ebook_name') }}" required autofocus>
                    @error('ebook_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="description">Description</label>
                    <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description"
                        rows="3">{{ old('description') }}</textarea>
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="ebook_file">PDF File (Max: 20MB)</label>
                    <input id="ebook_file" type="file" class="form-control @error('ebook_file') is-invalid @enderror"
                        name="ebook_file" accept=".pdf" required>
                    @error('ebook_file')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="cover_image">Cover Image (Optional)</label>
                    <input id="cover_image" type="file" class="form-control @error('cover_image') is-invalid @enderror"
                        name="cover_image" accept="image/*">
                    @error('cover_image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group mb-0">
                    <button type="submit" class="btn btn-primary">
                        Upload Ebook
                    </button>

                </div>
            </form>

        </div>
    </div>
@endsection
