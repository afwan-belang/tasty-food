@extends('layouts.app')

@section('content')
<style>
    .tasty-auth-card {
        border: 1px solid rgba(0, 0, 0, 0.05);
        background-color: #ffffff;
    }
    .tasty-auth-input {
        border: 1px solid #8a8a8a;
        height: 56px;
        transition: all 0.2s ease-in-out;
    }
    .tasty-auth-input:focus {
        border-color: #000000;
        outline: none;
    }
</style>

<section class="min-h-screen flex items-center justify-center bg-[#f4f4f4] px-6 py-12 select-none anim-hero-entry">
    <div class="w-full max-w-md bg-white p-8 sm:p-10 rounded-[24px] shadow-xl tasty-auth-card">
        
        <div class="text-center mb-8">
            <span class="text-xs font-black tracking-widest text-gray-400 uppercase block mb-2">TASTY FOOD</span>
            <h2 class="text-2xl font-black tracking-wider text-gray-950 uppercase mb-2">MASUK AKUN</h2>
            <p class="text-xs text-gray-500 font-medium">Silakan masuk untuk melanjutkan</p>
        </div>

        <form action="{{ route('login') }}" method="POST" class="space-y-5">
            @csrf
            
            <div>
                <label class="block text-xs font-black tracking-wider text-gray-950 uppercase mb-2">Alamat Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required placeholder="contoh@gmail.com"
                       class="w-full px-5 rounded-[14px] text-sm tasty-auth-input @error('email') border-red-500 @enderror">
                @error('email')
                    <p class="text-red-500 text-xs mt-1 font-semibold">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-xs font-black tracking-wider text-gray-950 uppercase mb-2">Password</label>
                <input type="password" name="password" required placeholder="••••••••"
                       class="w-full px-5 rounded-[14px] text-sm tasty-auth-input">
            </div>

            <div class="flex items-center justify-between pt-1">
                <label class="flex items-center cursor-pointer select-none">
                    <input type="checkbox" name="remember" class="w-4 h-4 rounded text-black border-gray-300 focus:ring-black accent-black">
                    <span class="text-xs text-gray-600 font-medium ml-2">Ingat saya</span>
                </label>
            </div>

            <button type="submit" class="w-full bg-black text-white hover:bg-neutral-900 font-black uppercase tracking-widest text-xs h-[56px] rounded-[14px] transition duration-300 mt-4 focus:outline-none flex items-center justify-center cursor-pointer">
                MASUK
            </button>
        </form>

        <div class="text-center mt-8 pt-6 border-t border-gray-100">
            <p class="text-xs text-gray-500 font-medium">
                Belum memiliki akun? 
                <a href="{{ route('register') }}" class="text-gray-950 font-black hover:text-amber-600 transition ml-1">DAFTAR SEKARANG</a>
            </p>
            <p class="text-xs text-gray-400 font-medium mt-4">
                <a href="{{ route('home') }}" class="hover:text-gray-950 transition">← Kembali ke Beranda</a>
            </p>
        </div>

    </div>
</section>
@endsection