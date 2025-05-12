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
                <i class="fas fa-book-quran me-2"></i> Percepatan Baca Kitab
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
                        <a class="nav-link" href="#buku">Buku</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#kelas">Kelas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#testimoni">Testimoni</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#faq">FAQ</a>
                    </li>
                </ul>
                <a href="#pricing" class="btn btn-warning ms-3">Daftar Sekarang</a>
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
                <p class="text-center mb-0 bg-danger fs-4 d-inline-block p-3 rounded">Diskon 40% akan segera berakhir!
                </p>
            </div>
        </div>
        <div class="container">

            <div class="row align-items-center">
                <div class="col-lg-6 mb-4">
                    <h1 class="display-5 mb-3">Beli Buku, Dapat Pelatihan Seharga 2juta+.
                    </h1>
                    <p class="text-warning display-4 mt-0 border-1 rounded-3 fw-bold">Tapi Ajak 5 temen = gratis semua.
                        Serius!
                    </p>

                </div>
                <div class="col-lg-6 text-center p-3">
                    <img src="https://bukukita.com/babacms/displaybuku/101988_f.jpg" alt="Baca Kitab Cepat"
                        class="img-fluid book-cover p-3 bg-white">
                </div>
            </div>
            <div class="text-center mt-3">
                <p class="lead mb-4 fw-bold">Metode revolusioner untuk membaca kitab brbahasa arab dengan cepat dan
                    mudah
                </p>
                <ul class="list-unstyled mb-4">
                    <li class="mb-2"><i class="bi bi-check-circle-fill text-warning me-2"></i> Teknik membaca
                        cepat
                        kitab </li>
                    <li class="mb-2"><i class="bi bi-check-circle-fill text-warning me-2"></i> Kuasai 1000
                        kosakata
                        penting dalam kitab kuning</li>
                    <li class="mb-2"><i class="bi bi-check-circle-fill text-warning me-2"></i> Pahami struktur
                        kalimat
                        bahasa Arab </li>
                </ul>
                <a href="#pricing" class="btn btn-warning btn-lg fw-bold px-4 me-2">Dapatkan Sekarang</a>
                {{-- <a href="#buku" class="btn btn-outline-light btn-lg px-4">Pelajari Lebih Lanjut</a> --}}
            </div>
        </div>
    </section>

    <!-- Buku Section -->
    <section id="buku" class="py-5">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-5 mb-4 mb-lg-0">
                    <img src="https://images.unsplash.com/photo-1589998059171-988d887df646?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80"
                        alt="Buku Baca Kitab Cepat" class="img-fluid rounded shadow">
                </div>
                <div class="mt-2 text-center">
                    <br>
                    <a href="#buku" class="btn btn-danger btn-lg px-4">Test Kemampuan Baca Kitab Kuning Anda
                        disini!</a>
                </div>
            </div>
        </div>
    </section>
    <section class="py-5 bg-warning p-3">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                {{-- <h2 class="fw-bold text-white">Atau</h2> --}}
                <p class="lead text-dark mb-3">Daftarkan diri anda menjadi Reseller sekarang dan dapatkan diskon kelas
                </p>
                <a href="#pricing" class="btn btn-light btn-lg fw-bold px-5 mb-3">Daftar Reseller</a>

            </div>
        </div>
    </section>
    <section class="py-5 bg-success p-3">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <h2 class="fw-bold text-white">Atau</h2>
                <p class="lead text-white mb-3">Daftarkan diri anda menjadi Affiliate sekarang dan dapatkan diskon kelas
                </p>
                <a href="#pricing" class="btn btn-light btn-lg fw-bold px-5 mb-3">Link Affiliate</a>

            </div>
        </div>
    </section>

    <!-- Pricing Section -->
    <section id="pricing" class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="price-box text-center">
                        <div class="discount-badge">40%</div>
                        <h2 class="fw-bold mb-3">Buku</h2>
                        <p class="lead">Dapatkan buku panduan + akses kelas online dengan harga spesial</p>

                        <div class="my-4">
                            <h3 class="original-price d-inline">Rp1.200.000</h3>
                            <h1 class="d-inline ms-3 text-danger">Rp720.000</h1>
                        </div>

                        <ul class="list-unstyled text-start mb-4">
                            <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i> Buku "Baca Kitab
                                Cepat"
                                (Hard Cover)</li>
                            <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i> Akses Kelas Dasar
                                Online
                            </li>
                            <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i> Bonus E-Book
                                Kosakata
                                Kitab Kuning</li>
                            <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i> Grup Diskusi
                                Eksklusif
                            </li>
                            <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i> Sertifikat
                                Penyelesaian
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
                <div class="col-md-4">
                    <div class="card h-100 testiomonial-card">
                        <div class="card-body p-4">
                            <div class="d-flex mb-3">
                                <img src="https://randomuser.me/api/portraits/men/32.jpg" class="rounded-circle me-3"
                                    width="60" alt="Testimonial 1">
                                <div>
                                    <h5 class="mb-0">Ahmad Fauzi</h5>
                                    <p class="text-muted mb-0">Mahasiswa Pesantren</p>
                                    <div class="text-warning">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="card-text fst-italic">"Buku ini benar-benar mengubah cara saya membaca kitab.
                                Metodenya sistematis dan mudah dipahami. Dalam 1 bulan saya sudah bisa membaca fathul
                                qorib tanpa banyak buka kamus."</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card h-100 testiomonial-card">
                        <div class="card-body p-4">
                            <div class="d-flex mb-3">
                                <img src="https://randomuser.me/api/portraits/women/44.jpg"
                                    class="rounded-circle me-3" width="60" alt="Testimonial 2">
                                <div>
                                    <h5 class="mb-0">Siti Aminah</h5>
                                    <p class="text-muted mb-0">Guru Ngaji</p>
                                    <div class="text-warning">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-half"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="card-text fst-italic">"Kelas online-nya sangat membantu. Pengajarnya sabar dan
                                metode pembelajarannya terstruktur. Sekarang saya lebih percaya diri mengajarkan kitab
                                dasar ke santri-santri saya."</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card h-100 testiomonial-card">
                        <div class="card-body p-4">
                            <div class="d-flex mb-3">
                                <img src="https://randomuser.me/api/portraits/men/75.jpg" class="rounded-circle me-3"
                                    width="60" alt="Testimonial 3">
                                <div>
                                    <h5 class="mb-0">Budi Santoso</h5>
                                    <p class="text-muted mb-0">Karyawan</p>
                                    <div class="text-warning">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="card-text fst-italic">"Sebagai pemula yang baru belajar kitab, buku dan kelas ini
                                sangat membantu. Penjelasannya praktis dan langsung bisa diaplikasikan. Sekarang saya
                                bisa ikut pengajian kitab dengan lebih baik."</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Guarantee Section -->
    <section class="py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <div class="guarantee-badge">Garansi 100%</div>
                    <h2 class="fw-bold mb-4">Kepuasan Anda Kami Jamin</h2>
                    <p class="lead">Jika dalam 30 hari Anda tidak merasakan kemajuan dalam membaca kitab, kami akan
                        kembalikan uang Anda.</p>
                    <p>Tidak perlu khawatir, metode ini sudah terbukti membantu ribuan orang. Kami yakin Anda juga akan
                        merasakan manfaatnya.</p>
                </div>
                <div class="col-lg-6">
                    <img src="https://images.unsplash.com/photo-1628313388777-9b9a751dfc6a?q=80&w=1548&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                        alt="Garansi" class="img-fluid rounded shadow">
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
                    <p class="lead text-white mb-3">Daftar sekarang dan dapatkan diskon 40% untuk paket buku + kelas
                    </p>
                    <a href="#pricing" class="btn btn-light btn-lg fw-bold px-5 mb-3">Daftar Sekarang</a>
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
                                    <strong>Ya, sangat cocok!</strong> Program ini dirancang untuk semua level, termasuk
                                    pemula yang baru pertama kali belajar kitab. Kami mulai dari dasar-dasar membaca
                                    kitab gundul secara bertahap.
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
                                    Kebanyakan peserta mulai merasakan kemajuan dalam <strong>2-3 minggu</strong>
                                    pertama jika mengikuti program dengan disiplin. Dalam 1 bulan, Anda sudah bisa
                                    membaca kitab dasar seperti Safinatun Najah dengan cukup baik.
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
                                    Ya, kelas live dilaksanakan 3 kali seminggu (Senin, Rabu, Jumat) pukul 19.30-21.00
                                    WIB. Namun jika Anda tidak bisa hadir, rekaman kelas bisa diakses kapan saja.
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
                                    Buku akan dikirim via kurir ke alamat Anda dalam 1-3 hari kerja setelah pembayaran.
                                    Untuk area Jabodetabek biasanya sampai dalam 1 hari, luar Jawa maksimal 3 hari.
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
                            <p class="">Kami adalah ..............</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="row">
                        <div class="col-lg-6 mb-4 mb-lg-0">
                            <h5>Kontak Kami</h5>
                            <ul class="list-unstyled ">
                                <li><i class="bi bi-geo-alt me-2"></i> Jl. Contoh No. 123, Jember</li>
                                <li><i class="bi bi-telephone me-2"></i> +62 123 4567 890</li>
                                <li><i class="bi bi-envelope me-2"></i> info@example.com</li>
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
