@extends('layouts.admin')

@section('page_title', 'NEWS ARCHIVE EDITORIAL')

@section('admin_content')
<div class="bg-white border border-gray-100 shadow-sm rounded-2xl overflow-hidden">
    
    <div class="p-6 sm:p-8 border-b border-gray-100 bg-white">
        <h3 class="text-sm font-black text-gray-950 uppercase tracking-wider">SEKSI 2: REDAKSI BERITA UTAMA & LIST NEWS</h3>
        <p class="text-xs text-gray-400 font-semibold uppercase tracking-wide mt-1">Mengontrol konten wacana informasi portal berita kuliner yang dikonsumsi publik.</p>
    </div>

    <div class="overflow-x-auto w-full tasty-scrollbar">
        <table class="w-full text-left border-collapse min-w-[750px]">
            <thead>
                <tr class="bg-gray-50/80 border-b border-gray-100 text-[10px] font-black tracking-wider text-gray-400 uppercase">
                    <th class="py-5 px-6 w-24 text-center">THUMBNAIL</th>
                    <th class="py-5 px-6">JUDUL ARTIKEL BERITA KHAS</th>
                    <th class="py-5 px-6 w-36 text-center">MANIPULASI DATA</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 text-sm">
                @forelse($berita as $item)
                    <tr class="hover:bg-gray-50/40 transition duration-150">
                        <td class="py-4 px-6 text-center">
                            <div class="w-12 h-12 bg-gray-100 rounded-xl overflow-hidden inline-block shadow-inner border border-gray-100">
                                <img src="/{{ $item->image }}" loading="lazy" class="w-full h-full object-cover select-none pointer-events-none" alt="Asset">
                            </div>
                        </td>
                        <td class="py-4 px-6">
                            <h4 class="font-black text-gray-950 uppercase text-xs sm:text-sm tracking-wide leading-snug">{{ $item->title }}</h4>
                            <p class="text-gray-400 text-xs mt-1 font-medium truncate max-w-md lg:max-w-2xl">{{ $item->desc }}</p>
                        </td>
                        <td class="py-4 px-6 text-center whitespace-nowrap">
                            <div class="flex items-center justify-center gap-4">
                                <a href="{{ route('admin.food.edit', $item->id) }}" class="text-xs font-black text-amber-600 hover:text-amber-800 uppercase tracking-wider transition">
                                    EDIT
                                </a>
                                <button onclick="triggerAdminDelete({{ $item->id }})" class="text-xs font-black text-red-500 hover:text-red-700 uppercase tracking-wider transition focus:outline-none cursor-pointer">
                                    DELETE
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