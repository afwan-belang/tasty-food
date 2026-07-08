@extends('layouts.app')

@section('content')
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
    <div class="relative z-10 w-full max-w-7xl mx-auto px-6 md:px-12 lg:px-24 flex-grow flex items-center pb-6 anim-sub-entry anim-sub-delay-1">
        <h1 class="text-4xl lg:text-5xl font-black tracking-wide text-white uppercase">BERITA KAMI</h1>
    </div>
</header>
<section class="py-24 px-6 lg:px-24 bg-gray-50 select-none">
    <div class="max-w-7xl mx-auto">
        @if($featuredNews)
        <div onclick="window.location.href='{{ route('berita.detail', $featuredNews->id) }}'" class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center mb-24 bg-white rounded-3xl p-6 lg:p-10 shadow-xl border border-gray-100 reveal-on-scroll cursor-pointer group">
            <img src="{{ asset($featuredNews->image) }}" class="w-full h-[240px] sm:h-[380px] rounded-2xl shadow-inner object-cover" alt="Berita Utama">
            <div class="flex flex-col items-start">
                <h2 class="text-2xl lg:text-3xl font-black mb-6 uppercase text-gray-900 group-hover:text-amber-600 transition leading-snug">{{ $featuredNews->title }}</h2>
                <p class="text-gray-700 font-semibold text-sm lg:text-base mb-4 leading-relaxed">{{ Str::limit($featuredNews->desc, 150) }}</p>
                <p class="text-gray-500 text-sm lg:text-base mb-8 leading-relaxed">{{ Str::limit($featuredNews->desc, 255) }}</p>
                <x-ui.button>BACA SELENGKAPNYA</x-ui.button>
            </div>
        </div>
        @endif
        <h3 class="text-2xl font-black mb-10 uppercase text-gray-900 tracking-wide reveal-on-scroll">Berita Lainnya</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach ($beritaLainnya as $item)
                @php $step = $loop->index % 4; $delayClass = $step === 1 ? 'delay-100' : ($step === 2 ? 'delay-200' : ($step === 3 ? 'delay-300' : '')); @endphp
                <div onclick="window.location.href='{{ route('berita.detail', $item->id) }}'" class="bg-white rounded-2xl shadow-md overflow-hidden flex flex-col group cursor-pointer border border-gray-100 reveal-on-scroll {{ $delayClass }}">
                    <div class="w-full h-48 bg-gray-300 overflow-hidden"><img src="{{ asset($item->image) }}" loading="lazy" class="w-full h-full object-cover group-hover:scale-105 transition duration-500" alt="News Asset"></div>
                    <div class="p-6 flex-grow flex flex-col justify-between">
                        <div>
                            <h4 class="font-bold text-lg mb-2 uppercase text-gray-900 group-hover:text-amber-600 transition line-clamp-1">{{ $item->title }}</h4>
                            <p class="text-gray-600 text-sm mb-6 line-clamp-3 leading-relaxed">{{ $item->desc }}</p>
                        </div>
                        <div class="flex justify-between items-center pt-2"><x-ui.button variant="yellow">Baca selengkapnya</x-ui.button><span class="text-gray-300 font-bold tracking-widest text-lg">•••</span></div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection