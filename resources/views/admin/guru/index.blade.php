@extends('layouts.app')

@section('title', 'Manajemen Guru')

@section('content')
    <div class="container mt-5">
        <h1>Daftar Guru</h1>
        <a href="{{ route('admin.guru.create') }}" class="btn btn-primary mb-3">Tambah Guru</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>NIP</th>
                    <th>Email</th>
                    <th>Telepon</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($gurus as $guru)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $guru->nama }}</td>
                        <td>{{ $guru->nip }}</td>
                        <td>{{ $guru->email }}</td>
                        <td>{{ $guru->telp }}</td>
                        <td>{{ $guru->alamat }}</td>
                        <td>
                            <a href="{{ route('admin.guru.edit', $guru->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                data-bs-target="#deleteModal{{ $guru->id }}">Hapus</button>
                        </td>
                    </tr>

                    <!-- Modal for delete confirmation -->
                    <div class="modal fade" id="deleteModal{{ $guru->id }}" tabindex="-1"
                        aria-labelledby="deleteModalLabel{{ $guru->id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteModalLabel{{ $guru->id }}">Konfirmasi Penghapusan
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Apakah Anda yakin ingin menghapus guru <strong>{{ $guru->nama }}</strong>?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                    <form action="{{ route('admin.guru.destroy', $guru->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <tr>
                        <td colspan="7">Belum ada data guru.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
