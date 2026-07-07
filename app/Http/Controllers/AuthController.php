<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Menampilkan halaman login
    public function showLogin()
    {
        return view('auth.login');
    }

    // Memproses aksi login
    public function login(Request $request)
    {
        // Validasi input form secara ketat
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Percobaan login (Attempt) dengan mencocokkan hash password di DB
        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate(); // Mencegah serangan Session Fixation

            return redirect()->intended(route('home'))->with('success', 'Selamat datang kembali!');
        }

        // Jika gagal, kembalikan dengan pesan error spesifik pada email
        return back()->withErrors([
            'email' => 'Email atau password yang Anda masukkan salah.',
        ])->onlyInput('email');
    }

    // Menampilkan halaman register
    public function showRegister()
    {
        return view('auth.register');
    }

    // Memproses aksi registrasi akun baru
    public function register(Request $request)
    {
        // Validasi data pendaftaran
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'], // Wajib ada password_confirmation
        ]);

        // Simpan user baru ke database (Secara default role-nya adalah 'user')
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Otomatis login setelah berhasil mendaftar
        Auth::login($user);

        return redirect()->route('home')->with('success', 'Akun berhasil dibuat. Selamat menikmati!');
    }

    // Memproses aksi keluar (Logout)
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken(); // Mengatur ulang token CSRF demi keamanan

        return redirect()->route('home')->with('success', 'Anda telah berhasil keluar.');
    }
}