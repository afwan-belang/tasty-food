<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\CompanySection; // Memanggil model seksi dinamis
use App\Models\Message;        // Memanggil model pesan pengunjung
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * MENAMPILKAN HALAMAN UTAMA (HOME)
     */
    public function home()
    {
        $foods = Food::where('category', 'card')->get();
        $featuredNews = Food::where('category', 'news')->first(); 
        $otherNews = Food::where('category', 'news')->skip(1)->take(4)->get(); 
        $gallery = Food::where('category', 'gallery')->take(6)->get(); 

        $hero = CompanySection::where('key', 'home_hero')->first();
        $about = CompanySection::where('key', 'home_about')->first();

        $branding = CompanySection::where('key', 'site_branding')->first();
        $texture  = CompanySection::where('key', 'home_texture')->first();

        return view('home', compact('foods', 'featuredNews', 'otherNews', 'gallery', 'hero', 'about', 'branding', 'texture'));
    }

    /**
     * MENAMPILKAN HALAMAN TENTANG KAMI
     */
    public function tentang()
    {
        $sejarah = CompanySection::where('key', 'about_sejarah')->first();
        $visi    = CompanySection::where('key', 'about_visi')->first();
        $misi    = CompanySection::where('key', 'about_misi')->first();

        $headerAbout = CompanySection::where('key', 'header_about')->first();

        return view('tentang', compact('sejarah', 'visi', 'misi', 'headerAbout'));
    }

    /**
     * MENAMPILKAN HALAMAN BERITA KAMI
     */
    public function berita()
    {
        $featuredNews = Food::where('category', 'news')->first();
        $beritaLainnya = Food::where('category', 'news')->skip(1)->take(8)->get();
        
        $headerNews = CompanySection::where('key', 'header_news')->first();
        
        return view('berita', compact('featuredNews', 'beritaLainnya', 'headerNews'));
    }

    /**
     * MENAMPILKAN HALAMAN GALERI KAMI
     */
    public function galeri()
    {
        $galleryItems = Food::where('category', 'gallery')->get();
        
        $headerGallery = CompanySection::where('key', 'header_gallery')->first();
        
        return view('galeri', compact('galleryItems', 'headerGallery'));
    }

    /**
     * MENAMPILKAN HALAMAN KONTAK KAMI
     */
    public function kontak()
    {
        $contact = CompanySection::where('key', 'contact_info')->first();
        $headerContact = CompanySection::where('key', 'header_contact')->first();

        return view('kontak', compact('contact', 'headerContact'));
    }

    /**
     * ✅ AKSI SIMPAN FORMULIR PESAN KONTAK PENGUNJUNG KE DATABASE
     */
    public function storeContactMessage(Request $request)
    {
        $request->validate([
            'subject' => ['required', 'string', 'max:255'],
            'name'    => ['required', 'string', 'max:255'],
            'email'   => ['required', 'email', 'max:255'],
            'message' => ['required', 'string'],
        ]);

        Message::create([
            'subject' => $request->subject,
            'name'    => $request->name,
            'email'   => $request->email,
            'message' => $request->message,
            'is_read' => false,
        ]);

        return back()->with('contact_success', 'Terima kasih! Pesan Anda telah berhasil terkirim. Tim redaksi Tasty Food akan segera meninjau dan menghubungi Anda kembali.');
    }

    public function detailBerita($slug)
    {
        $news = Food::where('category', 'news')->where('slug', $slug)->firstOrFail();
        
        return view('detail-berita', compact('news'));
    }
}