<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasty Food</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
    .tasty-sub-header {
        position: relative;
        width: 100%;
        height: 380px; 
        background-color: #070b0e;
        overflow: hidden;
    }
    .tasty-sub-header-bg {
        position: absolute;
        inset: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
        z-index: 0;
        pointer-events: none;
        select: none;
    }
    .tasty-sub-header-overlay {
        position: absolute;
        inset: 0;
        background: rgba(0, 0, 0, 0.25); 
        z-index: 1;
    }
</style>
</head>
<body class="font-sans antialiased text-gray-800 bg-gray-50 flex flex-col min-h-screen">

    @if(!request()->routeIs(['home', 'tentang', 'berita', 'galeri', 'kontak', 'login', 'register', 'admin.food.create', 'admin.food.edit', 'berita.detail']))
        <x-layout.navbar />
    @endif

    <main class="flex-grow">
        @yield('content')
    </main>

    <x-layout.footer />

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const observerOptions = {
            root: null, // Memantau berdasarkan viewport browser
            rootMargin: "0px 0px -80px 0px", // Animasi terpicu sedikit sebelum elemen menyentuh batas bawah layar
            threshold: 0.15 // Terpicu jika 15% area elemen sudah terlihat
        };

        const registryObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    // Tambahkan kelas untuk memulai transisi CSS
                    entry.target.classList.add("is-visible");
                    // Hentikan pemantauan setelah animasi jalan sekali demi menghemat RAM browser
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        // Cari dan daftarkan semua elemen yang memiliki kelas .reveal-on-scroll
        const targetElements = document.querySelectorAll(".reveal-on-scroll");
        targetElements.forEach(element => registryObserver.observe(element));
    });
</script>

<div id="toast-container" class="fixed bottom-6 right-6 z-50 flex flex-col gap-3 pointer-events-none"></div>

<div id="food-detail-modal" class="fixed inset-0 bg-black/80 backdrop-blur-md z-50 opacity-0 pointer-events-none transition-all duration-300 ease-in-out flex items-center justify-center p-4">
    <div class="bg-white rounded-[28px] max-w-xl w-full overflow-hidden shadow-2xl relative flex flex-col transform scale-95 transition-all duration-300 ease-in-out min-h-[400px]">
        
        <div id="modal-skeleton" class="absolute inset-0 bg-white z-30 flex flex-col transition-opacity duration-200 opacity-100 pointer-events-none">
            <div class="w-full h-56 sm:h-72 bg-neutral-200 animate-pulse"></div>
            <div class="p-6 sm:p-8 flex-grow space-y-4">
                <div class="h-7 bg-neutral-200 rounded-xl w-3/4 animate-pulse"></div>
                <div class="w-12 h-[3px] bg-neutral-200"></div>
                <div class="space-y-2.5">
                    <div class="h-4 bg-neutral-200 rounded-lg w-full animate-pulse"></div>
                    <div class="h-4 bg-neutral-200 rounded-lg w-full animate-pulse"></div>
                </div>
            </div>
        </div>

        <div class="w-full h-56 sm:h-72 bg-gray-100 overflow-hidden">
            <img id="modal-food-img" src="" class="w-full h-full object-cover" alt="Gambar Makanan">
        </div>
        <div class="p-6 sm:p-8 flex-grow">
            <h2 id="modal-food-title" class="text-xl sm:text-2xl font-black uppercase text-gray-950 mb-3 tracking-wide"></h2>
            <div class="w-12 h-[3px] bg-amber-500 mb-4"></div>
            <p id="modal-food-desc" class="text-gray-600 text-xs sm:text-sm leading-relaxed text-justify max-h-44 overflow-y-auto pr-2"></p>
        </div>
        <div class="px-6 sm:px-8 py-5 bg-gray-50 border-t border-gray-100 flex justify-between items-center">
            <button onclick="closeFoodModal()" class="text-xs font-black tracking-widest text-gray-400 hover:text-gray-950 uppercase transition focus:outline-none cursor-pointer flex items-center gap-1.5">✕ EXIT</button>
            <div id="modal-admin-actions" class="hidden flex space-x-4">
                <button id="modal-edit-btn" class="text-xs font-black tracking-widest text-amber-600 hover:text-amber-800 uppercase transition focus:outline-none cursor-pointer flex items-center gap-1">✏️ EDIT</button>
                <button id="modal-delete-btn" class="text-xs font-black tracking-widest text-red-600 hover:text-red-800 uppercase transition focus:outline-none cursor-pointer flex items-center gap-1">🗑️ DELETE</button>
            </div>
        </div>
    </div>
</div>

<div id="gallery-detail-modal" class="fixed inset-0 bg-black/80 backdrop-blur-md z-50 opacity-0 pointer-events-none transition-all duration-300 ease-in-out flex items-center justify-center p-4">
    <div class="bg-white rounded-xl max-w-3xl w-full overflow-hidden shadow-2xl relative flex flex-col md:flex-row transform scale-95 transition-all duration-300 ease-in-out min-h-[450px] md:h-[450px]">
        
        <div id="gallery-modal-skeleton" class="absolute inset-0 bg-white z-30 flex flex-col md:flex-row transition-opacity duration-200 opacity-100 pointer-events-none">
            <div class="w-full md:w-1/2 h-48 md:h-full bg-neutral-200 animate-pulse"></div>
            <div class="w-full md:w-1/2 p-6 sm:p-8 flex flex-col justify-between space-y-4">
                <div class="space-y-4">
                    <div class="h-7 bg-neutral-200 rounded-lg w-3/4 animate-pulse"></div>
                    <div class="w-12 h-[3px] bg-neutral-200"></div>
                    <div class="space-y-2.5">
                        <div class="h-4 bg-neutral-200 rounded-md w-full animate-pulse"></div>
                        <div class="h-4 bg-neutral-200 rounded-md w-full animate-pulse"></div>
                        <div class="h-4 bg-neutral-200 rounded-md w-5/6 animate-pulse"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-full md:w-1/2 h-52 md:h-full bg-neutral-900 overflow-hidden">
            <img id="gallery-modal-img" src="" class="w-full h-full object-cover" alt="Gambar Konten Galeri">
        </div>
        
        <div class="w-full md:w-1/2 p-6 sm:p-8 flex flex-col justify-between bg-white">
            <div class="flex-grow">
                <h2 id="gallery-modal-title" class="text-xl sm:text-2xl font-black uppercase text-gray-950 mb-3 tracking-wide"></h2>
                <div class="w-12 h-[3px] bg-amber-500 mb-4"></div>
                <p id="gallery-modal-desc" class="text-gray-600 text-xs sm:text-sm leading-relaxed text-justify max-h-[220px] overflow-y-auto pr-2"></p>
            </div>

            <div class="pt-5 mt-4 border-t border-gray-100 flex justify-between items-center bg-white">
                <button onclick="closeGalleryModal()" class="text-xs font-black tracking-widest text-gray-400 hover:text-gray-950 uppercase transition focus:outline-none cursor-pointer flex items-center gap-1.5">✕ EXIT</button>
                <div id="gallery-modal-admin-actions" class="hidden flex space-x-4">
                    <button id="gallery-modal-edit-btn" class="text-xs font-black tracking-widest text-amber-600 hover:text-amber-800 uppercase transition focus:outline-none cursor-pointer flex items-center gap-1">✏️ EDIT</button>
                    <button id="gallery-modal-delete-btn" class="text-xs font-black tracking-widest text-red-600 hover:text-red-800 uppercase transition focus:outline-none cursor-pointer flex items-center gap-1">🗑️ DELETE</button>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
    const currentAuthCheck = "{{ Auth::check() ? 'true' : 'false' }}";
    const currentAuthRole  = "{{ Auth::check() ? Auth::user()->role : 'guest' }}";

    // 1. ENGINE UTAMA TOAST SYSTEM
    function showToast(message, type = 'success') {
        const container = document.getElementById('toast-container');
        const toast = document.createElement('div');
        toast.className = `transform translate-y-5 opacity-0 transition-all duration-300 pointer-events-auto flex items-center gap-3 p-4 rounded-xl shadow-xl border text-xs font-black tracking-wider uppercase min-w-[300px] justify-between ${type === 'success' ? 'bg-neutral-950 border-neutral-800 text-white' : 'bg-red-600 border-red-500 text-white'}`;
        toast.innerHTML = `<div class="flex items-center gap-2.5"><span>${type === 'success' ? '⚡' : '⚠️'}</span><span>${message}</span></div><button onclick="this.parentElement.remove()" class="text-white/50 hover:text-white font-normal text-sm focus:outline-none cursor-pointer">✕</button> `;
        container.appendChild(toast);
        setTimeout(() => toast.classList.remove('translate-y-5', 'opacity-0'), 10);
        setTimeout(() => { toast.classList.add('translate-y-5', 'opacity-0'); setTimeout(() => toast.remove(), 300); }, 4000);
    }

    // 2. ENGINE EVALUATOR KATEGORI POP-UP MODAL (FETCH AJAX)
    function openFoodModal(foodId) {
        if (currentAuthCheck === 'false') {
            showToast('Silakan login terlebih dahulu untuk mengakses menu kuliner.', 'error');
            setTimeout(() => window.location.href = "{{ route('login') }}", 1200);
            return;
        }

        fetch(`/api/food/${foodId}`)
            .then(response => { if (!response.ok) throw new Error(); return response.json(); })
            .then(data => {
                if (data.category === 'gallery') {
                    const modal = document.getElementById('gallery-detail-modal');
                    const modalBox = modal.querySelector('.transform');
                    const skeleton = document.getElementById('gallery-modal-skeleton');

                    modal.classList.remove('opacity-0', 'pointer-events-none');
                    modalBox.classList.remove('scale-95'); modalBox.classList.add('scale-100');
                    skeleton.classList.remove('opacity-0', 'pointer-events-none'); skeleton.classList.add('opacity-100');

                    document.getElementById('gallery-modal-img').src = `/${data.image}`;
                    document.getElementById('gallery-modal-title').innerText = data.title;
                    document.getElementById('gallery-modal-desc').innerText = data.desc;

                    const adminActions = document.getElementById('gallery-modal-admin-actions');
                    if (currentAuthRole === 'admin') {
                        adminActions.classList.remove('hidden');
                        document.getElementById('gallery-modal-delete-btn').onclick = () => executeDeleteData(data.id);
                        document.getElementById('gallery-modal-edit-btn').onclick = () => window.location.href = `/admin/food/${data.id}/edit`;
                    } else { adminActions.classList.add('hidden'); }

                    setTimeout(() => { skeleton.classList.remove('opacity-100'); skeleton.classList.add('opacity-0', 'pointer-events-none'); }, 350);

                } else {
                    const modal = document.getElementById('food-detail-modal');
                    const modalBox = modal.querySelector('.transform');
                    const skeleton = document.getElementById('modal-skeleton');

                    modal.classList.remove('opacity-0', 'pointer-events-none');
                    modalBox.classList.remove('scale-95'); modalBox.classList.add('scale-100');
                    skeleton.classList.remove('opacity-0', 'pointer-events-none'); skeleton.classList.add('opacity-100');

                    document.getElementById('modal-food-img').src = `/${data.image}`;
                    document.getElementById('modal-food-title').innerText = data.title;
                    document.getElementById('modal-food-desc').innerText = data.desc;

                    const adminActions = document.getElementById('modal-admin-actions');
                    if (currentAuthRole === 'admin') {
                        adminActions.classList.remove('hidden');
                        document.getElementById('modal-delete-btn').onclick = () => executeDeleteData(data.id);
                        document.getElementById('modal-edit-btn').onclick = () => window.location.href = `/admin/food/${data.id}/edit`;
                    } else { adminActions.classList.add('hidden'); }

                    setTimeout(() => { skeleton.classList.remove('opacity-100'); skeleton.classList.add('opacity-0', 'pointer-events-none'); }, 350);
                }
            })
            .catch(err => { showToast('Gagal memuat data dari server.', 'error'); });
    }

    function closeFoodModal() {
        const modal = document.getElementById('food-detail-modal');
        const modalBox = modal.querySelector('.transform');
        modal.classList.add('opacity-0', 'pointer-events-none');
        modalBox.classList.remove('scale-100'); modalBox.classList.add('scale-95');
    }

    function closeGalleryModal() {
        const modal = document.getElementById('gallery-detail-modal');
        const modalBox = modal.querySelector('.transform');
        modal.classList.add('opacity-0', 'pointer-events-none');
        modalBox.classList.remove('scale-100'); modalBox.classList.add('scale-95');
    }

    // FIX: LOGIKA MENUTUP POP-UP SAAT DIKLIK DI LUAR AREA KONTEN (BACKDROP LAYER)
    window.addEventListener('click', function(event) {
        const foodModal = document.getElementById('food-detail-modal');
        const galleryModal = document.getElementById('gallery-detail-modal');
        
        if (event.target === foodModal) {
            closeFoodModal();
        }
        if (event.target === galleryModal) {
            closeGalleryModal();
        }
    });

    function executeDeleteData(id) {
        if (confirm('Apakah Anda yakin ingin menghapus menu ini secara permanen?')) {
            fetch(`/admin/food/${id}`, {
                method: 'DELETE',
                headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}', 'Content-Type': 'application/json' }
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    showToast(data.message, 'success');
                    setTimeout(() => window.location.reload(), 1000);
                }
            })
            .catch(err => showToast('Gagal menghapus data kuliner.', 'error'));
        }
    }

    @if(session('success')) document.addEventListener('DOMContentLoaded', () => showToast("{{ session('success') }}", 'success')); @endif
    @if(session('error') || $errors->any()) document.addEventListener('DOMContentLoaded', () => showToast("{{ session('error') ?? $errors->first() }}", 'error')); @endif
</script>
</body>
</html>