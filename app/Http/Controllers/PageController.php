<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * MENAMPILKAN HALAMAN UTAMA (HOME)
     */
    public function home()
    {
        // Menarik data kuliner berdasarkan kategori penempatan masing-masing
        $foods = Food::where('category', 'card')->get();
        $featuredNews = Food::where('category', 'news')->first(); // Berita utama (ambil 1 data teratas)
        $otherNews = Food::where('category', 'news')->skip(1)->take(4)->get(); // 4 Berita kecil di sampingnya
        $gallery = Food::where('category', 'gallery')->take(6)->get(); // Ambil 6 foto teratas untuk galeri home

        // Lempar semua variabel data di atas ke dalam file home.blade.php
        return view('home', compact('foods', 'featuredNews', 'otherNews', 'gallery'));
    }

    /**
     * MENAMPILKAN HALAMAN TENTANG KAMI
     */
    public function tentang()
    {
        return view('tentang');
    }

    /**
     * MENAMPILKAN HALAMAN BERITA KAMI
     */
    public function berita()
    {
        $featuredNews = Food::where('category', 'news')->first();
        // Mengambil maksimal 8 baris data berita lainnya untuk grid bawah halaman berita
        $beritaLainnya = Food::where('category', 'news')->skip(1)->take(8)->get();
        
        return view('berita', compact('featuredNews', 'beritaLainnya'));
    }

    /**
     * MENAMPILKAN HALAMAN GALERI KAMI
     */
    public function galeri()
    {
        // Mengambil seluruh aset gambar yang dikategorikan sebagai item galeri portfolio
        $galleryItems = Food::where('category', 'gallery')->get();
        
        return view('galeri', compact('galleryItems'));
    }

    /**
     * MENAMPILKAN HALAMAN KONTAK KAMI
     */
    public function kontak()
    {
        return view('kontak');
    }
    public function detailBerita($id)
    {
        // Mencari data kuliner yang berkategori 'news' berdasarkan ID-nya
        $news = \App\Models\Food::where('category', 'news')->findOrFail($id);
        
        return view('detail-berita', compact('news'));
    }
}