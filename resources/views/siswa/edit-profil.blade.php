@extends('layouts.app')

@section('title', 'Edit Profil')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10 col-12 wow fadeInUp" data-wow-delay="0.3s">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Edit Profil</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('siswa.update-profil') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                            <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" value="{{ old('nama_lengkap', $siswa->nama_lengkap) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" value="{{ old('tempat_lahir', $siswa->tempat_lahir) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" value="{{ old('tanggal_lahir', $siswa->tanggal_lahir) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="agama" class="form-label">Agama</label>
                            <input type="text" name="agama" id="agama" class="form-control" value="{{ old('agama', $siswa->agama) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea name="alamat" id="alamat" class="form-control" rows="3" required>{{ old('alamat', $siswa->alamat) }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="foto_profil" class="form-label">Foto Profil (Opsional)</label>
                            <input type="file" name="foto_profil" id="foto_profil" class="form-control">
                        </div>

                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            <a href="{{ route('siswa.informasi-pribadi') }}" class="btn btn-secondary">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('css')
    <style>
        /* Animasi untuk fade in pada halaman */
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

        /* Mengaplikasikan animasi pada elemen */
        .wow.fadeInUp {
            animation: fadeInUp 0.6s ease;
        }

        /* Menambahkan efek pada card */
        .card {
            animation: fadeInUp 0.8s ease;
        }

        .card-body {
            animation: fadeInUp 1s ease;
        }

        /* Penyesuaian responsif */
        @media (max-width: 576px) {
            .card-header h5 {
                font-size: 1.2rem;
            }
            .btn {
                font-size: 0.875rem;
                padding: 0.5rem 1rem;
            }
        }
    </style>
@endsection

@section('scripts')
    <script>
        // Menambahkan kelas animasi untuk elemen-elemen di halaman saat dimuat
        document.addEventListener("DOMContentLoaded", function() {
            var elements = document.querySelectorAll('.wow');
            elements.forEach(function(element) {
                element.classList.add('fadeInUp');
            });
        });
    </script>
@endsection
