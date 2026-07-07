@extends('layouts.app')

@section('content')
<style>
    .tasty-sub-header {
        position: relative;
        width: 100%;
        height: 380px;
        background-color: #070b0e;
        overflow: hidden;
    }
    .tasty-sub-header-bg {
        position: absolute;
        inset: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
        z-index: 0;
        pointer-events: none;
        select: none;
    }
    .tasty-sub-header-overlay {
        position: absolute;
        inset: 0;
        background: rgba(0, 0, 0, 0.25);
        z-index: 1;
    }
    .tasty-input::placeholder {
        color: #9ca3af;
        font-size: 13px;
    }
</style>

<!-- ========================================================================= -->
<!-- 1. HEADER BANNER & NAVBAR TRANSMISSION (Persis Desain Sub-Pages)          -->
<!-- ========================================================================= -->
<header class="tasty-sub-header flex flex-col z-10">
    <img src="{{ asset('asset/Group 70@2x.avif') }}" class="tasty-sub-header-bg" alt="Header Background">
    <div class="tasty-sub-header-overlay"></div>

    <div class="relative z-10 w-full max-w-7xl mx-auto px-6 md:px-12 lg:px-24 py-8 flex justify-between items-center">
        <a href="{{ route('home') }}" class="text-2xl font-black tracking-wider uppercase text-white">
            TASTY FOOD
        </a>
        <div class="hidden md:flex space-x-8 lg:space-x-10 text-xs lg:text-sm font-bold tracking-wider text-white">
            <a href="{{ route('home') }}" class="hover:text-gray-300 transition duration-200">HOME</a>
            <a href="{{ route('tentang') }}" class="hover:text-gray-300 transition duration-200">TENTANG</a>
            <a href="{{ route('berita') }}" class="hover:text-gray-300 transition duration-200">BERITA</a>
            <a href="{{ route('galeri') }}" class="hover:text-gray-300 transition duration-200">GALERI</a>
            <a href="{{ route('kontak') }}" class="hover:text-gray-300 transition duration-200 border-b-2 border-white pb-1">KONTAK</a>
        </div>
    </div>

    <div class="relative z-10 w-full max-w-7xl mx-auto px-6 md:px-12 lg:px-24 flex-grow flex items-center pb-6">
        <h1 class="text-4xl lg:text-5xl font-black tracking-wide text-white uppercase">
            KONTAK KAMI
        </h1>
    </div>
</header>

<!-- ========================================================================= -->
<!-- 2. SECTION FORM INPUT INTEGRASI                                           -->
<!-- ========================================================================= -->
<style>
    .tasty-form-input {
        border: 1px solid #8a8a8a;
        border-radius: 16px;
        background-color: #ffffff;
        color: #1a1a1a;
        font-weight: 400;
        transition: all 0.2s ease-in-out;
    }
    
    .tasty-form-input:focus {
        border-color: #000000;
        outline: none;
    }

    .tasty-form-input::placeholder {
        color: #9ca3af;
        font-size: 13.5px;
        font-weight: 400;
    }

    .tasty-input-height {
        height: 62px; 
    }

    .tasty-textarea-height {
        height: 218px; 
    }
</style>

<section class="py-20 px-6 md:px-12 lg:px-24 bg-white select-none">
    <div class="max-w-7xl mx-auto">
        
        <h2 class="text-2xl font-black uppercase text-gray-950 mb-9 tracking-wide">
            KONTAK KAMI
        </h2>
        
        <form action="#" method="POST" class="w-full">
            @csrf
            
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 items-start">
                
                <div class="flex flex-col space-y-4 w-full">
                    <input type="text" name="subject" placeholder="Subject" 
                           class="tasty-form-input tasty-input-height w-full px-6 text-sm">
                    
                    <input type="text" name="name" placeholder="Name" 
                           class="tasty-form-input tasty-input-height w-full px-6 text-sm">
                    
                    <input type="email" name="email" placeholder="Email" 
                           class="tasty-form-input tasty-input-height w-full px-6 text-sm">
                </div>

                <div class="w-full">
                    <textarea name="message" placeholder="Message" 
          class="tasty-form-input tasty-textarea-height w-full px-5 py-4 text-sm resize-none"></textarea>
                </div>

            </div>

           <button type="submit" class="w-full bg-black rounded-xl text-white hover:bg-neutral-900 font-black uppercase tracking-widest text-sm h-[76px] rounded-[16px] transition-all duration-300 mt-6 focus:outline-none flex items-center justify-center" style="height: 60px;">
    KIRIM
</button>
            
        </form>
        
    </div>
</section>

<!-- ========================================================================= -->
<!-- 3. SECTION TIGA KARTU INFORMASI (EMAIL, PHONE, LOCATION)                  -->
<!-- ========================================================================= -->
<section class="pb-24 px-6 md:px-12 lg:px-24 bg-white">
    <div class="max-w-5xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-12 text-center">
        
        <!-- Blok 1: Email -->
        <div class="flex flex-col items-center">
            <div class="w-16 h-16 bg-black rounded-full flex items-center justify-center text-white mb-5 shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                </svg>
            </div>
            <h3 class="font-black text-lg text-gray-950 uppercase tracking-wide mb-1">EMAIL</h3>
            <p class="text-gray-600 text-sm font-medium">tastyfood@gmail.com</p>
        </div>

        <!-- Blok 2: Phone -->
        <div class="flex flex-col items-center">
            <div class="w-16 h-16 bg-black rounded-full flex items-center justify-center text-white mb-5 shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.62214C2.25 5.45012 3.19988 4.5 4.37191 4.5H6.18241C6.98064 4.5 7.67499 5.05063 7.85966 5.82798L8.55833 8.77312C8.72911 9.4929 8.35414 10.2222 7.67104 10.5367L6.50554 11.0734C7.30454 12.8711 8.76711 14.3337 10.5648 15.1327L11.1015 13.9672C11.416 13.2841 12.1453 12.9091 12.8651 13.0799L15.8102 13.7786C16.5876 13.9632 17.1382 14.6576 17.1382 15.4558V17.2663C17.1382 18.4383 16.1881 19.3882 15.0161 19.3882H14.131C7.56942 19.3882 2.25 14.0688 2.25 7.50718V6.62214Z" />
                </svg>
            </div>
            <h3 class="font-black text-lg text-gray-950 uppercase tracking-wide mb-1">PHONE</h3>
            <p class="text-gray-600 text-sm font-medium">+62 812 3456 7890</p>
        </div>

        <!-- Blok 3: Location -->
        <div class="flex flex-col items-center">
            <div class="w-16 h-16 bg-black rounded-full flex items-center justify-center text-white mb-5 shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                </svg>
            </div>
            <h3 class="font-black text-lg text-gray-950 uppercase tracking-wide mb-1">LOCATION</h3>
            <p class="text-gray-600 text-sm font-medium">Kota Bandung, Jawa Barat</p>
        </div>

    </div>
</section>
<!-- ========================================================================= -->
<!-- 4. MAP EMBEDDING                                                          -->
<!-- ========================================================================= -->
<section class="py-20 px-6 md:px-12 lg:px-24 bg-[#f4f4f4]">
    <div class="max-w-7xl mx-auto">
        
        <div class="w-full rounded-[20px] overflow-hidden bg-[#e3e3e3] relative z-10" style="height: 400px; border-radius: 20px;">
            
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15842.204857410317!2d107.6625!3d-6.9441!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e7b172a39397%3A0x6b453ec4a6dfb54b!2sCiwastra%2C%20Kota%20Bandung%2C%20Jawa%20Barat!5e0!3m2!1sid!2sid!4v1710000000000!5m2!1sid!2sid" 
                class="w-full h-full border-0 block m-0 p-0" 
                allowfullscreen="" 
                loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
            
        </div>
        
    </div>
</section>
@endsection