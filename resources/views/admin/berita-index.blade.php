@extends('layouts.admin')

@section('page_title', 'NEWS ARCHIVE EDITORIAL')

@section('admin_content')

<!-- ✅ BARU: SUB-NAVBAR PEMISAを行 NAVIGASI LOKAL MANAJEMEN KONTEN -->
<div class="bg-white border border-gray-100 shadow-sm rounded-2xl p-4 mb-6 flex flex-wrap items-center justify-between gap-4">
    <div class="flex items-center gap-2">
        <a href="{{ route('admin.card') }}" class="px-4 py-2 text-gray-400 hover:text-gray-950 text-xs font-black uppercase tracking-wider rounded-xl transition flex items-center gap-2 hover:bg-gray-50">
            <i class="fa-solid fa-table-cells"></i> Card Banner
        </a>
        <a href="{{ route('admin.berita') }}" class="px-4 py-2 bg-amber-500 text-gray-950 text-xs font-black uppercase tracking-wider rounded-xl transition flex items-center gap-2 shadow-sm">
            <i class="fa-solid fa-newspaper"></i> Berita Kami
        </a>
        <a href="{{ route('admin.galeri') }}" class="px-4 py-2 text-gray-400 hover:text-gray-950 text-xs font-black uppercase tracking-wider rounded-xl transition flex items-center gap-2 hover:bg-gray-50">
            <i class="fa-solid fa-images"></i> Galeri Portal
        </a>
    </div>
    <a href="{{ route('admin.food.create') }}" class="bg-gray-950 text-white px-4 py-2 text-xs font-black uppercase tracking-wider rounded-xl transition hover:bg-amber-500 hover:text-gray-950 flex items-center gap-2">
        <i class="fa-solid fa-plus"></i> Tambah Berita
    </a>
</div>

<div class="bg-white border border-gray-100 shadow-sm rounded-2xl overflow-hidden">
    
    <div class="p-6 sm:p-8 border-b border-gray-100 bg-white flex items-center gap-2.5">
        <div class="w-8 h-8 bg-emerald-50 text-emerald-600 flex items-center justify-center rounded-xl">
            <i class="fa-solid fa-newspaper text-sm"></i>
        </div>
        <div>
            <h3 class="text-sm font-black text-gray-950 uppercase tracking-wider">SEKSI 2: REDAKSI BERITA UTAMA & LIST NEWS</h3>
            <p class="text-xs text-gray-400 font-semibold uppercase tracking-wide mt-0.5">Mengontrol konten wacana informasi portal berita kuliner yang dikonsumsi publik.</p>
        </div>
    </div>

    <div class="overflow-x-auto w-full tasty-scrollbar relative">
        <table class="w-full text-left border-collapse min-w-[750px]">
            <thead>
                <tr class="bg-gray-50/80 border-b border-gray-100 text-[10px] font-black tracking-wider text-gray-400 uppercase">
                    <th class="py-5 px-6 w-24 text-center">THUMBNAIL</th>
                    <th class="py-5 px-6">JUDUL ARTIKEL BERITA KHAS</th>
                    <th class="py-5 px-6 w-36 text-center sticky right-0 bg-gray-50 z-20 border-l border-gray-100/70 shadow-[-6px_0_10px_rgba(0,0,0,0.015)]">MANIPULASI DATA</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 text-sm">
                @forelse($berita as $item)
                    <tr class="hover:bg-gray-50/40 transition duration-150 group">
                        <td class="py-4 px-6 text-center bg-white">
                            <div class="w-12 h-12 bg-gray-100 rounded-xl overflow-hidden inline-block shadow-inner border border-gray-100">
                                <img src="/{{ $item->image }}" loading="lazy" class="w-full h-full object-cover select-none pointer-events-none" alt="Asset">
                            </div>
                        </td>
                        <td class="py-4 px-6 bg-white">
                            <h4 class="font-black text-gray-950 uppercase text-xs sm:text-sm tracking-wide leading-snug">{{ $item->title }}</h4>
                            <p class="text-gray-400 text-xs mt-1 font-medium truncate max-w-md lg:max-w-2xl">{{ $item->desc }}</p>
                        </td>
                        <td class="py-4 px-6 text-center whitespace-nowrap sticky right-0 bg-white z-10 border-l border-gray-100 shadow-[-6px_0_10px_rgba(0,0,0,0.015)]">
                            <div class="flex items-center justify-center gap-4">
                                <a href="{{ route('admin.food.edit', $item->id) }}" class="text-xs font-black text-amber-600 hover:text-amber-800 uppercase tracking-wider transition flex items-center gap-1">
                                    <i class="fa-solid fa-pen-to-square"></i> EDIT
                                </a>
                                <button onclick="triggerAdminDelete({{ $item->id }})" class="text-xs font-black text-red-500 hover:text-red-700 uppercase tracking-wider transition focus:outline-none cursor-pointer flex items-center gap-1">
                                    <i class="fa-solid fa-trash"></i> DELETE
                                </button>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center py-16 text-xs font-black text-gray-400 tracking-widest uppercase bg-white">Belum ada konten Berita terdaftar.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<script>
    function triggerAdminDelete(id) {
        if (confirm('Apakah Anda yakin ingin melenyapkan artikel berita ini secara permanen dari server database?')) {
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