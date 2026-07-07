@extends('layouts.app')

@section('content')
@php
    $aboutImages = [
        'detail_1' => 'asset/brooke-lark-oaz0raysASk-unsplash.avif',
        'detail_2' => 'asset/sebastian-coman-photography-eBmyH7oO5wY-unsplash.avif',
        'visi_1'   => 'asset/fathul-abrar-T-qI_MI2EMA-unsplash.avif',
        'visi_2'   => 'asset/michele-blackwell-rAyCBQTH7ws-unsplash.avif',
        'misi'     => 'asset/sanket-shah-SVA7TyHxojY-unsplash.avif',
    ];
@endphp

<style>
    /* ========================================================================= */
    /* ANIMASI KHUSUS SUB-PAGE HEADER (Elegant, Simple & Fast)                  */
    /* ========================================================================= */
    @keyframes subPageFadeUp {
        from {
            opacity: 0;
            transform: translateY(15px); /* Geser tipis agar tidak menghentak kaku */
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Kelas utama transisi masuk */
    .anim-sub-entry {
        opacity: 0;
        animation: subPageFadeUp 800ms cubic-bezier(0.16, 1, 0.3, 1) forwards;
    }

    /* Jeda waktu untuk teks judul utama */
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
            <a href="{{ route('home') }}" class="hover:text-gray-300 transition duration-200">HOME</a>
            <a href="{{ route('tentang') }}" class="hover:text-gray-300 transition duration-200 border-b-2 border-white pb-1">TENTANG</a>
            <a href="{{ route('berita') }}" class="hover:text-gray-300 transition duration-200">BERITA</a>
            <a href="{{ route('galeri') }}" class="hover:text-gray-300 transition duration-200">GALERI</a>
            <a href="{{ route('kontak') }}" class="hover:text-gray-300 transition duration-200">KONTAK</a>
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
        <a href="{{ route('tentang') }}" class="text-amber-600 transition duration-200 border-b-2 border-amber-600 pb-1">TENTANG</a>
        <a href="{{ route('berita') }}" class="hover:text-amber-600 transition duration-200">BERITA</a>
        <a href="{{ route('galeri') }}" class="hover:text-amber-600 transition duration-200">GALERI</a>
        <a href="{{ route('kontak') }}" class="hover:text-amber-600 transition duration-200">KONTAK</a>
    </div>

    <div class="relative z-10 w-full max-w-7xl mx-auto px-6 md:px-12 lg:px-24 flex-grow flex items-center pb-6 anim-sub-entry anim-sub-delay-1">
        <h1 class="text-4xl lg:text-5xl font-black tracking-wide text-white uppercase">
            TENTANG KAMI
        </h1>
    </div>
</header>

<section class="py-24 px-6 lg:px-24 max-w-7xl mx-auto select-none">
    
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center mb-32">
        <div class="reveal-on-scroll">
            <h2 class="text-3xl font-black mb-6 uppercase text-gray-900 tracking-wide">TASTY FOOD</h2>
            <p class="font-bold text-gray-800 mb-6 text-sm lg:text-base leading-relaxed">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare, augue eu rutrum commodo, dui diam convallis arcu, eget consectetur ex sem eget lacus.</p>
            <p class="text-gray-600 text-sm lg:text-base leading-relaxed">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare, augue eu rutrum commodo, dui diam convallis arcu, eget consectetur ex sem eget lacus. Nullam vitae dignissim neque, vel luctus ex. Fusce sit amet viverra ante.</p>
        </div>
        
        <div class="grid grid-cols-2 gap-6">
            <img src="{{ asset($aboutImages['detail_1']) }}" 
                 loading="lazy"
                 class="w-full h-[240px] sm:h-[320px] rounded-2xl shadow-md object-cover reveal-on-scroll" 
                 alt="Tasty Food Detail 1">
                 
            <img src="{{ asset($aboutImages['detail_2']) }}" 
                 loading="lazy"
                 class="w-full h-[240px] sm:h-[320px] rounded-2xl shadow-md mt-12 object-cover reveal-on-scroll delay-100" 
                 alt="Tasty Food Detail 2">
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center mb-32">
        <div class="grid grid-cols-2 gap-6 order-2 lg:order-1">
            <img src="{{ asset($aboutImages['visi_1']) }}" 
                 loading="lazy"
                 class="w-full h-[200px] sm:h-[280px] rounded-2xl shadow-md object-cover reveal-on-scroll" 
                 alt="Visi 1">
                 
            <img src="{{ asset($aboutImages['visi_2']) }}" 
                 loading="lazy"
                 class="w-full h-[200px] sm:h-[280px] rounded-2xl shadow-md -mt-12 object-cover reveal-on-scroll delay-100" 
                 alt="Visi 2">
        </div>
        
        <div class="order-1 lg:order-2 reveal-on-scroll">
            <h2 class="text-3xl font-black mb-6 uppercase text-gray-900 tracking-wide">VISI</h2>
            <p class="text-gray-600 text-sm lg:text-base leading-relaxed text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce scelerisque magna aliquet cursus tempus. Duis viverra metus et turpis elementum elementum. Aliquam rutrum placerat tellus et suscipit. Curabitur facilisis lectus vitae eros malesuada eleifend. Morbi vel nunc tortor. Nulla facilisi.</p>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
        <div class="reveal-on-scroll">
            <h2 class="text-3xl font-black mb-6 uppercase text-gray-900 tracking-wide">MISI</h2>
            <p class="text-gray-600 text-sm lg:text-base leading-relaxed text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce scelerisque magna aliquet cursus tempus. Duis viverra metus et turpis elementum elementum. Aliquam rutrum placerat tellus et suscipit. Curabitur facilisis lectus vitae eros malesuada eleifend. Morbi vel nunc tortor. Nulla facilisi. In tempor imperdiet erat vel leo rutrum lobortis.</p>
        </div>
        
        <img src="{{ asset($aboutImages['misi']) }}" 
             loading="lazy"
             class="w-full h-[260px] sm:h-[380px] rounded-2xl shadow-md object-cover reveal-on-scroll delay-100" 
             alt="Misi Tasty Food">
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
            if (isOpen) {
                closeMenu();
            } else {
                openMenu();
            }
        });

        menuCloseBtn.addEventListener('click', closeMenu);

        const menuLinks = mobileMenu.querySelectorAll('a');
        menuLinks.forEach(link => {
            link.addEventListener('click', closeMenu);
        });
    });
</script>
@endsection