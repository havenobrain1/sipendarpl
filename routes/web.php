<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\KelasController;

// Landing Page
Route::get('/', [LandingPageController::class, 'index'])->name('landing');

// Pendaftaran
Route::get('/register', [AuthController::class, 'registerForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('/login', [AuthController::class, 'chooseLogin'])->name('login.choose');
Route::get('/login/siswa', [AuthController::class, 'loginSiswaForm'])->name('login.siswa.form');
Route::get('/login/sekolah', [AuthController::class, 'loginSekolahForm'])->name('login.sekolah.form');

Route::post('/login/siswa', [AuthController::class, 'loginSiswa'])->name('login.siswa');
Route::post('/login/sekolah', [AuthController::class, 'loginSekolah'])->name('login.sekolah');

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Role Based Routes
Route::middleware('auth')->group(function () {
    Route::middleware('role:admin')->group(function () {
        Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    });

    Route::middleware('role:siswa')->group(function () {
        Route::get('/siswa/dashboard', [SiswaController::class, 'dashboard'])->name('siswa.dashboard');
    });
});

// Admin Routes
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    // Dashboard
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    // Manajemen Siswa
    Route::get('/siswa', [AdminController::class, 'manajemenSiswa'])->name('siswa.index');

    // Pendaftaran
    Route::get('/pendaftaran', [AdminController::class, 'pendaftaranIndex'])->name('pendaftaran.index');
    Route::post('/pendaftaran/{pendaftaran}/verifikasi', [AdminController::class, 'verifikasiPendaftaran'])->name('pendaftaran.verifikasi');
    Route::post('/pendaftaran/{pendaftaran}/gagal', [AdminController::class, 'pendaftaranGagal'])->name('pendaftaran.gagal');
    Route::post('/pendaftaran/tutup', [AdminController::class, 'pendaftaranTutup'])->name('pendaftaran.tutup');
    Route::post('/pendaftaran/buka', [AdminController::class, 'pendaftaranBuka'])->name('pendaftaran.buka');

    // Manajemen Kelas
    Route::get('/kelas', [KelasController::class, 'index'])->name('kelas.index');
    Route::post('/kelas', [KelasController::class, 'store'])->name('kelas.store');
    Route::post('/kelas/distribusi', [KelasController::class, 'distribusi'])->name('kelas.distribusi');
    Route::delete('/kelas/{kelas}', [KelasController::class, 'destroy'])->name('kelas.destroy');
    Route::get('/kelas/{kelas}/show', [KelasController::class, 'show'])->name('kelas.show');


    // Manajemen Guru
    Route::get('/guru', [GuruController::class, 'index'])->name('guru.index');
    Route::get('/guru/create', [GuruController::class, 'create'])->name('guru.create');
    Route::post('/guru', [GuruController::class, 'store'])->name('guru.store');
    Route::get('/guru/{guru}/edit', [GuruController::class, 'edit'])->name('guru.edit');
    Route::put('/guru/{guru}', [GuruController::class, 'update'])->name('guru.update');
    Route::delete('/guru/{guru}', [GuruController::class, 'destroy'])->name('guru.destroy');
});

// siswa route nih
Route::middleware('auth')->prefix('siswa')->name('siswa.')->group(function () {
    Route::get('/dashboard', [SiswaController::class, 'dashboard'])->name('dashboard');
    Route::get('/pendaftaran', [SiswaController::class, 'showPendaftaranForm'])->name('pendaftaran.form');
    Route::post('/pendaftaran', [SiswaController::class, 'submitPendaftaran'])->name('pendaftaran.submit');
    Route::get('/informasi-pribadi', [SiswaController::class, 'informasiPribadi'])->name('informasi-pribadi');
    Route::get('/edit-profil', [SiswaController::class, 'editProfil'])->name('edit-profil');
    Route::post('/update-profil', [SiswaController::class, 'updateProfil'])->name('update-profil');
});

Route::middleware(['auth'])->group(function () {
    Route::get('siswa/nilai', [NilaiController::class, 'create'])->name('siswa.nilai.create');
    Route::post('siswa/nilai', [NilaiController::class, 'store'])->name('siswa.nilai.store');
});

