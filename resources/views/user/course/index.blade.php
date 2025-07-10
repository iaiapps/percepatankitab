@extends('layouts.app')

@section('title', 'Data Video')
@section('content')

    @php
        $user = Auth::user();
        $tanggal_db = $user->payment->created_at;
        $now = \Carbon\Carbon::now();
        $add_5 = \Carbon\Carbon::parse($tanggal_db)->addDays(5);

        // ->addDay(5)->isoFormat('DD MMMM YYYY')
        // dd($add_5->isoFormat('DD MMMM YYYY'));

    @endphp

    @if (empty($courses) || count($courses) === 0)
        <div class="card">
            <div class="card-body">
                <p class="text-center fs-5 mb-0">Belum ada kelas ...</p>
            </div>
        </div>
    @else
        @if ($now >= $add_5)
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
                                {{-- <p class="mt-3">{{ Str::limit($course->description, 150) }}</p> --}}
                            </div>
                            <div class="card-footer text-center">
                                <a href="{{ route('usercourseshow', $course->id) }}" class="btn btn-primary">lihat</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            @include('user.course.popup')
        @endif
    @endif
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#onload').modal('show');
        });
    </script>
@endpush
