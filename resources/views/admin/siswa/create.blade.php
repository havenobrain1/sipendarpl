@extends('layouts.app')

@section('content')
<h1>Tambah Siswa</h1>
<form action="{{ route('admin.siswa.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="nama">Nama</label>
        <input type="text" name="nama" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="tanggal_lahir">Tanggal Lahir</label>
        <input type="date" name="tanggal_lahir" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="alamat">Alamat</label>
        <textarea name="alamat" class="form-control" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
@endsection
