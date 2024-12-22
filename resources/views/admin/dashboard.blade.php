@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        .hover-shadow {
            transition: all 0.3s ease;
        }

        .hover-shadow:hover {
            transform: translateY(-5px);
            box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .15) !important;
        }

        .btn-soft-success {
            background-color: var(--bs-success-bg-subtle);
            color: var(--bs-success);
            border: none;
        }

        .btn-soft-success:hover {
            background-color: var(--bs-success);
            color: white;
        }

        .btn-soft-danger {
            background-color: var(--bs-danger-bg-subtle);
            color: var(--bs-danger);
            border: none;
        }

        .btn-soft-danger:hover {
            background-color: var(--bs-danger);
            color: white;
        }

        @media (max-width: 768px) {
            .card-body h2 { font-size: 1.5rem; }
            .card-body h5 { font-size: 1rem; }
            .btn { font-size: 0.875rem; }
        }

        @media (max-width: 576px) {
            .card-body h2 { font-size: 1.25rem; }
            .card-body h5 { font-size: 0.9rem; }
            .btn {
                font-size: 0.8rem;
                padding: 0.4rem 0.8rem;
            }
        }
    </style>
@endsection

@section('content')
    <div class="container py-4">
        {{-- Welcome Card --}}
        <div class="row mb-4">
            <div class="col-12">
                <div class="card border-0 rounded-4 shadow-sm bg-primary text-white">
                    <div class="card-body p-4">
                        <h3 class="fw-bold">Selamat datang, {{ auth()->user()->name }}!</h3>
                        <p class="mb-0">Kelola pendaftaran dan data siswa dengan mudah</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Stats Cards --}}
        <div class="row g-4 mb-4">
            {{-- Total Siswa --}}
            <div class="col-lg-3 col-md-6">
                <div class="card h-100 border-0 rounded-4 shadow-sm hover-shadow bg-success text-white">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <h6 class="text-white-50 mb-2">Total Siswa</h6>
                                <h2 class="mb-0 fw-bold">{{ $totalSiswa }}</h2>
                            </div>
                            <div class="rounded-circle p-3 bg-white bg-opacity-25">
                                <i class="bi bi-mortarboard fs-3 text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Total Guru --}}
            <div class="col-lg-3 col-md-6">
                <div class="card h-100 border-0 rounded-4 shadow-sm hover-shadow bg-info text-white">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <h6 class="text-white-50 mb-2">Total Guru</h6>
                                <h2 class="mb-0 fw-bold">{{ $totalGuru }}</h2>
                            </div>
                            <div class="rounded-circle p-3 bg-white bg-opacity-25">
                                <i class="bi bi-person-video3 fs-3 text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Total Kelas --}}
            <div class="col-lg-3 col-md-6">
                <div class="card h-100 border-0 rounded-4 shadow-sm hover-shadow bg-warning text-white">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <h6 class="text-white-50 mb-2">Total Kelas</h6>
                                <h2 class="mb-0 fw-bold">{{ $totalKelas }}</h2>
                            </div>
                            <div class="rounded-circle p-3 bg-white bg-opacity-25">
                                <i class="bi bi-door-open fs-3 text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Total Pendaftar --}}
            <div class="col-lg-3 col-md-6">
                <div class="card h-100 border-0 rounded-4 shadow-sm hover-shadow bg-danger text-white">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <h6 class="text-white-50 mb-2">Total Pendaftar</h6>
                                <h2 class="mb-0 fw-bold">{{ $totalPendaftar }}</h2>
                            </div>
                            <div class="rounded-circle p-3 bg-white bg-opacity-25">
                                <i class="bi bi-person-plus fs-3 text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Status Pendaftaran Card --}}
        <div class="row mb-4">
            <div class="col-12">
                <div class="card border-0 rounded-4 shadow-sm">
                    <div class="card-header bg-white border-0 pt-4 pb-0 px-4">
                        <h5 class="mb-0 fw-bold">Status Pendaftaran</h5>
                    </div>
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <h6 class="mb-0">Status Pendaftaran Saat Ini:</h6>
                            <span class="badge rounded-pill {{ $pendaftaranStatus->is_open ? 'bg-success text-white' : 'bg-danger text-white' }} px-3 py-2">
                                {{ $pendaftaranStatus->is_open ? 'Dibuka' : 'Ditutup' }}
                            </span>
                        </div>
                        <form action="{{ $pendaftaranStatus->is_open ? route('admin.pendaftaran.tutup') : route('admin.pendaftaran.buka') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-lg {{ $pendaftaranStatus->is_open ? 'btn-danger' : 'btn-success' }} w-100 rounded-3">
                                <i class="bi {{ $pendaftaranStatus->is_open ? 'bi-lock' : 'bi-unlock' }} me-2"></i>
                                {{ $pendaftaranStatus->is_open ? 'Tutup Pendaftaran' : 'Buka Pendaftaran' }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
