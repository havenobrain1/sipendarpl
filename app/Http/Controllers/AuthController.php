<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Landing page
    public function landing()
    {
        return view('landing');
    }

    // Halaman pilih login
    public function chooseLogin()
    {
        return view('auth.choose_login');
    }

    // Halaman login siswa
    public function loginSiswaForm()
    {
        return view('auth.login_siswa');
    }

    // Halaman login sekolah
    public function loginSekolahForm()
    {
        return view('auth.login_sekolah');
    }

    // Proses login siswa
    public function loginSiswa(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $credentials['role'] = 'siswa';

        if (Auth::attempt($credentials)) {
            return redirect()->route('siswa.dashboard');
        }

        return back()->withErrors(['email' => 'Email atau password salah, atau Anda bukan siswa.']);
    }

    // Proses login sekolah
    public function loginSekolah(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $credentials['role'] = 'admin';

        if (Auth::attempt($credentials)) {
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors(['email' => 'Email atau password salah, atau Anda bukan admin sekolah.']);
    }

    // Halaman register
    public function registerForm()
    {
        return view('auth.register');
    }

    // Proses register
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
        ]);

        // Membuat user baru dengan role siswa
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'siswa', // Default role
        ]);

        // Redirect ke landing page dengan notifikasi sukses
        return redirect()->route('landing')->with('success', 'Pendaftaran berhasil! Silakan login.');
    }

    // Proses logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('landing');
    }
}
