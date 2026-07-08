@extends('layouts.app')

@section('content')
<style>
    /* ========================================================================= */
    /* ANIMASI KHUSUS SUB-PAGE HEADER (Elegant, Simple & Fast)                  */
    /* ========================================================================= */
    @keyframes subPageFadeUp {
        from {
            opacity: 0;
            transform: translateY(15px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Kelas utama transisi masuk header */
    .anim-sub-entry {
        opacity: 0;
        animation: subPageFadeUp 800ms cubic-bezier(0.16, 1, 0.3, 1) forwards;
    }

    /* Jeda waktu untuk teks judul sub-page */
    .anim-sub-delay-1 {
        animation-delay: 150ms;
    }
</style>

<header class="tasty-sub-header flex flex-col z-10">
    <img src="{{ asset('asset/Group 70@2x.avif') }}" class="tasty-sub-header-bg" alt="Header Background">
    <div class="tasty-sub-header-overlay"></div>

    <div class="relative z-10 w-full max-w-7xl mx-auto px-6 md:px-12 lg:px-24 py-8 flex justify-between md:justify-start items-center gap-16 lg:gap-20 anim-sub-entry">
        <a href="{{ route('home') }}" class="text-2xl font-black tracking-wider uppercase text-white z-50">
            TASTY FOOD
        </a>
        
        <div class="hidden md:flex space-x-8 lg:space-x-10 text-xs lg:text-sm font-bold tracking-wider text-white">
            <a href="{{ route('home') }}" class="transition duration-200 {{ request()->routeIs('home') ? 'border-b-2 border-white pb-1' : 'hover:text-gray-300' }}">HOME</a>
    <a href="{{ route('tentang') }}" class="transition duration-200 {{ request()->routeIs('tentang') ? 'border-b-2 border-white pb-1' : 'hover:text-gray-300' }}">TENTANG</a>
    <a href="{{ route('berita') }}" class="transition duration-200 {{ request()->routeIs('berita') ? 'border-b-2 border-white pb-1' : 'hover:text-gray-300' }}">BERITA</a>
    <a href="{{ route('galeri') }}" class="transition duration-200 {{ request()->routeIs('galeri') ? 'border-b-2 border-white pb-1' : 'hover:text-gray-300' }}">GALERI</a>
    <a href="{{ route('kontak') }}" class="transition duration-200 {{ request()->routeIs('kontak') ? 'border-b-2 border-white pb-1' : 'hover:text-gray-300' }}">KONTAK</a>
            
            @auth
                @if(Auth::user()->role === 'admin')
                    <a href="{{ route('admin.food.create') }}" class="inline-flex items-center justify-center text-white hover:text-amber-500 transition duration-200 ml-2" title="Tambah Data Baru">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                    </a>
                @endif
                <form action="{{ route('logout') }}" method="POST" class="inline-flex items-center ml-4">
                    @csrf
                    <button type="submit" class="text-xs lg:text-sm font-bold tracking-wider text-red-400 hover:text-red-600 uppercase transition duration-200 focus:outline-none cursor-pointer">
                        LOGOUT
                    </button>
                </form>
            @endauth
            @guest
                <a href="{{ route('login') }}" class="hover:text-gray-300 transition duration-200 pt-0.5 ml-4">LOGIN</a>
                <a href="{{ route('register') }}" class="bg-white text-gray-950 px-5 py-1.5 rounded-full hover:bg-gray-200 transition duration-200 text-xs -mt-1 font-black tracking-widest">
                    REGISTER
                </a>
            @endguest
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
        <a href="{{ route('berita') }}" class="text-amber-600 border-b-2 border-amber-600 pb-1">BERITA</a>
        <a href="{{ route('galeri') }}" class="hover:text-amber-600 transition duration-200">GALERI</a>
        <a href="{{ route('kontak') }}" class="hover:text-amber-600 transition duration-200">KONTAK</a>

        @auth
            @if(Auth::user()->role === 'admin')
                <a href="{{ route('admin.food.create') }}" class="text-amber-600 hover:text-amber-800 transition text-sm">➕ TAMBAH DATA</a>
            @endif
            <hr class="w-1/2 border-gray-200 my-2">
            <form action="{{ route('logout') }}" method="POST" class="w-full text-center">
                @csrf
                <button type="submit" class="text-lg font-black tracking-widest text-red-600 hover:text-red-800 uppercase transition duration-200 focus:outline-none cursor-pointer">
                    LOGOUT
                </button>
            </form>
        @endauth

        @guest
            <hr class="w-1/2 border-gray-200 my-2">
            <a href="{{ route('login') }}" class="hover:text-amber-600 transition duration-200">LOGIN</a>
            <a href="{{ route('register') }}" class="bg-black text-white px-6 py-3 rounded-xl hover:bg-gray-800 transition duration-200 w-3/4 text-center text-sm font-black tracking-widest">
                REGISTER
            </a>
        @endguest
    </div>

    <div class="relative z-10 w-full max-w-7xl mx-auto px-6 md:px-12 lg:px-24 flex-grow flex items-center pb-6 anim-sub-entry anim-sub-delay-1">
        <h1 class="text-4xl lg:text-5xl font-black tracking-wide text-white uppercase">
            BERITA KAMI
        </h1>
    </div>
</header>

<section class="py-24 px-6 lg:px-24 bg-gray-50 select-none">
    <div class="max-w-7xl mx-auto">
        
        @if($featuredNews)
        <div onclick="openFoodModal({{ $featuredNews->id }})" class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center mb-24 bg-white rounded-3xl p-6 lg:p-10 shadow-xl border border-gray-100 reveal-on-scroll cursor-pointer group">
            <img src="{{ asset($featuredNews->image) }}" 
                 class="w-full h-[240px] sm:h-[380px] rounded-2xl shadow-inner object-cover" 
                 alt="Berita Utama Tasty Food">
                 
            <div class="flex flex-col items-start">
                <h2 class="text-2xl lg:text-3xl font-black mb-6 uppercase text-gray-900 group-hover:text-amber-600 transition leading-snug">{{ $featuredNews->title }}</h2>
                <p class="text-gray-700 font-semibold text-sm lg:text-base mb-4 leading-relaxed">{{ Str::limit($featuredNews->desc, 150) }}</p>
                <p class="text-gray-500 text-sm lg:text-base mb-8 leading-relaxed">{{ Str::limit($featuredNews->desc, 255) }}</p>
                <x-ui.button>BACA SELENGKAPNYA</x-ui.button>
            </div>
        </div>
        @endif

        <h3 class="text-2xl font-black mb-10 uppercase text-gray-900 tracking-wide reveal-on-scroll">
            Berita Lainnya
        </h3>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach ($beritaLainnya as $item)
                @php
                    $step = $loop->index % 4;
                    $delayClass = $step === 1 ? 'delay-100' : ($step === 2 ? 'delay-200' : ($step === 3 ? 'delay-300' : ''));
                @endphp
                
                <div onclick="openFoodModal({{ $item->id }})" class="bg-white rounded-2xl shadow-md overflow-hidden flex flex-col group cursor-pointer border border-gray-100 reveal-on-scroll {{ $delayClass }}">
                    <div class="w-full h-48 bg-gray-300 overflow-hidden">
                        <img src="{{ asset($item->image) }}" 
                             loading="lazy"
                             class="w-full h-full object-cover group-hover:scale-105 transition duration-500" 
                             alt="Tasty Food News">
                    </div>
                    
                    <div class="p-6 flex-grow flex flex-col justify-between">
                        <div>
                            <h4 class="font-bold text-lg mb-2 uppercase text-gray-900 group-hover:text-amber-600 transition line-clamp-1">{{ $item->title }}</h4>
                            <p class="text-gray-600 text-sm mb-6 line-clamp-3 leading-relaxed">{{ $item->desc }}</p>
                        </div>
                        <div class="flex justify-between items-center pt-2">
                            <x-ui.button variant="yellow">Baca selengkapnya</x-ui.button>
                            <span class="text-gray-300 font-bold tracking-widest text-lg">•••</span>
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
        
        menuBtn.addEventListener('click', function() {
            const isOpen = mobileMenu.classList.contains('translate-x-0');
            isOpen ? closeMenu() : openMenu();
        });

        menuCloseBtn.addEventListener('click', closeMenu);

        const menuLinks = mobileMenu.querySelectorAll('a');
        menuLinks.forEach(link => {
            link.addEventListener('click', closeMenu);
        });
    });
</script>
@endsection