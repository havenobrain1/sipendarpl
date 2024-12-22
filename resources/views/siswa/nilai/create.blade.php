@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-lg border-0 rounded-lg">
                <div class="card-header text-center bg-primary text-white">
                    <h4>Input Nilai</h4>
                </div>
                <div class="card-body">
                    <!-- Menampilkan pesan success jika ada -->
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @elseif(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form action="{{ route('siswa.nilai.store') }}" method="POST">
                        @csrf

                        <!-- Input Nilai Matematika -->
                        <div class="mb-3">
                            <label for="nilai_matematika" class="form-label">Nilai Matematika</label>
                            <input type="number" class="form-control form-input" id="nilai_matematika" name="nilai_matematika" required min="0" max="100">
                        </div>

                        <!-- Input Nilai IPA -->
                        <div class="mb-3">
                            <label for="nilai_ipa" class="form-label">Nilai IPA</label>
                            <input type="number" class="form-control form-input" id="nilai_ipa" name="nilai_ipa" required min="0" max="100">
                        </div>

                        <!-- Input Nilai IPS -->
                        <div class="mb-3">
                            <label for="nilai_ips" class="form-label">Nilai IPS</label>
                            <input type="number" class="form-control form-input" id="nilai_ips" name="nilai_ips" required min="0" max="100">
                        </div>

                        <!-- Input Nilai Bahasa Indonesia -->
                        <div class="mb-3">
                            <label for="nilai_bahasa_indonesia" class="form-label">Nilai Bahasa Indonesia</label>
                            <input type="number" class="form-control form-input" id="nilai_bahasa_indonesia" name="nilai_bahasa_indonesia" required min="0" max="100">
                        </div>

                        <button type="submit" class="btn btn-primary btn-modern w-100 py-2">Simpan Nilai</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    body {
        background-color: #f5f8fa;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .card {
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    }

    .card-header {
        border-radius: 20px 20px 0 0;
        font-weight: bold;
    }

    .form-input {
        border-radius: 10px;
        padding: 12px 16px;
        border: 1px solid #ccc;
        transition: all 0.3s ease;
    }

    .form-input:focus {
        border-color: #2563eb;
        box-shadow: 0 0 5px rgba(37, 99, 235, 0.3);
    }

    .btn-modern {
        background-color: #2563eb;
        border-radius: 50px;
        font-size: 1rem;
        transition: all 0.3s ease;
        padding: 12px;
    }

    .btn-modern:hover {
        background-color: #1e40af;
        transform: translateY(-3px);
    }

    .alert {
        font-size: 0.9rem;
        margin-bottom: 15px;
    }

    /* Animasi Halus pada Card */
    .card {
        animation: fadeInUp 1s ease-out;
    }

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

    /* Responsif pada Mobile */
    @media (max-width: 767px) {
        .card-header h4 {
            font-size: 1.25rem;
        }

        .form-input {
            font-size: 0.9rem;
        }

        .btn-modern {
            font-size: 1rem;
        }
    }
</style>
@endpush
