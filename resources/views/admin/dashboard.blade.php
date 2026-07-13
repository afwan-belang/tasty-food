@extends('layouts.admin')

@section('page_title', 'GLOBAL CONTENT MONITORING')

@section('admin_content')

<!-- ========================================================================= -->
<!-- 1. TOP STATS CARDS: SUDUT BULAT TUMPUL ELEGAN (`rounded-2xl`)             -->
<!-- ========================================================================= -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
    <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm flex flex-col justify-between min-h-[130px] transition duration-200 hover:shadow-md">
        <div class="flex items-center justify-between">
            <span class="text-[10px] font-black tracking-widest text-gray-400 uppercase">TOTAL ARTICLES</span>
            <span class="text-[9px] text-emerald-600 font-black bg-emerald-50 border border-emerald-100 px-2.5 py-1 rounded-full uppercase">• ONLINE</span>
        </div>
        <h3 class="text-3xl font-black text-gray-950 mt-4 tracking-tight">{{ $totalKonten }}</h3>
    </div>

    <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm flex flex-col justify-between min-h-[130px] transition duration-200 hover:shadow-md">
        <div class="flex items-center justify-between">
            <span class="text-[10px] font-black tracking-widest text-gray-400 uppercase">FOOD CARDS</span>
            <span class="text-[9px] text-gray-500 font-black bg-gray-100 border border-gray-200 px-2.5 py-1 rounded-full uppercase">SECTION 1</span>
        </div>
        <h3 class="text-3xl font-black text-gray-950 mt-4 tracking-tight">{{ $totalCard }}</h3>
    </div>

    <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm flex flex-col justify-between min-h-[130px] transition duration-200 hover:shadow-md">
        <div class="flex items-center justify-between">
            <span class="text-[10px] font-black tracking-widest text-gray-400 uppercase">NEWS CONTENT</span>
            <span class="text-[9px] text-amber-600 font-black bg-amber-50 border border-amber-100 px-2.5 py-1 rounded-full uppercase">SECTION 2</span>
        </div>
        <h3 class="text-3xl font-black text-gray-950 mt-4 tracking-tight">{{ $totalBerita }}</h3>
    </div>

    <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm flex flex-col justify-between min-h-[130px] transition duration-200 hover:shadow-md">
        <div class="flex items-center justify-between">
            <span class="text-[10px] font-black tracking-widest text-gray-400 uppercase">GALLERY PHOTO</span>
            <span class="text-[9px] text-purple-600 font-black bg-purple-50 border border-purple-100 px-2.5 py-1 rounded-full uppercase">SECTION 3</span>
        </div>
        <h3 class="text-3xl font-black text-gray-950 mt-4 tracking-tight">{{ $totalGaleri }}</h3>
    </div>
</div>

<!-- ========================================================================= -->
<!-- 2. DATA TABLE MONITORING: BULAT TUMPUL MODERATION PANEL (`rounded-2xl`)   -->
<!-- ========================================================================= -->
<div class="bg-white border border-gray-100 shadow-sm rounded-2xl overflow-hidden transition-all duration-300 mb-10">
    <div class="p-6 sm:p-8 border-b border-gray-100 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 bg-white">
        <div>
            <h3 class="text-sm font-black text-gray-950 uppercase tracking-wider">EDITORIAL BROADCAST DATA</h3>
            <p class="text-xs text-gray-400 font-semibold uppercase tracking-wide mt-1">Sinkronisasi aset konten pertunjukan media utama publik.</p>
        </div>
        <a href="{{ route('admin.food.create') }}" class="bg-gray-950 text-white border border-gray-950 px-6 py-3.5 text-xs font-black tracking-widest uppercase rounded-none transition duration-200 hover:bg-white hover:text-gray-950 flex items-center justify-center cursor-pointer w-full sm:w-auto">
            + CREATE ARTICLE
        </a>
    </div>

    <div class="overflow-x-auto w-full tasty-scrollbar">
        <table class="w-full text-left border-collapse min-w-[750px]">
            <thead>
                <tr class="bg-gray-50/80 border-b border-gray-100 text-[10px] font-black tracking-wider text-gray-400 uppercase">
                    <th class="py-5 px-6 w-24 text-center">PREVIEW</th>
                    <th class="py-5 px-6">JUDUL ARTIKEL & KETERANGAN MATERI</th>
                    <th class="py-5 px-6 w-40 text-center">ALOKASI HALAMAN</th>
                    <th class="py-5 px-6 w-36 text-center">MANIPULASI DATA</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 text-sm">
                @forelse($allFoods as $food)
                    <tr class="hover:bg-gray-50/40 transition duration-150">
                        <td class="py-4 px-6 text-center">
                            <div class="w-12 h-12 bg-gray-100 rounded-xl overflow-hidden inline-block shadow-inner border border-gray-100">
                                <img src="/{{ $food->image }}" loading="lazy" class="w-full h-full object-cover select-none pointer-events-none" alt="Asset">
                            </div>
                        </td>
                        <td class="py-4 px-6">
                            <h4 class="font-black text-gray-950 uppercase text-xs sm:text-sm tracking-wide leading-snug">{{ $food->title }}</h4>
                            <p class="text-gray-400 text-xs mt-1 font-medium truncate max-w-md lg:max-w-2xl">{{ $food->desc }}</p>
                        </td>
                        <td class="py-4 px-6 text-center whitespace-nowrap">
                            @if($food->category === 'card')
                                <span class="text-[9px] font-black tracking-wider bg-blue-50 text-blue-600 px-3 py-1.5 rounded-full border border-blue-100 uppercase">• CARDS</span>
                            @elseif($food->category === 'news')
                                <span class="text-[9px] font-black tracking-wider bg-emerald-50 text-emerald-600 px-3 py-1.5 rounded-full border border-emerald-100 uppercase">• NEWS</span>
                            @else
                                <span class="text-[9px] font-black tracking-wider bg-purple-50 text-purple-600 px-3 py-1.5 rounded-full border border-purple-100 uppercase">• GALLERY</span>
                            @endif
                        </td>
                        <td class="py-4 px-6 text-center whitespace-nowrap">
                            <div class="flex items-center justify-center gap-4">
                                <a href="{{ route('admin.food.edit', $food->id) }}" class="text-xs font-black text-amber-600 hover:text-amber-800 uppercase tracking-wider transition">EDIT</a>
                                <button onclick="triggerAdminDelete({{ $food->id }})" class="text-xs font-black text-red-500 hover:text-red-700 uppercase tracking-wider transition focus:outline-none cursor-pointer">DELETE</button>
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

<!-- ========================================================================= -->
<!-- 3. PANEL CMS KONTROL EDITOR BANNER & SEKSI HALAMAN TENTANG KAMI           -->
<!-- ========================================================================= -->
<div class="bg-white border border-gray-100 shadow-sm rounded-2xl overflow-hidden p-6 sm:p-8 mb-10">
    <div class="mb-8">
        <h3 class="text-sm font-black text-gray-950 uppercase tracking-wider">CMS ENGINE: WEB PAGE LANDING MANAGER</h3>
        <p class="text-xs text-gray-400 font-semibold uppercase tracking-wide mt-1">Modifikasi konten deskripsi teks hero dan seksi halaman tentang secara langsung.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        
        <!-- FORM HERO HOME BANNER -->
        <div class="bg-gray-50/50 p-6 rounded-xl border border-gray-100">
            <span class="text-[9px] font-black tracking-widest text-amber-600 uppercase block mb-1">COMPONENTS SEKSI 1</span>
            <h4 class="text-xs font-black text-gray-950 uppercase mb-4">HERO HOME TEXT BANNER</h4>
            
            <form action="{{ route('admin.sections.update') }}" method="POST">
                @csrf
                <input type="hidden" name="key" value="home_hero">
                <div class="space-y-4">
                    <div>
                        <label class="block text-[10px] font-black text-gray-950 uppercase mb-1">Subtitle Sorot (e.g. HEALTHY)</label>
                        <input type="text" name="subtitle" value="{{ $cmsHero->subtitle ?? '' }}" class="w-full bg-white border border-gray-300 text-xs px-3 py-2 rounded-none focus:outline-none focus:border-gray-950">
                    </div>
                    <div>
                        <label class="block text-[10px] font-black text-gray-950 uppercase mb-1">Judul Utama (e.g. TASTY FOOD)</label>
                        <input type="text" name="title" value="{{ $cmsHero->title ?? '' }}" class="w-full bg-white border border-gray-300 text-xs px-3 py-2 rounded-none focus:outline-none focus:border-gray-950" required>
                    </div>
                    <div>
                        <label class="block text-[10px] font-black text-gray-950 uppercase mb-1">Deskripsi Narasi</label>
                        <textarea name="desc" rows="3" class="w-full bg-white border border-gray-300 text-xs p-3 rounded-none focus:outline-none focus:border-gray-950" required>{{ $cmsHero->desc ?? '' }}</textarea>
                    </div>
                    <button type="submit" class="bg-gray-950 text-white px-4 py-2 text-[10px] font-black uppercase tracking-widest transition hover:bg-amber-600 cursor-pointer">SAVE HERO</button>
                </div>
            </form>
        </div>

        <!-- FORM SEKSI SEJARAH -->
        <div class="bg-gray-50/50 p-6 rounded-xl border border-gray-100">
            <span class="text-[9px] font-black tracking-widest text-amber-600 uppercase block mb-1">COMPONENTS SEKSI 2</span>
            <h4 class="text-xs font-black text-gray-950 uppercase mb-4">SEJARAH SECTION PANEL</h4>
            
            <form action="{{ route('admin.sections.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="key" value="about_sejarah">
                <div class="space-y-4">
                    <div>
                        <label class="block text-[10px] font-black text-gray-950 uppercase mb-1">Judul Utama</label>
                        <input type="text" name="title" value="{{ $cmsSejarah->title ?? '' }}" class="w-full bg-white border border-gray-300 text-xs px-3 py-2 rounded-none focus:outline-none focus:border-gray-950" required>
                    </div>
                    <div>
                        <label class="block text-[10px] font-black text-gray-950 uppercase mb-1">Narasi Sejarah</label>
                        <textarea name="desc" rows="3" class="w-full bg-white border border-gray-300 text-xs p-3 rounded-none focus:outline-none focus:border-gray-950" required>{{ $cmsSejarah->desc ?? '' }}</textarea>
                    </div>
                    <div class="grid grid-cols-2 gap-2">
                        <div>
                            <label class="block text-[9px] font-black text-gray-400 uppercase mb-1">Upload Foto 1</label>
                            <input type="file" name="image_1" class="text-[10px] w-full">
                        </div>
                        <div>
                            <label class="block text-[9px] font-black text-gray-400 uppercase mb-1">Upload Foto 2</label>
                            <input type="file" name="image_2" class="text-[10px] w-full">
                        </div>
                    </div>
                    <button type="submit" class="bg-gray-950 text-white px-4 py-2 text-[10px] font-black uppercase tracking-widest transition hover:bg-amber-600 cursor-pointer">SAVE SEJARAH</button>
                </div>
            </form>
        </div>

        <!-- FORM SEKSI VISI -->
        <div class="bg-gray-50/50 p-6 rounded-xl border border-gray-100">
            <span class="text-[9px] font-black tracking-widest text-amber-600 uppercase block mb-1">COMPONENTS SEKSI 3</span>
            <h4 class="text-xs font-black text-gray-950 uppercase mb-4">VISI KAMI SECTION PANEL</h4>
            
            <form action="{{ route('admin.sections.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="key" value="about_visi">
                <div class="space-y-4">
                    <div>
                        <label class="block text-[10px] font-black text-gray-950 uppercase mb-1">Judul Utama</label>
                        <input type="text" name="title" value="{{ $cmsVisi->title ?? '' }}" class="w-full bg-white border border-gray-300 text-xs px-3 py-2 rounded-none focus:outline-none focus:border-gray-950" required>
                    </div>
                    <div>
                        <label class="block text-[10px] font-black text-gray-950 uppercase mb-1">Narasi Pernyataan Visi</label>
                        <textarea name="desc" rows="3" class="w-full bg-white border border-gray-300 text-xs p-3 rounded-none focus:outline-none focus:border-gray-950" required>{{ $cmsVisi->desc ?? '' }}</textarea>
                    </div>
                    <div class="grid grid-cols-2 gap-2">
                        <div>
                            <label class="block text-[9px] font-black text-gray-400 uppercase mb-1">Upload Foto 1</label>
                            <input type="file" name="image_1" class="text-[10px] w-full">
                        </div>
                        <div>
                            <label class="block text-[9px] font-black text-gray-400 uppercase mb-1">Upload Foto 2</label>
                            <input type="file" name="image_2" class="text-[10px] w-full">
                        </div>
                    </div>
                    <button type="submit" class="bg-gray-950 text-white px-4 py-2 text-[10px] font-black uppercase tracking-widest transition hover:bg-amber-600 cursor-pointer">SAVE VISI</button>
                </div>
            </form>
        </div>

        <!-- FORM SEKSI MISI -->
        <div class="bg-gray-50/50 p-6 rounded-xl border border-gray-100">
            <span class="text-[9px] font-black tracking-widest text-amber-600 uppercase block mb-1">COMPONENTS SEKSI 4</span>
            <h4 class="text-xs font-black text-gray-950 uppercase mb-4">MISI KAMI SECTION PANEL</h4>
            
            <form action="{{ route('admin.sections.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="key" value="about_misi">
                <div class="space-y-4">
                    <div>
                        <label class="block text-[10px] font-black text-gray-950 uppercase mb-1">Judul Utama</label>
                        <input type="text" name="title" value="{{ $cmsMisi->title ?? '' }}" class="w-full bg-white border border-gray-300 text-xs px-3 py-2 rounded-none focus:outline-none focus:border-gray-950" required>
                    </div>
                    <div>
                        <label class="block text-[10px] font-black text-gray-950 uppercase mb-1">Narasi Pernyataan Misi</label>
                        <textarea name="desc" rows="3" class="w-full bg-white border border-gray-300 text-xs p-3 rounded-none focus:outline-none focus:border-gray-950" required>{{ $cmsMisi->desc ?? '' }}</textarea>
                    </div>
                    <div>
                        <label class="block text-[9px] font-black text-gray-400 uppercase mb-1">Upload Foto Lanskap Misi</label>
                        <input type="file" name="image_1" class="text-[10px] w-full">
                    </div>
                    <button type="submit" class="bg-gray-950 text-white px-4 py-2 text-[10px] font-black uppercase tracking-widest transition hover:bg-amber-600 cursor-pointer">SAVE MISI</button>
                </div>
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