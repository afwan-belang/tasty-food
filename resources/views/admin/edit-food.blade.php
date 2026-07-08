@extends('layouts.admin')

@section('admin_content')
<div class="w-full max-w-2xl bg-white p-8 sm:p-10 rounded-2xl border border-gray-100 shadow-md">
    
    <div class="mb-8 border-b border-gray-100 pb-4">
        <span class="text-[10px] font-black tracking-widest text-amber-600 uppercase block mb-1">EDITORIAL STUDIO</span>
        <h2 class="text-xl font-black tracking-wider text-gray-950 uppercase">UPDATE EXISTING ARTICLE</h2>
    </div>

    <form action="{{ route('admin.food.update', $food->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-[11px] font-black tracking-wider text-gray-950 uppercase mb-2">Judul Konten / Artikel</label>
            <input type="text" name="title" value="{{ old('title', $food->title) }}" required
                   class="w-full h-12 px-4 rounded-none text-xs font-semibold bg-white border border-gray-300 focus:border-gray-950 focus:outline-none transition">
            @error('title') <p class="text-red-500 text-xs mt-1 font-bold">⚠️ {{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-[11px] font-black tracking-wider text-gray-950 uppercase mb-2">Alokasi Penempatan Halaman</label>
            <select name="category" required 
                    class="w-full h-12 px-4 rounded-none text-xs font-semibold bg-white border border-gray-300 focus:border-gray-950 focus:outline-none transition cursor-pointer">
                <option value="card" {{ old('category', $food->category) === 'card' ? 'selected' : '' }}>Seksi 1 - Card Banner Home</option>
                <option value="news" {{ old('category', $food->category) === 'news' ? 'selected' : '' }}>Seksi 2 - Berita Kami</option>
                <option value="gallery" {{ old('category', $food->category) === 'gallery' ? 'selected' : '' }}>Seksi 3 - Galeri Portal</option>
            </select>
            @error('category') <p class="text-red-500 text-xs mt-1 font-bold">⚠️ {{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-[11px] font-black tracking-wider text-gray-950 uppercase mb-2">Asset Gambar Konten Saat Ini</label>
            <div class="w-32 h-24 bg-gray-100 border border-gray-200 overflow-hidden mb-3 rounded-xl">
                <img src="/{{ $food->image }}" class="w-full h-full object-cover" alt="Current Image">
            </div>
            <input type="file" name="image" accept="image/*"
                   class="w-full px-4 py-3 rounded-none text-xs font-semibold bg-white border border-gray-300 focus:border-gray-950 focus:outline-none file:mr-4 file:py-1 file:px-3 file:border-0 file:text-[10px] file:font-black file:uppercase file:bg-gray-100 file:text-gray-950 hover:file:bg-gray-200 cursor-pointer">
            <span class="text-[10px] text-gray-400 font-bold uppercase block mt-1.5">*Biarkan kosong jika Anda tidak ingin mengganti aset gambar utama.</span>
            @error('image') <p class="text-red-500 text-xs mt-1 font-bold">⚠️ {{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-[11px] font-black tracking-wider text-gray-950 uppercase mb-2">Isi Narasi Deskripsi Konten</label>
            <textarea name="desc" rows="6" required
                      class="w-full p-4 rounded-none text-xs font-semibold bg-white border border-gray-300 focus:border-gray-950 focus:outline-none transition resize-none leading-relaxed">{{ old('desc', $food->desc) }}</textarea>
            @error('desc') <p class="text-red-500 text-xs mt-1 font-bold">⚠️ {{ $message }}</p> @enderror
        </div>

        <div class="flex flex-col sm:flex-row items-center justify-end gap-3 pt-4 border-t border-gray-100">
            <a href="{{ route('admin.dashboard') }}" 
               class="w-full sm:w-auto text-center px-6 py-3.5 text-xs font-black tracking-widest text-gray-400 hover:text-gray-950 uppercase transition">
                BATAL
            </a>
            <button type="submit" 
                    class="w-full sm:w-auto bg-gray-950 text-white border border-gray-950 px-8 py-3.5 text-xs font-black tracking-widest uppercase rounded-none transition duration-200 hover:bg-white hover:text-gray-950 cursor-pointer flex items-center justify-center">
                SIMPAN PERUBAHAN
            </button>
        </div>
    </form>
</div>
@endsection