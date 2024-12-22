@extends('layouts.app')

@section('title', 'Informasi Pribadi')

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-12 mb-4 wow fadeInUp" data-wow-delay="0.2s">
                <div class="card shadow-sm border-0">
                    <div class="card-body text-center">
                        @if ($siswa)
                            <div class="position-relative mb-3">
                                <img src="{{ asset('storage/' . $siswa->foto_profil) }}" alt="Foto Profil"
                                    class="rounded-circle profile-img"
                                    style="width: 150px; height: 150px; object-fit: cover;">
                            </div>
                            <h5 class="mb-1">{{ $siswa->nama_lengkap }}</h5>
                            <p class="text-muted small">Last login: {{ \Carbon\Carbon::now()->format('d M Y H:i') }}</p>
                            <p class="text-muted mb-3">{{ $siswa->alamat }}</p>
                            <button class="btn btn-primary btn-sm wow bounceIn" data-wow-delay="0.4s"
                                onclick="location.href='{{ route('siswa.edit-profil') }}'" id="editProfileBtn">Edit
                                Profile</button>
                        @else
                            <div class="position-relative mb-3">
                                <img src="{{ asset('images/default-profile.png') }}" alt="Default Foto Profil"
                                    class="rounded-circle profile-img"
                                    style="width: 150px; height: 150px; object-fit: cover;">
                            </div>
                            <h5 class="mb-1">Belum ada data</h5>
                            <p class="text-muted mb-3">Silakan lengkapi data pendaftaran Anda.</p>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-lg-8 col-md-6 col-sm-12 mb-4 wow fadeInUp" data-wow-delay="0.4s">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Data Pendaftaran</h5>
                    </div>
                    <div class="card-body">
                        @if ($siswa)
                            <form class="row g-3">
                                <div class="col-lg-6 col-md-12">
                                    <label for="nisn" class="form-label text-muted"><strong>NISN</strong></label>
                                    <input type="text" id="nisn" class="form-control" value="{{ $siswa->nisn }}"
                                        readonly>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <label for="tempat_lahir" class="form-label text-muted"><strong>Tempat
                                            Lahir</strong></label>
                                    <input type="text" id="tempat_lahir" class="form-control"
                                        value="{{ $siswa->tempat_lahir }}" readonly>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <label for="tanggal_lahir" class="form-label text-muted"><strong>Tanggal
                                            Lahir</strong></label>
                                    <input type="text" id="tanggal_lahir" class="form-control"
                                        value="{{ \Carbon\Carbon::parse($siswa->tanggal_lahir)->format('d M Y') }}"
                                        readonly>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <label for="agama" class="form-label text-muted"><strong>Agama</strong></label>
                                    <input type="text" id="agama" class="form-control" value="{{ $siswa->agama }}"
                                        readonly>
                                </div>
                                <div class="col-lg-12">
                                    <label for="alamat" class="form-label text-muted"><strong>Alamat</strong></label>
                                    <textarea id="alamat" class="form-control" rows="2" readonly>{{ $siswa->alamat }}</textarea>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <label for="foto_ijasah" class="form-label text-muted"><strong>Foto
                                            Ijasah</strong></label>
                                    <a href="{{ asset('storage/' . $siswa->foto_ijasah) }}" target="_blank"
                                        class="btn btn-link text-primary wow fadeIn" data-wow-delay="0.6s">Lihat</a>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <label for="foto_kk" class="form-label text-muted"><strong>Foto KK</strong></label>
                                    <a href="{{ asset('storage/' . $siswa->foto_kk) }}" target="_blank"
                                        class="btn btn-link text-primary wow fadeIn" data-wow-delay="0.8s">Lihat</a>
                                </div>
                            </form>
                        @else
                            <p class="text-muted">Belum ada data pendaftaran. Silakan lengkapi pendaftaran terlebih dahulu.
                            </p>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 wow fadeInUp" data-wow-delay="1s">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Data Nilai</h5>
                    </div>
                    <div class="card-body">
                        @if ($nilai && $nilai->isNotEmpty())
                            <table class="table table-bordered wow fadeInUp" data-wow-delay="1.2s">
                                <thead class="table-light">
                                    <tr>
                                        <th>Mata Pelajaran</th>
                                        <th>Nilai</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Matematika</td>
                                        <td>{{ $nilai->nilai_matematika }}</td>
                                    </tr>
                                    <tr>
                                        <td>IPA</td>
                                        <td>{{ $nilai->nilai_ipa }}</td>
                                    </tr>
                                    <tr>
                                        <td>IPS</td>
                                        <td>{{ $nilai->nilai_ips }}</td>
                                    </tr>
                                    <tr>
                                        <td>Bahasa Indonesia</td>
                                        <td>{{ $nilai->nilai_bahasa_indonesia }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Rata-rata</b></td>
                                        <td><b>{{ $nilai->nilai_rata_rata }}</b></td>
                                    </tr>
                                </tbody>
                            </table>
                        @else
                            <p class="text-muted">Belum ada nilai yang tersedia.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('css')
    <style>
        .profile-img {
            transition: transform 0.5s ease, opacity 0.5s ease;
        }

        .profile-img:hover {
            transform: scale(1.1);
            opacity: 0.8;
        }

        .btn {
            transition: transform 0.3s ease-in-out, background-color 0.3s ease-in-out;
        }

        .btn:hover {
            transform: scale(1.05);
            background-color: #0056b3;
        }

        table {
            transition: opacity 0.5s ease;
        }

        table:hover {
            opacity: 0.8;
        }

        /* Animasi untuk tombol ketika diklik */
        @keyframes clickAnimation {
            0% {
                transform: scale(1);
                background-color: #007bff;
            }

            50% {
                transform: scale(0.95);
                background-color: #0056b3;
            }

            100% {
                transform: scale(1);
                background-color: #007bff;
            }
        }

        .btn-click-animation {
            animation: clickAnimation 0.3s ease;
        }

        /* Penyesuaian responsif */
        @media (max-width: 768px) {
            .card-header h5 {
                font-size: 1.2rem;
            }

            .btn {
                font-size: 0.875rem;
                padding: 0.5rem 1rem;
            }

            table {
                font-size: 0.9rem;
            }
        }

        @media (max-width: 576px) {
            .profile-img {
                width: 120px;
                height: 120px;
            }

            .card-header h5 {
                font-size: 1rem;
            }

            .btn {
                font-size: 0.8rem;
                padding: 0.4rem 0.8rem;
            }

            table {
                font-size: 0.8rem;
            }
        }
    </style>
@endsection

@section('scripts')
    <script>
        document.querySelector('#editProfileBtn').addEventListener('click', function() {
            this.classList.add('btn-click-animation'); // Menambahkan kelas animasi
            setTimeout(() => {
                this.classList.remove(
                'btn-click-animation'); // Menghapus kelas animasi setelah animasi selesai
            }, 300); // Waktu yang sesuai dengan durasi animasi
        });
    </script>
@endsection
