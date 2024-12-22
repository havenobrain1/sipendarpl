@extends('layouts.app')

@section('title', 'Manajemen Kelas')

@section('content')
    <div class="container">
        <h1 class="mb-4">Manajemen Kelas</h1>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @elseif(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form action="{{ route('admin.kelas.distribusi') }}" method="POST" class="mb-4">
            @csrf
            <button type="submit" class="btn btn-primary">Distribusikan Siswa dan Guru</button>
        </form>

        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Kelas</th>
                    <th>Jumlah Siswa</th>
                    <th>Guru</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kelas as $index => $kelasItem)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $kelasItem->nama }}</td>
                        <td>{{ $kelasItem->siswa->count() }}</td>
                        <td>{{ $kelasItem->guru->first()->nama ?? 'Belum Ditugaskan' }}</td>
                        <td>
                            <form action="{{ route('admin.kelas.destroy', $kelasItem->id) }}" method="POST"
                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus kelas ini?');" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                            <a href="{{ route('admin.kelas.show', $kelasItem->id) }}" class="btn btn-warning text-dark">
                                Lihat Siswa dan Guru
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <form action="{{ route('admin.kelas.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="jumlah_kelas" class="form-label">Jumlah Kelas</label>
                <input type="number" class="form-control" id="jumlah_kelas" name="jumlah_kelas" required>
            </div>
            <button type="submit" class="btn btn-primary">Buat Kelas</button>
        </form>
    </div>
@endsection
