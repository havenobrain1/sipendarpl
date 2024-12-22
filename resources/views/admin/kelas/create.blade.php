@extends('layouts.app')

@section('content')
<h1>Tambah Kelas</h1>
<form action="{{ route('admin.kelas.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="nama_kelas">Nama Kelas</label>
        <input type="text" name="nama_kelas" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="kapasitas">Kapasitas</label>
        <input type="number" name="kapasitas" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="pengajar">Pengajar</label>
        <input type="text" name="pengajar" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
@endsection
