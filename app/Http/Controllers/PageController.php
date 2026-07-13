<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\CompanySection; // Memanggil model seksi dinamis baru
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

        // Mengambil muatan data CMS khusus seksi Hero Banner Beranda
        $hero = CompanySection::where('key', 'home_hero')->first();
        
        // Mengambil muatan data CMS khusus seksi Tentang Kami di Beranda
        $about = CompanySection::where('key', 'home_about')->first();

        return view('home', compact('foods', 'featuredNews', 'otherNews', 'gallery', 'hero', 'about'));
    }

    /**
     * MENAMPILKAN HALAMAN TENTANG KAMI
     */
    public function tentang()
    {
        // Mengambil muatan data CMS khusus tiga seksi utama halaman tentang kami
        $sejarah = CompanySection::where('key', 'about_sejarah')->first();
        $visi    = CompanySection::where('key', 'about_visi')->first();
        $misi    = CompanySection::where('key', 'about_misi')->first();

        return view('tentang', compact('sejarah', 'visi', 'misi'));
    }

    /**
     * MENAMPILKAN HALAMAN BERITA KAMI
     */
    public function berita()
    {
        $featuredNews = Food::where('category', 'news')->first();
        $beritaLainnya = Food::where('category', 'news')->skip(1)->take(8)->get();
        
        return view('berita', compact('featuredNews', 'beritaLainnya'));
    }

    /**
     * MENAMPILKAN HALAMAN GALERI KAMI
     */
    public function galeri()
    {
        $galleryItems = Food::where('category', 'gallery')->get();
        
        return view('galeri', compact('galleryItems'));
    }

    /**
     * MENAMPILKAN HALAMAN KONTAK KAMI
     */
    public function kontak()
    {
        // ✅ PERBAIKAN: Menarik data CMS secara dinamis untuk info kontak publik
        $contact = CompanySection::where('key', 'contact_info')->first();

        return view('kontak', compact('contact'));
    }

    public function detailBerita($slug)
    {
        // Mencari data kuliner yang berkategori 'news' berdasarkan SLUG teks-nya secara dinamis
        $news = Food::where('category', 'news')->where('slug', $slug)->firstOrFail();
        
        return view('detail-berita', compact('news'));
    }
}