<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pendaftaran;
use App\Models\PendaftaranStatus;
use App\Models\Nilai;

class SiswaController extends Controller
{
    public function dashboard()
    {
        $siswa = Auth::user();
        $pendaftaran = Pendaftaran::where('user_id', $siswa->id)->first();
        $pendaftaranStatus = PendaftaranStatus::first();

        return view('siswa.dashboard', compact('siswa', 'pendaftaran', 'pendaftaranStatus'));
    }

    public function showPendaftaranForm()
    {
        $pendaftaranStatus = PendaftaranStatus::first();

        if (!$pendaftaranStatus || !$pendaftaranStatus->is_open) {
            return redirect()->route('siswa.dashboard')->with('error', 'Pendaftaran telah ditutup!');
        }

        return view('siswa.pendaftaran', compact('pendaftaranStatus'));
    }

    public function submitPendaftaran(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'nisn' => 'required|string|max:20',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'agama' => 'required|string|max:255',
            'alamat' => 'required|string|max:500',
            'no_telp' => 'required|string|max:15',
            'jarak_tempat_tinggal' => 'required|numeric',
            'foto_ijasah' => 'required|image|mimes:jpg,png,jpeg|max:2048',
            'foto_kk' => 'required|image|mimes:jpg,png,jpeg|max:2048',
            'foto_profil' => 'required|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $pendaftaranStatus = PendaftaranStatus::first();
        if (!$pendaftaranStatus || !$pendaftaranStatus->is_open) {
            return redirect()->route('siswa.dashboard')->with('error', 'Pendaftaran telah ditutup!');
        }

        try {
            $fotoIjasahPath = $request->file('foto_ijasah')->store('uploads/foto', 'public');
            $fotoKkPath = $request->file('foto_kk')->store('uploads/foto', 'public');
            $fotoProfilPath = $request->file('foto_profil')->store('uploads/foto', 'public');

            // Simpan data ke database
            Pendaftaran::create([
                'user_id' => Auth::id(),
                'nama_lengkap' => $request->nama_lengkap,
                'nisn' => $request->nisn,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'agama' => $request->agama,
                'alamat' => $request->alamat,
                'no_telp' => $request->no_telp,
                'jarak_tempat_tinggal' => $request->jarak_tempat_tinggal,
                'foto_ijasah' => $fotoIjasahPath,
                'foto_kk' => $fotoKkPath,
                'foto_profil' => $fotoProfilPath,
                'status' => 'Menunggu Verifikasi',
            ]);

            return redirect()->route('siswa.dashboard')->with('success', 'Pendaftaran berhasil diajukan!');
        } catch (\Exception $e) {
            return redirect()->route('siswa.pendaftaran.form')->with('error', 'Terjadi kesalahan saat mengajukan pendaftaran. Silakan coba lagi.');
        }
    }
    public function updateVerifikasi($id)
    {
        $pendaftaran = Pendaftaran::find($id);

        if (!$pendaftaran) {
            return redirect()->route('admin.dashboard')->with('error', 'Pendaftaran tidak ditemukan.');
        }

        $pendaftaran->status = 'Terverifikasi';
        $pendaftaran->save();

        return redirect()->route('admin.dashboard')->with('success', 'Status verifikasi berhasil diperbarui.');
    }

    public function informasiPribadi()
    {
        $siswa = Pendaftaran::where('user_id', auth()->user()->id)->first();

        $nilai = Nilai::where('user_id', auth()->user()->id)->first();

        return view('siswa.informasi-pribadi', compact('siswa', 'nilai'));
    }

    public function editProfil()
    {
        $siswa = Pendaftaran::where('user_id', auth()->user()->id)->first();

        return view('siswa.edit-profil', compact('siswa'));
    }

    public function updateProfil(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'agama' => 'required|string|max:255',
            'alamat' => 'required|string|max:500',
            'foto_profil' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $siswa = Pendaftaran::where('user_id', auth()->user()->id)->first();

        if (!$siswa) {
            return redirect()->route('siswa.informasi-pribadi')->with('error', 'Data siswa tidak ditemukan.');
        }

        if ($request->hasFile('foto_profil')) {
            $fotoProfilPath = $request->file('foto_profil')->store('uploads/foto', 'public');
            $siswa->foto_profil = $fotoProfilPath;
        }

        $siswa->nama_lengkap = $request->nama_lengkap;
        $siswa->tempat_lahir = $request->tempat_lahir;
        $siswa->tanggal_lahir = $request->tanggal_lahir;
        $siswa->agama = $request->agama;
        $siswa->alamat = $request->alamat;

        $siswa->save();

        return redirect()->route('siswa.informasi-pribadi')->with('success', 'Profil berhasil diperbarui.');
    }
}
