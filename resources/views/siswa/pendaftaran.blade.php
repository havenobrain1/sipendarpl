@extends('layouts.app', ['title' => 'Formulir Pendaftaran'])

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-lg border-0 rounded-lg">
                <div class="card-header text-center bg-primary text-white">
                    <h4>Formulir Pendaftaran</h4>
                </div>
                <div class="card-body">
                    <!-- Menampilkan pesan success jika ada -->
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <!-- Menampilkan pesan error jika ada -->
                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <!-- Cek apakah pendaftaran sudah ditutup -->
                    @if ($pendaftaranStatus && !$pendaftaranStatus->is_open)
                        <div class="alert alert-warning">
                            Pendaftaran sudah ditutup.
                        </div>
                    @else
                        <form action="{{ route('siswa.pendaftaran.submit') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <!-- Input Formulir -->
                            <div class="mb-3">
                                <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control form-input" id="nama_lengkap" name="nama_lengkap" value="{{ old('nama_lengkap') }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="nisn" class="form-label">NISN</label>
                                <input type="text" class="form-control form-input" id="nisn" name="nisn" value="{{ old('nisn') }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                                <input type="text" class="form-control form-input" id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir') }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                <input type="date" class="form-control form-input" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="agama" class="form-label">Agama</label>
                                <input type="text" class="form-control form-input" id="agama" name="agama" value="{{ old('agama') }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <textarea class="form-control form-input" id="alamat" name="alamat" rows="3" required>{{ old('alamat') }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="no_telp" class="form-label">No. Telp</label>
                                <input type="text" class="form-control form-input" id="no_telp" name="no_telp" value="{{ old('no_telp') }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="jarak_tempat_tinggal" class="form-label">Jarak dari Tempat Tinggal</label>
                                <input type="number" class="form-control form-input" id="jarak_tempat_tinggal" name="jarak_tempat_tinggal" value="{{ old('jarak_tempat_tinggal') }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="foto_ijasah" class="form-label">Foto Ijazah</label>
                                <input type="file" class="form-control form-input" id="foto_ijasah" name="foto_ijasah" required>
                            </div>

                            <div class="mb-3">
                                <label for="foto_kk" class="form-label">Foto KK</label>
                                <input type="file" class="form-control form-input" id="foto_kk" name="foto_kk" required>
                            </div>

                            <div class="mb-3">
                                <label for="foto_profil" class="form-label">Foto Profil 3x4</label>
                                <input type="file" class="form-control form-input" id="foto_profil" name="foto_profil" required>
                            </div>

                            <button type="submit" class="btn btn-primary btn-modern w-100 py-2">Kirim Pendaftaran</button>
                        </form>
                    @endif
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
