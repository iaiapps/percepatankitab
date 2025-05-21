<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Percepatan Baca Kitab') }}</title>

    <link rel="stylesheet" href="{{ asset('css/landing.css') }}">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">
                <img src="{{ asset('img/logo.png') }}" class="logo-header" alt=""> Percepatan Baca Kitab
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#test">Test</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#reseller">Reseller</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#affiliate">Affiliate</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#testimoni">Testimoni</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#faq">FAQ</a>
                    </li>
                </ul>
                <a href="{{ route('login') }}" class="btn btn-warning ms-3">Login</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section ">
        <div class="countdown-box mb-4 text-center w-100">
            <div class="d-flex justify-content-center">
                <div class="countdown-item">
                    <span class="countdown-number" id="days">00</span>
                    <span>Hari</span>
                </div>
                <div class="countdown-item">
                    <span class="countdown-number" id="hours">00</span>
                    <span>Jam</span>
                </div>
                <div class="countdown-item">
                    <span class="countdown-number" id="minutes">00</span>
                    <span>Menit</span>
                </div>
                <div class="countdown-item">
                    <span class="countdown-number" id="seconds">00</span>
                    <span>Detik</span>
                </div>
            </div>
            <div class=" d-block p-3">
                <p class="text-center mb-0 bg-danger fs-4 d-inline-block p-3 rounded">Diskon 30% akan segera berakhir!
                </p>
            </div>
        </div>
        <div class="container">

            <div class="row align-items-center">
                <div class="col-lg-6 mb-4">
                    <h1 class="display-5 fw-bold mb-3">Beli Buku, Gratis Kelas 4,5 bulan.
                    </h1>
                    <p class="text-warning display-4 mt-0 border-1 rounded-3 fw-bold">Tapi, Ajak 5 temen = Gratis
                        Semua. Serius!
                    </p>
                </div>
                <div class="col-lg-6 text-center p-3">
                    <img src="{{ asset('img/book2.png') }}" alt="Baca Kitab Cepat"
                        class="img-fluid book-cover p-3 bg-white">
                </div>
            </div>
            <div class=" mt-3">
                <div class="text-center fs-4">
                    <p class=" mb-4 fw-bold">Metode cepat dan revolusioner untuk belajar baca Kitab kuning
                    </p>
                    <p class="mb-4 fw-bold">Apa yang kamu dapatkan?
                        Bukan cuma buku, tapi juga 10 BONUS PREMIUM senilai total Rp 2.400.000+</p>
                </div>
                <ul class="list-unstyled mb-4 text-md-center fs-5">
                    <li class="mb-2 d-flex"><i class="bi bi-check-circle-fill text-warning me-3"></i> Kelas online Baca
                        Kitab
                        Kuning selama 4,5 bulan penuh (senilai Rp1.500.000) </li>
                    <li class="mb-2 d-flex"><i class="bi bi-check-circle-fill text-warning me-3"></i> Modul Praktik Baca
                        Kitab yang langsung bisa kamu terapkan (senilai Rp50.000)</li>
                    <li class="mb-2 d-flex"><i class="bi bi-check-circle-fill text-warning me-3"></i> Akses ke Grup WA
                        Eksklusif untuk diskusi dan bimbingan langsung </li>
                    <li class="mb-2 d-flex"><i class="bi bi-check-circle-fill text-warning me-3"></i> Sesi Zoom
                        Interaktif
                        langsung bareng penulis buku (senilai Rp500.000)</li>
                    <li class="mb-2 d-flex"><i class="bi bi-check-circle-fill text-warning me-3"></i> Dua e-book:
                        "Tips Praktis Menghafal Mufradat" dan
                        "101 Alasan Kenapa Kamu Harus Bisa Baca Kitab Kuning"
                        (senilai total Rp100.000)</li>
                    <li class="mb-2 d-flex"><i class="bi bi-check-circle-fill text-warning me-3"></i> Checklist Harian
                        Latihan Baca Kitab (format printable)</li>
                    <li class="mb-2 d-flex"><i class="bi bi-check-circle-fill text-warning me-3"></i> Kelas Setoran
                        Sorogan
                        via VN dengan koreksi langsung (senilai Rp250.000)</li>
                    <li class="mb-2 d-flex"><i class="bi bi-check-circle-fill text-warning me-3"></i> Mini Ebook: 10
                        Kesalahan Umum Pemula (senilai Rp50.000)</li>
                    <li class="mb-2 d-flex"><i class="bi bi-check-circle-fill text-warning me-3"></i> Template Latihan
                        I’rab
                        Kosong (format printable)</li>
                    <li class="mb-2 d-flex"><i class="bi bi-check-circle-fill text-warning me-3"></i> Sertifikat Digital
                        Kelulusan setelah ujian praktik (senilai Rp30.000)</li>
                </ul>
                <div class="text-center">
                    <a href="#pricing" class="btn btn-warning btn-lg fw-bold px-4 me-2">Dapatkan Sekarang</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Buku Section -->
    <section id="test" class="py-5">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-5 mb-4 mb-lg-0">
                    <img src="{{ asset('img/think.jpg') }}" alt="Buku Baca Kitab Cepat"
                        class="img-fluid rounded shadow">
                </div>
                <div class="mt-2 text-center">
                    <p class="fs-4">Ukur seberapa jago kamu baca Kitab Kuning.
                        Hasilnya akan tunjukkan: kamu di level Beginner, Foundation, atau Intermediate.
                    </p>
                    <p class="fs-5">Langsung tes sekarang, biar belajar lebih tepat sasaran!</p>
                    <br>
                    <a href="#" class="btn btn-danger btn-lg px-4">Test Kemampuan Baca Kitab
                        Kuning Anda
                        disini!</a>
                </div>
            </div>
        </div>
    </section>
    <section id="reseller" class="py-5 bg-warning p-3">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                {{-- <h2 class="fw-bold text-white">Atau</h2> --}}
                <p class="text-dark mb-3 fs-4">Bantu jualkan buku, dan dapatkan Rp50.000 untuk setiap penjualan.
                    Jual minimal 2 buku sehari? Kamu dapat bonus tambahan Rp40.000 per hari!"</p>

                <p class="fs-5">Tanpa modal, tanpa ribet. Cukup sebar link resellermu, hasilkan cuan harian.
                    Daftar sekarang, mulai hasilkan dari hari ini juga!
                </p>
                <a href="#pricing" class="btn btn-light btn-lg fw-bold px-5 mb-3">Daftar Reseller</a>

            </div>
        </div>
    </section>
    <section id="affiliate" class="py-5 bg-success p-3">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center text-white">
                <h2 class="fw-bold ">Atau</h2>
                <p class="fs-4 mb-3">Punya jaringan atau followers?
                    Gabung program afiliate kami dan dapatkan komisi 4% setiap ada pembelian lewat link afiliatemu."
                </p>
                <p class="fs-5">Tanpa stok, tanpa repot, cukup bagikan link dan nikmati hasilnya.
                    Daftar sekarang & mulai hasilkan pasif income!
                </p>
                <a href="#pricing" class="btn btn-light btn-lg fw-bold px-5 mb-3">Daftar Affiliate</a>

            </div>
        </div>
    </section>

    <!-- Pricing Section -->
    <section id="pricing" class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="price-box text-center">
                        <div class="discount-badge">30%</div>
                        <h1 class="fw-bold mb-3 ">Buku</h1>
                        <p class="fs-4">Dapat buku + akses kelas senilai 2 jutaan dengan harga spesial</p>

                        <div class="my-4">
                            <h2 class="original-price d-inline">Rp500.000</h2>
                            <h1 class="d-inline ms-3 text-danger display-5 fw-bold">Rp350.000</h1>
                        </div>

                        <ul class="list-unstyled text-start mb-4 fs-5 mt-3">
                            <li class="mb-2 d-flex">
                                <i class="bi bi-check-circle text-success me-3"> </i>
                                Buku "Metode Cepat Bisa Baca Kitab Kuning السباق
                            </li>
                            <li class="mb-2 d-flex">
                                <i class="bi bi-check-circle text-success me-3"> </i>
                                Gratis Akses kelas online selama 4,5 bulan
                            </li>
                            <li class="mb-2 d-flex">
                                <i class="bi bi-check-circle text-success me-3"> </i>
                                Bonus 3 e-book pendukung belajar baca Kitab kuning
                            </li>
                            <li class="mb-2 d-flex">
                                <i class="bi bi-check-circle text-success me-3"> </i>
                                Bonus modul praktek baca Kitab kuning
                            </li>
                            <li class="mb-2 d-flex">
                                <i class="bi bi-check-circle text-success me-3"> </i>
                                Grup Diskusi eksklusif
                            </li>
                            <li class="mb-2 d-flex">
                                <i class="bi bi-check-circle text-success me-3"> </i>
                                Pertemuan Zoom interaktif
                            </li>
                            <li class="mb-2 d-flex">
                                <i class="bi bi-check-circle text-success me-3"> </i>
                                Ceklis harian latihan baca Kitab kuning
                            </li>
                            <li class="mb-2 d-flex">
                                <i class="bi bi-check-circle text-success me-3"> </i>
                                Setoran Sorogan Kitab Kuning via Voice Note
                            </li>
                            <li class="mb-2 d-flex">
                                <i class="bi bi-check-circle text-success me-3"> </i>
                                Template latihan i'rob kosong (format printable)
                            </li>
                            <li class="mb-2 d-flex">
                                <i class="bi bi-check-circle text-success me-3"> </i>
                                Sertifikat Kelulusan
                            </li>

                        </ul>

                        <a href="{{ route('register') }}" class="btn btn-danger btn-lg fw-bold px-5 mb-3">Beli
                            Sekarang</a>
                        <p class="small text-muted">*Harga spesial hanya untuk 100 pembeli pertama</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimoni Section -->
    <section id="testimoni" class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Apa Kata Mereka?</h2>
                <p class="lead text-muted">Testimoni dari pembaca dan peserta kelas</p>
            </div>

            <div class="row g-4">
                <div class="col-md-3">
                    <div class="card h-100 testiomonial-card">
                        <div class="card-body p-4">
                            <img src="{{ asset('img/testi/testi1.jpeg') }}" class="img-fluid" alt="testi1">
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card h-100 testiomonial-card">
                        <div class="card-body p-4">
                            <img src="{{ asset('img/testi/testi2.jpeg') }}" class="img-fluid" alt="testi2">
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card h-100 testiomonial-card">
                        <div class="card-body p-4">
                            <img src="{{ asset('img/testi/testi3.jpeg') }}" class="img-fluid" alt="testi3">
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card h-100 testiomonial-card">
                        <div class="card-body p-4">
                            <img src="{{ asset('img/testi/testi4.jpeg') }}" class="img-fluid" alt="testi4">
                        </div>
                    </div>
                </div>
            </div>
    </section>


    <!-- CTA Section -->
    <section class="py-5 cta-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <h2 class="fw-bold text-white mb-4">Siap Menguasai Kitab Kuning?</h2>
                    <p class="lead text-white mb-3">Beli sekarang dan dapatkan diskon 30% untuk paket buku +
                        kelas
                    </p>
                    <a href="#pricing" class="btn btn-danger btn-lg fw-bold px-5 mb-3">Beli Sekarang</a>
                    <p class="text-white-50 mb-0">Penawaran terbatas hanya untuk 100 pendaftar pertama</p>
                </div>
            </div>

        </div>
    </section>


    <!-- FAQ Section -->
    <section id="faq" class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Pertanyaan yang Sering Diajukan</h2>
                <p class="lead text-muted">Temukan jawaban atas pertanyaan Anda</p>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="accordion" id="faqAccordion">
                        <div class="accordion-item mb-3 border-0 shadow-sm">
                            <h3 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne">
                                    Apakah program ini cocok untuk pemula?
                                </button>
                            </h3>
                            <div id="collapseOne" class="accordion-collapse collapse show"
                                aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Ya, sangat cocok! Program ini dirancang mulai dari level Beginner hingga
                                    Intermediate, jadi kamu bisa belajar dari dasar tanpa khawatir tertinggal.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item mb-3 border-0 shadow-sm">
                            <h3 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo">
                                    Berapa lama waktu yang dibutuhkan untuk melihat hasil?
                                </button>
                            </h3>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Rata-rata peserta mulai merasakan peningkatan pemahaman dalam 1–2 minggu,
                                    tergantung
                                    konsistensi belajar. Dengan ikut penuh selama 4,5 bulan, insyaAllah hasilnya
                                    akan
                                    jauh lebih terasa.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item mb-3 border-0 shadow-sm">
                            <h3 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseThree">
                                    Apakah ada jadwal khusus untuk kelas online?
                                </button>
                            </h3>
                            <div id="collapseThree" class="accordion-collapse collapse"
                                aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Ya, kelas online berjalan terjadwal tapi fleksibel. Materi bisa diakses ulang,
                                    jadi
                                    kamu tetap bisa belajar meskipun tidak hadir live.

                                </div>
                            </div>
                        </div>

                        <div class="accordion-item mb-3 border-0 shadow-sm">
                            <h3 class="accordion-header" id="headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseFour">
                                    Bagaimana cara mendapatkan bukunya?
                                </button>
                            </h3>
                            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Setelah kamu melakukan pemesanan, buku akan langsung dikirim ke alamatmu. Kami
                                    juga
                                    akan mengirim info akses kelas dan bonus melalui email atau WhatsApp.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-dark">
        <div class="container py-4  text-sm-start text-center">
            <div class="row text-white">
                <div class="col-12 col-md-6">
                    <div class="col-lg-12 mb-4 mb-lg-0 d-sm-flex ">
                        <img class="logofooter rounded-circle" src="{{ asset('img/logo.png') }}" alt="logo">
                        <div class="ms-sm-5">
                            <h5>Tentang Kami</h5>
                            <p class="">Kami hadir untuk memudahkan siapa pun belajar membaca Kitab Kuning
                                dari nol.
                            </p>
                            <p>
                                Lewat buku ini dan program kelas online 4,5 bulan, kami bantu kamu naik level dari
                                Beginner hingga Intermediate secara bertahap dan terarah.
                            </p>
                            <p>
                                Kami juga membuka peluang reseller & afiliasi, agar makin banyak yang mendapat
                                manfaat —
                                sekaligus bisa menghasilkan.
                            </p>
                            <p>
                                Misi kami:
                                Membuat belajar Kitab Kuning jadi mudah, terjangkau, dan memberdayakan.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="row">
                        <div class="col-lg-6 mb-4 mb-lg-0">
                            <h5>Kontak Kami</h5>
                            <ul class="list-unstyled ">
                                <li><i class="bi bi-geo-alt me-2"></i> Jl. Sriti, Kelurahan Banjar Sengon,
                                    Kecamatan
                                    Patrang, Jember, Jawa Timur - Indonesia</li>
                                <li><i class="bi bi-telephone me-2"></i> +6281298440068</li>
                                <li><i class="bi bi-envelope me-2"></i> ansacademy18@gmail.com</li>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <h5>Sosial Media Kami</h5>

                            <div class="mt-3">
                                <a href="#" class="text-white me-2"><i class="bi bi-facebook fs-5"></i></a>
                                <a href="#" class="text-white me-2"><i class="bi bi-twitter fs-5"></i></a>
                                <a href="#" class="text-white me-2"><i class="bi bi-instagram fs-5"></i></a>
                                <a href="#" class="text-white me-2"><i class="bi bi-youtube fs-5"></i></a>
                                <a href="#" class="text-white me-2"><i class="bi bi-tiktok fs-5"></i></a>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-4 bg-dark text-white">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start">
                    <p class="mb-0">Copyright &copy;2025 Percepatan Baca Kitab Kuning | All rights reserved.</p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <a href="#" class="text-white text-decoration-none me-3">Kebijakan Privasi</a>
                    <a href="#" class="text-white text-decoration-none">Syarat & Ketentuan</a>
                </div>
            </div>
        </div>
    </footer>

    <script>
        // Countdown Timer
        const targetDate = new Date('2025-05-09');

        function updateCountdown() {
            const now = new Date();
            const totalSeconds = (targetDate - now) / 1000;

            if (totalSeconds <= 0) {
                document.getElementById('days').textContent = '00';
                document.getElementById('hours').textContent = '00';
                document.getElementById('minutes').textContent = '00';
                document.getElementById('seconds').textContent = '00';
                return;
            }

            const days = Math.floor(totalSeconds / 3600 / 24);
            const hours = Math.floor(totalSeconds / 3600) % 24;
            const minutes = Math.floor(totalSeconds / 60) % 60;
            const seconds = Math.floor(totalSeconds) % 60;

            document.getElementById('days').textContent = days.toString().padStart(2, '0');
            document.getElementById('hours').textContent = hours.toString().padStart(2, '0');
            document.getElementById('minutes').textContent = minutes.toString().padStart(2, '0');
            document.getElementById('seconds').textContent = seconds.toString().padStart(2, '0');
        }

        updateCountdown();
        setInterval(updateCountdown, 1000);
    </script>
</body>

</html>
