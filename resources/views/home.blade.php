@extends('layouts.app')

@section('content')
<style>
    /* ========================================================================= */
    /* 1. STRUCTURAL LAYOUT STYLES (Dioptimalkan Agar Responsif)                 */
    /* ========================================================================= */
    .tasty-home-hero {
        background-color: #f4f4f4; 
        min-height: 700px;
    }
    
    @media (min-width: 768px) {
        .tasty-home-hero {
            height: 700px;
        }
    }
    
    .tasty-hero-line {
        width: 60px;
        height: 3px;
        background-color: #1c1c1c;
    }

    .tasty-hero-plate-exact {
        position: absolute;
        right: -12%; 
        top: 0;
        height: 100%; 
        width: auto;
        object-fit: contain;
        z-index: 1;
        pointer-events: none;
        user-select: none;
    }

    @media (max-width: 1024px) {
        .tasty-hero-plate-exact {
            right: -25%;
        }
    }
    @media (max-width: 640px) {
        .tasty-hero-plate-exact {
            right: -45%;
            opacity: 0.12;
        }
    }

    /* ========================================================================= */
    /* 2. ELEGANT ENTRANCE ANIMATIONS (Satu Tema, Simple & Professional)         */
    /* ========================================================================= */
    @keyframes tastyFadeUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes tastyPlateIn {
        from {
            opacity: 0;
            transform: translateX(60px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    .anim-hero-entry {
        opacity: 0;
        animation: tastyFadeUp 1200ms cubic-bezier(0.16, 1, 0.3, 1) forwards;
    }

    .anim-delay-1 { animation-delay: 150ms; }
    .anim-delay-2 { animation-delay: 300ms; }
    .anim-delay-3 { animation-delay: 450ms; }
    .anim-delay-4 { animation-delay: 600ms; }
    .anim-delay-5 { animation-delay: 750ms; }

    .anim-hero-plate {
        opacity: 0;
        animation: tastyPlateIn 1500ms cubic-bezier(0.16, 1, 0.3, 1) 300ms forwards;
    }
</style>

<section class="relative w-full tasty-home-hero flex flex-col overflow-hidden z-10">
    
    <div class="relative z-20 w-full max-w-7xl mx-auto px-6 md:px-12 lg:px-24 py-10 flex justify-between md:justify-start items-center gap-16 lg:gap-20 anim-hero-entry">
        <a href="{{ route('home') }}" class="text-2xl lg:text-3xl font-black tracking-wider uppercase text-gray-950 flex-shrink-0 z-50">
            TASTY FOOD
        </a>
        
        <div class="hidden md:flex space-x-8 lg:space-x-10 text-xs lg:text-sm font-bold tracking-wider text-gray-900 pt-1 items-center">
            <a href="{{ route('home') }}" class="transition duration-200 {{ request()->routeIs('home') ? 'text-amber-600 border-b-2 border-amber-600 pb-1' : 'hover:text-gray-600' }}">HOME</a>
            <a href="{{ route('tentang') }}" class="transition duration-200 {{ request()->routeIs('tentang') ? 'text-amber-600 border-b-2 border-amber-600 pb-1' : 'hover:text-gray-600' }}">TENTANG</a>
            <a href="{{ route('berita') }}" class="transition duration-200 {{ request()->routeIs('berita') ? 'text-amber-600 border-b-2 border-amber-600 pb-1' : 'hover:text-gray-600' }}">BERITA</a>
            <a href="{{ route('galeri') }}" class="transition duration-200 {{ request()->routeIs('galeri') ? 'text-amber-600 border-b-2 border-amber-600 pb-1' : 'hover:text-gray-600' }}">GALERI</a>
            <a href="{{ route('kontak') }}" class="transition duration-200 {{ request()->routeIs('kontak') ? 'text-amber-600 border-b-2 border-amber-600 pb-1' : 'hover:text-gray-600' }}">KONTAK</a>
            
            @auth
                @if(Auth::user()->role === 'admin')
                    <a href="{{ route('admin.food.create') }}" class="inline-flex items-center justify-center text-gray-950 hover:text-amber-600 transition duration-200 ml-2" title="Tambah Data Baru">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                    </a>
                @endif
                <form action="{{ route('logout') }}" method="POST" class="inline-flex items-center ml-4">
                    @csrf
                    <button type="submit" class="text-xs lg:text-sm font-bold tracking-wider text-red-500 hover:text-red-700 uppercase transition duration-200 focus:outline-none cursor-pointer">
                        LOGOUT
                    </button>
                </form>
            @endauth
            
            @guest
                <a href="{{ route('login') }}" class="bg-white text-gray-950 border border-gray-950 px-5 py-1.5 transition duration-200 text-xs font-black tracking-widest rounded-none hover:bg-black hover:text-white hover:border-black ml-4 flex items-center justify-center h-9">
                    LOGIN
                </a>
                <a href="{{ route('register') }}" class="bg-black text-white border border-black px-5 py-1.5 transition duration-200 text-xs font-black tracking-widest rounded-none hover:bg-white hover:text-black hover:border-black ml-3 flex items-center justify-center h-9">
                    REGISTER
                </a>
            @endguest
        </div>

        <button id="mobile-menu-btn" class="md:hidden text-gray-950 focus:outline-none z-50 p-1" aria-label="Toggle Menu">
            <svg id="hamburger-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-7 h-7 transition-transform duration-300">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
        </button>
    </div>

    <div id="mobile-menu" class="fixed top-0 bottom-0 right-0 w-3/4 bg-white/95 backdrop-blur-md shadow-2xl border-l border-gray-100/50 z-40 transform translate-x-full transition-transform duration-500 ease-in-out flex flex-col items-center justify-center space-y-8 text-xl font-black tracking-widest text-gray-950 md:hidden p-6">
        
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

        @auth
            @if(Auth::user()->role === 'admin')
                <a href="{{ route('admin.food.create') }}" class="text-amber-600 hover:text-amber-800 transition text-sm">➕ TAMBAH DATA</a>
            @endif
            <hr class="w-1/2 border-gray-200 my-2">
            <form action="{{ route('logout') }}" method="POST" class="w-full text-center">
                @csrf
                <button type="submit" class="text-lg font-black tracking-widest text-red-600 hover:text-red-800 uppercase transition duration-200 focus:outline-none cursor-pointer">LOGOUT</button>
            </form>
        @endauth

        @guest
            <hr class="w-1/2 border-gray-200 my-2">
            <a href="{{ route('login') }}" class="bg-white text-gray-950 border border-gray-950 px-6 py-3 transition duration-200 w-3/4 text-center text-sm font-black tracking-widest rounded-none hover:bg-black hover:text-white hover:border-black">
                LOGIN
            </a>
            <a href="{{ route('register') }}" class="bg-black text-white border border-black px-6 py-3 transition duration-200 w-3/4 text-center text-sm font-black tracking-widest rounded-none hover:bg-white hover:text-black hover:border-black">
                REGISTER
            </a>
        @endguest
    </div>

    <div class="relative z-10 w-full max-w-7xl mx-auto px-6 md:px-12 lg:px-24 flex-grow flex flex-col items-start justify-center pt-8 pb-20 md:pb-16">
        <div class="tasty-hero-line mb-8 anim-hero-entry anim-delay-1"></div>
        <h1 class="text-3xl sm:text-4xl lg:text-6xl font-light tracking-wide text-gray-950 uppercase mb-1 anim-hero-entry anim-delay-1">HEALTHY</h1>
        <h2 class="text-4xl sm:text-5xl lg:text-7xl font-black tracking-tight text-gray-950 uppercase mb-8 anim-hero-entry anim-delay-2 leading-tight">TASTY FOOD</h2>
        <p class="text-gray-600 text-sm lg:text-base leading-relaxed max-w-xl mb-10 font-normal anim-hero-entry anim-delay-3">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare, augue eu rutrum commodo, dui diam convallis arcu, eget consectetur ex sem eget lacus. Nullam vitae dignissim neque, vel luctus ex. Fusce sit amet viverra ante.
        </p>
        <div class="anim-hero-entry anim-delay-4">
            <x-ui.button href="{{ route('tentang') }}" class="rounded-none bg-black text-white hover:bg-gray-900 px-10 py-4 font-bold tracking-widest transition duration-300">TENTANG KAMI</x-ui.button>
        </div>
    </div>
    <img src="{{ asset('asset/img-4-2000x2000.avif') }}" class="tasty-hero-plate-exact anim-hero-plate" alt="Tasty Food Main Plate Layout">
</section>

<section class="py-20 text-center bg-white anim-hero-entry anim-delay-5">
    <h2 class="text-3xl lg:text-4xl font-extrabold mb-6 uppercase tracking-wider text-gray-900">Tentang Kami</h2>
    <p class="text-gray-600 max-w-3xl mx-auto px-6 leading-relaxed text-sm lg:text-base">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare, augue eu rutrum commodo, dui diam convallis arcu, eget consectetur ex sem eget lacus. Nullam vitae dignissim neque, vel luctus ex. Fusce sit amet viverra ante.
    </p>
    <div class="w-16 h-[3px] bg-gray-900 mx-auto mt-8"></div>
</section>

<style>
    .tasty-fluid-banner { width: 100%; position: relative; }
    @media (min-width: 1024px) { .tasty-fluid-banner { aspect-ratio: 12 / 4.9; } }
    @media (max-width: 1023px) { .tasty-fluid-banner { padding-top: 6rem; padding-bottom: 4rem; } }
</style>

<div class="bg-white py-16 px-0">
    <section class="relative w-full tasty-fluid-banner overflow-visible flex items-center justify-center">
        <div class="absolute inset-0 z-0 pointer-events-none select-none reveal-on-scroll">
            <img src="{{ asset('asset/Group 70.avif') }}" class="w-full h-full object-cover object-center" alt="Tasty Food Background Master Banner">
        </div>

        <div class="relative z-10 w-full max-w-5xl mx-auto px-6 md:px-12">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 items-center">
                @foreach ($foods as $food)
                    @php
                        $delayClass = $loop->index === 1 ? 'delay-100' : ($loop->index === 2 ? 'delay-200' : ($loop->index === 3 ? 'delay-300' : ''));
                    @endphp
                    <div data-id="{{ $food->id }}" onclick="openFoodModal(this.dataset.id)" class="reveal-on-scroll cursor-pointer {{ $delayClass }}">
                        <x-content.food-card 
                            :image="$food->image" 
                            :title="$food->title" 
                            :desc="Str::limit($food->desc, 90)" 
                            loading="lazy"
                        />
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</div>

<section class="py-24 px-6 lg:px-24 bg-gray-50">
    <h2 class="text-3xl lg:text-4xl font-extrabold mb-16 uppercase text-center tracking-wide text-gray-900 reveal-on-scroll">Berita Kami</h2>
    
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 max-w-7xl mx-auto">
        @if($featuredNews)
        <div onclick="window.location.href='{{ route('berita.detail', $featuredNews->id) }}'" class="bg-white rounded-2xl shadow-lg overflow-hidden flex flex-col group cursor-pointer border border-gray-100 reveal-on-scroll">
            <div class="w-full h-[240px] sm:h-[320px] bg-gray-100 overflow-hidden">
                <img src="{{ asset($featuredNews->image) }}" loading="lazy" alt="{{ $featuredNews->title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
            </div>
            <div class="p-6 sm:p-8 flex-grow flex flex-col justify-between">
                <div>
                    <h3 class="text-lg lg:text-xl font-bold mb-4 uppercase text-gray-900 group-hover:text-amber-600 transition leading-snug">{{ $featuredNews->title }}</h3>
                    <p class="text-gray-600 text-sm mb-6 line-clamp-3 leading-relaxed">{{ $featuredNews->desc }}</p>
                </div>
                <div class="flex justify-between items-center pt-4 border-t border-gray-100">
                    <x-ui.button variant="yellow">Baca selengkapnya</x-ui.button>
                    <span class="text-gray-300 font-bold tracking-widest text-lg">•••</span>
                </div>
            </div>
        </div>
        @endif
        
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            @foreach ($otherNews as $item)
                @php
                    $delayClass = $loop->index === 1 ? 'delay-100' : ($loop->index === 2 ? 'delay-200' : ($loop->index === 3 ? 'delay-300' : ''));
                @endphp
                <div onclick="window.location.href='{{ route('berita.detail', $item->id) }}'" class="bg-white rounded-2xl shadow-md overflow-hidden flex flex-col group cursor-pointer border border-gray-100 reveal-on-scroll {{ $delayClass }}">
                    <div class="w-full h-44 bg-gray-100 overflow-hidden">
                        <img src="{{ asset($item->image) }}" loading="lazy" alt="{{ $item->title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                    </div>
                    <div class="p-6 flex-grow flex flex-col justify-between">
                        <div>
                            <h4 class="font-bold text-base lg:text-lg mb-2 uppercase text-gray-900 group-hover:text-amber-600 transition line-clamp-1">{{ $item->title }}</h4>
                            <p class="text-gray-600 text-xs lg:text-sm mb-4 line-clamp-3 leading-relaxed">{{ $item->desc }}</p>
                        </div>
                        <div class="flex justify-between items-center mt-2">
                            <x-ui.button variant="yellow">Baca selengkapnya</x-ui.button>
                            <span class="text-gray-300 font-bold tracking-widest text-lg">•••</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="py-24 px-6 lg:px-24 bg-white">
    <h2 class="text-3xl lg:text-4xl font-extrabold mb-16 uppercase text-center tracking-wide text-gray-900 reveal-on-scroll">Galeri Kami</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 max-w-7xl mx-auto mb-16">
        @foreach ($gallery as $item)
            @php
                $step = $loop->index % 3;
                $delayClass = $step === 1 ? 'delay-100' : ($step === 2 ? 'delay-200' : '');
            @endphp
            <div data-id="{{ $item->id }}" onclick="openFoodModal(this.dataset.id)" class="aspect-square bg-gray-200 rounded-2xl overflow-hidden shadow-md relative group cursor-pointer reveal-on-scroll {{ $delayClass }}">
                <img src="{{ asset($item->image) }}" loading="lazy" alt="Galeri Tasty Food" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
            </div>
        @endforeach
    </div>
    <div class="text-center reveal-on-scroll delay-100">
        <x-ui.button href="{{ route('galeri') }}">LIHAT LEBIH BANYAK</x-ui.button>
    </div>
</section>

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
        
        menuBtn.addEventListener('click', function() {
            const isOpen = mobileMenu.classList.contains('translate-x-0');
            isOpen ? closeMenu() : openMenu();
        });
        menuCloseBtn.addEventListener('click', closeMenu);
        const menuLinks = mobileMenu.querySelectorAll('a');
        menuLinks.forEach(link => link.addEventListener('click', closeMenu));
    });
</script>
@endsection