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

    @if(!request()->routeIs(['home', 'tentang', 'berita', 'galeri', 'kontak', 'login', 'register']))
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
<div id="food-detail-modal" class="fixed inset-0 bg-black/80 backdrop-blur-md z-50 opacity-0 pointer-events-none transition-all duration-300 ease-in-out flex items-center justify-center p-4">
    <div class="bg-white rounded-[28px] max-w-xl w-full overflow-hidden shadow-2xl relative flex flex-col transform scale-95 transition-all duration-300 ease-in-out">
        
        <div class="w-full h-56 sm:h-72 bg-gray-100 overflow-hidden">
            <img id="modal-food-img" src="" class="w-full h-full object-cover" alt="Gambar Makanan">
        </div>
        
        <div class="p-6 sm:p-8 flex-grow">
            <h2 id="modal-food-title" class="text-xl sm:text-2xl font-black uppercase text-gray-950 mb-3 tracking-wide"></h2>
            <div class="w-12 h-[3px] bg-amber-500 mb-4"></div>
            <p id="modal-food-desc" class="text-gray-600 text-xs sm:text-sm leading-relaxed text-justify max-h-44 overflow-y-auto pr-2"></p>
        </div>

        <div class="px-6 sm:px-8 py-5 bg-gray-50 border-t border-gray-100 flex justify-between items-center">
            <button onclick="closeFoodModal()" class="text-xs font-black tracking-widest text-gray-400 hover:text-gray-950 uppercase transition focus:outline-none cursor-pointer flex items-center gap-1.5">
                ✕ EXIT
            </button>

            <div id="modal-admin-actions" class="hidden flex space-x-4">
                <button id="modal-edit-btn" class="text-xs font-black tracking-widest text-amber-600 hover:text-amber-800 uppercase transition focus:outline-none cursor-pointer flex items-center gap-1">
                    ✏️ EDIT
                </button>
                <button id="modal-delete-btn" class="text-xs font-black tracking-widest text-red-600 hover:text-red-800 uppercase transition focus:outline-none cursor-pointer flex items-center gap-1">
                    🗑️ DELETE
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    // Membaca status autentikasi login dan role secara aman dari Laravel ke JavaScript
    const currentAuthCheck = "{{ Auth::check() ? 'true' : 'false' }}";
    const currentAuthRole  = "{{ Auth::check() ? Auth::user()->role : 'guest' }}";

    function openFoodModal(foodId) {
        // PROTEKSI MUTLAK: Jika user belum login/register, mereka tidak bisa melihat pop-up dan ditendang ke login
        if (currentAuthCheck === 'false') {
            alert('Akses Terbatas. Silakan buat akun atau login terlebih dahulu untuk melihat detail kuliner kami.');
            window.location.href = "{{ route('login') }}";
            return;
        }

        const modal = document.getElementById('food-detail-modal');
        const modalBox = modal.querySelector('.transform');
        
        // Memanggil API Endpoint dari Fase 3 tanpa reload halaman
        fetch(`/api/food/${foodId}`)
            .then(response => {
                if (!response.ok) throw new Error('Gagal memuat data dari database server.');
                return response.json();
            })
            .then(data => {
                // Suntikkan data dari DB ke elemen HTML Modal secara real-time
                document.getElementById('modal-food-img').src = `/${data.image}`;
                document.getElementById('modal-food-title').innerText = data.title;
                document.getElementById('modal-food-desc').innerText = data.desc;

                // Pengkondisian Tampilan Hak Akses Admin
                const adminActions = document.getElementById('modal-admin-actions');
                if (currentAuthRole === 'admin') {
                    adminActions.classList.remove('hidden');
                    
                    // Tautkan ID data ke tombol Delete & Edit
                    document.getElementById('modal-delete-btn').onclick = () => executeDeleteData(data.id);
                    document.getElementById('modal-edit-btn').onclick = () => window.location.href = `/admin/food/${data.id}/edit`;
                } else {
                    adminActions.classList.add('hidden');
                }

                // Jalankan Efek Animasi Transisi Masuk Smooth Reveal
                modal.classList.remove('opacity-0', 'pointer-events-none');
                modalBox.classList.remove('scale-95');
                modalBox.classList.add('scale-100');
            })
            .catch(err => console.error('Pop-up loading error pipeline:', err));
    }

    function closeFoodModal() {
        const modal = document.getElementById('food-detail-modal');
        const modalBox = modal.querySelector('.transform');
        
        modal.classList.add('opacity-0', 'pointer-events-none');
        modalBox.classList.remove('scale-100');
        modalBox.classList.add('scale-95');
    }

    function executeDeleteData(id) {
        if (confirm('Apakah Anda benar-benar yakin ingin menghapus data makanan ini secara permanen dari database?')) {
            fetch(`/admin/food/${id}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json'
                }
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    alert(data.message);
                    window.location.reload(); // Refresh halaman untuk memperbarui grid komponen
                }
            })
            .catch(err => alert('Gagal memproses penghapusan data.'));
        }
    }
</script>
</body>
</html>