<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\CompanySection; // Memanggil model seksi dinamis baru
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminDashboardController extends Controller
{
    /**
     * MENU 1: DASHBOARD UTAMA + ENGINE CMS CONTROL EDITOR PANEL
     */
    public function index()
    {
        $totalKonten = Food::count();
        $totalCard   = Food::where('category', 'card')->count();
        $totalBerita = Food::where('category', 'news')->count();
        $totalGaleri = Food::where('category', 'gallery')->count();
        $allFoods = Food::latest()->get();

        // Menarik muatan data CMS untuk dioperasikan ke komponen Form Control Editor
        $cmsHero    = CompanySection::where('key', 'home_hero')->first();
        $cmsAbout   = CompanySection::where('key', 'home_about')->first();
        $cmsContact = CompanySection::where('key', 'contact_info')->first();
        $cmsSejarah = CompanySection::where('key', 'about_sejarah')->first();
        $cmsVisi    = CompanySection::where('key', 'about_visi')->first();
        $cmsMisi    = CompanySection::where('key', 'about_misi')->first();

        // Menarik data CMS untuk Form Input Logo & Tekstur Latar Beranda
        $cmsBranding = CompanySection::where('key', 'site_branding')->first();
        $cmsTexture  = CompanySection::where('key', 'home_texture')->first();

        // ✅ TAMBAHAN: Menarik data CMS untuk Label Menu Navigasi Utama
        $cmsNav = CompanySection::where('key', 'nav_menu')->first();

        // Menarik data CMS 4 Gambar Latar Sub-Header untuk di-render ke Dashboard Form
        $cmsHAbout   = CompanySection::where('key', 'header_about')->first();
        $cmsHNews    = CompanySection::where('key', 'header_news')->first();
        $cmsHGallery = CompanySection::where('key', 'header_gallery')->first();
        $cmsHContact = CompanySection::where('key', 'header_contact')->first();

        return view('admin.dashboard', compact(
            'totalKonten', 'totalCard', 'totalBerita', 'totalGaleri', 'allFoods',
            'cmsHero', 'cmsAbout', 'cmsContact', 'cmsSejarah', 'cmsVisi', 'cmsMisi',
            'cmsBranding', 'cmsTexture', 'cmsNav', 'cmsHAbout', 'cmsHNews', 'cmsHGallery', 'cmsHContact'
        ));
    }

    /**
     * ENGINE CMS: PROSES UPDATE TEKS DAN VALIDASI UPLOAD GAMBAR SEKSI UTAMA LANDING PAGE
     */
    public function updateSection(Request $request)
    {
        $request->validate([
            // ✅ PERBAIKAN: Memasukkan 'nav_menu' ke dalam whitelist key pengenalan rute aksi
            'key'      => ['required', 'string', 'in:home_hero,home_about,contact_info,site_branding,nav_menu,home_texture,header_about,header_news,header_gallery,header_contact,about_sejarah,about_visi,about_misi'],
            'title'    => ['required', 'string', 'max:255'],
            'subtitle' => ['nullable', 'string', 'max:255'],
            'desc'     => ['required_unless:key,site_branding,home_texture,header_about,header_news,header_gallery,header_contact', 'nullable', 'string'],
            'image_1'  => ['nullable', 'file', 'mimes:jpeg,png,jpg,webp,avif', 'max:2048'], 
            'image_2'  => ['nullable', 'file', 'mimes:jpeg,png,jpg,webp,avif', 'max:2048'],
        ]);

        $section = CompanySection::where('key', $request->key)->firstOrFail();
        
        $section->title    = $request->title;
        $section->subtitle = $request->subtitle;
        if ($request->has('desc')) {
            $section->desc = $request->desc;
        }

        // Manajemen Aset File Gambar ke-1 (Hapus file usang di storage jika ada upload baru)
        if ($request->hasFile('image_1')) {
            if ($section->image_1 && !str_starts_with($section->image_1, 'asset/')) {
                Storage::disk('public')->delete(str_replace('storage/', '', $section->image_1));
            }
            $path1 = $request->file('image_1')->store('company', 'public');
            $section->image_1 = 'storage/' . $path1;
        }

        // Manajemen Aset File Gambar ke-2 (Hapus file usang di storage jika ada upload baru)
        if ($request->hasFile('image_2')) {
            if ($section->image_2 && !str_starts_with($section->image_2, 'asset/')) {
                Storage::disk('public')->delete(str_replace('storage/', '', $section->image_2));
            }
            $path2 = $request->file('image_2')->store('company', 'public');
            $section->image_2 = 'storage/' . $path2;
        }

        $section->save();

        return back()->with('success', 'Aset materi teks atau gambar utama publik berhasil diperbarui secara dinamis!');
    }

    public function card()
    {
        $cards = Food::where('category', 'card')->latest()->get();
        return view('admin.card', compact('cards'));
    }

    public function berita()
    {
        $berita = Food::where('category', 'news')->latest()->get();
        return view('admin.berita-index', compact('berita'));
    }

    public function col_galeri() 
    {
        return Food::where('category', 'gallery')->latest()->get();
    }

    public function galeri()
    {
        $galeri = $this->col_galeri();
        return view('admin.galeri-index', compact('galeri'));
    }

    public function settings()
    {
        return view('admin.settings');
    }

    public function updateProfile(Request $request)
    {
        /** @var \App\Models\User $user */
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

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required'],
            'password'         => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        /** @var \App\Models\User $user */
        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Password lama yang Anda masukkan salah.']);
        }

        $user->update([
            'password' => Hash::make($request->password),
        ]);

        return back()->with('success', 'Password portal redaksi berhasil diganti!');
    }

    public function toggleTheme(Request $request)
    {
        $currentTheme = session('admin_theme', 'light');
        $newTheme = $currentTheme === 'light' ? 'dark' : 'light';
        
        session(['admin_theme' => $newTheme]);

        return response()->json(['success' => true, 'theme' => $newTheme]);
    }
}