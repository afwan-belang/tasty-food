@extends('layouts.app')

@section('content')
<style>
    .tasty-home-hero {
        background-color: #f4f4f4; 
        height: 700px; 
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
        select: none;
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
</style>

<!-- Hero Section Kontainer Terintegrasi -->
<section class="relative w-full tasty-home-hero flex flex-col overflow-hidden z-10">
    
    <div class="relative z-20 w-full max-w-7xl mx-auto px-6 md:px-12 lg:px-24 py-10 flex justify-start items-center gap-16 lg:gap-20">
        <a href="{{ route('home') }}" class="text-2xl lg:text-3xl font-black tracking-wider uppercase text-gray-950 flex-shrink-0">
            TASTY FOOD
        </a>
        
        <div class="hidden md:flex space-x-8 lg:space-x-10 text-xs lg:text-sm font-bold tracking-wider text-gray-900 pt-1">
            <a href="{{ route('home') }}" class="hover:text-gray-600 transition duration-200">HOME</a>
            <a href="{{ route('tentang') }}" class="hover:text-gray-600 transition duration-200">TENTANG</a>
            <a href="{{ route('berita') }}" class="hover:text-gray-600 transition duration-200">BERITA</a>
            <a href="{{ route('galeri') }}" class="hover:text-gray-600 transition duration-200">GALERI</a>
            <a href="{{ route('kontak') }}" class="hover:text-gray-600 transition duration-200">KONTAK</a>
        </div>
    </div>

    <!-- AREA KONTEN UTAMA -->
    <div class="relative z-10 w-full max-w-7xl mx-auto px-6 md:px-12 lg:px-24 flex-grow flex flex-col items-start justify-center pb-16">
        
        <div class="tasty-hero-line mb-8"></div>
        
        <h1 class="text-4xl lg:text-6xl font-light tracking-wide text-gray-950 uppercase mb-1">
            HEALTHY
        </h1>
        <h2 class="text-5xl lg:text-7xl font-black tracking-tight text-gray-950 uppercase mb-8">
            TASTY FOOD
        </h2>
        
        <p class="text-gray-600 text-sm lg:text-base leading-relaxed max-w-xl mb-10 font-normal">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare, augue eu rutrum commodo, dui diam convallis arcu, eget consectetur ex sem eget lacus. Nullam vitae dignissim neque, vel luctus ex. Fusce sit amet viverra ante.
        </p>
        
        <x-ui.button href="{{ route('tentang') }}" class="rounded-none bg-black text-white hover:bg-gray-900 px-10 py-4 font-bold tracking-widest transition duration-300">
            TENTANG KAMI
        </x-ui.button>
        
    </div>

    <img src="{{ asset('asset/img-4-2000x2000.avif') }}" 
         class="tasty-hero-plate-exact" 
         alt="Tasty Food Main Plate Layout">

</section>

<section class="py-20 text-center bg-white">
    <h2 class="text-3xl lg:text-4xl font-extrabold mb-6 uppercase tracking-wider text-gray-900">Tentang Kami</h2>
    <p class="text-gray-600 max-w-3xl mx-auto px-6 leading-relaxed text-sm lg:text-base">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare, augue eu rutrum commodo, dui diam convallis arcu, eget consectetur ex sem eget lacus. Nullam vitae dignissim neque, vel luctus ex. Fusce sit amet viverra ante.
    </p>
    <div class="w-16 h-[3px] bg-gray-900 mx-auto mt-8"></div>
</section>

<!-- Section Kartu Makanan -->
<!-- Kustom CSS Murni Tetap Dipertahankan -->
<!-- Kustom CSS Murni untuk Akurasi Piksel Komponen & Aspek Rasio Latar Belakang -->
<style>
    .tasty-fluid-banner {
        width: 100%;
        position: relative;
    }
    
    /* Pada layar komputer/tablet, tinggi spanduk mengikuti proporsi asli Group 70.avif agar tidak terpotong */
    @media (min-width: 1024px) {
        .tasty-fluid-banner {
            aspect-ratio: 12 / 4.9; 
        }
    }
    
    /* Fallback untuk perangkat mobile agar konten kartu tidak menabrak batas atas/bawah */
    @media (max-width: 1023px) {
        .tasty-fluid-banner {
            padding-top: 6rem;
            padding-bottom: 4rem;
        }
    }
</style>

<div class="bg-white py-16 px-0">
    
    <section class="relative w-full tasty-fluid-banner overflow-visible flex items-center justify-center">
        
        <div class="absolute inset-0 z-0 pointer-events-none select-none">
            <img src="{{ asset('asset/Group 70.avif') }}" 
                 class="w-full h-full object-cover object-center" 
                 alt="Tasty Food Background Master Banner">
        </div>

        @php
            $foods = [
                ['image' => 'asset/img-1.avif', 'title' => 'LOREM IPSUM', 'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellusornare, augue eu rutrum commodo,'],
                ['image' => 'asset/img-2.avif', 'title' => 'LOREM IPSUM', 'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellusornare, augue eu rutrum commodo,'],
                ['image' => 'asset/img-3.avif', 'title' => 'LOREM IPSUM', 'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellusornare, augue eu rutrum commodo,'],
                ['image' => 'asset/img-4.avif', 'title' => 'LOREM IPSUM', 'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellusornare, augue eu rutrum commodo,']
            ];
        @endphp

        <!-- Kontainer Grid Kartu: Dikecilkan ke max-w-5xl & gap-4 agar skala kartu tampak kompak dan tidak terlalu besar -->
        <div class="relative z-10 w-full max-w-5xl mx-auto px-6 md:px-12">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 items-center">
                @foreach ($foods as $food)
                    <x-content.food-card 
                        :image="$food['image']" 
                        :title="$food['title']" 
                        :desc="$food['desc']" 
                    />
                @endforeach
            </div>
        </div>

    </section>
</div>

<!-- Berita Kami Section (HOME.avif) -->
@php
    // 1. Data untuk Berita Utama (Featured)
    $featuredNews = [
        'image' => 'asset/fathul-abrar-T-qI_MI2EMA-unsplash.avif', // Ganti dengan nama file gambar Anda
        'title' => 'LOREM IPSUM DOLOR SIT AMET, CONSECTETUR ADIPISCING ELIT',
        'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce scelerisque magna aliquet cursus tempus. Duis viverra metus et turpis elementum elementum. Aliquam rutrum placerat tellus et suscipit.'
    ];

    // 2. Data untuk 4 Berita Lebih Kecil di Sampingnya
    $otherNews = [
        [
            'image' => 'asset/sanket-shah-SVA7TyHxojY-unsplash.avif',
            'title' => 'LOREM IPSUM 1',
            'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare, augue eu rutrum commodo.'
        ],
        [
            'image' => 'asset/sebastian-coman-photography-eBmyH7oO5wY-unsplash.avif',
            'title' => 'LOREM IPSUM 2',
            'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare, augue eu rutrum commodo.'
        ],
        [
            'image' => 'asset/jimmy-dean-Jvw3pxgeiZw-unsplash.avif',
            'title' => 'LOREM IPSUM 3',
            'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare, augue eu rutrum commodo.'
        ],
        [
            'image' => 'asset/luisa-brimble-HvXEbkcXjSk-unsplash.avif',
            'title' => 'LOREM IPSUM 4',
            'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare, augue eu rutrum commodo.'
        ]
    ];
@endphp

<section class="py-24 px-6 lg:px-24 bg-gray-50">
    <h2 class="text-3xl lg:text-4xl font-extrabold mb-16 uppercase text-center tracking-wide text-gray-900">Berita Kami</h2>
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 max-w-7xl mx-auto">
        
        <!-- Big Featured News Card -->
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden flex flex-col group cursor-pointer border border-gray-100">
            <!-- Wadah Gambar Berita Utama -->
            <div class="w-full h-[320px] bg-gray-100 overflow-hidden">
                <!-- TAG IMG MENGGANTIKAN DIV KOSONG -->
                <img src="{{ asset($featuredNews['image']) }}" 
                     alt="{{ $featuredNews['title'] }}" 
                     class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
            </div>
            <div class="p-8 flex-grow flex flex-col justify-between">
                <div>
                    <h3 class="text-xl lg:text-2xl font-bold mb-4 uppercase text-gray-900 group-hover:text-amber-600 transition">
                        {{ $featuredNews['title'] }}
                    </h3>
                    <p class="text-gray-600 text-sm mb-6 line-clamp-3 leading-relaxed">
                        {{ $featuredNews['desc'] }}
                    </p>
                </div>
                <div class="flex justify-between items-center pt-4 border-t border-gray-100">
                    <x-ui.button variant="yellow">Baca selengkapnya</x-ui.button>
                    <span class="text-gray-300 font-bold tracking-widest text-lg">•••</span>
                </div>
            </div>
        </div>
        
        <!-- Grid 4 Smaller News Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            @foreach ($otherNews as $item)
            <div class="bg-white rounded-2xl shadow-md overflow-hidden flex flex-col group cursor-pointer border border-gray-100">
                <!-- Wadah Gambar Berita Kecil -->
                <div class="w-full h-44 bg-gray-100 overflow-hidden">
                    <!-- TAG IMG MENGGANTIKAN DIV KOSONG -->
                    <img src="{{ asset($item['image']) }}" 
                         alt="{{ $item['title'] }}" 
                         class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                </div>
                <div class="p-6 flex-grow flex flex-col justify-between">
                    <div>
                        <h4 class="font-bold text-base lg:text-lg mb-2 uppercase text-gray-900 group-hover:text-amber-600 transition">
                            {{ $item['title'] }}
                        </h4>
                        <p class="text-gray-600 text-xs lg:text-sm mb-4 line-clamp-3 leading-relaxed">
                            {{ $item['desc'] }}
                        </p>
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

<!-- Galeri Kami Section (HOME.avif) -->
@php
    $gallery = [
        ['image' => 'asset/brooke-lark-oaz0raysASk-unsplash.avif'],
        ['image' => 'asset/ella-olsson-mmnKI8kMxpc-unsplash.avif'],
        ['image' => 'asset/eiliv-aceron-ZuIDLSz3XLg-unsplash.avif'],
        ['image' => 'asset/jonathan-borba-Gkc_xM3VY34-unsplash.avif'],
        ['image' => 'asset/mariana-medvedeva-iNwCO9ycBlc-unsplash.avif'],
        ['image' => 'asset/monika-grabkowska-P1aohbiT-EY-unsplash.avif'],
    ];
@endphp

<section class="py-24 px-6 lg:px-24 bg-white">
    <h2 class="text-3xl lg:text-4xl font-extrabold mb-16 uppercase text-center tracking-wide text-gray-900">Galeri Kami</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 max-w-7xl mx-auto mb-16">
        
        @foreach ($gallery as $item)
        <div class="aspect-square bg-gray-200 rounded-2xl overflow-hidden shadow-md relative group cursor-pointer">
            
            <img src="{{ asset($item['image']) }}" 
                 alt="Galeri Tasty Food" 
                 class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                 
        </div>
        @endforeach
        
    </div>
    <div class="text-center">
        <x-ui.button href="{{ route('galeri') }}">LIHAT LEBIH BANYAK</x-ui.button>
    </div>
</section>
@endsection