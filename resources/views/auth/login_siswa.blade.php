@extends('layouts.auth', ['title' => 'Login Siswa'])

@section('content')
<div class="container d-flex align-items-center justify-content-center" style="min-height: 100vh;">
    <div class="row w-100">
        <!-- Bagian Ilustrasi (Logo) -->
        <div class="col-lg-6 d-flex align-items-center justify-content-center mb-4 mb-lg-0">
            <a href="{{ url('/') }}">
                <img src="/images/logo.svg" alt="Sipenda" class="img-fluid logo-animation">
            </a>
        </div>

        <!-- Bagian Formulir -->
        <div class="col-lg-6">
            <div class="d-flex justify-content-start mb-3">
                <a href="{{ url('/') }}" class="text-primary text-decoration-none" style="font-size: 1.5rem;">
                    <i class="bi bi-arrow-left"></i>
                </a>
            </div>
            <div class="card border-0 shadow-sm p-4 form-card-animation">
                <h2 class="text-primary fw-bold mb-4 login-heading-animation">Login Siswa</h2>

                <!-- Pesan keberhasilan atau error -->
                @if (session('success'))
                    <div class="alert alert-success mb-3">
                        {{ session('success') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger mb-3">
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                <form method="POST" action="{{ route('login.siswa') }}">
                    @csrf
                    <div class="mb-3">
                        <input type="email" name="email" id="email" class="form-control form-input input-animation" placeholder="Masukkan email" required>
                    </div>
                    <div class="mb-3">
                        <input type="password" name="password" id="password" class="form-control form-input input-animation" placeholder="Masukkan password" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100 py-2 button-animation">Login</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    body {
        background-color: #ffffff;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .form-input {
        border-radius: 10px;
        padding: 15px;
        font-size: 1rem;
        border: 1px solid #ccc;
        transition: all 0.3s ease;
    }

    .form-input:focus {
        border-color: #2563eb;
        box-shadow: 0 0 5px rgba(37, 99, 235, 0.3);
    }

    .btn-primary {
        background-color: #2563eb;
        border: none;
        border-radius: 10px;
        font-size: 1rem;
    }

    .btn-primary:hover {
        background-color: #1e40af;
    }

    .alert {
        font-size: 0.9rem;
    }

    .alert-danger {
        background-color: #f8d7da;
        color: #842029;
    }

    .alert ul {
        list-style: none;
        padding-left: 0;
    }

    .alert li {
        margin-bottom: 5px;
    }

    /* Logo Responsif */
    .img-fluid {
        max-width: 100%;
        height: auto;
    }

    /* Full-Screen Layout pada Desktop */
    @media (min-width: 992px) {
        .col-lg-6 {
            max-width: 50%;
            margin: 0 auto;
        }

        .card {
            width: 100%;
        }
    }

    /* Responsif pada Mobile: Logo di atas Form */
    @media (max-width: 992px) {
        .row {
            flex-direction: column-reverse;
        }

        .col-lg-6 {
            width: 100%;
        }

        .card {
            width: 100%;
        }
    }

    /* Animasi untuk Logo */
    .logo-animation {
        animation: fadeIn 1s ease-out;
    }

    /* Animasi untuk Judul */
    .login-heading-animation {
        animation: fadeInUp 1s ease-out;
    }

    /* Animasi untuk Form */
    .form-card-animation {
        animation: slideUp 1s ease-out;
    }

    /* Animasi untuk Input */
    .input-animation {
        animation: fadeInUp 1s ease-out;
    }

    /* Animasi untuk Tombol */
    .button-animation {
        animation: fadeInUp 1.5s ease-out;
    }

    /* Keyframe untuk Fade In */
    @keyframes fadeIn {
        0% {
            opacity: 0;
        }
        100% {
            opacity: 1;
        }
    }

    /* Keyframe untuk Fade In dari Bawah */
    @keyframes fadeInUp {
        0% {
            opacity: 0;
            transform: translateY(20px);
        }
        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Keyframe untuk Slide Up */
    @keyframes slideUp {
        0% {
            opacity: 0;
            transform: translateY(30px);
        }
        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>
@endpush
