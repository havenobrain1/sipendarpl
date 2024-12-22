<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Guru;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        $kelas = Kelas::with(['siswa', 'guru'])->get();
        return view('admin.kelas.index', compact('kelas'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'jumlah_kelas' => 'required|integer|min:1',
        ]);

        for ($i = 1; $i <= $validated['jumlah_kelas']; $i++) {
            Kelas::create([
                'nama' => "Kelas $i",
            ]);
        }

        return redirect()->route('admin.kelas.index')->with('success', 'Kelas berhasil dibuat.');
    }

    public function distribusi()
    {
        // Ambil siswa yang belum memiliki kelas
        $siswa = Pendaftaran::whereDoesntHave('kelas')->where('status', 'Terverifikasi')->get();
        $kelas = Kelas::all();

        // Distribusikan siswa ke kelas
        foreach ($siswa as $key => $s) {
            $kelas[$key % $kelas->count()]->siswa()->attach($s->id);
        }

        // Distribusikan guru ke kelas
        $guru = Guru::all();
        foreach ($kelas as $key => $k) {
            $k->guru()->attach($guru[$key % $guru->count()]->id);
        }

        return redirect()->route('admin.kelas.index')->with('success', 'Distribusi berhasil dilakukan.');
    }

    // Menghapus kelas
    public function destroy(Kelas $kelas)
    {
        // Pastikan kelas tidak memiliki siswa atau guru yang terdistribusi
        if ($kelas->siswa()->count() > 0 || $kelas->guru()->count() > 0) {
            return redirect()->route('admin.kelas.index')->with('error', 'Kelas tidak dapat dihapus karena sudah memiliki siswa atau guru.');
        }

        $kelas->delete();

        return redirect()->route('admin.kelas.index')->with('success', 'Kelas berhasil dihapus.');
    }

    public function show(Kelas $kelas)
    {
        // Mengambil data siswa dan guru yang terdistribusi ke kelas
        $siswa = $kelas->siswa;
        $guru = $kelas->guru->first();

        return view('admin.kelas.show', compact('kelas', 'siswa', 'guru'));
    }

}

