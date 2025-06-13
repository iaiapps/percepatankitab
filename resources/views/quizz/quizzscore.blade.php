@extends('layouts.app-landing')

@section('title', 'Landing Page')
@section('content')
    <div class="container">
        <div class="quiz-container" id="result-container">
            <div class="text-center">

                @php
                    $score = $quizz->score;
                    $result = round(($score / 35) * 100, 0);
                @endphp
                <h2>Hasil Quiz</h2>
                <div class="score-display mb-4 bg-warning-subtle p-2 rounded">
                    Skor Anda: <span id="final-score">{{ $result }}</span>
                </div>
                <div class="fs-5 mb-4">
                    @if ($result <= 50)
                        <div class="border border-2 p-2 rounded">
                            <p>Kamu sedang memulai langkah awal yang tepat! Yuk, tingkatkan pemahaman Nahwu-Shorof-mu
                                dengan
                                buku ini, panduan terbaik untuk pemula sepertimu!</p>

                            <a href="{{ route('landing') }}" class="btn btn-danger">beli buku</a>
                        </div>
                    @elseif ($result >= 50 && $result <= 90)
                        <div class="border border-2 p-2 rounded">
                            <p>Kamu sudah punya dasar yang bagus! Sekarang saatnya memperkuat fondasi ilmu Nahwu-Shorof
                                dengan
                                buku ini, agar kamu bisa baca kitab kuning.</p>

                            <a href="{{ route('landing') }}" class="btn btn-danger">beli buku</a>
                        </div>
                    @elseif ($result >= 90)
                        <div class="border border-2 p-2 rounded">
                            <p>Hebat! Kamu sudah sampai di tingkat menengah. Ingin naik level jadi ahli? Buku ini siap jadi
                                bekalmu untuk menguasai Kitab Kuning menjadi ahli.</p>
                        </div>
                    @endif
                </div>
                <div class="mb-4" id="result-message"></div>
                <a href="{{ url()->current() }}" class="btn btn-primary mt-4">
                    <i class="bi bi-arrow-repeat"></i> Ulangi Quiz
                </a>
            </div>
        </div>
    </div>
@endsection
