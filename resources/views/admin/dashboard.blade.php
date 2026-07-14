@extends('layouts.admin')

@section('page_title', 'GLOBAL CONTENT MONITORING')

@section('admin_content')

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
    <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm flex flex-col justify-between min-h-[140px] transition duration-300 hover:shadow-md group">
        <div class="flex items-center justify-between">
            <span class="text-[10px] font-black tracking-widest text-gray-400 uppercase">TOTAL ARTICLES</span>
            <div class="w-8 h-8 bg-amber-50 text-amber-600 flex items-center justify-center rounded-xl transition duration-300 group-hover:bg-amber-500 group-hover:text-white">
                <i class="fa-solid fa-cubes text-sm"></i>
            </div>
        </div>
        <div class="mt-2">
            <h3 class="text-3xl font-black text-gray-950 tracking-tight">{{ $totalKonten }}</h3>
            <span class="text-[9px] text-emerald-600 font-black uppercase tracking-wider block mt-1"><i class="fa-solid fa-circle text-[6px] mr-1 align-middle animate-pulse"></i> LIVE ON SERVER</span>
        </div>
    </div>

    <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm flex flex-col justify-between min-h-[140px] transition duration-300 hover:shadow-md group">
        <div class="flex items-center justify-between">
            <span class="text-[10px] font-black tracking-widest text-gray-400 uppercase">FOOD CARDS</span>
            <div class="w-8 h-8 bg-blue-50 text-blue-600 flex items-center justify-center rounded-xl transition duration-300 group-hover:bg-blue-500 group-hover:text-white">
                <i class="fa-solid fa-table-cells text-sm"></i>
            </div>
        </div>
        <div class="mt-2">
            <h3 class="text-3xl font-black text-gray-950 tracking-tight">{{ $totalCard }}</h3>
            <span class="text-[9px] text-gray-400 font-black uppercase tracking-wider block mt-1">SEKSI HERO BANNER</span>
        </div>
    </div>

    <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm flex flex-col justify-between min-h-[140px] transition duration-300 hover:shadow-md group">
        <div class="flex items-center justify-between">
            <span class="text-[10px] font-black tracking-widest text-gray-400 uppercase">NEWS CONTENT</span>
            <div class="w-8 h-8 bg-emerald-50 text-emerald-600 flex items-center justify-center rounded-xl transition duration-300 group-hover:bg-emerald-500 group-hover:text-white">
                <i class="fa-solid fa-newspaper text-sm"></i>
            </div>
        </div>
        <div class="mt-2">
            <h3 class="text-3xl font-black text-gray-950 tracking-tight">{{ $totalBerita }}</h3>
            <span class="text-[9px] text-gray-400 font-black uppercase tracking-wider block mt-1">SEKSI MEDIA REDAKSI</span>
        </div>
    </div>

    <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm flex flex-col justify-between min-h-[140px] transition duration-300 hover:shadow-md group">
        <div class="flex items-center justify-between">
            <span class="text-[10px] font-black tracking-widest text-gray-400 uppercase">GALLERY PHOTO</span>
            <div class="w-8 h-8 bg-purple-50 text-purple-600 flex items-center justify-center rounded-xl transition duration-300 group-hover:bg-purple-500 group-hover:text-white">
                <i class="fa-solid fa-images text-sm"></i>
            </div>
        </div>
        <div class="mt-2">
            <h3 class="text-3xl font-black text-gray-950 tracking-tight">{{ $totalGaleri }}</h3>
            <span class="text-[9px] text-gray-400 font-black uppercase tracking-wider block mt-1">SEKSI SHOWCASE FLAY</span>
        </div>
    </div>
</div>

<div class="bg-white border border-gray-100 shadow-sm rounded-2xl overflow-hidden transition-all duration-300 mb-10">
    <div class="p-6 sm:p-8 border-b border-gray-100 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 bg-white">
        <div>
            <h3 class="text-sm font-black text-gray-950 uppercase tracking-wider flex items-center gap-2">
                <i class="fa-solid fa-folder-open text-amber-500"></i> EDITORIAL BROADCAST DATA
            </h3>
            <p class="text-xs text-gray-400 font-semibold uppercase tracking-wide mt-1">Sinkronisasi aset konten pertunjukan media utama publik.</p>
        </div>
        <a href="{{ route('admin.food.create') }}" class="bg-gray-950 text-white border border-gray-950 px-6 py-3.5 text-xs font-black tracking-widest uppercase rounded-none transition duration-200 hover:bg-white hover:text-gray-950 flex items-center justify-center cursor-pointer w-full sm:w-auto gap-2">
            <i class="fa-solid fa-plus text-xs"></i> CREATE ARTICLE
        </a>
    </div>

    <div class="overflow-x-auto w-full tasty-scrollbar relative">
        <table class="w-full text-left border-collapse min-w-[750px]">
            <thead>
                <tr class="bg-gray-50/80 border-b border-gray-100 text-[10px] font-black tracking-wider text-gray-400 uppercase">
                    <th class="py-5 px-6 w-24 text-center">PREVIEW</th>
                    <th class="py-5 px-6">JUDUL ARTIKEL & KETERANGAN MATERI</th>
                    <th class="py-5 px-6 w-40 text-center">ALOKASI HALAMAN</th>
                    <th class="py-5 px-6 w-36 text-center sticky right-0 bg-gray-50 z-20 border-l border-gray-100/70 shadow-[-6px_0_10px_rgba(0,0,0,0.015)]">MANIPULASI DATA</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 text-sm">
                @forelse($allFoods as $food)
                    <tr class="hover:bg-gray-50/40 transition duration-150 group">
                        <td class="py-4 px-6 text-center bg-white">
                            <div class="w-12 h-12 bg-gray-100 rounded-xl overflow-hidden inline-block shadow-inner border border-gray-100">
                                <img src="/{{ $food->image }}" loading="lazy" class="w-full h-full object-cover select-none pointer-events-none" alt="Asset">
                            </div>
                        </td>
                        <td class="py-4 px-6 bg-white">
                            <h4 class="font-black text-gray-950 uppercase text-xs sm:text-sm tracking-wide leading-snug">{{ $food->title }}</h4>
                            <p class="text-gray-400 text-xs mt-1 font-medium truncate max-w-md lg:max-w-2xl">{{ $food->desc }}</p>
                        </td>
                        <td class="py-4 px-6 text-center whitespace-nowrap bg-white">
                            @if($food->category === 'card')
                                <span class="text-[9px] font-black tracking-wider bg-blue-50 text-blue-600 px-3 py-1.5 rounded-full border border-blue-100 uppercase">• CARDS</span>
                            @elseif($food->category === 'news')
                                <span class="text-[9px] font-black tracking-wider bg-emerald-50 text-emerald-600 px-3 py-1.5 rounded-full border border-emerald-100 uppercase">• NEWS</span>
                            @else
                                <span class="text-[9px] font-black tracking-wider bg-purple-50 text-purple-600 px-3 py-1.5 rounded-full border border-purple-100 uppercase">• GALLERY</span>
                            @endif
                        </td>
                        <td class="py-4 px-6 text-center whitespace-nowrap sticky right-0 bg-white z-10 border-l border-gray-100 shadow-[-6px_0_10px_rgba(0,0,0,0.015)]">
                            <div class="flex items-center justify-center gap-4">
                                <a href="{{ route('admin.food.edit', $food->id) }}" class="text-xs font-black text-amber-600 hover:text-amber-800 uppercase tracking-wider transition flex items-center gap-1"><i class="fa-solid fa-pen-to-square"></i> EDIT</a>
                                
                                @if($food->category !== 'card')
                                    <button onclick="triggerAdminDelete({{ $food->id }})" class="text-xs font-black text-red-500 hover:text-red-700 uppercase tracking-wider transition focus:outline-none cursor-pointer flex items-center gap-1"><i class="fa-solid fa-trash"></i> DELETE</button>
                                @endif
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center py-16 text-xs font-black text-gray-400 tracking-widest uppercase bg-white">Belum ada komparasi data di server redaksi.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="bg-white border border-gray-100 shadow-sm rounded-2xl overflow-hidden p-6 sm:p-8 mb-10">
    <div class="mb-8 border-b border-gray-100 pb-4 flex items-center gap-2.5">
        <div class="w-9 h-9 bg-gray-950 text-amber-500 flex items-center justify-center rounded-xl">
            <i class="fa-solid fa-sliders text-base"></i>
        </div>
        <div>
            <h3 class="text-sm font-black text-gray-950 uppercase tracking-wider">CMS ENGINE: WEB PAGE LANDING MANAGER</h3>
            <p class="text-xs text-gray-400 font-semibold uppercase tracking-wide mt-0.5">Modifikasi konten deskripsi teks hero dan seksi halaman tentang secara langsung.</p>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        
        <div class="bg-white p-6 rounded-2xl border border-gray-200/80 hover:border-gray-900/40 transition-all duration-300 shadow-sm flex flex-col justify-between">
            <form action="{{ route('admin.sections.update') }}" method="POST">
                @csrf
                <input type="hidden" name="key" value="home_hero">
                <div class="space-y-4">
                    <div class="flex items-center gap-2 mb-2">
                        <span class="w-5 h-5 bg-amber-500 text-gray-950 flex items-center justify-center rounded-md text-[10px] font-black">1</span>
                        <h4 class="text-xs font-black text-gray-950 uppercase tracking-wide">HERO HOME TEXT BANNER</h4>
                    </div>
                    <div>
                        <label class="block text-[10px] font-black text-gray-950 uppercase mb-1.5 tracking-wide">Subtitle Sorot (e.g. HEALTHY)</label>
                        <input type="text" name="subtitle" value="{{ $cmsHero->subtitle ?? '' }}" class="w-full bg-gray-50/50 border border-gray-300 text-xs px-4 py-3 rounded-none focus:outline-none focus:border-gray-950 focus:bg-white transition-all font-semibold">
                    </div>
                    <div>
                        <label class="block text-[10px] font-black text-gray-950 uppercase mb-1.5 tracking-wide">Judul Utama (e.g. TASTY FOOD)</label>
                        <input type="text" name="title" value="{{ $cmsHero->title ?? '' }}" class="w-full bg-gray-50/50 border border-gray-300 text-xs px-4 py-3 rounded-none focus:outline-none focus:border-gray-950 focus:bg-white transition-all font-semibold" required>
                    </div>
                    <div>
                        <label class="block text-[10px] font-black text-gray-950 uppercase mb-1.5 tracking-wide">Deskripsi Narasi</label>
                        <textarea name="desc" rows="4" class="w-full bg-gray-50/50 border border-gray-300 text-xs p-4 rounded-none focus:outline-none focus:border-gray-950 focus:bg-white transition-all font-semibold resize-none leading-relaxed" required>{{ $cmsHero->desc ?? '' }}</textarea>
                    </div>
                </div>
                <button type="submit" class="bg-gray-950 text-white w-full py-3.5 text-[10px] font-black uppercase tracking-widest transition duration-200 hover:bg-amber-500 hover:text-gray-950 cursor-pointer flex items-center justify-center gap-2 mt-5">
                    <i class="fa-solid fa-floppy-disk"></i> SAVE HERO TEXT
                </button>
            </form>
        </div>

        <div class="bg-white p-6 rounded-2xl border border-gray-200/80 hover:border-gray-900/40 transition-all duration-300 shadow-sm flex flex-col justify-between">
            <form action="{{ route('admin.sections.update') }}" method="POST">
                @csrf
                <input type="hidden" name="key" value="home_about">
                <div class="space-y-4">
                    <div class="flex items-center gap-2 mb-2">
                        <span class="w-5 h-5 bg-amber-500 text-gray-950 flex items-center justify-center rounded-md text-[10px] font-black">2</span>
                        <h4 class="text-xs font-black text-gray-950 uppercase tracking-wide">TENTANG KAMI BERANDA (MID SECTION)</h4>
                    </div>
                    <div>
                        <label class="block text-[10px] font-black text-gray-950 uppercase mb-1.5 tracking-wide">Judul Utama Seksi</label>
                        <input type="text" name="title" value="{{ $cmsAbout->title ?? '' }}" class="w-full bg-gray-50/50 border border-gray-300 text-xs px-4 py-3 rounded-none focus:outline-none focus:border-gray-950 focus:bg-white transition-all font-semibold" required>
                    </div>
                    <div>
                        <label class="block text-[10px] font-black text-gray-950 uppercase mb-1.5 tracking-wide">Narasi Deskripsi Panjang</label>
                        <textarea name="desc" rows="7" class="w-full bg-gray-50/50 border border-gray-300 text-xs p-4 rounded-none focus:outline-none focus:border-gray-950 focus:bg-white transition-all font-semibold resize-none leading-relaxed" required>{{ $cmsAbout->desc ?? '' }}</textarea>
                    </div>
                </div>
                <button type="submit" class="bg-gray-950 text-white w-full py-3.5 text-[10px] font-black uppercase tracking-widest transition duration-200 hover:bg-amber-500 hover:text-gray-950 cursor-pointer flex items-center justify-center gap-2 mt-5">
                    <i class="fa-solid fa-floppy-disk"></i> SAVE TENTANG BERANDA
                </button>
            </form>
        </div>

        <div class="bg-white p-6 rounded-2xl border border-gray-200/80 hover:border-gray-900/40 transition-all duration-300 shadow-sm flex flex-col justify-between">
            <form action="{{ route('admin.sections.update') }}" method="POST">
                @csrf
                <input type="hidden" name="key" value="contact_info">
                <div class="space-y-4">
                    <div class="flex items-center gap-2 mb-2">
                        <span class="w-5 h-5 bg-amber-500 text-gray-950 flex items-center justify-center rounded-md text-[10px] font-black">3</span>
                        <h4 class="text-xs font-black text-gray-950 uppercase tracking-wide">CONTACT INFO REDAKSI MANAGER</h4>
                    </div>
                    <div>
                        <label class="block text-[10px] font-black text-gray-950 uppercase mb-1.5 tracking-wide">Email Resmi</label>
                        <input type="text" name="title" value="{{ $cmsContact->title ?? '' }}" class="w-full bg-gray-50/50 border border-gray-300 text-xs px-4 py-3 rounded-none focus:outline-none focus:border-gray-950 focus:bg-white transition-all font-semibold" required>
                    </div>
                    <div>
                        <label class="block text-[10px] font-black text-gray-950 uppercase mb-1.5 tracking-wide">Nomor Telepon</label>
                        <input type="text" name="subtitle" value="{{ $cmsContact->subtitle ?? '' }}" class="w-full bg-gray-50/50 border border-gray-300 text-xs px-4 py-3 rounded-none focus:outline-none focus:border-gray-950 focus:bg-white transition-all font-semibold">
                    </div>
                    <div>
                        <label class="block text-[10px] font-black text-gray-950 uppercase mb-1.5 tracking-wide">Lokasi Wilayah</label>
                        <textarea name="desc" rows="3" class="w-full bg-gray-50/50 border border-gray-300 text-xs p-4 rounded-none focus:outline-none focus:border-gray-950 focus:bg-white transition-all font-semibold resize-none leading-relaxed" required>{{ $cmsContact->desc ?? '' }}</textarea>
                    </div>
                </div>
                <button type="submit" class="bg-gray-950 text-white w-full py-3.5 text-[10px] font-black uppercase tracking-widest transition duration-200 hover:bg-amber-500 hover:text-gray-950 cursor-pointer flex items-center justify-center gap-2 mt-5">
                    <i class="fa-solid fa-floppy-disk"></i> SAVE INFO KONTAK
                </button>
            </form>
        </div>

        <div class="bg-white p-6 rounded-2xl border border-gray-200/80 hover:border-gray-900/40 transition-all duration-300 shadow-sm flex flex-col justify-between">
            <form action="{{ route('admin.sections.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="key" value="about_sejarah">
                <div class="space-y-4">
                    <div class="flex items-center gap-2 mb-2">
                        <span class="w-5 h-5 bg-amber-500 text-gray-950 flex items-center justify-center rounded-md text-[10px] font-black">4</span>
                        <h4 class="text-xs font-black text-gray-950 uppercase tracking-wide">SEJARAH SECTION PANEL</h4>
                    </div>
                    <div>
                        <label class="block text-[10px] font-black text-gray-950 uppercase mb-1.5 tracking-wide">Judul Utama</label>
                        <input type="text" name="title" value="{{ $cmsSejarah->title ?? '' }}" class="w-full bg-gray-50/50 border border-gray-300 text-xs px-4 py-3 rounded-none focus:outline-none focus:border-gray-950 focus:bg-white transition-all font-semibold" required>
                    </div>
                    <div>
                        <label class="block text-[10px] font-black text-gray-950 uppercase mb-1.5 tracking-wide">Narasi Sejarah</label>
                        <textarea name="desc" rows="3" class="w-full bg-gray-50/50 border border-gray-300 text-xs p-4 rounded-none focus:outline-none focus:border-gray-950 focus:bg-white transition-all font-semibold resize-none leading-relaxed" required>{{ $cmsSejarah->desc ?? '' }}</textarea>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-[9px] font-black text-gray-400 uppercase mb-1">Aset Foto 1</label>
                            <input type="file" name="image_1" class="text-[10px] w-full block text-gray-500 file:mr-3 file:py-1 file:px-2.5 file:border-0 file:text-[9px] file:font-black file:uppercase file:bg-gray-100 file:text-gray-900 hover:file:bg-amber-500 hover:file:text-gray-950 cursor-pointer">
                        </div>
                        <div>
                            <label class="block text-[9px] font-black text-gray-400 uppercase mb-1">Aset Foto 2</label>
                            <input type="file" name="image_2" class="text-[10px] w-full block text-gray-500 file:mr-3 file:py-1 file:px-2.5 file:border-0 file:text-[9px] file:font-black file:uppercase file:bg-gray-100 file:text-gray-900 hover:file:bg-amber-500 hover:file:text-gray-950 cursor-pointer">
                        </div>
                    </div>
                </div>
                <button type="submit" class="bg-gray-950 text-white w-full py-3.5 text-[10px] font-black uppercase tracking-widest transition duration-200 hover:bg-amber-500 hover:text-gray-950 cursor-pointer flex items-center justify-center gap-2 mt-5">
                    <i class="fa-solid fa-floppy-disk"></i> SAVE SEJARAH CONTENT
                </button>
            </form>
        </div>

        <div class="bg-white p-6 rounded-2xl border border-gray-200/80 hover:border-gray-900/40 transition-all duration-300 shadow-sm flex flex-col justify-between">
            <form action="{{ route('admin.sections.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="key" value="about_visi">
                <div class="space-y-4">
                    <div class="flex items-center gap-2 mb-2">
                        <span class="w-5 h-5 bg-amber-500 text-gray-950 flex items-center justify-center rounded-md text-[10px] font-black">5</span>
                        <h4 class="text-xs font-black text-gray-950 uppercase tracking-wide">VISI KAMI SECTION PANEL</h4>
                    </div>
                    <div>
                        <label class="block text-[10px] font-black text-gray-950 uppercase mb-1.5 tracking-wide">Judul Utama</label>
                        <input type="text" name="title" value="{{ $cmsVisi->title ?? '' }}" class="w-full bg-gray-50/50 border border-gray-300 text-xs px-4 py-3 rounded-none focus:outline-none focus:border-gray-950 focus:bg-white transition-all font-semibold" required>
                    </div>
                    <div>
                        <label class="block text-[10px] font-black text-gray-950 uppercase mb-1.5 tracking-wide">Narasi Pernyataan Visi</label>
                        <textarea name="desc" rows="3" class="w-full bg-gray-50/50 border border-gray-300 text-xs p-4 rounded-none focus:outline-none focus:border-gray-950 focus:bg-white transition-all font-semibold resize-none leading-relaxed" required>{{ $cmsVisi->desc ?? '' }}</textarea>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-[9px] font-black text-gray-400 uppercase mb-1">Aset Foto 1</label>
                            <input type="file" name="image_1" class="text-[10px] w-full block text-gray-500 file:mr-3 file:py-1 file:px-2.5 file:border-0 file:text-[9px] file:font-black file:uppercase file:bg-gray-100 file:text-gray-900 hover:file:bg-amber-500 hover:file:text-gray-950 cursor-pointer">
                        </div>
                        <div>
                            <label class="block text-[9px] font-black text-gray-400 uppercase mb-1">Aset Foto 2</label>
                            <input type="file" name="image_2" class="text-[10px] w-full block text-gray-500 file:mr-3 file:py-1 file:px-2.5 file:border-0 file:text-[9px] file:font-black file:uppercase file:bg-gray-100 file:text-gray-900 hover:file:bg-amber-500 hover:file:text-gray-950 cursor-pointer">
                        </div>
                    </div>
                </div>
                <button type="submit" class="bg-gray-950 text-white w-full py-3.5 text-[10px] font-black uppercase tracking-widest transition duration-200 hover:bg-amber-500 hover:text-gray-950 cursor-pointer flex items-center justify-center gap-2 mt-5">
                    <i class="fa-solid fa-floppy-disk"></i> SAVE VISI CONTENT
                </button>
            </form>
        </div>

        <div class="bg-white p-6 rounded-2xl border border-gray-200/80 hover:border-gray-900/40 transition-all duration-300 shadow-sm flex flex-col justify-between">
            <form action="{{ route('admin.sections.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="key" value="about_misi">
                <div class="space-y-4">
                    <div class="flex items-center gap-2 mb-2">
                        <span class="w-5 h-5 bg-amber-500 text-gray-950 flex items-center justify-center rounded-md text-[10px] font-black">6</span>
                        <h4 class="text-xs font-black text-gray-950 uppercase tracking-wide">MISI KAMI SECTION PANEL</h4>
                    </div>
                    <div>
                        <label class="block text-[10px] font-black text-gray-950 uppercase mb-1.5 tracking-wide">Judul Utama</label>
                        <input type="text" name="title" value="{{ $cmsMisi->title ?? '' }}" class="w-full bg-gray-50/50 border border-gray-300 text-xs px-4 py-3 rounded-none focus:outline-none focus:border-gray-950 focus:bg-white transition-all font-semibold" required>
                    </div>
                    <div>
                        <label class="block text-[10px] font-black text-gray-950 uppercase mb-1.5 tracking-wide">Narasi Pernyataan Misi</label>
                        <textarea name="desc" rows="3" class="w-full bg-gray-50/50 border border-gray-300 text-xs p-4 rounded-none focus:outline-none focus:border-gray-950 focus:bg-white transition-all font-semibold resize-none leading-relaxed" required>{{ $cmsMisi->desc ?? '' }}</textarea>
                    </div>
                    <div>
                        <label class="block text-[9px] font-black text-gray-400 uppercase mb-1">Upload Foto Lanskap Misi</label>
                        <input type="file" name="image_1" class="text-[10px] w-full block text-gray-500 file:mr-3 file:py-1 file:px-2.5 file:border-0 file:text-[9px] file:font-black file:uppercase file:bg-gray-100 file:text-gray-900 hover:file:bg-amber-500 hover:file:text-gray-950 cursor-pointer">
                    </div>
                </div>
                <button type="submit" class="bg-gray-950 text-white w-full py-3.5 text-[10px] font-black uppercase tracking-widest transition duration-200 hover:bg-amber-500 hover:text-gray-950 cursor-pointer flex items-center justify-center gap-2 mt-5">
                    <i class="fa-solid fa-floppy-disk"></i> SAVE MISI CONTENT
                </button>
            </form>
        </div>

    </div>
</div>

<script>
    function triggerAdminDelete(id) {
        if (confirm('Apakah Anda yakin ingin melenyapkan aset konten ini secara permanen dari server database?')) {
            fetch(`/portal-admin/food/${id}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json'
                }
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    showAdminToast(data.message, 'success');
                    setTimeout(() => window.location.reload(), 1000);
                }
            })
            .catch(err => showAdminToast('Gagal memproses penghapusan data redaksi.', 'error'));
        }
    }
</script>
@endsection