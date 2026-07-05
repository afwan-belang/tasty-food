@extends('layouts.app')

@section('content')
@php
    $mainNews = [
        'image' => 'asset/eiliv-aceron-ZuIDLSz3XLg-unsplash.jpg'
    ];

    $beritaLainnya = [
        ['image' => 'asset/sanket-shah-SVA7TyHxojY-unsplash.jpg'],
        ['image' => 'asset/sebastian-coman-photography-eBmyH7oO5wY-unsplash.jpg'],
        ['image' => 'asset/jimmy-dean-Jvw3pxgeiZw-unsplash.jpg'],
        ['image' => 'asset/luisa-brimble-HvXEbkcXjSk-unsplash.jpg'],
      ['image' => 'asset/sanket-shah-SVA7TyHxojY-unsplash.jpg'],
        ['image' => 'asset/sebastian-coman-photography-eBmyH7oO5wY-unsplash.jpg'],
        ['image' => 'asset/jimmy-dean-Jvw3pxgeiZw-unsplash.jpg'],
        ['image' => 'asset/luisa-brimble-HvXEbkcXjSk-unsplash.jpg']
    ];
@endphp

<!-- Header Banner -->
<header class="tasty-sub-header flex flex-col z-10">
    <img src="{{ asset('asset/Group 70@2x.png') }}" class="tasty-sub-header-bg" alt="Header Background">
    <div class="tasty-sub-header-overlay"></div>

    <div class="relative z-10 w-full max-w-7xl mx-auto px-6 md:px-12 lg:px-24 py-8 flex justify-between items-center">
        <a href="{{ route('home') }}" class="text-2xl font-black tracking-wider uppercase text-white">
            TASTY FOOD
        </a>
        <div class="hidden md:flex space-x-8 lg:space-x-10 text-xs lg:text-sm font-bold tracking-wider text-white">
            <a href="{{ route('home') }}" class="hover:text-gray-300 transition duration-200">HOME</a>
            <a href="{{ route('tentang') }}" class="hover:text-gray-300 transition duration-200">TENTANG</a>
            <a href="{{ route('berita') }}" class="hover:text-gray-300 transition duration-200 border-b-2 border-white pb-1">BERITA</a>
            <a href="{{ route('galeri') }}" class="hover:text-gray-300 transition duration-200">GALERI</a>
            <a href="{{ route('kontak') }}" class="hover:text-gray-300 transition duration-200">KONTAK</a>
        </div>
    </div>

    <div class="relative z-10 w-full max-w-7xl mx-auto px-6 md:px-12 lg:px-24 flex-grow flex items-center pb-6">
        <h1 class="text-4xl lg:text-5xl font-black tracking-wide text-white uppercase">
            BERITA KAMI
        </h1>
    </div>
</header>

<section class="py-24 px-6 lg:px-24 bg-gray-50">
    <div class="max-w-7xl mx-auto">
        <!-- Main Highlighted News (BERITA.png) -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center mb-24 bg-white rounded-3xl p-6 lg:p-10 shadow-xl border border-gray-100">
            
            <img src="{{ asset($mainNews['image']) }}" 
                 class="w-full h-[380px] rounded-2xl shadow-inner object-cover" 
                 alt="Berita Utama Tasty Food">
                 
            <div class="flex flex-col items-start">
                <h2 class="text-2xl lg:text-3xl font-black mb-6 uppercase text-gray-900 leading-snug">APA SAJA MAKANAN KHAS NUSANTARA?</h2>
                <p class="text-gray-700 font-semibold text-sm lg:text-base mb-4 leading-relaxed">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare, augue eu rutrum commodo, dui diam convallis arcu, eget consectetur ex sem eget lacus.</p>
                <p class="text-gray-500 text-sm lg:text-base mb-8 leading-relaxed">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare, augue eu rutrum commodo, dui diam convallis arcu. Nullam vitae dignissim neque, vel luctus ex. Fusce sit amet viverra ante.</p>
                <x-ui.button>BACA SELENGKAPNYA</x-ui.button>
            </div>
        </div>

        <h3 class="text-2xl font-black mb-10 uppercase text-gray-900 tracking-wide">Berita Lainnya</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach ($beritaLainnya as $item)
            <div class="bg-white rounded-2xl shadow-md overflow-hidden flex flex-col group cursor-pointer border border-gray-100">
                
                <div class="w-full h-48 bg-gray-300 overflow-hidden">
                    <img src="{{ asset($item['image']) }}" 
                         class="w-full h-full object-cover group-hover:scale-105 transition duration-500" 
                         alt="Tasty Food News">
                </div>
                
                <div class="p-6 flex-grow flex flex-col justify-between">
                    <div>
                        <h4 class="font-bold text-lg mb-2 uppercase text-gray-900 group-hover:text-amber-600 transition">LOREM IPSUM</h4>
                        <p class="text-gray-600 text-sm mb-6 line-clamp-3 leading-relaxed">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare, augue eu rutrum commodo.</p>
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
@endsection