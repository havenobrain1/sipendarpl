@extends('layouts.auth', ['title' => 'Daftar Siswa'])

@section('content')
<div class="container d-flex align-items-center justify-content-center" style="min-height: 100vh;">
    <div class="row w-100">
        <!-- Bagian Ilustrasi (Logo) -->
        <div class="col-lg-6 d-flex align-items-center justify-content-center mb-4 mb-lg-0">
            <a href="{{ url('/') }}">
                <img src="/images/logo.svg" alt="Sipenda" class="img-fluid" style="max-width: 100%; height: auto;">
            </a>
        </div>

        <!-- Bagian Formulir -->
        <div class="col-lg-6">
            <div class="d-flex justify-content-start mb-3">
                <a href="{{ url('/') }}" class="text-primary text-decoration-none" style="font-size: 1.5rem;">
                    <i class="bi bi-arrow-left"></i>
                </a>
            </div>
            <div class="card border-0 shadow-sm p-4" style="border-radius: 12px;">
                <h2 class="text-primary fw-bold mb-4">Daftar Siswa</h2>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="mb-3">
                        <input type="email" name="email" id="email" class="form-control form-input" placeholder="Email" required>
                    </div>
                    <div class="mb-3">
                        <input type="text" name="name" id="name" class="form-control form-input" placeholder="Nama Lengkap" required>
                    </div>
                    <div class="mb-3">
                        <input type="text" name="alamat" id="alamat" class="form-control form-input" placeholder="Alamat" required>
                    </div>
                    <div class="mb-3">
                        <input type="password" name="password" id="password" class="form-control form-input" placeholder="Password" required>
                    </div>
                    <div class="mb-3">
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control form-input" placeholder="Konfirmasi Password" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100 py-2">Daftar</button>
                </form>
                @if ($errors->any())
                    <div class="alert alert-danger mt-4">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
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
</style>
@endpush
