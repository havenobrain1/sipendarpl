@extends('layouts.app')

@section('title', 'Detail Kelas')

@section('content')
    <div class="container">
        <h1 class="mb-4">Detail Kelas: {{ $kelas->nama }}</h1>

        <div class="card">
            <div class="card-header">
                <h3>Siswa yang Terdaftar di Kelas</h3>
            </div>
            <div class="card-body">
                @if($siswa->count() > 0)
                    <ul class="list-group">
                        @foreach($siswa as $s)
                            <li class="list-group-item">
                                {{ $s->nama_lengkap }} ({{ $s->nisn }})
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p>Belum ada siswa yang terdaftar di kelas ini.</p>
                @endif
            </div>
        </div>

        <div class="card mt-4">
            <div class="card-header">
                <h3>Guru yang Mengajar</h3>
            </div>
            <div class="card-body">
                @if($guru)
                    <p><strong>Nama Guru:</strong> {{ $guru->nama }}</p>
                    <p><strong>Email:</strong> {{ $guru->email }}</p>
                    <p><strong>Telepon:</strong> {{ $guru->telp ?? 'Tidak ada informasi' }}</p>
                    <p><strong>Alamat:</strong> {{ $guru->alamat ?? 'Tidak ada informasi' }}</p>
                @else
                    <p>Belum ada guru yang ditugaskan ke kelas ini.</p>
                @endif
            </div>
        </div>

        <a href="{{ route('admin.kelas.index') }}" class="btn btn-secondary mt-4">Kembali ke Manajemen Kelas</a>
    </div>
@endsection
