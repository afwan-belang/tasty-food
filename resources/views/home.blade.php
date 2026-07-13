@extends('layouts.app')

@section('content')
<style>
    /* ========================================================================= */
    /* FINE-TUNING PREMIUM: HIGH-FIDELITY INTERACTION & HARDWARE ACCELERATION    */
    /* ========================================================================= */
    .tasty-home-hero { 
        background-color: #f4f4f4; 
        min-height: 720px; 
    }
    @media (min-width: 768px) { .tasty-home-hero { height: 720px; } }
    
    .tasty-hero-line { width: 60px; height: 4px; background-color: #1a1a1a; }
    
    /* Pemetaan Posisi Piring Utama Sesuai Gambar Referensi HOME.png */
    .tasty-hero-plate-exact { 
        position: absolute; 
        right: -8%; 
        top: 0; 
        height: 100%; 
        width: auto; 
        object-fit: contain; 
        z-index: 1; 
        pointer-events: none; 
        user-select: none; 
    }
    @media (max-width: 1280px) { .tasty-hero-plate-exact { right: -18%; } }
    @media (max-width: 1024px) { .tasty-hero-plate-exact { right: -28%; } }
    @media (max-width: 640px) { .tasty-hero-plate-exact { right: -40%; opacity: 0.15; } }

    /* Animasi Entri Awal Pemuatan Halaman */
    @keyframes tastyFadeUp { from { opacity: 0; transform: translateY(25px); } to { opacity: 1; transform: translateY(0); } }
    @keyframes tastyPlateIn { from { opacity: 0; transform: translateX(50px); } to { opacity: 1; transform: translateX(0); } }
    
    .anim-hero-entry { opacity: 0; animation: tastyFadeUp 1000ms cubic-bezier(0.16, 1, 0.3, 1) forwards; }
    .anim-delay-1 { animation-delay: 100ms; }
    .anim-delay-2 { animation-delay: 200ms; }
    .anim-delay-3 { animation-delay: 300ms; }
    .anim-delay-4 { animation-delay: 400ms; }
    .anim-delay-5 { animation-delay: 500ms; }
    .anim-hero-plate { opacity: 0; animation: tastyPlateIn 1400ms cubic-bezier(0.16, 1, 0.3, 1) 200ms forwards; }

    /* Akselerasi GPU Murni Untuk Transisi Hover dan Scroll Ringan Anti Patah */
    .tasty-gpu-smooth {
        backface-visibility: hidden;
        transform: translateZ(0);
        will-change: transform, box-shadow;
    }
    
    /* Efek Smooth Image Zoom saat Card di-Hover */
    .tasty-hover-zoom-trigger {
        transition: transform 600ms cubic-bezier(0.16, 1, 0.3, 1);
    }
    .group:hover .tasty-hover-zoom-trigger {
        transform: scale(1.05);
    }

    /* Kustomisasi Elevasi Bayangan Halus Sesuai Karakter Gambar Referensi */
    .tasty-premium-shadow {
        box-shadow: 0 10px 35px rgba(0, 0, 0, 0.03), 0 4px 12px rgba(0, 0, 0, 0.01);
    }
    .tasty-premium-shadow:hover {
        box-shadow: 0 20px 45px rgba(0, 0, 0, 0.06), 0 6px 16px rgba(0, 0, 0, 0.02);
        transform: translateY(-6px);
        transition: transform 500ms cubic-bezier(0.16, 1, 0.3, 1), box-shadow 500ms cubic-bezier(0.16, 1, 0.3, 1);
    }
</style>

<!-- ========================================================================= -->
<!-- SEKSI 1: HERO BANNER UTAMA (TRANSPARANT LOCAL NAVIGATION PANEL)            -->
<!-- ========================================================================= -->
<section class="relative w-full tasty-home-hero flex flex-col overflow-hidden z-10">
    <div class="relative z-20 w-full max-w-7xl mx-auto px-6 md:px-12 lg:px-24 py-10 flex justify-between md:justify-start items-center gap-16 lg:gap-20 anim-hero-entry">
        <a href="{{ route('home') }}" class="text-2xl lg:text-3xl font-black tracking-wider uppercase text-gray-950 flex-shrink-0 z-50">TASTY FOOD</a>
        
        <div class="hidden md:flex space-x-8 lg:space-x-10 text-xs lg:text-sm font-bold tracking-wider text-gray-900 pt-1 items-center">
            <a href="{{ route('home') }}" class="transition duration-200 {{ request()->routeIs('home') ? 'text-amber-600 border-b-2 border-amber-600 pb-1' : 'hover:text-gray-600' }}">HOME</a>
            <a href="{{ route('tentang') }}" class="transition duration-200 {{ request()->routeIs('tentang') ? 'text-amber-600 border-b-2 border-amber-600 pb-1' : 'hover:text-gray-600' }}">TENTANG</a>
            <a href="{{ route('berita') }}" class="transition duration-200 {{ request()->routeIs('berita') ? 'text-amber-600 border-b-2 border-amber-600 pb-1' : 'hover:text-gray-600' }}">BERITA</a>
            <a href="{{ route('galeri') }}" class="transition duration-200 {{ request()->routeIs('galeri') ? 'text-amber-600 border-b-2 border-amber-600 pb-1' : 'hover:text-gray-600' }}">GALERI</a>
            <a href="{{ route('kontak') }}" class="transition duration-200 {{ request()->routeIs('kontak') ? 'text-amber-600 border-b-2 border-amber-600 pb-1' : 'hover:text-gray-600' }}">KONTAK</a>
        </div>

        <button id="mobile-menu-btn" class="md:hidden text-gray-950 focus:outline-none z-50 p-1"><svg id="hamburger-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-7 h-7 transition-transform duration-300"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" /></svg></button>
    </div>

    <!-- MOBILE DROPDOWN MENU PANEL RESPONSIF -->
    <div id="mobile-menu" class="fixed top-0 bottom-0 right-0 w-3/4 bg-white/95 backdrop-blur-md shadow-2xl border-l border-gray-100/50 z-40 transform translate-x-full transition-transform duration-500 ease-in-out flex flex-col items-center justify-center space-y-8 text-xl font-black tracking-widest text-gray-950 md:hidden p-6">
        <button id="mobile-menu-close" class="absolute top-10 right-6 text-gray-950 focus:outline-none p-1 hover:scale-110 transition duration-200"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-7 h-7"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg></button>
        <a href="{{ route('home') }}" class="hover:text-amber-600 transition duration-200">HOME</a>
        <a href="{{ route('tentang') }}" class="hover:text-amber-600 transition duration-200">TENTANG</a>
        <a href="{{ route('berita') }}" class="hover:text-amber-600 transition duration-200">BERITA</a>
        <a href="{{ route('galeri') }}" class="hover:text-amber-600 transition duration-200">GALERI</a>
        <a href="{{ route('kontak') }}" class="hover:text-amber-600 transition duration-200">KONTAK</a>
    </div>

    <!-- HERO TEXT WRAPPER SINKRONISASI TINGGI LAYAR -->
    <!-- HERO TEXT WRAPPER SINKRONISASI KONTEN DINAMIS DATABASE -->
    <div class="relative z-10 w-full max-w-7xl mx-auto px-6 md:px-12 lg:px-24 flex-grow flex flex-col items-start justify-center pt-8 pb-20 md:pb-16">
        <div class="tasty-hero-line mb-8 anim-hero-entry anim-delay-1"></div>
        
        <!-- Teks Subtitle Dinamis (e.g., HEALTHY) -->
        <h1 class="text-3xl sm:text-4xl lg:text-6xl font-light tracking-wide text-gray-950 uppercase mb-1 anim-hero-entry anim-delay-1">
            {{ $hero->subtitle ?? 'HEALTHY' }}
        </h1>
        
        <!-- Teks Judul Utama Dinamis (e.g., TASTY FOOD) -->
        <h2 class="text-4xl sm:text-5xl lg:text-7xl font-black tracking-tight text-gray-950 uppercase mb-8 anim-hero-entry anim-delay-2 leading-tight">
            {{ $hero->title ?? 'TASTY FOOD' }}
        </h2>
        
        <!-- Paragraf Deskripsi Dinamis -->
        <p class="text-gray-500 text-sm lg:text-base leading-relaxed max-w-xl mb-10 font-normal anim-hero-entry anim-delay-3 text-justify">
            {{ $hero->desc ?? 'Lorem ipsum dolor sit amet, consectetur adipiscing elit...' }}
        </p>
        
        <div class="anim-hero-entry anim-delay-4">
            <x-ui.button href="{{ route('tentang') }}" class="rounded-none bg-black text-white hover:bg-gray-900 px-10 py-4 font-bold tracking-widest transition duration-300 hover:bg-white hover:text-gray-950 border border-black">
                TENTANG KAMI
            </x-ui.button>
        </div>
    </div>
    
    <!-- Aset Gambar Utama Dinamis Berbasis Database Media Server -->
    <img src="{{ asset($hero->image_1 ?? 'asset/img-4-2000x2000.avif') }}" class="tasty-hero-plate-exact anim-hero-plate" alt="Main Plate Layout">
    
    <!-- PERFORMA MAKSIMAL: Gambar Pertama Dilarang Menggunakan Lazy-Load Agar LCP Score Chrome Sempurna -->
</section>

<!-- ========================================================================= -->
<!-- SEKSI 2: TENTANG KAMI (REDUCE OVERFLOW WHITEPAGE BERDASARKAN DESAIN)      -->
<!-- ========================================================================= -->
<section class="py-24 text-center bg-white anim-hero-entry anim-delay-5 select-none">
    <h2 class="text-2xl lg:text-3xl font-black mb-6 uppercase tracking-wider text-gray-950">Tentang Kami</h2>
    <p class="text-gray-500 max-w-3xl mx-auto px-6 leading-relaxed text-sm lg:text-base font-normal text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare, augue eu rutrum commodo, dui diam convallis arcu, eget consectetur ex sem eget lacus. Nullam vitae dignissim neque, vel luctus ex. Fusce sit amet viverra ante.</p>
    <div class="w-16 h-[4px] bg-gray-950 mx-auto mt-8"></div>
</section>

<!-- ========================================================================= -->
<!-- SEKSI 3: FOUR FLOATING FOOD CARDS BANNER PANEL (`rounded-[24px]`)          -->
<!-- ========================================================================= -->
<div class="bg-white py-12 px-0 select-none">
    <section class="relative w-full aspect-none md:aspect-[12/4.9] overflow-visible flex items-center justify-center py-20 lg:py-0">
        <!-- LAZY LOADING ACTIVE: Menggunakan Latar Belakang Tekstur Khas Group 70 -->
        <div class="absolute inset-0 z-0 pointer-events-none select-none reveal-on-scroll">
            <img src="{{ asset('asset/Group 70.avif') }}" loading="lazy" class="w-full h-full object-cover object-center" alt="Background Master Banner Layout">
        </div>
        <div class="relative z-10 w-full max-w-6xl mx-auto px-6 md:px-12">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 items-center">
                @foreach ($foods as $food)
                    @php $delayClass = $loop->index === 1 ? 'delay-100' : ($loop->index === 2 ? 'delay-200' : ($loop->index === 3 ? 'delay-300' : '')); @endphp
                    <div data-id="{{ $food->id }}" onclick="openFoodModal(this.dataset.id)" class="reveal-on-scroll cursor-pointer {{ $delayClass }}">
                        <x-content.food-card :image="$food->image" :title="$food->title" :desc="Str::limit($food->desc, 75)" />
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</div>

<!-- ========================================================================= -->
<!-- SEKSI 4: BERITA KAMI (ASIMETRIS LAYOUT FORMATION: 1 BIG LEFT, 4 SMALL RIGHT)-->
<!-- ========================================================================= -->
<section class="py-24 px-6 md:px-12 lg:px-24 bg-gray-50 select-none">
    <h2 class="text-2xl lg:text-3xl font-black mb-16 uppercase text-center tracking-wider text-gray-950 reveal-on-scroll">Berita Kami</h2>
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 max-w-7xl mx-auto">
        
        <!-- Artikel Utama Besar Sisi Kiri -->
        @if($featuredNews)
        <div onclick="window.location.href='{{ route('berita.detail', $featuredNews->id) }}' " class="bg-white rounded-[24px] tasty-premium-shadow tasty-gpu-smooth overflow-hidden flex flex-col group cursor-pointer border border-gray-100/60 reveal-on-scroll">
            <div class="w-full h-[260px] sm:h-[340px] bg-gray-100 overflow-hidden">
                <img src="{{ asset($featuredNews->image) }}" loading="lazy" alt="{{ $featuredNews->title }}" class="w-full h-full object-cover tasty-hover-zoom-trigger">
            </div>
            <div class="p-6 sm:p-8 flex-grow flex flex-col justify-between">
                <div>
                    <h3 class="text-lg lg:text-xl font-black mb-4 uppercase text-gray-950 group-hover:text-amber-600 transition duration-300 leading-snug">{{ $featuredNews->title }}</h3>
                    <p class="text-gray-500 text-xs sm:text-sm mb-6 line-clamp-3 leading-relaxed text-justify font-normal">{{ $featuredNews->desc }}</p>
                </div>
                <div class="flex justify-between items-center pt-4 border-t border-gray-100/80">
                    <x-ui.button variant="yellow">Baca selengkapnya</x-ui.button>
                    <span class="text-gray-300 font-black tracking-widest text-lg">•••</span>
                </div>
            </div>
        </div>
        @endif
        
        <!-- Grid 4 Artikel Kecil Sisi Kanan (Formasi 2x2) -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            @foreach ($otherNews as $item)
                @php $delayClass = $loop->index === 1 ? 'delay-100' : ($loop->index === 2 ? 'delay-200' : ($loop->index === 3 ? 'delay-300' : '')); @endphp
                <div onclick="window.location.href='{{ route('berita.detail', $item->id) }}' " class="bg-white rounded-[24px] tasty-premium-shadow tasty-gpu-smooth overflow-hidden flex flex-col group cursor-pointer border border-gray-100/60 reveal-on-scroll {{ $delayClass }}">
                    <div class="w-full h-44 bg-gray-100 overflow-hidden">
                        <img src="{{ asset($item->image) }}" loading="lazy" alt="{{ $item->title }}" class="w-full h-full object-cover tasty-hover-zoom-trigger">
                    </div>
                    <div class="p-5 flex-grow flex flex-col justify-between">
                        <div>
                            <h4 class="font-black text-sm lg:text-base mb-2 uppercase text-gray-950 group-hover:text-amber-600 transition duration-300 line-clamp-1 tracking-wide">{{ $item->title }}</h4>
                            <p class="text-gray-500 text-xs mb-4 line-clamp-3 leading-relaxed text-justify font-normal">{{ $item->desc }}</p>
                        </div>
                        <div class="flex justify-between items-center mt-2 pt-2 border-t border-gray-50">
                            <x-ui.button variant="yellow">Baca selengkapnya</x-ui.button>
                            <span class="text-gray-300 font-black tracking-widest text-lg">•••</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>

<!-- ========================================================================= -->
<!-- SEKSI 5: GALERI KAMI (FORMASI 3 KOLOM DESKTOP SESUAI IMAGE SEKSI BAWAH)    -->
<!-- ========================================================================= -->
<section class="py-24 px-6 lg:px-24 bg-white select-none">
    <h2 class="text-2xl lg:text-3xl font-black mb-16 uppercase text-center tracking-wider text-gray-950 reveal-on-scroll">Galeri Kami</h2>
    
    <!-- Formasi Grid 3 Kolom Sesuai Visual Cetak Biru Jelas HOME.png -->
    <div class="grid grid-cols-2 md:grid-cols-3 gap-4 sm:gap-6 max-w-7xl mx-auto mb-16">
        @foreach ($gallery as $item)
            @php $step = $loop->index % 3; $delayClass = $step === 1 ? 'delay-100' : ($step === 2 ? 'delay-200' : ''); @endphp
            <div data-id="{{ $item->id }}" onclick="openFoodModal(this.dataset.id)" class="aspect-square bg-gray-50 rounded-[24px] overflow-hidden border border-gray-100/70 tasty-premium-shadow tasty-gpu-smooth relative group cursor-pointer reveal-on-scroll {{ $delayClass }}">
                <img src="{{ asset($item->image) }}" loading="lazy" alt="Galeri Culinary Tasty Food Showcase" class="w-full h-full object-cover tasty-hover-zoom-trigger select-none pointer-events-none">
            </div>
        @endforeach
    </div>
    
    <!-- Tombol Blok Khas Autentik Sesuai Gambar Model -->
    <div class="text-center reveal-on-scroll delay-100">
        <x-ui.button href="{{ route('galeri') }}" class="rounded-none bg-black text-white hover:bg-gray-900 px-12 py-4 font-black tracking-widest text-xs transition duration-300">
            LIHAT LEBIH BANYAK
        </x-ui.button>
    </div>
</section>

<!-- ENGINE INTERAKSI DROPDOWN RESPONSIVE NAVBAR PADA PERANGKAT MOBILE -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const menuBtn = document.getElementById('mobile-menu-btn');
        const menuCloseBtn = document.getElementById('mobile-menu-close');
        const mobileMenu = document.getElementById('mobile-menu');
        const hamburgerIcon = document.getElementById('hamburger-icon');
        
        function closeMenu() {
            mobileMenu.classList.remove('translate-x-0'); mobileMenu.classList.add('translate-x-full');
            hamburgerIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />';
        }
        if (menuBtn && menuCloseBtn && mobileMenu) {
            menuBtn.addEventListener('click', function() { mobileMenu.classList.contains('translate-x-0') ? closeMenu() : mobileMenu.classList.remove('translate-x-full'), mobileMenu.classList.add('translate-x-0'); });
            menuCloseBtn.addEventListener('click', closeMenu);
            mobileMenu.querySelectorAll('a').forEach(link => link.addEventListener('click', closeMenu));
        }
    });
</script>
@endsection