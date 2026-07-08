<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasty Food - Editorial Admin Portal</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { background-color: #f9fafb; }
        @keyframes adminFadeInUp {
            from { opacity: 0; transform: translateY(16px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .anim-workspace { animation: adminFadeInUp 600ms cubic-bezier(0.16, 1, 0.3, 1) forwards; }
        .tasty-scrollbar::-webkit-scrollbar { height: 6px; width: 6px; }
        .tasty-scrollbar::-webkit-scrollbar-track { background: #f1f5f9; }
        .tasty-scrollbar::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 10px; }
    </style>
</head>
<body class="font-sans antialiased text-gray-900 bg-gray-50 flex min-h-screen overflow-x-hidden select-none">

    @php
        $isFormEditorialPage = request()->routeIs(['admin.food.create', 'admin.food.edit']);
    @endphp

    @if(!$isFormEditorialPage)
        <div id="sidebar-overlay" onclick="toggleAdminSidebar()" class="fixed inset-0 bg-black/30 backdrop-blur-sm z-40 opacity-0 pointer-events-none transition-opacity duration-300 md:hidden"></div>

        <aside id="admin-sidebar" class="w-64 bg-white text-gray-950 flex flex-col justify-between fixed h-full z-50 border-r border-gray-200 transform -translate-x-full md:translate-x-0 transition-transform duration-300 ease-in-out">
            <div>
                <div class="px-6 py-8 border-b border-gray-100 flex items-center justify-between">
                    <div>
                        <h1 class="text-xl font-black text-gray-950 tracking-wider uppercase">TASTY FOOD</h1>
                        <span class="text-[10px] font-black tracking-widest text-amber-600 uppercase block mt-0.5">EDITORIAL PORTAL</span>
                    </div>
                    <button onclick="toggleAdminSidebar()" class="md:hidden text-gray-400 hover:text-gray-950 focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>
                    </button>
                </div>

                <nav class="px-3 py-6 space-y-1">
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-3.5 text-xs font-black tracking-wider uppercase transition-all duration-150 {{ request()->routeIs('admin.dashboard') ? 'text-amber-600 border-l-4 border-amber-600 bg-amber-50/40' : 'border-l-4 border-transparent text-gray-900 hover:text-gray-600 hover:bg-gray-50' }}">📊 DASHBOARD</a>
                    <a href="{{ route('admin.card') }}" class="flex items-center gap-3 px-4 py-3.5 text-xs font-black tracking-wider uppercase transition-all duration-150 {{ request()->routeIs('admin.card') ? 'text-amber-600 border-l-4 border-amber-600 bg-amber-50/40' : 'border-l-4 border-transparent text-gray-900 hover:text-gray-600 hover:bg-gray-50' }}">🍱 CARD BANNER</a>
                    <a href="{{ route('admin.berita') }}" class="flex items-center gap-3 px-4 py-3.5 text-xs font-black tracking-wider uppercase transition-all duration-150 {{ request()->routeIs('admin.berita*') ? 'text-amber-600 border-l-4 border-amber-600 bg-amber-50/40' : 'border-l-4 border-transparent text-gray-900 hover:text-gray-600 hover:bg-gray-50' }}">📰 BERITA KAMI</a>
                    <a href="{{ route('admin.galeri') }}" class="flex items-center gap-3 px-4 py-3.5 text-xs font-black tracking-wider uppercase transition-all duration-150 {{ request()->routeIs('admin.galeri*') ? 'text-amber-600 border-l-4 border-amber-600 bg-amber-50/40' : 'border-l-4 border-transparent text-gray-900 hover:text-gray-600 hover:bg-gray-50' }}">🖼️ GALERI PORTAL</a>
                    <a href="{{ route('admin.settings') }}" class="flex items-center gap-3 px-4 py-3.5 text-xs font-black tracking-wider uppercase transition-all duration-150 {{ request()->routeIs('admin.settings') ? 'text-amber-600 border-l-4 border-amber-600 bg-amber-50/40' : 'border-l-4 border-transparent text-gray-900 hover:text-gray-600 hover:bg-gray-50' }}">⚙️ SETTINGS</a>
                </nav>
            </div>

            <div class="p-4 border-t border-gray-100 bg-gray-50/80 flex items-center gap-3">
                <div class="w-8 h-8 rounded-full bg-gray-900 flex items-center justify-center text-white text-xs font-black uppercase">{{ substr(Auth::user()->name, 0, 2) }}</div>
                <div class="overflow-hidden">
                    <h4 class="text-xs font-black text-gray-950 truncate uppercase tracking-wide">{{ Auth::user()->name }}</h4>
                    <span class="text-[9px] text-amber-600 font-black block uppercase tracking-wider">Senior Redaktur</span>
                </div>
            </div>
        </aside>
    @endif

    <div class="flex-grow flex flex-col min-h-screen w-full transition-all duration-300 {{ $isFormEditorialPage ? 'pl-0' : 'md:pl-64' }}">
        
        @if(!$isFormEditorialPage)
            <header class="h-20 bg-white border-b border-gray-200 px-6 md:px-8 flex items-center justify-between sticky top-0 z-30">
                <div class="flex items-center gap-4">
                    <button onclick="toggleAdminSidebar()" class="md:hidden p-1.5 rounded-lg text-gray-900 hover:bg-gray-100 focus:outline-none"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" /></svg></button>
                    <h2 class="text-xs md:text-sm font-black text-gray-950 uppercase tracking-wider">@yield('page_title', 'Dashboard')</h2>
                </div>
                <form action="{{ route('admin.logout') }}" method="POST" class="inline-flex">@csrf<button type="submit" class="text-xs font-black tracking-widest text-red-500 hover:text-red-700 uppercase cursor-pointer">SIGN OUT →</button></form>
            </header>
        @endif

        <main class="flex-grow p-4 md:p-8 anim-workspace {{ $isFormEditorialPage ? 'bg-gray-50 flex items-center justify-center py-16' : '' }}">
            @yield('admin_content')
        </main>
    </div>

    <div id="toast-container" class="fixed bottom-6 right-6 z-50 flex flex-col gap-3 pointer-events-none"></div>

    <script>
        function toggleAdminSidebar() {
            const sidebar = document.getElementById('admin-sidebar');
            const overlay = document.getElementById('sidebar-overlay');
            if(!sidebar || !overlay) return;
            if (sidebar.classList.contains('-translate-x-full')) {
                sidebar.classList.remove('-translate-x-full');
                overlay.classList.remove('opacity-0', 'pointer-events-none'); overlay.classList.add('opacity-100');
            } else {
                sidebar.classList.add('-translate-x-full');
                overlay.classList.remove('opacity-100'); overlay.classList.add('opacity-0', 'pointer-events-none');
            }
        }

        // ✅ DITAMBAHKAN: ENGINE NOTIFIKASI TOAST UNTUK AKSI EDIT, CREATE, DAN DELETE AJAX
        function showAdminToast(message, type = 'success') {
            const container = document.getElementById('toast-container');
            const toast = document.createElement('div');
            toast.className = `transform translate-y-5 opacity-0 transition-all duration-300 pointer-events-auto flex items-center gap-3 p-4 rounded-none shadow-md border text-xs font-black tracking-wider uppercase min-w-[300px] justify-between ${type === 'success' ? 'bg-gray-950 border-gray-900 text-white' : 'bg-red-600 border-red-500 text-white'}`;
            toast.innerHTML = `<div class="flex items-center gap-2.5"><span>${type === 'success' ? '⚡' : '⚠️'}</span><span>${message}</span></div><button onclick="this.parentElement.remove()" class="text-white/50 hover:text-white font-normal text-sm focus:outline-none cursor-pointer">✕</button> `;
            container.appendChild(toast);
            setTimeout(() => toast.classList.remove('translate-y-5', 'opacity-0'), 10);
            setTimeout(() => { toast.classList.add('translate-y-5', 'opacity-0'); setTimeout(() => toast.remove(), 300); }, 4000);
        }

        // Pemicu otomatis dari session Laravel flash message
        @if(session('success')) document.addEventListener('DOMContentLoaded', () => showAdminToast("{{ session('success') }}", 'success')); @endif
        @if(session('error') || $errors->any()) document.addEventListener('DOMContentLoaded', () => showAdminToast("{{ session('error') ?? $errors->first() }}", 'error')); @endif
    </script>
</body>
</html>