@extends('layouts.app')

@section('title', 'Lihat Pembayaran')

@section('content')

    <a href="{{ route('userebookshow') }}" class="btn btn-primary mb-3">kembali</a>
    <div class="card">
        <div class="card-body">
            {{-- <div class="text-center mb-4">
                @if ($ebook->cover_image)
                    <img src="{{ Storage::url($ebook->cover_image) }}" alt="{{ $ebook->title }}" class="img-fluid mb-3"
                        style="max-height: 300px;">
                @else
                    <div class="text-center py-5 bg-light mb-3">
                        <i class="fas fa-file-pdf fa-5x text-danger"></i>
                    </div>
                @endif

                <a href="{{ Storage::url($ebook->ebook_path) }}" class="btn btn-primary" download>
                    <i class="fas fa-download"></i> Download PDF
                    ({{ '$ebook->getFormattedSizeAttribute()' }})
                </a>
            </div> --}}

            <h3>{{ $ebook->ebook_name }}</h3>
            {{-- <p class="text-muted">Uploaded by {{ $ebook->ebook_name }} on
                {{ $ebook->created_at->format('M d, Y') }}</p> --}}

            <div class="mt-1">
                <p>{{ $ebook->description ?? 'No description provided.' }}</p>
            </div>

            <hr>

            <div class="pdf-viewer-container border rounded" style="height: 800px;">
                <iframe src="{{ route('ebook.view', $ebook->id) }}" style="width: 100%; height: 100%; border: none;"></iframe>
            </div>


        </div>
    </div>

@endsection
