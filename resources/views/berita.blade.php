@extends('layouts.app')

@section('content')
<style>
    /* ========================================================================= */
    /* FINE-TUNING PREMIUM: HIGH-FIDELITY INTERACTION & HARDWARE ACCELERATION    */
    /* ========================================================================= */
    @keyframes subPageFadeUp {
        from { opacity: 0; transform: translateY(15px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .anim-sub-entry { opacity: 0; animation: subPageFadeUp 800ms cubic-bezier(0.16, 1, 0.3, 1) forwards; }

    /* Akselerasi GPU Murni Untuk Transisi Hover Gambar Ringan Anti Patah */
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

    /* Kustomisasi Elevasi Bayangan Halus Sesuai Karakter Gambar Referensi BERITA.png */
    .tasty-premium-shadow {
        box-shadow: 0 10px 35px rgba(0, 0, 0, 0.03), 0 4px 12px rgba(0, 0, 0, 0.01);
    }
    .tasty-premium-shadow:hover {
        box-shadow: 0 20px 45px rgba(0, 0, 0, 0.06), 0 6px 16px rgba(0, 0, 0, 0.02);
        transform: translateY(-4px);
        transition: transform 500ms cubic-bezier(0.16, 1, 0.3, 1), box-shadow 500ms cubic-bezier(0.16, 1, 0.3, 1);
    }
</style>

<header class="tasty-sub-header flex flex-col z-10">
    <img src="{{ asset('asset/Group 70@2x.avif') }}" class="tasty-sub-header-bg" alt="Header Background">
    <div class="tasty-sub-header-overlay"></div>
    <div class="relative z-10 w-full max-w-7xl mx-auto px-6 md:px-12 lg:px-24 py-8 flex justify-between md:justify-start items-center gap-16 lg:gap-20 anim-sub-entry">
        <a href="{{ route('home') }}" class="text-2xl font-black tracking-wider uppercase text-white z-50">TASTY FOOD</a>
        <div class="hidden md:flex space-x-8 lg:space-x-10 text-xs lg:text-sm font-bold tracking-wider text-white items-center">
            <a href="{{ route('home') }}" class="transition duration-200 {{ request()->routeIs('home') ? 'border-b-2 border-white pb-1' : 'hover:text-gray-300' }}">HOME</a>
            <a href="{{ route('tentang') }}" class="transition duration-200 {{ request()->routeIs('tentang') ? 'border-b-2 border-white pb-1' : 'hover:text-gray-300' }}">TENTANG</a>
            <a href="{{ route('berita') }}" class="transition duration-200 {{ request()->routeIs('berita') ? 'border-b-2 border-white pb-1' : 'hover:text-gray-300' }}">BERITA</a>
            <a href="{{ route('galeri') }}" class="transition duration-200 {{ request()->routeIs('galeri') ? 'border-b-2 border-white pb-1' : 'hover:text-gray-300' }}">GALERI</a>
            <a href="{{ route('kontak') }}" class="transition duration-200 {{ request()->routeIs('kontak') ? 'border-b-2 border-white pb-1' : 'hover:text-gray-300' }}">KONTAK</a>
        </div>
        <button id="mobile-menu-btn" class="md:hidden text-white focus:outline-none z-50 p-1" aria-label="Toggle Menu">
            <svg id="hamburger-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-7 h-7 transition-transform duration-300">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
        </button>
    </div>
    <div id="mobile-menu" class="fixed top-0 bottom-0 right-0 w-3/4 bg-white/95 backdrop-blur-md shadow-2xl border-l border-gray-100/50 z-40 transform translate-x-full transition-transform duration-500 ease-in-out flex flex-col items-center justify-center space-y-8 text-xl font-black tracking-widest text-gray-950 md:hidden">
        <button id="mobile-menu-close" class="absolute top-10 right-6 text-gray-950 focus:outline-none p-1 hover:scale-110 transition duration-200" aria-label="Close Menu">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-7 h-7">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
        <a href="{{ route('home') }}" class="hover:text-amber-600 transition duration-200">HOME</a>
        <a href="{{ route('tentang') }}" class="hover:text-amber-600 transition duration-200">TENTANG</a>
        <a href="{{ route('berita') }}" class="hover:text-amber-600 transition duration-200">BERITA</a>
        <a href="{{ route('galeri') }}" class="hover:text-amber-600 transition duration-200">GALERI</a>
        <a href="{{ route('kontak') }}" class="hover:text-amber-600 transition duration-200">KONTAK</a>
    </div>

    <div class="relative z-10 w-full max-w-7xl mx-auto px-6 md:px-12 lg:px-24 flex-grow flex items-center pb-6 anim-sub-entry">
        <h1 class="text-4xl lg:text-5xl font-black tracking-wide text-white uppercase">BERITA KAMI</h1>
    </div>
</header>

<section class="py-24 px-6 md:px-12 lg:px-24 bg-white select-none">
    <div class="max-w-7xl mx-auto">
        
        @if($featuredNews)
        <div onclick="window.location.href='{{ route('berita.detail', $featuredNews->id) }}'" class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center mb-24 bg-white rounded-[24px] p-2 lg:p-4 reveal-on-scroll cursor-pointer group">
            <div class="w-full h-[240px] sm:h-[400px] rounded-[24px] overflow-hidden shadow-inner bg-gray-50">
                <img src="{{ asset($featuredNews->image) }}" loading="lazy" class="w-full h-full object-cover tasty-hover-zoom-trigger" alt="Berita Utama Editorial">
            </div>
            <div class="flex flex-col items-start px-4 lg:px-2">
                <h2 class="text-xl sm:text-2xl lg:text-3xl font-black mb-6 uppercase text-gray-950 leading-snug tracking-wide transition duration-300">{{ $featuredNews->title }}</h2>
                <p class="text-gray-500 font-normal text-xs sm:text-sm mb-4 leading-relaxed text-justify">{{ Str::limit($featuredNews->desc, 180) }}</p>
                <p class="text-gray-400 font-normal text-xs sm:text-sm mb-8 leading-relaxed text-justify">{{ Str::limit($featuredNews->desc, 240) }}</p>
                <x-ui.button class="rounded-none bg-black text-white px-10 py-4 font-black tracking-widest text-xs uppercase transition duration-300 hover:bg-white hover:text-gray-950 border border-black">
                    BACA SELENGKAPNYA
                </x-ui.button>
            </div>
        </div>
        @endif
        
        <h3 class="text-xl sm:text-2xl font-black mb-10 uppercase text-gray-950 tracking-wider reveal-on-scroll">Berita Lainnya</h3>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach ($beritaLainnya as $item)
                @php 
                    $step = $loop->index % 4; 
                    $delayClass = $step === 1 ? 'delay-100' : ($step === 2 ? 'delay-200' : ($step === 3 ? 'delay-300' : '')); 
                @endphp
                <div onclick="window.location.href='{{ route('berita.detail', $item->id) }}'" class="bg-white rounded-[24px] tasty-premium-shadow tasty-gpu-smooth overflow-hidden flex flex-col group cursor-pointer border border-gray-100/60 reveal-on-scroll {{ $delayClass }}">
                    
                    <div class="w-full h-48 bg-gray-50 overflow-hidden">
                        <img src="{{ asset($item->image) }}" loading="lazy" class="w-full h-full object-cover tasty-hover-zoom-trigger" alt="News Feed Media">
                    </div>
                    
                    <div class="p-5 flex-grow flex flex-col justify-between">
                        <div>
                            <h4 class="font-black text-sm lg:text-base mb-2 uppercase text-gray-950 group-hover:text-amber-600 transition duration-300 line-clamp-1 tracking-wide">{{ $item->title }}</h4>
                            <p class="text-gray-500 text-xs mb-6 line-clamp-3 leading-relaxed text-justify font-normal">{{ $item->desc }}</p>
                        </div>
                        <div class="flex justify-between items-center pt-2 border-t border-gray-50">
                            <x-ui.button variant="yellow">Baca selengkapnya</x-ui.button>
                            <span class="text-gray-300 font-black tracking-widest text-lg">•••</span>
                        </div>
                    </div>

                </div>
            @endforeach
        </div>

    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const menuBtn = document.getElementById('mobile-menu-btn');
        const menuCloseBtn = document.getElementById('mobile-menu-close');
        const mobileMenu = document.getElementById('mobile-menu');
        const hamburgerIcon = document.getElementById('hamburger-icon');
        
        function closeMenu() {
            mobileMenu.classList.remove('translate-x-0'); 
            mobileMenu.classList.add('translate-x-full');
            hamburgerIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />';
        }

        function openMenu() {
            mobileMenu.classList.remove('translate-x-full'); 
            mobileMenu.classList.add('translate-x-0');
        }
        
        if (menuBtn && menuCloseBtn && mobileMenu) {
            menuBtn.addEventListener('click', function() { 
                mobileMenu.classList.contains('translate-x-0') ? closeMenu() : openMenu(); 
            });
            menuCloseBtn.addEventListener('click', closeMenu);
            mobileMenu.querySelectorAll('a').forEach(link => link.addEventListener('click', closeMenu));
        }
    });
</script>
@endsection