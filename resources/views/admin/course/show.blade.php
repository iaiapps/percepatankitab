@extends('layouts.app')

@section('title', 'Lihat Pembayaran')

@section('content')

    <a href="{{ route('course.index') }}" class="btn btn-primary mb-3">kembali</a>
    <div class="card p-3">
        <h4>{{ $course->name }}</h4>
        <hr>
        <p>{{ $course->description }}</p>
        <div class="card-body text-center">
            <div class=" embed-responsive">
                <iframe class="embed-responsive-item"
                    src="https://www.youtube.com/embed/{{ $course->youtube_id }}?autoplay=0&rel=0&controls=1&modestbranding=1"
                    frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope"
                    allowfullscreen>
                </iframe>
            </div>
        </div>
    </div>

@endsection

@push('css')
    <style>
        .embed-responsive {
            position: relative;
            display: block;
            width: 100%;
            height: 300px;
            padding: 0;
            overflow: hidden;
        }

        .embed-responsive-item {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: 0;
        }
    </style>
@endpush
