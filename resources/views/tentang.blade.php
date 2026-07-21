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
    .anim-sub-delay-1 { animation-delay: 150ms; }

    .tasty-gpu-smooth {
        backface-visibility: hidden;
        transform: translateZ(0);
        will-change: transform, box-shadow;
    }
    
    .tasty-hover-zoom-trigger {
        transition: transform 600ms cubic-bezier(0.16, 1, 0.3, 1);
    }
    .tasty-image-container:hover .tasty-hover-zoom-trigger {
        transform: scale(1.05);
    }

    .tasty-premium-shadow {
        box-shadow: 0 10px 35px rgba(0, 0, 0, 0.03), 0 4px 12px rgba(0, 0, 0, 0.01);
    }
    .tasty-premium-shadow:hover {
        box-shadow: 0 20px 45px rgba(0, 0, 0, 0.06), 0 6px 16px rgba(0, 0, 0, 0.02);
        transform: translateY(-4px);
        transition: transform 500ms cubic-bezier(0.16, 1, 0.3, 1), box-shadow 500ms cubic-bezier(0.16, 1, 0.3, 1);
    }

    .manual-reveal {
        opacity: 0;
        transform: translateY(40px);
        transition: opacity 1000ms cubic-bezier(0.21, 1.02, 0.43, 1.01), 
                    transform 1000ms cubic-bezier(0.21, 1.02, 0.43, 1.01);
        will-change: opacity, transform;
    }
    .manual-reveal.is-visible {
        opacity: 1;
        transform: translateY(0);
    }
</style>

<header class="tasty-sub-header flex flex-col z-10">
    <img src="{{ asset($headerAbout->image_1 ?? 'asset/Group 70@2x.avif') }}" class="tasty-sub-header-bg" alt="Header Background">
    <div class="tasty-sub-header-overlay"></div>

    <div class="relative z-10 w-full max-w-7xl mx-auto px-6 md:px-12 lg:px-24 py-8 flex justify-between md:justify-start items-center gap-16 lg:gap-20 anim-sub-entry">
        <a href="{{ route('home') }}" class="text-2xl font-black tracking-wider uppercase text-white z-50">
            {{ $siteBranding->title ?? 'TASTY FOOD' }}
        </a>
        
        <!-- ✅ PERBAIKAN: Teks Label Menu Navigasi Sub-Header Dinamis Database -->
        <div class="hidden md:flex space-x-8 lg:space-x-10 text-xs lg:text-sm font-bold tracking-wider text-white uppercase">
            <a href="{{ route('home') }}" class="transition duration-200 {{ request()->routeIs('home') ? 'border-b-2 border-white pb-1' : 'hover:text-gray-300' }}">{{ $navMenu->home ?? 'HOME' }}</a>
            <a href="{{ route('tentang') }}" class="transition duration-200 {{ request()->routeIs('tentang') ? 'border-b-2 border-white pb-1' : 'hover:text-gray-300' }}">{{ $navMenu->tentang ?? 'TENTANG' }}</a>
            <a href="{{ route('berita') }}" class="transition duration-200 {{ request()->routeIs('berita') ? 'border-b-2 border-white pb-1' : 'hover:text-gray-300' }}">{{ $navMenu->berita ?? 'BERITA' }}</a>
            <a href="{{ route('galeri') }}" class="transition duration-200 {{ request()->routeIs('galeri') ? 'border-b-2 border-white pb-1' : 'hover:text-gray-300' }}">{{ $navMenu->galeri ?? 'GALERI' }}</a>
            <a href="{{ route('kontak') }}" class="transition duration-200 {{ request()->routeIs('kontak') ? 'border-b-2 border-white pb-1' : 'hover:text-gray-300' }}">{{ $navMenu->kontak ?? 'KONTAK' }}</a>
        </div>

        <button id="mobile-menu-btn" class="md:hidden text-white focus:outline-none z-50 p-1" aria-label="Toggle Menu">
            <svg id="hamburger-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-7 h-7 transition-transform duration-300">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
        </button>
    </div>

    <!-- ✅ PERBAIKAN: Teks Label Menu Navigasi Sub-Header Mobile Dinamis Database -->
    <div id="mobile-menu" class="fixed top-0 bottom-0 right-0 w-3/4 bg-white/95 backdrop-blur-md shadow-2xl border-l border-gray-100/50 z-40 transform translate-x-full transition-transform duration-500 ease-in-out flex flex-col items-center justify-center space-y-8 text-xl font-black tracking-widest text-gray-950 md:hidden uppercase">
        <button id="mobile-menu-close" class="absolute top-10 right-6 text-gray-950 focus:outline-none p-1 hover:scale-110 transition duration-200" aria-label="Close Menu">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-7 h-7"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>
        </button>
        <a href="{{ route('home') }}" class="hover:text-amber-600 transition duration-200">{{ $navMenu->home ?? 'HOME' }}</a>
        <a href="{{ route('tentang') }}" class="hover:text-amber-600 transition duration-200">{{ $navMenu->tentang ?? 'TENTANG' }}</a>
        <a href="{{ route('berita') }}" class="hover:text-amber-600 transition duration-200">{{ $navMenu->berita ?? 'BERITA' }}</a>
        <a href="{{ route('galeri') }}" class="hover:text-amber-600 transition duration-200">{{ $navMenu->galeri ?? 'GALERI' }}</a>
        <a href="{{ route('kontak') }}" class="hover:text-amber-600 transition duration-200">{{ $navMenu->kontak ?? 'KONTAK' }}</a>
    </div>

    <div class="relative z-10 w-full max-w-7xl mx-auto px-6 md:px-12 lg:px-24 flex-grow flex items-center pb-6 anim-sub-entry anim-sub-delay-1">
        <h1 class="text-4xl lg:text-5xl font-black tracking-wide text-white uppercase">TENTANG KAMI</h1>
    </div>
</header>

<section class="py-24 px-6 lg:px-24 max-w-7xl mx-auto select-none bg-white">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center mb-32">
        <div class="order-1 lg:order-1 manual-reveal">
            <h2 class="text-2xl lg:text-3xl font-black mb-6 uppercase text-gray-950 tracking-wider">
                {{ $sejarah->title ?? 'TASTY FOOD' }}
            </h2>
            <div class="text-gray-500 text-sm lg:text-base leading-relaxed text-justify font-normal">
                <p>{!! nl2br(e($sejarah->desc ?? 'Lorem ipsum dolor sit amet...')) !!}</p>
            </div>
        </div>
        
        <div class="grid grid-cols-2 gap-4 sm:gap-6 order-2 lg:order-2">
            <div class="tasty-image-container w-full h-[200px] sm:h-[300px] rounded-[24px] border border-gray-100 overflow-hidden tasty-premium-shadow tasty-gpu-smooth manual-reveal">
                <img src="{{ asset($sejarah->image_1 ?? 'asset/brooke-lark-oaz0raysASk-unsplash.avif') }}" class="w-full h-full object-cover tasty-hover-zoom-trigger select-none pointer-events-none" alt="Sejarah Aset 1">
            </div>
                 
            <div class="tasty-image-container w-full h-[200px] sm:h-[300px] rounded-[24px] border border-gray-100 overflow-hidden tasty-premium-shadow tasty-gpu-smooth -mt-12 manual-reveal delay-100">
                <img src="{{ asset($sejarah->image_2 ?? 'asset/sebastian-coman-photography-eBmyH7oO5wY-unsplash.avif') }}" class="w-full h-full object-cover tasty-hover-zoom-trigger select-none pointer-events-none" alt="Sejarah Aset 2">
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center mb-32">
        <div class="grid grid-cols-2 gap-4 sm:gap-6 order-2 lg:order-1">
            <div class="tasty-image-container w-full h-[200px] sm:h-[300px] rounded-[24px] border border-gray-100 overflow-hidden tasty-premium-shadow tasty-gpu-smooth reveal-on-scroll">
                <img src="{{ asset($visi->image_1 ?? 'asset/fathul-abrar-T-qI_MI2EMA-unsplash.avif') }}" loading="lazy" class="w-full h-full object-cover tasty-hover-zoom-trigger select-none pointer-events-none" alt="Visi Aset 1">
            </div>
                 
            <div class="tasty-image-container w-full h-[200px] sm:h-[300px] rounded-[24px] border border-gray-100 overflow-hidden tasty-premium-shadow tasty-gpu-smooth -mt-12 reveal-on-scroll delay-100">
                <img src="{{ asset($visi->image_2 ?? 'asset/michele-blackwell-rAyCBQTH7ws-unsplash.avif') }}" loading="lazy" class="w-full h-full object-cover tasty-hover-zoom-trigger select-none pointer-events-none" alt="Visi Aset 2">
            </div>
        </div>
        
        <div class="order-1 lg:order-2 reveal-on-scroll">
            <h2 class="text-2xl lg:text-3xl font-black mb-6 uppercase text-gray-950 tracking-wider">
                {{ $visi->title ?? 'VISI' }}
            </h2>
            <p class="text-gray-500 text-sm lg:text-base leading-relaxed text-justify font-normal">
                {!! nl2br(e($visi->desc ?? 'Lorem ipsum dolor sit amet...')) !!}
            </p>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
        <div class="reveal-on-scroll">
            <h2 class="text-2xl lg:text-3xl font-black mb-6 uppercase text-gray-950 tracking-wider">
                {{ $misi->title ?? 'MISI' }}
            </h2>
            <p class="text-gray-500 text-sm lg:text-base leading-relaxed text-justify font-normal">
                {!! nl2br(e($misi->desc ?? 'Lorem ipsum dolor sit amet...')) !!}
            </p>
        </div>
        
        <div class="tasty-image-container w-full h-[240px] sm:h-[360px] rounded-[24px] border border-gray-100 overflow-hidden tasty-premium-shadow tasty-gpu-smooth reveal-on-scroll delay-100">
            <img src="{{ asset($misi->image_1 ?? 'asset/sanket-shah-SVA7TyHxojY-unsplash.avif') }}" loading="lazy" class="w-full h-full object-cover tasty-hover-zoom-trigger select-none pointer-events-none" alt="Misi Aset">
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const manualElements = document.querySelectorAll('.manual-reveal');
        if (manualElements.length > 0) {
            const triggerSectionScroll = () => {
                if (window.scrollY > 15) {
                    manualElements.forEach(element => { element.classList.add('is-visible'); });
                    window.removeEventListener('scroll', triggerSectionScroll);
                }
            };
            window.addEventListener('scroll', triggerSectionScroll);
        }
    });
</script>
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
        function openMenu() { mobileMenu.classList.remove('translate-x-full'); mobileMenu.classList.add('translate-x-0'); }
        
        if(menuBtn) {
            menuBtn.addEventListener('click', function() { mobileMenu.classList.contains('translate-x-0') ? closeMenu() : openMenu(); });
            menuCloseBtn.addEventListener('click', closeMenu);
            mobileMenu.querySelectorAll('a').forEach(link => link.addEventListener('click', closeMenu));
        }
    });
</script>
@endsection