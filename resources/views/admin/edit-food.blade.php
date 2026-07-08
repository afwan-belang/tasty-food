@extends('layouts.app')

@section('content')
<style>
    .tasty-admin-input {
        border: 1px solid #8a8a8a;
        border-radius: 14px;
        background-color: #ffffff;
        color: #1a1a1a;
        transition: all 0.2s ease-in-out;
    }
    .tasty-admin-input:focus {
        border-color: #000000;
        outline: none;
    }
</style>

<section class="min-h-screen py-20 px-6 bg-[#f4f4f4] flex items-center justify-center select-none anim-hero-entry">
    <div class="w-full max-w-xl bg-white rounded-[24px] p-8 sm:p-10 shadow-xl border border-gray-100">
        
        <div class="mb-8">
            <span class="text-xs font-black tracking-widest text-amber-500 uppercase block mb-1">DASHBOARD ADMIN</span>
            <h2 class="text-2xl font-black text-gray-950 uppercase tracking-wide">EDIT DATA KULINER</h2>
        </div>

        <form action="{{ route('admin.food.update', $food->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT') <div>
                <label class="block text-xs font-black tracking-wider text-gray-950 uppercase mb-2">Nama Makanan / Judul Konten</label>
                <input type="text" name="title" value="{{ old('title', $food->title) }}" required 
                       class="w-full h-14 px-5 text-sm tasty-admin-input @error('title') border-red-500 bg-red-50/50 focus:border-red-600 @enderror">
                @error('title')
                    <p class="text-red-600 text-[11px] mt-1.5 font-bold tracking-wide">⚠️ {{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-xs font-black tracking-wider text-gray-950 uppercase mb-2">Penempatan Komponen Web</label>
                <select name="category" required class="w-full h-14 px-5 text-sm tasty-admin-input cursor-pointer @error('category') border-red-500 bg-red-50/50 focus:border-red-600 @enderror">
                    <option value="card" {{ old('category', $food->category) == 'card' ? 'selected' : '' }}>Food Card (Halaman Utama / Home)</option>
                    <option value="news" {{ old('category', $food->category) == 'news' ? 'selected' : '' }}>Seksi Berita Kami (Home & Berita)</option>
                    <option value="gallery" {{ old('category', $food->category) == 'gallery' ? 'selected' : '' }}>Asset Foto Galeri (Home & Galeri)</option>
                </select>
                @error('category')
                    <p class="text-red-600 text-[11px] mt-1.5 font-bold tracking-wide">⚠️ {{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-xs font-black tracking-wider text-gray-950 uppercase mb-2">Foto Makanan Saat Ini</label>
                <div class="w-32 h-24 mb-3 rounded-xl overflow-hidden bg-gray-100 border border-gray-200">
                    <img src="/{{ $food->image }}" class="w-full h-full object-cover" alt="Current Image">
                </div>
                
                <label class="block text-xs font-black tracking-wider text-gray-950 uppercase mb-2">Ganti Foto Makanan (Pilihan)</label>
                <input type="file" name="image" accept="image/*"
                       class="w-full px-4 py-3 text-sm tasty-admin-input file:mr-4 file:py-1.5 file:px-4 file:rounded-md file:border-0 file:text-xs file:font-black file:bg-gray-100 file:text-gray-700 hover:file:bg-gray-200 file:cursor-pointer @error('image') border-red-500 bg-red-50/50 @enderror">
                @error('image')
                    <p class="text-red-600 text-[11px] mt-1.5 font-bold tracking-wide">⚠️ {{ $message }}</p>
                @else
                    <p class="text-[11px] text-gray-400 mt-1">Kosongkan jika Anda tidak ingin mengganti gambar lama.</p>
                @enderror
            </div>

            <div>
                <label class="block text-xs font-black tracking-wider text-gray-950 uppercase mb-2">Informasi / Deskripsi Lengkap</label>
                <textarea name="desc" required class="w-full h-40 px-5 py-4 text-sm tasty-admin-input resize-none @error('desc') border-red-500 bg-red-50/50 focus:border-red-600 @enderror">{{ old('desc', $food->desc) }}</textarea>
                @error('desc')
                    <p class="text-red-600 text-[11px] mt-1.5 font-bold tracking-wide">⚠️ {{ $message }}</p>
                @enderror
            </div>

            <div class="pt-2 flex flex-col sm:flex-row gap-4">
                <button type="submit" class="flex-grow bg-black text-white hover:bg-gray-900 font-black uppercase tracking-widest text-xs h-14 rounded-[14px] transition duration-300 focus:outline-none cursor-pointer flex items-center justify-center">
                    PERBARUI DATA
                </button>
                <a href="{{ route('home') }}" class="sm:w-32 bg-gray-100 text-gray-700 hover:bg-gray-200 font-black uppercase tracking-widest text-xs h-14 rounded-[14px] transition duration-300 focus:outline-none flex items-center justify-center">
                    BATAL
                </a>
            </div>
        </form>
        
    </div>
</section>
@endsection