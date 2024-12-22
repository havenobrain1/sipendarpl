<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\PendaftaranStatus;
use App\Models\Pendaftaran;

class AdminController extends Controller
{
    public function dashboard()
    {
        $pendaftaranStatus = \App\Models\PendaftaranStatus::first();

        if (!$pendaftaranStatus) {
            $pendaftaranStatus = \App\Models\PendaftaranStatus::create([
                'is_open' => false,
            ]);
        }

        $totalSiswa = \App\Models\Pendaftaran::where('status', 'Terverifikasi')->count();
        $lulus = \App\Models\Pendaftaran::where('status', 'Lulus')->count();
        $tidakLulus = \App\Models\Pendaftaran::where('status', 'Tidak Lulus')->count();
        $belumDiverifikasi = \App\Models\Pendaftaran::where('status', 'Menunggu Verifikasi')->count();
        $totalGuru = \App\Models\Guru::count();
        $totalKelas = \App\Models\Kelas::count();
        $totalPendaftar = \App\Models\Pendaftaran::count();

        return view('admin.dashboard', compact(
            'totalSiswa',
            'lulus',
            'tidakLulus',
            'belumDiverifikasi',
            'totalGuru',
            'totalKelas',
            'totalPendaftar',
            'pendaftaranStatus'
        ));
    }


    // Manajemen Siswa
    public function manajemenSiswa()
    {
        $pendaftaran = Pendaftaran::where('status', 'Terverifikasi')->get();

        return view('admin.siswa.index', compact('pendaftaran'));
    }

    public function pendaftaranIndex()
    {
        $pendaftaran = Pendaftaran::all();
        return view('admin.pendaftaran.index', compact('pendaftaran'));
    }

    public function pendaftaranGagal(Pendaftaran $pendaftaran)
    {
        $pendaftaran->update(['status' => 'Gagal']);
        return redirect()->route('admin.pendaftaran.index')->with('success', 'Status pendaftaran diperbarui menjadi Gagal.');
    }

    public function verifikasiPendaftaran(Pendaftaran $pendaftaran)
    {
        $pendaftaran->update(['status' => 'Terverifikasi']);
        return redirect()->route('admin.pendaftaran.index')->with('success', 'Pendaftaran berhasil diverifikasi.');
    }

    public function pendaftaranTutup()
    {
        PendaftaranStatus::query()->update(['is_open' => false]);

        return redirect()->route('admin.dashboard')->with('success', 'Pendaftaran berhasil ditutup!');
    }
    public function pendaftaranBuka()
    {
        PendaftaranStatus::query()->update(['is_open' => true]);

        return redirect()->route('admin.dashboard')->with('success', 'Pendaftaran berhasil dibuka!');
    }


    // Manajemen Kelas
    public function kelasIndex()
    {
        $kelas = Kelas::all();
        return view('admin.kelas.index', compact('kelas'));
    }

    public function kelasCreate()
    {
        return view('admin.kelas.create');
    }

    public function kelasStore(Request $request)
    {
        $request->validate([
            'nama_kelas' => 'required|string|max:255',
            'kapasitas' => 'required|integer',
            'pengajar' => 'required|string|max:255',
        ]);

        Kelas::create($request->all());
        return redirect()->route('admin.kelas.index')->with('success', 'Kelas berhasil ditambahkan!');
    }

    public function kelasEdit(Kelas $kelas)
    {
        return view('admin.kelas.edit', compact('kelas'));
    }

    public function kelasUpdate(Request $request, Kelas $kelas)
    {
        $request->validate([
            'nama_kelas' => 'required|string|max:255',
            'kapasitas' => 'required|integer',
            'pengajar' => 'required|string|max:255',
        ]);

        $kelas->update($request->all());
        return redirect()->route('admin.kelas.index')->with('success', 'Data kelas berhasil diperbarui!');
    }

    public function alokasiSiswa()
    {
        $siswas = Siswa::where('status', 'Lulus')->get();
        $kelas = Kelas::all();
        return view('admin.kelas.alokasi', compact('siswas', 'kelas'));
    }

    public function alokasikanSiswa(Request $request)
    {
        return redirect()->route('admin.kelas.index')->with('success', 'Siswa berhasil dialokasikan ke kelas!');
    }
}
