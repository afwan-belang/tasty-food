@extends('layouts.app')

@section('content')
<style>
    /* ✅ SINKRONISASI: Menggunakan bahasa desain premium khas Tasty Food Redaksi */
    .tasty-admin-auth-box { 
        border: 1px solid rgba(0, 0, 0, 0.05); 
        background-color: #ffffff; 
    }
    .tasty-admin-input { 
        border: 1px solid #8a8a8a; 
        height: 54px; 
        transition: all 0.2s ease-in-out; 
    }
    .tasty-admin-input:focus { 
        border-color: #d97706; /* Aksen Amber focus */
        outline: none; 
        background-color: #fafafa; 
    }
</style>

<section class="min-h-screen flex items-center justify-center bg-[#f4f4f4] px-6 select-none anim-hero-entry">
    <div class="w-full max-w-md bg-white p-8 sm:p-10 rounded-[24px] shadow-xl tasty-admin-auth-box">
        
        <div class="text-center mb-8">
            <!-- ✅ PERBAIKAN: Menyelaraskan nama Portal Utama -->
            <span class="text-[10px] font-black tracking-widest text-amber-600 uppercase block mb-1">EDITORIAL PORTAL</span>
            <h2 class="text-2xl font-black tracking-wider text-gray-950 uppercase">REDAKSI LOGIN</h2>
            <p class="text-xs text-gray-500 font-medium mt-1">Gerbang Masuk Khusus Tim Administrator</p>
        </div>

        <form action="{{ route('admin.login.submit') }}" method="POST" class="space-y-5">
            @csrf
            
            <div>
                <label class="block text-xs font-black tracking-wider text-gray-950 uppercase mb-2">Email Administrator</label>
                <input type="email" name="email" value="{{ old('email') }}" required placeholder="admin@tastyfood.com"
                       class="w-full px-5 rounded-[14px] text-sm tasty-admin-input @error('email') border-red-500 @enderror">
                @error('email')
                    <p class="text-red-500 text-xs mt-1.5 font-bold">⚠️ {{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-xs font-black tracking-wider text-gray-950 uppercase mb-2">Password Portal</label>
                <input type="password" name="password" required placeholder="••••••••"
                       class="w-full px-5 rounded-[14px] text-sm tasty-admin-input">
            </div>

            <!-- ✅ SINKRONISASI: Menggunakan tombol premium kotak tegas hitam-amber -->
            <button type="submit" class="w-full bg-gray-950 text-white border border-gray-950 font-black uppercase tracking-widest text-xs h-[54px] rounded-[14px] transition duration-300 mt-6 focus:outline-none flex items-center justify-center cursor-pointer hover:bg-white hover:text-gray-950">
                MASUK PORTAL →
            </button>
        </form>

        <div class="text-center mt-8 pt-5 border-t border-gray-100">
            <a href="{{ route('home') }}" class="text-xs text-gray-400 font-bold hover:text-gray-950 transition">
                ← Kembali ke Berita Utama
            </a>
        </div>

    </div>
</section>
@endsection