@extends('layouts.app')

@section('content')
@php
    $mainSlider = [
        'image' => 'asset/ella-olsson-mmnKI8kMxpc-unsplash.jpg'
    ];

    $galleryItems = [
        ['image' => 'asset/anh-nguyen-kcA-c3f_3FE-unsplash.jpg'],
        ['image' => 'asset/anna-pelzer-IGfIGP5ONV0-unsplash.jpg'],
        ['image' => 'asset/brooke-lark-1Rm9GLHV0UA-unsplash.jpg'],
        ['image' => 'asset/brooke-lark-nBtmglfY0HU-unsplash.jpg'],
        ['image' => 'asset/brooke-lark-oaz0raysASk-unsplash.jpg'],
        ['image' => 'asset/eiliv-aceron-ZuIDLSz3XLg-unsplash.jpg'],
        ['image' => 'asset/fathul-abrar-T-qI_MI2EMA-unsplash.jpg'],
        ['image' => 'asset/jimmy-dean-Jvw3pxgeiZw-unsplash.jpg'],
        ['image' => 'asset/luisa-brimble-HvXEbkcXjSk-unsplash.jpg'],
        ['image' => 'asset/sebastian-coman-photography-eBmyH7oO5wY-unsplash.jpg'],
        ['image' => 'asset/sanket-shah-SVA7TyHxojY-unsplash.jpg'],
        ['image' => 'asset/luisa-brimble-HvXEbkcXjSk-unsplash.jpg'],
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
            <a href="{{ route('berita') }}" class="hover:text-gray-300 transition duration-200">BERITA</a>
            <a href="{{ route('galeri') }}" class="hover:text-gray-300 transition duration-200 border-b-2 border-white pb-1">GALERI</a>
            <a href="{{ route('kontak') }}" class="hover:text-gray-300 transition duration-200">KONTAK</a>
        </div>
    </div>

    <div class="relative z-10 w-full max-w-7xl mx-auto px-6 md:px-12 lg:px-24 flex-grow flex items-center pb-6">
        <h1 class="text-4xl lg:text-5xl font-black tracking-wide text-white uppercase">
            GALERI KAMI
        </h1>
    </div>
</header>

<style>
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
</style>

@php
    $carouselSlides = [
        'asset/ella-olsson-mmnKI8kMxpc-unsplash.jpg',
        'asset/luisa-brimble-HvXEbkcXjSk-unsplash.jpg',
        'asset/anna-pelzer-IGfIGP5ONV0-unsplash.jpg'
    ];
@endphp

<section class="py-24 px-6 lg:px-24 bg-white">
    <div class="max-w-7xl mx-auto">
        
        <!-- BINGKAI UTAMA CAROUSEL -->
        <div class="relative w-full mb-20 px-2 sm:px-0">
            
            <!-- Wadah Gambar (Tiga gambar ditumpuk secara absolut untuk mendukung animasi transisi) -->
            <div class="tasty-carousel-frame w-full rounded-[28px] overflow-hidden shadow-sm relative z-0">
                
                @foreach ($carouselSlides as $index => $slidePath)
                    <img src="{{ asset($slidePath) }}" 
                         class="carousel-item absolute inset-0 w-full h-full object-cover object-center select-none pointer-events-none transition-opacity duration-500 ease-in-out {{ $index === 0 ? 'opacity-100 z-10' : 'opacity-0 z-0' }}" 
                         alt="Featured Food Gallery Showcase">
                @endforeach
                
            </div>

            <!-- TOMBOL NAVIGASI KIRI (Ditambahkan fungsi onclick="prevSlide()") -->
            <button onclick="prevSlide()" class="absolute left-0 sm:left-0 top-1/2 -translate-y-1/2 -translate-x-1/2 w-11 h-11 sm:w-12 sm:h-12 bg-white rounded-full flex items-center justify-center tasty-arrow-shadow text-gray-900 hover:bg-gray-50 hover:scale-105 transition-all duration-200 z-20 focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="w-4 h-4 sm:w-5 sm:h-5 text-black">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                </svg>
            </button>

            <!-- TOMBOL NAVIGASI KANAN (Ditambahkan fungsi onclick="nextSlide()") -->
            <button onclick="nextSlide()" class="absolute right-0 sm:right-0 top-1/2 -translate-y-1/2 translate-x-1/2 w-11 h-11 sm:w-12 sm:h-12 bg-white rounded-full flex items-center justify-center tasty-arrow-shadow text-gray-900 hover:bg-gray-50 hover:scale-105 transition-all duration-200 z-20 focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="w-4 h-4 sm:w-5 sm:h-5 text-black">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                </svg>
            </button>

        </div>

        <!-- Portfolio Grid bawah tetap dibiarkan utuh tanpa perubahan -->
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($galleryItems as $item)
            <div class="aspect-square bg-gray-200 rounded-2xl overflow-hidden shadow border border-gray-100 hover:scale-105 transition duration-300 cursor-pointer">
                <img src="{{ asset($item['image']) }}" class="w-full h-full object-cover" alt="Tasty Food Gallery Asset">
            </div>
            @endforeach
        </div>
        
    </div>
</section>

<!-- SCRIPT PENGGERAK CAROUSEL INTERAKTIF -->
<script>
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
</script>
@endsection