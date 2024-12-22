@extends('layouts.app')

@section('title', 'Manajemen Pendaftaran')

@section('content')
    <div class="container mt-5">
        <h1 class="fw-bold text-primary text-center mb-4">Daftar Pendaftaran</h1>

        <div class="card shadow-lg border-0 rounded-3">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="pendaftaranTable"
                        class="table table-striped table-bordered table-hover align-middle rounded-3">
                        <thead class="table-light">
                            <tr class="text-center">
                                <th>ID</th>
                                <th>Nama Lengkap</th>
                                <th>NISN</th>
                                <th>Tempat Lahir</th>
                                <th>Tanggal Lahir</th>
                                <th>Agama</th>
                                <th>Alamat</th>
                                <th>No. Telp</th>
                                <th>Jarak Tempat Tinggal</th>
                                <th>Foto Ijasah</th>
                                <th>Foto KK</th>
                                <th>Foto Profil</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($pendaftaran as $data)
                                <tr>
                                    <td class="text-center">{{ $data->id }}</td>
                                    <td>{{ $data->nama_lengkap }}</td>
                                    <td class="text-center">{{ $data->nisn }}</td>
                                    <td>{{ $data->tempat_lahir }}</td>
                                    <td class="text-center">
                                        {{ \Carbon\Carbon::parse($data->tanggal_lahir)->format('d-m-Y') }}</td>
                                    <td>{{ $data->agama }}</td>
                                    <td>{{ $data->alamat }}</td>
                                    <td>{{ $data->no_telp }}</td>
                                    <td>{{ $data->jarak_tempat_tinggal }} km</td>
                                    <td class="text-center">
                                        @if ($data->foto_ijasah)
                                            <a href="{{ asset('storage/' . $data->foto_ijasah) }}" target="_blank">
                                                <img src="{{ asset('storage/' . $data->foto_ijasah) }}" alt="Foto Ijasah"
                                                    class="img-thumbnail" width="80">
                                            </a>
                                        @else
                                            <span class="text-muted">No Photo</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if ($data->foto_kk)
                                            <a href="{{ asset('storage/' . $data->foto_kk) }}" target="_blank">
                                                <img src="{{ asset('storage/' . $data->foto_kk) }}" alt="Foto KK"
                                                    class="img-thumbnail" width="80">
                                            </a>
                                        @else
                                            <span class="text-muted">No Photo</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if ($data->foto_profil)
                                            <a href="{{ asset('storage/' . $data->foto_profil) }}" target="_blank">
                                                <img src="{{ asset('storage/' . $data->foto_profil) }}" alt="Foto Profil"
                                                    class="img-thumbnail" width="80">
                                            </a>
                                        @else
                                            <span class="text-muted">No Photo</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <!-- Verifikasi Form -->
                                        <form action="{{ route('admin.pendaftaran.verifikasi', $data->id) }}"
                                            method="POST" style="display:inline-block;">
                                            @csrf
                                            <button type="submit"
                                                class="btn btn-success btn-sm shadow-sm">Verifikasi</button>
                                        </form>

                                        <!-- Tolak Form -->
                                        <form action="{{ route('admin.pendaftaran.gagal', $data->id) }}" method="POST"
                                            style="display:inline-block;">
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm shadow-sm">Tolak</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="13" class="text-center text-muted py-4">
                                        <i class="bi bi-exclamation-circle"></i> Belum ada data pendaftaran.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @section('scripts')
        <script>
            $(document).ready(function() {
                $('#pendaftaranTable').DataTable({
                    paging: true, // Aktifkan paging (pagination)
                    ordering: true, // Aktifkan sorting
                    order: [
                        [1, 'asc']
                    ], // Urutkan berdasarkan kolom Nama (kolom ke-1) secara ascending
                    columnDefs: [{
                            targets: [0, 11],
                            orderable: false
                        } // Nonaktifkan pengurutan untuk kolom ID dan Aksi
                    ]
                });
            });
        </script>
    @endsection

@endsection
