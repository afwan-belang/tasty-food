<nav class="absolute top-0 w-full z-50 py-8 px-6 lg:px-24 flex justify-between items-center text-white hero-overlay">
    <!-- ✅ PERBAIKAN: Teks Logo Navbar Komponen Dinamis Berbasis Global View Composer -->
    <a href="{{ route('home') }}" class="text-2xl lg:text-3xl font-extrabold tracking-widest uppercase">
        {{ $siteBranding->title ?? 'TASTY FOOD' }}
    </a>
    <div class="hidden md:flex space-x-10 text-sm font-bold tracking-wide">
        <a href="{{ route('home') }}" class="hover:text-gray-300 transition">HOME</a>
        <a href="{{ route('tentang') }}" class="hover:text-gray-300 transition">TENTANG</a>
        <a href="{{ route('berita') }}" class="hover:text-gray-300 transition">BERITA</a>
        <a href="{{ route('galeri') }}" class="hover:text-gray-300 transition">GALERI</a>
        <a href="{{ route('kontak') }}" class="hover:text-gray-300 transition">KONTAK</a>
    </div>
</nav>