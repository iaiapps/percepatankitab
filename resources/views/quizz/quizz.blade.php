@extends('layouts.app-landing')

@section('title', 'Landing Page')
@section('content')
    <div class="container">
        <!-- Header Quiz -->
        <form action="{{ route('quizzstore') }}" method="POST" id="quiz-form">
            @csrf
            <input type="hidden" name="str" value="{{ $str }}">
            <input type="hidden" name="score" id="form-score" value="0">
            <!-- Hidden input untuk menyimpan semua jawaban -->
            <input type="hidden" name="answers" id="all-answers" value="">

            <div class="quiz-container">
                <div class="quiz-header text-center mb-4">
                    <h2>Test Kemampuan Baca Kitab</h2>
                    <p class="text-muted fs-5">Uji kemampuan baca kitab anda dengan test ini</p>
                </div>

                <!-- Progress Bar -->
                <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: 0%"></div>
                </div>

                <!-- Question Number -->
                <div class="d-flex justify-content-between mb-3 mt-3">
                    <span class="badge bg-primary">Pertanyaan <span id="current-question">1</span>/<span
                            id="total-questions">5</span></span>
                </div>

                <!-- Question -->
                <div class="question mb-4" id="question">
                    Memuat pertanyaan...
                </div>

                <!-- Options -->
                <div class="options mb-4" id="options">
                    <!-- Opsi akan diisi oleh JavaScript -->
                </div>

                <!-- Navigation -->
                <div class="quiz-footer">
                    <button type="button" class="btn btn-secondary" id="prev-btn" disabled>
                        <i class="bi bi-arrow-left-circle"></i> Sebelumnya
                    </button>
                    <button type="button" class="btn btn-primary" id="next-btn">
                        Selanjutnya <i class="bi bi-arrow-right-circle"></i>
                    </button>
                    <button type="submit" class="btn btn-success d-none" id="finish-btn">
                        Selesai <i class="bi bi-check-circle"></i>
                    </button>
                </div>
            </div>
        </form>

        <!-- Result Display (hidden by default) -->
        <div class="quiz-container d-none" id="result-container">
            <div class="text-center">
                <h2>Hasil Quiz</h2>
                <div class="score-display mb-4">
                    Skor Anda: <span id="final-score">0</span>/<span id="max-score">5</span>
                </div>
                <div class="mb-4" id="result-message"></div>
                <a href="{{ url()->current() }}" class="btn btn-primary">
                    <i class="bi bi-arrow-repeat"></i> Ulangi Quiz
                </a>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        // Data quiz dalam JavaScript
        const quizData = [{
                id: 1,
                question: "Apa yang dimaksud dengan mubtada' dalam jumlah ismiyyah?",
                options: [
                    "Kata kerja pembuka kalimat",
                    "Isim ma'rifah rofa' yang menjadi pembuka kalimat",
                    "Kata sifat penjelas fi'il",
                    "Huruf yang membatalkan i'rab"
                ],
                answer: "Isim ma'rifah rofa' yang menjadi pembuka kalimat"
            },
            {
                id: 2,
                question: "Apa fungsi dari khobar dalam jumlah ismiyyah?",
                options: [
                    "Menunjukkan waktu kejadian",
                    "Menghubungkan dua kalimat",
                    "Melengkapi makna mubtada'",
                    "Menyatakan larangan"
                ],
                answer: "Melengkapi makna mubtada'"
            },
            {
                id: 3,
                question: "Apa fungsi dari awāmil nāsikhah dalam jumlah ismiyyah?",
                options: [
                    "Menjadikan mubtada' sebagai maf'ul bih",
                    "Membatalkan hukum rofa' mubtada' dan khobar",
                    "Mengubah fi'il menjadi isim",
                    "Menunjukkan waktu kejadian"
                ],
                answer: "Membatalkan hukum rofa' mubtada' dan khobar"
            },
            {
                id: 4,
                question: "Fi'il muqorobah menunjukkan makna berikut, kecuali:",
                options: [
                    "Harapan",
                    "Dimulainya peristiwa",
                    "Pengingkaran",
                    "Kedekatan kejadian"
                ],
                answer: "Kedekatan kejadian"
            },
            {
                id: 5,
                question: "Fungsi لَا النَّافِيَةُ لِلْجِنْسِ dalam jumlah ismiyyah adalah:",
                options: [
                    "Menunjukkan waktu",
                    "Menyatakan larangan",
                    "Menafikan seluruh jenis secara mutlak",
                    "Menyambung dua kalimat"
                ],
                answer: "Menafikan seluruh jenis secara mutlak"
            }
        ];

        // Variabel state quiz
        let currentQuestion = 0;
        let score = 0;
        let selectedOption = null;
        let userAnswers = {};

        // Elemen DOM
        const questionElement = document.getElementById('question');
        const optionsElement = document.getElementById('options');
        const currentQuestionElement = document.getElementById('current-question');
        const totalQuestionsElement = document.getElementById('total-questions');
        const progressBar = document.querySelector('.progress-bar');
        const prevBtn = document.getElementById('prev-btn');
        const nextBtn = document.getElementById('next-btn');
        const finishBtn = document.getElementById('finish-btn');
        const quizForm = document.getElementById('quiz-form');
        const formScore = document.getElementById('form-score');
        const allAnswersInput = document.getElementById('all-answers');
        const resultContainer = document.getElementById('result-container');
        const finalScoreElement = document.getElementById('final-score');
        const maxScoreElement = document.getElementById('max-score');

        // Inisialisasi quiz
        function initQuiz() {
            totalQuestionsElement.textContent = quizData.length;
            maxScoreElement.textContent = quizData.length;
            loadQuestion();
        }

        // Memuat pertanyaan
        function loadQuestion() {
            const question = quizData[currentQuestion];
            questionElement.textContent = question.question;

            optionsElement.innerHTML = '';
            question.options.forEach((option, index) => {
                const optionElement = document.createElement('div');
                optionElement.classList.add('option');
                optionElement.setAttribute('data-option', index + 1);
                optionElement.setAttribute('data-question-id', question.id);
                optionElement.textContent = option;
                optionElement.addEventListener('click', selectOption);

                // Tandai jawaban yang sudah dipilih sebelumnya
                if (userAnswers[question.id] === option) {
                    optionElement.classList.add('selected');
                    selectedOption = option;
                }

                optionsElement.appendChild(optionElement);
            });

            currentQuestionElement.textContent = currentQuestion + 1;
            updateProgressBar();
            updateNavigationButtons();
        }

        // Memilih opsi jawaban
        function selectOption(e) {
            const selected = e.target;
            const questionId = parseInt(selected.getAttribute('data-question-id'));

            // Hapus seleksi sebelumnya
            document.querySelectorAll('.option').forEach(option => {
                option.classList.remove('selected');
            });

            // Tambahkan seleksi ke opsi yang dipilih
            selected.classList.add('selected');
            selectedOption = selected.textContent;

            // Simpan jawaban user
            userAnswers[questionId] = selectedOption;
        }

        // Memeriksa jawaban
        function checkAnswer() {
            if (!selectedOption) return false;

            const question = quizData[currentQuestion];
            const options = document.querySelectorAll('.option');

            options.forEach(option => {
                option.classList.remove('correct', 'incorrect');
                if (option.textContent === question.answer) {
                    option.classList.add('correct');
                } else if (option.textContent === selectedOption && selectedOption !== question.answer) {
                    option.classList.add('incorrect');
                }
            });

            if (selectedOption === question.answer) {
                score++;
                formScore.value = score;
            }

            return selectedOption === question.answer;
        }

        // Update progress bar
        function updateProgressBar() {
            const progress = ((currentQuestion + 1) / quizData.length) * 100;
            progressBar.style.width = `${progress}%`;
        }

        // Update tombol navigasi
        function updateNavigationButtons() {
            prevBtn.disabled = currentQuestion === 0;

            if (currentQuestion === quizData.length - 1) {
                nextBtn.classList.add('d-none');
                finishBtn.classList.remove('d-none');
            } else {
                nextBtn.classList.remove('d-none');
                finishBtn.classList.add('d-none');
            }
        }

        // Pindah ke pertanyaan berikutnya
        function nextQuestion() {
            checkAnswer();
            if (currentQuestion < quizData.length - 1) {
                currentQuestion++;
                selectedOption = userAnswers[quizData[currentQuestion].id] || null;
                loadQuestion();
            }
        }

        // Kembali ke pertanyaan sebelumnya
        function prevQuestion() {
            if (currentQuestion > 0) {
                currentQuestion--;
                selectedOption = userAnswers[quizData[currentQuestion].id] || null;
                loadQuestion();
            }
        }

        // Menyelesaikan quiz
        function handleQuizFinish(e) {
            e.preventDefault();
            checkAnswer();

            // Simpan semua jawaban ke input hidden
            allAnswersInput.value = JSON.stringify(userAnswers);

            // Tampilkan hasil sebelum submit
            quizForm.classList.add('d-none');
            resultContainer.classList.remove('d-none');
            finalScoreElement.textContent = score;

            const percentage = (score / quizData.length) * 100;
            let message = '';

            if (percentage >= 80) {
                message = 'Sangat bagus! Anda benar-benar menguasai materi ini.';
            } else if (percentage >= 60) {
                message = 'Bagus! Anda memiliki pemahaman yang cukup baik.';
            } else if (percentage >= 40) {
                message = 'Cukup baik. Anda mungkin perlu mempelajari lagi beberapa bagian.';
            } else {
                message = 'Anda mungkin perlu mempelajari materi ini lebih dalam lagi.';
            }

            document.getElementById('result-message').textContent = message;

            // Submit form setelah 3 detik
            setTimeout(() => {
                quizForm.submit();
            }, 3000);
        }

        // Event listeners
        nextBtn.addEventListener('click', nextQuestion);
        prevBtn.addEventListener('click', prevQuestion);
        finishBtn.addEventListener('click', handleQuizFinish);

        // Memulai quiz
        initQuiz();
    </script>
@endpush
