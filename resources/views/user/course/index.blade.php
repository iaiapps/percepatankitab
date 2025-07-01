@extends('layouts.app')

@section('title', 'Data Kelas')
@section('content')


    @if (empty($courses) || count($courses) === 0)
        <div class="card">
            <div class="card-body">
                <p class="text-center fs-5 mb-0">Belum ada kelas ...</p>
            </div>
        </div>
    @else
        <div class="row">
            @foreach ($courses as $course)
                <div class="col-12 col-md-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h4 class="mb-3">{{ $course->name }}</h4>
                            @if ($course->file_name == null)
                                <img class="img-thumbnail" src="{{ $course->thumbnail_url }}" alt="thumbnail">
                            @else
                                <img class="img-thumbnail" src="{{ $course->thumbnail_path }}" alt="thumbnail">
                            @endif
                            <p class="mt-3">{{ Str::limit($course->description, 150) }}</p>
                        </div>
                        <div class="card-footer text-center">
                            <a href="{{ route('usercourseshow', $course->id) }}" class="btn btn-primary">lihat</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif


@endsection
