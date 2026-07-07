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

<!-- Header Banner -->
<header class="tasty-sub-header flex flex-col z-10">
    <img src="{{ asset('asset/Group 70@2x.avif') }}" class="tasty-sub-header-bg" alt="Header Background">
    <div class="tasty-sub-header-overlay"></div>

    <div class="relative z-10 w-full max-w-7xl mx-auto px-6 md:px-12 lg:px-24 py-8 flex justify-between items-center">
        <a href="{{ route('home') }}" class="text-2xl font-black tracking-wider uppercase text-white">
            TASTY FOOD
        </a>
        <div class="hidden md:flex space-x-8 lg:space-x-10 text-xs lg:text-sm font-bold tracking-wider text-white">
            <a href="{{ route('home') }}" class="hover:text-gray-300 transition duration-200">HOME</a>
            <a href="{{ route('tentang') }}" class="hover:text-gray-300 transition duration-200 border-b-2 border-white pb-1">TENTANG</a>
            <a href="{{ route('berita') }}" class="hover:text-gray-300 transition duration-200">BERITA</a>
            <a href="{{ route('galeri') }}" class="hover:text-gray-300 transition duration-200">GALERI</a>
            <a href="{{ route('kontak') }}" class="hover:text-gray-300 transition duration-200">KONTAK</a>
        </div>
    </div>

    <div class="relative z-10 w-full max-w-7xl mx-auto px-6 md:px-12 lg:px-24 flex-grow flex items-center pb-6">
        <h1 class="text-4xl lg:text-5xl font-black tracking-wide text-white uppercase">
            TENTANG KAMI
        </h1>
    </div>
</header>

<section class="py-24 px-6 lg:px-24 max-w-7xl mx-auto">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center mb-32">
        <div>
            <h2 class="text-3xl font-black mb-6 uppercase text-gray-900 tracking-wide">TASTY FOOD</h2>
            <p class="font-bold text-gray-800 mb-6 text-sm lg:text-base leading-relaxed">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare, augue eu rutrum commodo, dui diam convallis arcu, eget consectetur ex sem eget lacus.</p>
            <p class="text-gray-600 text-sm lg:text-base leading-relaxed">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare, augue eu rutrum commodo, dui diam convallis arcu, eget consectetur ex sem eget lacus. Nullam vitae dignissim neque, vel luctus ex. Fusce sit amet viverra ante.</p>
        </div>
        <div class="grid grid-cols-2 gap-6">
            <img src="{{ asset($aboutImages['detail_1']) }}" 
                 class="w-full h-[320px] rounded-2xl shadow-md object-cover" 
                 alt="Tasty Food Detail 1">
                 
            <img src="{{ asset($aboutImages['detail_2']) }}" 
                 class="w-full h-[320px] rounded-2xl shadow-md mt-12 object-cover" 
                 alt="Tasty Food Detail 2">
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center mb-32">
        <div class="grid grid-cols-2 gap-6 order-2 lg:order-1">
            <img src="{{ asset($aboutImages['visi_1']) }}" 
                 class="w-full h-[280px] rounded-2xl shadow-md object-cover" 
                 alt="Visi 1">
                 
            <img src="{{ asset($aboutImages['visi_2']) }}" 
                 class="w-full h-[280px] rounded-2xl shadow-md -mt-12 object-cover" 
                 alt="Visi 2">
        </div>
        <div class="order-1 lg:order-2">
            <h2 class="text-3xl font-black mb-6 uppercase text-gray-900 tracking-wide">VISI</h2>
            <p class="text-gray-600 text-sm lg:text-base leading-relaxed text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce scelerisque magna aliquet cursus tempus. Duis viverra metus et turpis elementum elementum. Aliquam rutrum placerat tellus et suscipit. Curabitur facilisis lectus vitae eros malesuada eleifend. Morbi vel nunc tortor. Nulla facilisi.</p>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
        <div>
            <h2 class="text-3xl font-black mb-6 uppercase text-gray-900 tracking-wide">MISI</h2>
            <p class="text-gray-600 text-sm lg:text-base leading-relaxed text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce scelerisque magna aliquet cursus tempus. Duis viverra metus et turpis elementum elementum. Aliquam rutrum placerat tellus et suscipit. Curabitur facilisis lectus vitae eros malesuada eleifend. Morbi vel nunc tortor. Nulla facilisi. In tempor imperdiet erat vel leo rutrum lobortis.</p>
        </div>
        <img src="{{ asset($aboutImages['misi']) }}" 
             class="w-full h-[380px] rounded-2xl shadow-md object-cover" 
             alt="Misi Tasty Food">
    </div>
</section>
@endsection