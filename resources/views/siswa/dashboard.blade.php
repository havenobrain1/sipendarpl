@extends('layouts.app', ['title' => 'Dashboard Siswa'])

@section('content')
    <div class="container" style="margin-top: 80px;">
        <div class="row">
            <!-- Header -->
            <div class="col-12">
                <h2 class="fw-bold text-primary mb-4 dashboard-heading-animation">Dashboard Siswa</h2>
                <p class="fs-5">Selamat datang, <span class="text-primary">{{ Auth::user()->name }}</span>!</p>
            </div>
        </div>

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card card-modern mt-3 p-4 status-card-animation">
            <div class="card-header bg-primary text-white">
                <i class="bi bi-person-check"></i> Informasi Pendaftaran
            </div>
            <div class="card-body">
                @if ($pendaftaranStatus && $pendaftaranStatus->is_open)
                    <p class="text-success"><strong>Pendaftaran saat ini dibuka!</strong></p>
                    @if ($pendaftaran)
                        <p>Status Pendaftaran Anda:
                            @if ($pendaftaran->status == 'Menunggu Verifikasi')
                                <span class="text-warning"><strong>Menunggu Verifikasi</strong></span>
                            @elseif($pendaftaran->status == 'Terverifikasi')
                                <span class="text-success"><strong>Sudah Terverifikasi</strong></span>
                            @elseif($pendaftaran->status == 'Gagal')
                                <span class="text-danger"><strong>Maaf, Anda Tidak Lolos!</strong></span>
                            @else
                                <span class="text-secondary"><strong>Status Tidak Dikenal</strong></span>
                            @endif
                        </p>
                    @else
                        <p>Anda belum mengajukan pendaftaran. Klik tombol di bawah untuk mendaftar.</p>
                        <a href="{{ route('siswa.pendaftaran.form') }}" class="btn btn-primary btn-modern">Ajukan
                            Pendaftaran</a>
                    @endif
                @else
                    <p class="text-danger"><strong>Pendaftaran saat ini ditutup.</strong></p>
                    <p>Mohon menunggu hingga pendaftaran dibuka kembali.</p>
                @endif
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        body {
            background-color: #f7f8fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .dashboard-heading-animation {
            animation: fadeInUp 1s ease-out;
        }

        /* Card Modern */
        .card-modern {
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease;
        }

        .card-modern:hover {
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }

        /* Tombol Modern */
        .btn-modern {
            background-color: #2563eb;
            border: none;
            border-radius: 25px;
            font-size: 1rem;
            padding: 10px 20px;
            transition: all 0.3s ease;
        }

        .btn-modern:hover {
            background-color: #1e40af;
            transform: translateY(-3px);
        }

        /* Animasi untuk status card */
        .status-card-animation {
            animation: slideInUp 1s ease-out;
        }

        /* Animasi Fade In Up */
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

        /* Animasi Slide In Up */
        @keyframes slideInUp {
            0% {
                opacity: 0;
                transform: translateY(30px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Ikon */
        .bi {
            font-size: 1.5rem;
            margin-right: 10px;
        }

        /* Responsif pada Mobile */
        @media (max-width: 992px) {
            .dashboard-heading-animation {
                font-size: 1.5rem;
            }
        }
    </style>
@endpush
