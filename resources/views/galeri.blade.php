@extends('layouts.app')

@section('content')
<style>
    /* ========================================================================= */
    /* STRUCTURAL & RESPONSIVE CAROUSEL STYLES                                   */
    /* ========================================================================= */
    .tasty-carousel-frame {
        width: 100%;
        height: 420px; 
    }
    .tasty-arrow-shadow {
        box-shadow: 0 4px 14px rgba(0, 0, 0, 0.08);
    }
    
    @media (max-width: 1024px) {
        .tasty-carousel-frame {
            height: 340px;
        }
    }
    @media (max-width: 640px) {
        .tasty-carousel-frame {
            height: 240px;
        }
    }

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

    .anim-sub-entry {
        opacity: 0;
        animation: subPageFadeUp 800ms cubic-bezier(0.16, 1, 0.3, 1) forwards;
    }

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
        <a href="{{ route('berita') }}" class="hover:text-amber-600 transition duration-200">BERITA</a>
        <a href="{{ route('galeri') }}" class="text-amber-600 border-b-2 border-amber-600 pb-1">GALERI</a>
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
            GALERI KAMI
        </h1>
    </div>
</header>

@php
    // Slider Utama Carousel tetap statis (bukan database) sesuai instruksi awal Anda
    $carouselSlides = [
        'asset/ella-olsson-mmnKI8kMxpc-unsplash.avif',
        'asset/luisa-brimble-HvXEbkcXjSk-unsplash.avif',
        'asset/anna-pelzer-IGfIGP5ONV0-unsplash.avif'
    ];
@endphp

<section class="py-24 px-6 lg:px-24 bg-white select-none">
    <div class="max-w-7xl mx-auto">
        
        <div class="relative w-full mb-20 px-2 sm:px-0 reveal-on-scroll">
            <div class="tasty-carousel-frame w-full rounded-[28px] overflow-hidden shadow-sm relative z-0">
                @foreach ($carouselSlides as $index => $slidePath)
                    <img src="{{ asset($slidePath) }}" 
                         class="carousel-item absolute inset-0 w-full h-full object-cover object-center select-none pointer-events-none transition-opacity duration-500 ease-in-out {{ $index === 0 ? 'opacity-100 z-10' : 'opacity-0 z-0' }}" 
                         alt="Featured Food Gallery Showcase">
                @endforeach
            </div>

            <button onclick="prevSlide()" class="absolute left-0 sm:left-0 top-1/2 -translate-y-1/2 -translate-x-1/2 w-11 h-11 sm:w-12 sm:h-12 bg-white rounded-full flex items-center justify-center tasty-arrow-shadow text-gray-900 hover:bg-gray-50 hover:scale-105 transition-all duration-200 z-20 focus:outline-none cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="w-4 h-4 sm:w-5 sm:h-5 text-black">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                </svg>
            </button>

            <button onclick="nextSlide()" class="absolute right-0 sm:right-0 top-1/2 -translate-y-1/2 translate-x-1/2 w-11 h-11 sm:w-12 sm:h-12 bg-white rounded-full flex items-center justify-center tasty-arrow-shadow text-gray-900 hover:bg-gray-50 hover:scale-105 transition-all duration-200 z-20 focus:outline-none cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="w-4 h-4 sm:w-5 sm:h-5 text-black">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                </svg>
            </button>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($galleryItems as $item)
                @php
                    $step = $loop->index % 4;
                    $delayClass = $step === 1 ? 'delay-100' : ($step === 2 ? 'delay-200' : ($step === 3 ? 'delay-300' : ''));
                @endphp
                
                <div onclick="openFoodModal({{ $item->id }})" class="aspect-square bg-gray-200 rounded-2xl overflow-hidden shadow border border-gray-100 hover:scale-105 transition duration-300 cursor-pointer reveal-on-scroll {{ $delayClass }}">
                    <img src="{{ asset($item->image) }}" loading="lazy" class="w-full h-full object-cover" alt="Tasty Food Gallery Asset">
                </div>
            @endforeach
        </div>
        
    </div>
</section>

<script>
    // 1. Logika Penggerak Slide Carousel
    let currentSlideIndex = 0;
    const carouselItems = document.querySelectorAll('.carousel-item');
    const totalCarouselSlides = carouselItems.length;

    function renderActiveSlide(targetIndex) {
        carouselItems.forEach((slide, index) => {
            if (index === targetIndex) {
                slide.classList.remove('opacity-0', 'z-0');
                slide.classList.add('opacity-100', 'z-10');
            } else {
                slide.classList.remove('opacity-100', 'z-10');
                slide.classList.add('opacity-0', 'z-0');
            }
        });
    }

    function nextSlide() {
        currentSlideIndex = (currentSlideIndex + 1) % totalCarouselSlides;
        renderActiveSlide(currentSlideIndex);
    }

    function prevSlide() {
        currentSlideIndex = (currentSlideIndex - 1 + totalCarouselSlides) % totalCarouselSlides;
        renderActiveSlide(currentSlideIndex);
    }

    // 2. Logika Penggerak Hamburger Menu Mobile
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