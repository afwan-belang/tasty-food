<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    public function showLogin()
{
    // Cek apakah ada sesi login yang aktif di browser Google Chrome
    if (Auth::check()) {
        // Skenario 1: Jika dia benar-back Admin, langsung arahkan ke Dashboard
        if (Auth::user()->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        // Skenario 2 (SOLUSI FIX CHROME): Jika ada sesi user biasa/lama yang menyangkut,
        // otomatis keluarkan (logout) secara background agar halaman login bersih kembali.
        Auth::logout();
    }

    // Tampilkan halaman login kotak premium murni
    return view('admin.login');
}

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Proteksi: Pastikan hanya user ber-role admin yang boleh lolos masuk
            if (Auth::user()->role === 'admin') {
                return redirect()->route('admin.dashboard')->with('success', 'Selamat datang kembali, Admin Redaksi!');
            }

            // Jika bukan admin, tendang keluar instan
            Auth::logout();
            return back()->withErrors(['email' => 'Akses ditolak. Akun Anda bukan bagian dari tim Redaksi.']);
        }

        return back()->withErrors(['email' => 'Kombinasi email dan password salah.']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home')->with('success', 'Sesi redaksi berhasil ditutup.');
    }
}