<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NilaiController extends Controller
{
    public function create()
    {
        $user = auth()->user(); // Ambil data user yang sedang login

        // Pastikan user sudah terdaftar dengan data pendaftaran
        $pendaftaran = $user->pendaftaran; // Relasi ke tabel pendaftaran

        // Jika data pendaftaran ada, tampilkan form untuk input nilai
        if ($pendaftaran) {
            return view('siswa.nilai.create', compact('user'));
        }

        // Jika tidak ada data pendaftaran, arahkan user ke halaman pendaftaran
        return redirect()->route('siswa.pendaftaran.form')->with('error', 'Anda harus mendaftar terlebih dahulu!');
    }

    public function store(Request $request)
    {
        $user = auth()->user(); // Ambil data user yang sedang login

        // Validasi input nilai
        $request->validate([
            'nilai_matematika' => 'required|numeric|min:0|max:100',
            'nilai_ipa' => 'required|numeric|min:0|max:100',
            'nilai_ips' => 'required|numeric|min:0|max:100',
            'nilai_bahasa_indonesia' => 'required|numeric|min:0|max:100',
        ]);

        // Hitung rata-rata nilai
        $nilaiRataRata = (
            $request->input('nilai_matematika') +
            $request->input('nilai_ipa') +
            $request->input('nilai_ips') +
            $request->input('nilai_bahasa_indonesia')
        ) / 4;

        // Simpan data nilai ke tabel nilai
        Nilai::create([
            'user_id' => $user->id, // Gunakan user_id
            'nilai_matematika' => $request->input('nilai_matematika'),
            'nilai_ipa' => $request->input('nilai_ipa'),
            'nilai_ips' => $request->input('nilai_ips'),
            'nilai_bahasa_indonesia' => $request->input('nilai_bahasa_indonesia'),
            'nilai_rata_rata' => $nilaiRataRata,
        ]);

        // Redirect ke halaman form nilai dengan pesan sukses
        return redirect()->route('siswa.nilai.create')->with('success', 'Nilai berhasil disimpan!');
    }
}
