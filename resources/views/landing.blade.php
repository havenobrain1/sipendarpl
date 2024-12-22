<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Landing Page - SIPENDA</title>
    <style>
        .custom-navbar {
            background: linear-gradient(to right, rgba(13, 110, 253, 0.3), rgba(255, 255, 255, 0.1));
            transition: all 0.3s;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s, box-shadow 0.3s;
        }

        .custom-navbar.scrolled {
            background: linear-gradient(to right, #0d6efd, #0d6efd);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }

        .custom-navbar .navbar-brand {
            font-weight: bold;
            color: #fff;
            font-size: 1.5rem;
        }

        .custom-navbar .btn {
            margin-left: 10px;
        }

        .custom-navbar .btn-primary {
            background-color: white;
            border-color: white;
            color: #0d6efd;
        }

        .custom-navbar .btn-primary:hover {
            background-color: #f1f1f1;
            border-color: #0056b3;
            color: #0056b3;
        }

        .custom-navbar .btn-light {
            background-color: white;
            color: #0d6efd;
        }

        .custom-navbar .btn-light:hover {
            background-color: #f1f1f1;
            border-color: #0056b3;
            color: #0056b3;
        }

        .hero-section {
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{ asset('/images/smk.jpg') }}') center/cover no-repeat;
            color: white;
            height: 80vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7);
        }

        .hero-section h1 {
            font-size: 3.5rem;
            font-weight: bold;
        }

        .hero-section p {
            font-size: 1.3rem;
        }

        .hero-section .btn {
            margin-top: 20px;
            padding: 15px 30px;
            font-size: 1.2rem;
            transition: all 0.3s;
        }

        .hero-section .btn:hover {
            transform: scale(1.1);
        }

        .card {
            border: none;
            transition: transform 0.3s, box-shadow 0.3s;
            height: 100%;
        }

        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
        }

        .card-body {
            text-align: center;
        }

        .branding-text {
            font-size: 1.8rem;
            color: #333;
            text-align: center;
            margin: 40px 0;
            font-weight: bold;
        }

        footer {
            background: linear-gradient(to right, #6610f2, #0d6efd);
            color: white;
        }

        footer a {
            color: #f8f9fa;
            text-decoration: none;
            transition: color 0.3s;
        }

        footer a:hover {
            color: #e2e6ea;
        }

        .fade-in {
            opacity: 0;
            animation: fadeIn 1s ease-in forwards;
        }

        @keyframes fadeIn {
            to {
                opacity: 1;
            }
        }
    </style>
    <script>
        window.addEventListener('scroll', () => {
            const navbar = document.querySelector('.custom-navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });
    </script>
</head>

<body>
    <nav class="navbar fixed-top bg-body-tertiary custom-navbar">
        <div class="container">
            <a class="navbar-brand" href="">
                <img src="{{ asset('/images/logo.svg') }}" alt="Logo" class="me-2" width="40"> SIPENDA
            </a>
            <div>
                <a href="{{ route('login.choose') }}" class="btn btn-primary">Login</a>
                <a href="{{ route('register.form') }}" class="btn btn-light">Daftar</a>
            </div>
        </div>
    </nav>

    @if (session('success'))
        <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 1100;">
            <div id="successToast" class="toast align-items-center text-bg-success border-0 shadow-lg" role="alert"
                aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body">
                        🎉 {{ session('success') }}
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                        aria-label="Close"></button>
                </div>
            </div>
        </div>
    @endif

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const successToast = document.getElementById('successToast');
            if (successToast) {
                const toast = new bootstrap.Toast(successToast);
                toast.show();
            }
        });
    </script>


    <section class="hero-section text-center">
        <h1 class="fade-in">Selamat Datang di SIPENDA</h1>
        <p class="fade-in">Sistem Pendaftaran Siswa Sekolah Menengah yang Modern dan Mudah Digunakan</p>
        <a href="{{ route('register.form') }}" class="btn btn-primary fade-in">Daftar Sekarang</a>
    </section>

    <div class="branding-text fade-in">"Pendidikan Berkualitas untuk Generasi Masa Depan"</div>

    <div class="container my-5 fade-in">
        <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="10000">
                    <img src="{{ asset('/images/landing2.jpg') }}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item" data-bs-interval="2000">
                    <img src="{{ asset('/images/landing1.jpg') }}" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval"
                data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <div class="container">
        <div class="row g-4">
            <div class="col-md-6 col-lg-3 fade-in">
                <div class="card shadow-sm">
                    <img src="{{ asset('/images/card1.jpg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Alur Pendaftaran</h5>
                        <p class="card-text">Pendaftaran online dibuka 1 Januari - 30 Juni. Isi formulir, unggah
                            dokumen, dan ikuti tes seleksi. Hasil seleksi diumumkan di website resmi.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 fade-in">
                <div class="card shadow-sm">
                    <img src="{{ asset('/images/card2.jpg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Penghargaan</h5>
                        <p class="card-text">Kami menghargai pencapaian luar biasa siswa untuk memotivasi dan mendukung
                            keberhasilan pendidikan.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 fade-in">
                <div class="card shadow-sm">
                    <img src="{{ asset('/images/card3.jpg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Fasilitas</h5>
                        <p class="card-text">Fasilitas terbaik untuk pengalaman belajar optimal, termasuk laboratorium,
                            perpustakaan, dan area olahraga.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 fade-in">
                <div class="card shadow-sm">
                    <img src="{{ asset('/images/card4.jpg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Sertifikat</h5>
                        <p class="card-text">Pengakuan resmi atas pencapaian siswa dalam bidang akademik dan
                            non-akademik.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="py-4 text-center">
        <div class="container">
            <p>&copy; 2024 SIPENDA. All rights reserved.</p>
            <div>
                <a href="#" class="me-3">Facebook</a>
                <a href="#" class="me-3">Twitter</a>
                <a href="#">Instagram</a>
            </div>
        </div>
    </footer>
</body>

</html>
