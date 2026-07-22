@extends('layouts.admin')

@section('page_title', 'VISITOR MESSAGES INBOX')

@section('admin_content')

<div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-8">
    <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm flex flex-col justify-between min-h-[130px]">
        <div class="flex items-center justify-between">
            <span class="text-[10px] font-black tracking-widest text-gray-400 uppercase">TOTAL PESAN MASUK</span>
            <div class="w-8 h-8 bg-amber-50 text-amber-600 flex items-center justify-center rounded-xl">
                <i class="fa-solid fa-inbox text-sm"></i>
            </div>
        </div>
        <h3 class="text-3xl font-black text-gray-950 mt-4 tracking-tight">{{ $totalMessages }}</h3>
    </div>

    <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm flex flex-col justify-between min-h-[130px]">
        <div class="flex items-center justify-between">
            <span class="text-[10px] font-black tracking-widest text-gray-400 uppercase">PESAN BELUM DIBACA</span>
            <div class="w-8 h-8 bg-emerald-50 text-emerald-600 flex items-center justify-center rounded-xl">
                <i class="fa-solid fa-envelope-open text-sm"></i>
            </div>
        </div>
        <h3 class="text-3xl font-black text-gray-950 mt-4 tracking-tight">{{ $unreadMessages }}</h3>
    </div>
</div>

<div class="bg-white border border-gray-100 shadow-sm rounded-2xl overflow-hidden">
    <div class="p-6 sm:p-8 border-b border-gray-100 bg-white flex items-center gap-2.5">
        <div class="w-8 h-8 bg-gray-950 text-amber-500 flex items-center justify-center rounded-xl">
            <i class="fa-solid fa-comments text-sm"></i>
        </div>
        <div>
            <h3 class="text-sm font-black text-gray-950 uppercase tracking-wider">DAFTAR PESAN DARI PENGUNJUNG WEBSITE</h3>
            <p class="text-xs text-gray-400 font-semibold uppercase tracking-wide mt-0.5">Menerima dan membaca langsung pesan aspirasi publik dari halaman kontak.</p>
        </div>
    </div>

    <div class="overflow-x-auto w-full tasty-scrollbar relative">
        <table class="w-full text-left border-collapse min-w-[800px]">
            <thead>
                <tr class="bg-gray-50/80 border-b border-gray-100 text-[10px] font-black tracking-wider text-gray-400 uppercase">
                    <th class="py-5 px-6 w-48">PENGIRIM PESAN</th>
                    <th class="py-5 px-6">SUBJEK & PRATINJAU PESAN</th>
                    <th class="py-5 px-6 w-32 text-center">STATUS</th>
                    <th class="py-5 px-6 w-40 text-center">WAKTU DITERIMA</th>
                    <th class="py-5 px-6 w-36 text-center sticky right-0 bg-gray-50 z-20 border-l border-gray-100/70 shadow-[-6px_0_10px_rgba(0,0,0,0.015)]">MANIPULASI DATA</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 text-sm">
                @forelse($messages as $msg)
                    <tr id="msg-row-{{ $msg->id }}" class="hover:bg-gray-50/50 transition duration-150 {{ !$msg->is_read ? 'bg-amber-50/20 font-bold' : 'bg-white' }}">
                        <td class="py-4 px-6">
                            <h4 class="font-black text-gray-950 text-xs uppercase tracking-wide">{{ $msg->name }}</h4>
                            <p class="text-gray-400 text-[11px] font-medium mt-0.5">{{ $msg->email }}</p>
                        </td>
                        <td class="py-4 px-6">
                            <h5 class="text-xs font-black text-gray-950 uppercase tracking-wide">{{ $msg->subject }}</h5>
                            <p class="text-gray-400 text-xs mt-1 font-normal truncate max-w-md">{{ $msg->message }}</p>
                        </td>
                        <td class="py-4 px-6 text-center whitespace-nowrap">
                            <span id="badge-status-{{ $msg->id }}" class="text-[9px] font-black tracking-wider px-2.5 py-1 rounded-full border uppercase {{ !$msg->is_read ? 'bg-amber-50 text-amber-600 border-amber-200' : 'bg-gray-100 text-gray-500 border-gray-200' }}">
                                {{ !$msg->is_read ? '• BARU' : 'TERBACA' }}
                            </span>
                        </td>
                        <td class="py-4 px-6 text-center whitespace-nowrap text-xs text-gray-400 font-semibold">
                            {{ $msg->created_at->format('d M Y, H:i') }}
                        </td>
                        <td class="py-4 px-6 text-center whitespace-nowrap sticky right-0 bg-white z-10 border-l border-gray-100 shadow-[-6px_0_10px_rgba(0,0,0,0.015)]">
                            <div class="flex items-center justify-center gap-3">
                                <button onclick="openMessageModal({{ json_encode($msg) }})" class="text-xs font-black text-amber-600 hover:text-amber-800 uppercase tracking-wider transition flex items-center gap-1 cursor-pointer">
                                    <i class="fa-solid fa-eye"></i> BACA
                                </button>
                                <button onclick="deleteMessage({{ $msg->id }})" class="text-xs font-black text-red-500 hover:text-red-700 uppercase tracking-wider transition focus:outline-none cursor-pointer flex items-center gap-1">
                                    <i class="fa-solid fa-trash"></i> DELETE
                                </button>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-16 text-xs font-black text-gray-400 tracking-widest uppercase bg-white">Belum ada pesan dari pengunjung website.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- MODAL PREVIEW DRAWER BACA PESAN DETAIL -->
<div id="message-modal" class="fixed inset-0 bg-black/60 backdrop-blur-sm z-50 flex items-center justify-center p-4 opacity-0 pointer-events-none transition-all duration-300">
    <div class="bg-white w-full max-w-xl rounded-2xl border border-gray-100 shadow-2xl overflow-hidden transform scale-95 transition-all duration-300" id="modal-card">
        <div class="p-6 bg-gray-950 text-white flex items-center justify-between">
            <div class="flex items-center gap-2">
                <i class="fa-solid fa-envelope-open text-amber-500 text-sm"></i>
                <h3 class="text-xs font-black uppercase tracking-wider text-amber-500" id="modal-subject">SUBJEK PESAN</h3>
            </div>
            <button onclick="closeMessageModal()" class="text-gray-400 hover:text-white text-base focus:outline-none cursor-pointer"><i class="fa-solid fa-xmark"></i></button>
        </div>

        <div class="p-6 space-y-4 bg-white">
            <div class="grid grid-cols-2 gap-4 pb-4 border-b border-gray-100 text-xs">
                <div>
                    <span class="text-[9px] font-black text-gray-400 uppercase block mb-0.5">Nama Pengirim</span>
                    <h4 class="font-black text-gray-950 uppercase" id="modal-sender">Nama Pengirim</h4>
                </div>
                <div>
                    <span class="text-[9px] font-black text-gray-400 uppercase block mb-0.5">Email Kontak</span>
                    <a href="#" id="modal-email-link" target="_blank" rel="noopener noreferrer" class="font-bold text-amber-600 hover:underline">email@example.com</a>
                </div>
            </div>

            <div>
                <span class="text-[9px] font-black text-gray-400 uppercase block mb-1">Isi Pesan Lengkap</span>
                <div class="p-4 bg-gray-50 border border-gray-200/60 rounded-xl text-xs text-gray-800 leading-relaxed font-normal whitespace-pre-wrap max-h-60 overflow-y-auto tasty-scrollbar" id="modal-body">
                    Isi pesan...
                </div>
            </div>

            <div class="flex justify-between items-center pt-2">
                <span class="text-[10px] text-gray-400 font-bold uppercase" id="modal-date">01 Jan 2026</span>
                <a href="#" id="modal-reply-btn" target="_blank" rel="noopener noreferrer" class="bg-gray-950 text-white px-5 py-2.5 text-[10px] font-black uppercase tracking-wider rounded-none hover:bg-amber-500 hover:text-gray-950 transition flex items-center gap-1.5">
                    <i class="fa-solid fa-reply"></i> BALAS LEWAT EMAIL
                </a>
            </div>
        </div>
    </div>
</div>

<script>
    function openMessageModal(msg) {
        document.getElementById('modal-subject').innerText = msg.subject;
        document.getElementById('modal-sender').innerText = msg.name;
        document.getElementById('modal-email-link').innerText = msg.email;
        document.getElementById('modal-body').innerText = msg.message;
        document.getElementById('modal-date').innerText = `Diterima: ${new Date(msg.created_at).toLocaleString('id-ID')}`;

        // ✅ INTEGRASI GMAIL WEB COMPOSE DEEP-LINK ENKRIPSI URI DENGAN KUTIPAN PESAN OTOMATIS
        const replySubject = encodeURIComponent(`RE: ${msg.subject}`);
        const replyBody = encodeURIComponent(`Halo ${msg.name},\n\nTerima kasih telah menghubungi Tasty Food.\n\n---\nKutipan Pesan Anda Sebelumnya:\n"${msg.message}"\n\nSalam Hangat,\nTim Redaksi Tasty Food`);
        const gmailComposeUrl = `https://mail.google.com/mail/?view=cm&fs=1&to=${encodeURIComponent(msg.email)}&su=${replySubject}&body=${replyBody}`;

        document.getElementById('modal-email-link').href = gmailComposeUrl;
        document.getElementById('modal-reply-btn').href = gmailComposeUrl;

        const modal = document.getElementById('message-modal');
        const card = document.getElementById('modal-card');

        modal.classList.remove('opacity-0', 'pointer-events-none');
        card.classList.remove('scale-95');
        card.classList.add('scale-100');

        if (!msg.is_read) {
            fetch(`/portal-admin/messages/${msg.id}/read`, {
                method: 'PATCH',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json'
                }
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    const badge = document.getElementById(`badge-status-${msg.id}`);
                    if(badge) {
                        badge.className = 'text-[9px] font-black tracking-wider px-2.5 py-1 rounded-full border uppercase bg-gray-100 text-gray-500 border-gray-200';
                        badge.innerText = 'TERBACA';
                    }
                    const row = document.getElementById(`msg-row-${msg.id}`);
                    if(row) {
                        row.classList.remove('bg-amber-50/20', 'font-bold');
                        row.classList.add('bg-white');
                    }
                }
            });
        }
    }

    function closeMessageModal() {
        const modal = document.getElementById('message-modal');
        const card = document.getElementById('modal-card');
        card.classList.remove('scale-100');
        card.classList.add('scale-95');
        modal.classList.add('opacity-0', 'pointer-events-none');
    }

    function deleteMessage(id) {
        if (confirm('Apakah Anda yakin ingin melenyapkan pesan ini secara permanen dari inbox admin?')) {
            fetch(`/portal-admin/messages/${id}`, {
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
                    const row = document.getElementById(`msg-row-${id}`);
                    if (row) row.remove();
                }
            })
            .catch(err => showAdminToast('Gagal menghapus pesan.', 'error'));
        }
    }
</script>
@endsection