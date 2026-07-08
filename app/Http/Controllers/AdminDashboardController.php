<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminDashboardController extends Controller
{
    /**
     * MENU 1: DASHBOARD UTAMA
     * Menampilkan semua campuran data asset kuliner untuk monitoring global.
     */
    public function index()
    {
        // 1. Hitung statistik dinamis dari database untuk Top Cards Widget
        $totalKonten = Food::count();
        $totalCard   = Food::where('category', 'card')->count();
        $totalBerita = Food::where('category', 'news')->count();
        $totalGaleri = Food::where('category', 'gallery')->count();

        // 2. Ambil semua data makanan untuk tabel monitoring utama
        $allFoods = Food::latest()->get();

        return view('admin.dashboard', compact(
            'totalKonten', 'totalCard', 'totalBerita', 'totalGaleri', 'allFoods'
        ));
    }

    /**
     * MENU 2: CARD MANAGEMENT
     * Monitoring khusus seksi Fluid Banner Card Home.
     */
    public function card()
    {
        $cards = Food::where('category', 'card')->latest()->get();
        return view('admin.card', compact('cards'));
    }

    /**
     * MENU 3: BERITA MANAGEMENT
     * Monitoring khusus seksi Berita Kami.
     */
    public function berita()
    {
        $berita = Food::where('category', 'news')->latest()->get();
        return view('admin.berita-index', compact('berita'));
    }

    /**
     * MENU 4: GALERI MANAGEMENT
     * Monitoring khusus seksi Galeri Foto Portfolio.
     */
    public function galeri()
    {
        $galeri = Food::where('category', 'gallery')->latest()->get();
        return view('admin.galeri-index', compact('galeri'));
    }

    /**
     * MENU 5: SETTINGS PORTAL
     * Menampilkan halaman formulir pengaturan profil dan keamanan admin.
     */
    public function settings()
    {
        return view('admin.settings');
    }

    /**
     * PROSES UPDATE PROFIL ADMIN
     */
    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name'  => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
        ]);

        $user->update([
            'name'  => $request->name,
            'email' => $request->email,
        ]);

        return back()->with('success', 'Profil administrasi berhasil diperbarui!');
    }

    /**
     * PROSES UPDATE PASSWORD ADMIN
     */
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required'],
            'password'         => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Password lama yang Anda masukkan salah.']);
        }

        $user->update([
            'password' => Hash::make($request->password),
        ]);

        return back()->with('success', 'Password portal redaksi berhasil diganti!');
    }

    /**
     * PROSES TOGGLE TEMA (DARK / LIGHT MODE VIA SESSION)
     */
    public function toggleTheme(Request $request)
    {
        $currentTheme = session('admin_theme', 'light');
        $newTheme = $currentTheme === 'light' ? 'dark' : 'light';
        
        session(['admin_theme' => $newTheme]);

        return response()->json(['success' => true, 'theme' => $newTheme]);
    }
}