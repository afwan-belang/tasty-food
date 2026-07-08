@extends('layouts.app')

@section('content')
<style>
    @keyframes subPageFadeUp {
        from { opacity: 0; transform: translateY(15px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .anim-sub-entry { opacity: 0; animation: subPageFadeUp 800ms cubic-bezier(0.16, 1, 0.3, 1) forwards; }
</style>

<!-- ✅ SINKRONISASI NAVBAR UTUT: BACKGROUND DAN JUDUL DINAMIS SESUAI KONTEN BERITA DATABASE -->
<header class="tasty-sub-header flex flex-col z-10">
    <img src="{{ asset('asset/Group 70@2x.avif') }}" class="tasty-sub-header-bg" alt="Header Background">
    <div class="tasty-sub-header-overlay"></div>

    <!-- NAVBAR PREMIUM BERSIH (SAMA SEPERTI HALAMAN SUB-PUBLIK LAINNYA) -->
    <div class="relative z-10 w-full max-w-7xl mx-auto px-6 md:px-12 lg:px-24 py-8 flex justify-between md:justify-start items-center gap-16 lg:gap-20 anim-sub-entry">
        <a href="{{ route('home') }}" class="text-2xl font-black tracking-wider uppercase text-white z-50">TASTY FOOD</a>
        
        <div class="hidden md:flex space-x-8 lg:space-x-10 text-xs lg:text-sm font-bold tracking-wider text-white items-center">
            <a href="{{ route('home') }}" class="transition duration-200 hover:text-gray-300">HOME</a>
            <a href="{{ route('tentang') }}" class="transition duration-200 hover:text-gray-300">TENTANG</a>
            <a href="{{ route('berita') }}" class="text-amber-500 border-b-2 border-amber-500 pb-1">BERITA</a>
            <a href="{{ route('galeri') }}" class="transition duration-200 hover:text-gray-300">GALERI</a>
            <a href="{{ route('kontak') }}" class="transition duration-200 hover:text-gray-300">KONTAK</a>
        </div>
    </div>

    <!-- JUDUL HEADER DINAMIS BERDASARKAN DATABASE -->
    <div class="relative z-10 w-full max-w-7xl mx-auto px-6 md:px-12 lg:px-24 flex-grow flex items-center pb-6 anim-sub-entry">
        <h1 class="text-2xl sm:text-3xl lg:text-4xl font-black tracking-wide text-white uppercase leading-snug max-w-4xl">
            {{ $news->title }}
        </h1>
    </div>
</header>

<!-- AREA ISI KONTEN UTAMA BERITA -->
<section class="py-24 px-6 lg:px-24 bg-white select-none">
    <div class="max-w-4xl mx-auto">
        
        <!-- ✅ SPESIFIKASI: BINGKAI FOTO UTAMA LEBAR BERADA DI TENGAH (CENTER) RESPONSIF -->
        <div class="w-full h-[280px] sm:h-[480px] bg-gray-100 rounded-2xl overflow-hidden shadow-md mb-12">
            <img src="{{ asset($news->image) }}" class="w-full h-full object-cover" alt="{{ $news->title }}">
        </div>
        
        <!-- ✅ SPESIFIKASI: INFORMASI DETAIL NARASI DESKRIPSI BERDASARKAN DATABASE -->
        <div class="text-gray-800 text-sm sm:text-base leading-relaxed text-justify space-y-6 font-normal">
            <p>{!! nl2br(e($news->desc)) !!}</p>
        </div>

        <!-- TOMBOL AKSI KEMBALI -->
        <div class="mt-16 pt-6 border-t border-gray-100">
            <a href="{{ route('berita') }}" class="text-xs font-black tracking-widest text-amber-600 hover:text-amber-800 uppercase transition">
                ← KEMBALI KE BERITA KAMI
            </a>
        </div>
    </div>
</section>
@endsection