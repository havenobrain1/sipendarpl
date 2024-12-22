<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    <title>Pilih Login</title>
    <style>
        body {
            background-color: #f9f9f9;
            color: #333;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .login-option {
            text-align: center;
            color: #0d6efd;
            /* Kemendikbud blue */
            background-color: #ffffff;
            padding: 50px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease, background-color 0.3s ease;
            text-decoration: none;
            width: 400px;
            /* Memperpanjang lebar kotak */
            height: 250px;
            /* Menambah tinggi kotak */
            margin: 0 auto;
            /* Menjaga posisi di tengah */
        }

        .login-option:hover {
            transform: translateY(-12px);
            box-shadow: 0 18px 35px rgba(13, 110, 253, 0.2);
            /* Warna biru saat hover */
            background-color: #b3d9ff;
            /* Ubah warna latar belakang saat hover */
        }

        .login-option:active {
            background-color: #0d6efd;
            /* Warna lebih gelap ketika diklik */
            color: #fff;
        }

        .login-option:active img {
            filter: brightness(0) invert(1);
        }

        .login-option img {
            width: 80px;
            height: 80px;
            margin-bottom: 15px;
            transition: filter 0.3s ease;
        }

        .login-heading {
            animation: fadeInDown 0.3s ease-out;
            color: #0d6efd;
            /* Kemendikbud blue */
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 40px;
        }

        @keyframes fadeInDown {
            0% {
                opacity: 0;
                transform: translateY(-30px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInUp {
            0% {
                opacity: 0;
                transform: translateY(30px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .login-container {
            animation: fadeInUp 0.3s ease-out;
        }

        .col-md-4 {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Mengurangi jarak antar kolom */
        .row {
            margin-left: 0 !important;
            margin-right: 0 !important;
        }

        .col-md-4 {
            padding-left: 20px;
            padding-right: 20px;
        }

        .sipenda-logo {
            width: 100px; /* Ukuran logo lebih kecil */
            /* Ukuran logo */
            margin-bottom: 20px; /* Jarak antara logo dan heading */
        }
    </style>
</head>

<body class="d-flex justify-content-center align-items-center vh-100">
    <div class="container text-center">
        <!-- Menambahkan Logo Sipenda di atas heading -->
        <a href="/" class="d-block">
            <img src="/images/logo.svg" alt="Sipenda Logo" class="sipenda-logo">
        </a>
        <h2 class="mb-4 login-heading">Pilih Login</h2>
        <div class="row justify-content-center g-4 login-container">
            <div class="col-md-4">
                <a href="{{ route('login.siswa.form') }}" class="login-option d-block">
                    <img src="https://img.icons8.com/ios-filled/100/0d6efd/student-male.png" alt="Siswa">
                    <h4>Siswa</h4>
                </a>
            </div>
            <div class="col-md-4">
                <a href="{{ route('login.sekolah.form') }}" class="login-option d-block">
                    <img src="https://img.icons8.com/ios-filled/100/0d6efd/graduation-cap.png" alt="Sekolah">
                    <h4>Sekolah</h4>
                </a>
            </div>
        </div>
    </div>
</body>

</html>
