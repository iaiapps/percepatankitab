<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Percepatan Baca Kitab') }}</title>

    <link rel="stylesheet" href="{{ asset('css/quizz.css') }}">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

</head>

<body>
    <div class="container">
        <!-- Header Quiz -->
        <div class="quiz-container">
            <div class="quiz-header text-center mb-4">
                <h1>Quiz App</h1>
                <p class="text-muted">Uji pengetahuan Anda dengan quiz ini</p>
            </div>

            <!-- Progress Bar -->
            <div class="progress">
                <div class="progress-bar" role="progressbar" style="width: 0%"></div>
            </div>

            <!-- Question Number -->
            <div class="d-flex justify-content-between mb-3">
                <span class="badge bg-primary">Pertanyaan <span id="current-question">1</span>/<span
                        id="total-questions">5</span></span>
                <span class="badge bg-info text-dark">Skor: <span id="score">0</span></span>
            </div>

            <!-- Question -->
            <div class="question mb-4" id="question">
                Ini adalah contoh pertanyaan quiz yang akan ditampilkan di sini?
            </div>

            <!-- Options -->
            <div class="options mb-4" id="options">
                <div class="option" data-option="1">Pilihan Jawaban 1</div>
                <div class="option" data-option="2">Pilihan Jawaban 2</div>
                <div class="option" data-option="3">Pilihan Jawaban 3</div>
                <div class="option" data-option="4">Pilihan Jawaban 4</div>
            </div>

            <!-- Navigation -->
            <div class="quiz-footer">
                <button class="btn btn-secondary" id="prev-btn" disabled>
                    <i class="fas fa-arrow-left"></i> Sebelumnya
                </button>
                <button class="btn btn-primary" id="next-btn">
                    Selanjutnya <i class="fas fa-arrow-right"></i>
                </button>
                <button class="btn btn-success d-none" id="finish-btn">
                    Selesai <i class="fas fa-check"></i>
                </button>
            </div>
        </div>

        <!-- Result Display (hidden by default) -->
        <div class="quiz-container d-none" id="result-container">
            <div class="text-center">
                <h2>Hasil Quiz</h2>
                <div class="score-display mb-4">
                    Skor Anda: <span id="final-score">0</span>/<span id="max-score">0</span>
                </div>
                <div class="mb-4" id="result-message"></div>
                <button class="btn btn-primary" id="restart-btn">
                    <i class="fas fa-redo"></i> Ulangi Quiz
                </button>
            </div>
        </div>
    </div>

    <script>
        // Contoh data quiz (bisa diganti dengan data yang sebenarnya)
        const quizData = [{
                question: "Apa yang dimaksud dengan mubtada’ dalam jumlah ismiyyah?",
                options: ["Kata kerja pembuka kalimat", "Isim ma’rifah rofa’ yang menajdi pembuka kalimat",
                    "Kata sifat penjelas fi’il", "Huruf yang membatalkan i’rab"
                ],
                answer: "Isim ma’rifah rofa’ yang menajdi pembuka kalimat"
            },
            {
                question: "Apa fungsi dari khobar dalam jumlah ismiyyah?",
                options: ["Menunjukkan waktu kejadian", "Menghubungkan dua kalimat", "Melengkapi makna mubtada’",
                    "Menyatakan larangan"
                ],
                answer: "Melengkapi makna mubtada’"
            },
            {
                question: "Apa fungsi dari awāmil nāsikhah dalam jumlah ismiyyah?",
                options: ["Menjadikan mubtada’ sebagai maf’ul bih", "Membatalkan hukum rofa’ mubtada’ dan khobar",
                    "Mengubah fi’il menjadi isim", "Menunjukkan waktu kejadian"
                ],
                answer: "Membatalkan hukum rofa’ mubtada’ dan khobar"
            },
            {
                question: "Fi’il muqorobah menunjukkan makna berikut, kecuali:",
                options: ["Harapan", "Dimulainya peristiwa", "Pengingkaran", "Kedekatan kejadian"],
                answer: "Kedekatan kejadian"
            },
            {
                question: "Fungsi لَا النَّافِيَةُ لِلْجِنْسِ dalam jumlah ismiyyah adalah:",
                options: ["Menunjukkan waktu", "Menyatakan larangan", "Menafikan seluruh jenis secara mutlak",
                    "Menyambung dua kalimat"
                ],
                answer: "Menafikan seluruh jenis secara mutlak"
            }
        ];

        // Variabel state quiz
        let currentQuestion = 0;
        let score = 0;
        let selectedOption = null;

        // Elemen DOM
        const questionElement = document.getElementById('question');
        const optionsElement = document.getElementById('options');
        const currentQuestionElement = document.getElementById('current-question');
        const totalQuestionsElement = document.getElementById('total-questions');
        const scoreElement = document.getElementById('score');
        const progressBar = document.querySelector('.progress-bar');
        const prevBtn = document.getElementById('prev-btn');
        const nextBtn = document.getElementById('next-btn');
        const finishBtn = document.getElementById('finish-btn');
        const quizContainer = document.querySelector('.quiz-container');
        const resultContainer = document.getElementById('result-container');
        const finalScoreElement = document.getElementById('final-score');
        const maxScoreElement = document.getElementById('max-score');
        const resultMessageElement = document.getElementById('result-message');
        const restartBtn = document.getElementById('restart-btn');

        // Inisialisasi quiz
        function initQuiz() {
            totalQuestionsElement.textContent = quizData.length;
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
                optionElement.textContent = option;
                optionElement.addEventListener('click', selectOption);
                optionsElement.appendChild(optionElement);
            });

            currentQuestionElement.textContent = currentQuestion + 1;
            updateProgressBar();
            updateNavigationButtons();
        }

        // Memilih opsi jawaban
        function selectOption(e) {
            const selected = e.target;

            // Hapus seleksi sebelumnya
            document.querySelectorAll('.option').forEach(option => {
                option.classList.remove('selected');
            });

            // Tambahkan seleksi ke opsi yang dipilih
            selected.classList.add('selected');
            selectedOption = selected.textContent;
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
                scoreElement.textContent = score;
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
                selectedOption = null;
                loadQuestion();
            }
        }

        // Kembali ke pertanyaan sebelumnya
        function prevQuestion() {
            if (currentQuestion > 0) {
                currentQuestion--;
                selectedOption = null;
                loadQuestion();
            }
        }

        // Menyelesaikan quiz
        function finishQuiz() {
            checkAnswer();
            quizContainer.classList.add('d-none');
            resultContainer.classList.remove('d-none');

            finalScoreElement.textContent = score;
            maxScoreElement.textContent = quizData.length;

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

            resultMessageElement.textContent = message;
        }

        // Memulai ulang quiz
        function restartQuiz() {
            currentQuestion = 0;
            score = 0;
            selectedOption = null;

            scoreElement.textContent = score;
            quizContainer.classList.remove('d-none');
            resultContainer.classList.add('d-none');

            loadQuestion();
        }

        // Event listeners
        nextBtn.addEventListener('click', nextQuestion);
        prevBtn.addEventListener('click', prevQuestion);
        finishBtn.addEventListener('click', finishQuiz);
        restartBtn.addEventListener('click', restartQuiz);

        // Memulai quiz
        initQuiz();
    </script>
</body>

</html>
