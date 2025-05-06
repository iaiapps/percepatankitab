<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Baca Kitab Cepat - Buku & Kelas Percepatan Membaca Kitab Bahasa Arab</title>
    <!-- Bootstrap 5.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #e74c3c;
            --accent-color: #f39c12;
            --arabic-font: 'Traditional Arabic', Arial, sans-serif;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
        }

        .hero-section {
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('https://images.unsplash.com/photo-1544947950-fa07a98d237f?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 100px 0;
        }

        .book-cover {
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            border-radius: 5px;
            transition: transform 0.3s;
            max-height: 400px;
            width: auto;
        }

        .book-cover:hover {
            transform: scale(1.05);
        }

        .benefit-icon {
            color: var(--secondary-color);
            font-size: 1.5rem;
            margin-right: 1rem;
        }

        .price-box {
            background-color: #f8f9fa;
            border-radius: 10px;
            padding: 2rem;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            position: relative;
        }

        .original-price {
            text-decoration: line-through;
            color: #6c757d;
        }

        .discount-badge {
            position: absolute;
            top: -10px;
            right: -10px;
            background-color: var(--secondary-color);
            color: white;
            border-radius: 50%;
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 1.2rem;
        }

        .testimonial-card {
            border-left: 4px solid var(--accent-color);
        }

        .cta-section {
            background-color: var(--primary-color);
            color: white;
        }

        .guarantee-badge {
            background-color: var(--accent-color);
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 50px;
            display: inline-block;
            font-weight: bold;
            margin-bottom: 1rem;
        }

        .btn-primary-custom {
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
            padding: 0.75rem 2rem;
            font-weight: bold;
        }

        .btn-primary-custom:hover {
            background-color: #c0392b;
            border-color: #c0392b;
        }

        .arabic-text {
            font-family: var(--arabic-font);
            font-size: 1.2em;
            direction: rtl;
        }

        .course-card {
            transition: transform 0.3s;
        }

        .course-card:hover {
            transform: translateY(-10px);
        }

        .countdown-box {
            background-color: rgba(0, 0, 0, 0.7);
            color: white;
            padding: 1rem;
            border-radius: 5px;
            display: inline-block;
        }

        .countdown-item {
            display: inline-block;
            margin: 0 10px;
            text-align: center;
        }

        .countdown-number {
            font-size: 2rem;
            font-weight: bold;
            display: block;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">
                <i class="fas fa-book-quran me-2"></i> Baca Kitab Cepat
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
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <div class="countdown-box mb-4">
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
                        <p class="text-center mt-2 mb-0">Diskon 40% akan segera berakhir!</p>
                    </div>

                    <h1 class="display-4 fw-bold mb-4">Baca Kitab Kuning <span class="text-warning">Tanpa
                            Terjemahan</span> dalam 30 Hari</h1>
                    <p class="lead mb-4">Metode revolusioner untuk memahami kitab gundul dengan cepat dan mudah</p>
                    <ul class="list-unstyled mb-4">
                        <li class="mb-2"><i class="fas fa-check-circle text-warning me-2"></i> Teknik membaca cepat
                            kitab gundul</li>
                        <li class="mb-2"><i class="fas fa-check-circle text-warning me-2"></i> Kuasai 1000 kosakata
                            penting dalam kitab kuning</li>
                        <li class="mb-2"><i class="fas fa-check-circle text-warning me-2"></i> Pahami struktur kalimat
                            bahasa Arab klasik</li>
                    </ul>
                    <a href="#pricing" class="btn btn-warning btn-lg fw-bold px-4 me-2">Dapatkan Sekarang</a>
                    <a href="#buku" class="btn btn-outline-light btn-lg px-4">Pelajari Lebih Lanjut</a>
                </div>
                <div class="col-lg-6 text-center">
                    <img src="https://m.media-amazon.com/images/I/71UwSHSZRnS._AC_UF1000,1000_QL80_.jpg"
                        alt="Baca Kitab Cepat" class="img-fluid book-cover">
                </div>
            </div>
        </div>
    </section>

    <!-- Buku Section -->
    <section id="buku" class="py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 mb-4 mb-lg-0">
                    <img src="https://images.unsplash.com/photo-1589998059171-988d887df646?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80"
                        alt="Buku Baca Kitab Cepat" class="img-fluid rounded shadow">
                </div>
                <div class="col-lg-7">
                    <h2 class="fw-bold mb-4"><span class="text-primary">Buku Panduan</span> Percepatan Membaca Kitab
                    </h2>
                    <p class="lead">Temukan metode terstruktur untuk menguasai kitab gundul dalam waktu singkat</p>

                    <div class="row mt-4">
                        <div class="col-md-6">
                            <div class="d-flex mb-3">
                                <i class="fas fa-check-circle text-primary fs-3 me-3"></i>
                                <div>
                                    <h5 class="fw-bold">Best Seller</h5>
                                    <p class="mb-0">10.000+ eksemplar terjual</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex mb-3">
                                <i class="fas fa-star text-primary fs-3 me-3"></i>
                                <div>
                                    <h5 class="fw-bold">Rating 4.8/5</h5>
                                    <p class="mb-0">Dari 500+ pembaca</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="d-flex mb-3">
                                <i class="fas fa-book-open text-primary fs-3 me-3"></i>
                                <div>
                                    <h5 class="fw-bold">200+ Halaman</h5>
                                    <p class="mb-0">Materi padat dan praktis</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex mb-3">
                                <i class="fas fa-award text-primary fs-3 me-3"></i>
                                <div>
                                    <h5 class="fw-bold">Bonus Eksklusif</h5>
                                    <p class="mb-0">Akses materi digital</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Kelas Section -->
    <section id="kelas" class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Kelas <span class="text-primary">Online</span> Percepatan Membaca Kitab</h2>
                <p class="lead text-muted">Program intensif dengan pendampingan langsung dari ahli</p>
            </div>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card h-100 course-card">
                        <div class="card-header bg-primary text-white text-center py-3">
                            <h4>Kelas Dasar</h4>
                            <p class="mb-0">Memahami Kitab Fiqh Dasar</p>
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled">
                                <li class="mb-2"><i class="fas fa-check text-primary me-2"></i> 12 Sesi Live</li>
                                <li class="mb-2"><i class="fas fa-check text-primary me-2"></i> Materi Kitab
                                    Safinatun Najah</li>
                                <li class="mb-2"><i class="fas fa-check text-primary me-2"></i> Grup Diskusi
                                    WhatsApp</li>
                                <li class="mb-2"><i class="fas fa-check text-primary me-2"></i> Rekaman Kelas</li>
                                <li class="mb-2"><i class="fas fa-times text-muted me-2"></i> Konsultasi Privat</li>
                            </ul>
                        </div>
                        <div class="card-footer bg-transparent text-center">
                            <a href="#" class="btn btn-outline-primary">Info Selengkapnya</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card h-100 course-card border-primary border-2">
                        <div class="card-header bg-white text-primary text-center py-3">
                            <span
                                class="badge bg-warning text-dark position-absolute top-0 start-50 translate-middle">Paling
                                Populer</span>
                            <h4>Kelas Menengah</h4>
                            <p class="mb-0">Membaca Kitab Fiqh Lanjutan</p>
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled">
                                <li class="mb-2"><i class="fas fa-check text-primary me-2"></i> 24 Sesi Live</li>
                                <li class="mb-2"><i class="fas fa-check text-primary me-2"></i> Materi Kitab Fathul
                                    Qorib</li>
                                <li class="mb-2"><i class="fas fa-check text-primary me-2"></i> Grup Diskusi
                                    WhatsApp</li>
                                <li class="mb-2"><i class="fas fa-check text-primary me-2"></i> Rekaman Kelas</li>
                                <li class="mb-2"><i class="fas fa-check text-primary me-2"></i> 2x Konsultasi Privat
                                </li>
                            </ul>
                        </div>
                        <div class="card-footer bg-transparent text-center">
                            <a href="#" class="btn btn-primary">Info Selengkapnya</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card h-100 course-card">
                        <div class="card-header bg-success text-white text-center py-3">
                            <h4>Kelas Lanjutan</h4>
                            <p class="mb-0">Analisis Kitab Turots</p>
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled">
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i> 36 Sesi Live</li>
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i> Materi Kitab Ihya
                                    Ulumuddin</li>
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i> Grup Diskusi
                                    WhatsApp</li>
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i> Rekaman Kelas</li>
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i> 6x Konsultasi Privat
                                </li>
                            </ul>
                        </div>
                        <div class="card-footer bg-transparent text-center">
                            <a href="#" class="btn btn-outline-success">Info Selengkapnya</a>
                        </div>
                    </div>
                </div>
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
                        <h2 class="fw-bold mb-3">Paket Komplit Buku + Kelas</h2>
                        <p class="lead">Dapatkan buku panduan + akses kelas online dengan harga spesial</p>

                        <div class="my-4">
                            <h3 class="original-price d-inline">Rp1.200.000</h3>
                            <h1 class="d-inline ms-3 text-danger">Rp720.000</h1>
                        </div>

                        <ul class="list-unstyled text-start mb-4">
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i> Buku "Baca Kitab Cepat"
                                (Hard Cover)</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i> Akses Kelas Dasar Online
                            </li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i> Bonus E-Book Kosakata
                                Kitab Kuning</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i> Grup Diskusi Eksklusif
                            </li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i> Sertifikat Penyelesaian
                            </li>
                        </ul>

                        <a href="#" class="btn btn-danger btn-lg fw-bold px-5 mb-3">Pesan Sekarang</a>
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
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
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
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
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
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
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
                    <img src="https://images.unsplash.com/photo-1584824486539-53bb4646bdbc?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80"
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
                    <p class="lead text-white mb-5">Daftar sekarang dan dapatkan diskon 40% untuk paket buku + kelas
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

    <!-- Footer -->
    <footer class="py-4 bg-dark text-white">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start">
                    <p class="mb-0">&copy; 2023 Baca Kitab Cepat. All rights reserved.</p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <a href="#" class="text-white text-decoration-none me-3">Kebijakan Privasi</a>
                    <a href="#" class="text-white text-decoration-none">Syarat & Ketentuan</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap 5.3 JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Countdown Timer
        function updateCountdown() {
            const now = new Date();
            const targetDate = new Date();
            targetDate.setDate(now.getDate() + 3); // Set target 3 days from now

            const totalSeconds = (targetDate - now) / 1000;

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
