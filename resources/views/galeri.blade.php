@extends('layouts.app')

@section('content')
<style>
    /* ========================================================================= */
    /* KUSTOMISASI CSS MURNI: OPTIMALISASI RENDER GRAFIS (ANTI PATAH-PATAH)       */
    /* ========================================================================= */
    @keyframes subPageFadeUp {
        from { opacity: 0; transform: translateY(15px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .anim-sub-entry { opacity: 0; animation: subPageFadeUp 800ms cubic-bezier(0.16, 1, 0.3, 1) forwards; }

    /* Efek Smooth Zoom Premium berbasis Hardware Acceleration */
    .tasty-premium-zoom {
        backface-visibility: hidden;
        transform: translateZ(0);
        will-change: transform;
        transition: transform 550ms cubic-bezier(0.16, 1, 0.3, 1);
    }
    .tasty-zoom-group:hover .tasty-zoom-card {
        transform: scale(1.05);
    }

    /* Spesifikasi Dimensi Bingkai Carousel Sesuai Desain Image_2a3d2c */
    .tasty-carousel-frame {
        position: relative;
        width: 100%;
        aspect-ratio: 16 / 6.5; /* Proporsi horizontal sempurna sesuai gambar contoh */
        min-height: 240px;
    }

    /* Efek Bayangan Panah Bulat Presisi */
    .tasty-arrow-shadow {
        box-shadow: 0 4px 14px rgba(0, 0, 0, 0.12);
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
    </div>
    <div class="relative z-10 w-full max-w-7xl mx-auto px-6 md:px-12 lg:px-24 flex-grow flex items-center pb-6 anim-sub-entry">
        <h1 class="text-4xl lg:text-5xl font-black tracking-wide text-white uppercase">GALERI KAMI</h1>
    </div>
</header>

<section class="py-16 bg-[#f4f4f4] px-6 md:px-12 lg:px-24 select-none">
    <div class="max-w-7xl mx-auto relative reveal-on-scroll">
        
        <div class="tasty-carousel-frame w-full rounded-[24px] overflow-hidden shadow-sm relative z-0">
            
            <div class="carousel-item absolute inset-0 w-full h-full transition-opacity duration-500 ease-in-out opacity-100 z-10">
                <img src="{{ asset('asset/ella-olsson-mmnKI8kMxpc-unsplash.avif') }}" class="w-full h-full object-cover object-center select-none pointer-events-none" alt="Featured Food Showcase 1">
            </div>

            <div class="carousel-item absolute inset-0 w-full h-full transition-opacity duration-500 ease-in-out opacity-0 z-0">
                <img src="{{ asset('asset/luisa-brimble-HvXEbkcXjSk-unsplash.avif') }}" loading="lazy" class="w-full h-full object-cover object-center select-none pointer-events-none" alt="Featured Food Showcase 2">
            </div>

            <div class="carousel-item absolute inset-0 w-full h-full transition-opacity duration-500 ease-in-out opacity-0 z-0">
                <img src="{{ asset('asset/Group 70.avif') }}" loading="lazy" class="w-full h-full object-cover object-center select-none pointer-events-none" alt="Featured Food Showcase 3">
            </div>

        </div>

        <button onclick="prevSlide()" class="absolute left-0 top-1/2 -translate-y-1/2 -translate-x-1/2 w-11 h-11 sm:w-12 sm:h-12 bg-white rounded-full flex items-center justify-center tasty-arrow-shadow text-gray-900 hover:bg-gray-50 hover:scale-105 active:scale-95 transition-all duration-200 z-20 focus:outline-none cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="w-4 h-4 text-black"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" /></svg>
        </button>
        
        <button onclick="nextSlide()" class="absolute right-0 top-1/2 -translate-y-1/2 translate-x-1/2 w-11 h-11 sm:w-12 sm:h-12 bg-white rounded-full flex items-center justify-center tasty-arrow-shadow text-gray-900 hover:bg-gray-50 hover:scale-105 active:scale-95 transition-all duration-200 z-20 focus:outline-none cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="w-4 h-4 text-black"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" /></svg>
        </button>

    </div>
</section>

<section class="py-16 px-6 md:px-12 lg:px-24 bg-white select-none">
    <div class="max-w-7xl mx-auto">
        
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 sm:gap-6">
            @foreach ($galleryItems as $item)
                @php 
                    $step = $loop->index % 4; 
                    $delayClass = $step === 1 ? 'delay-100' : ($step === 2 ? 'delay-200' : ($step === 3 ? 'delay-300' : '')); 
                @endphp
                
                <div data-id="{{ $item->id }}" 
                     onclick="openFoodModal(this.dataset.id)" 
                     class="tasty-zoom-group aspect-square bg-gray-50 rounded-[24px] overflow-hidden shadow-sm border border-gray-100/60 cursor-pointer reveal-on-scroll {{ $delayClass }}">
                    
                    <img src="{{ asset($item->image) }}" 
                         loading="lazy" 
                         class="w-full h-full object-cover tasty-premium-zoom select-none pointer-events-none" 
                         alt="Gallery Culinary Content">
                         
                </div>
            @endforeach
        </div>

    </div>
</section>

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