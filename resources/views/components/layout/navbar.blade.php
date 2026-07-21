<nav class="absolute top-0 w-full z-50 py-8 px-6 lg:px-24 flex justify-between items-center text-white hero-overlay">
    <a href="{{ route('home') }}" class="text-2xl lg:text-3xl font-extrabold tracking-widest uppercase">
        {{ $siteBranding->title ?? 'TASTY FOOD' }}
    </a>
    <!-- ✅ PERBAIKAN: Teks Label Menu Navigasi Komponen Standalone Dinamis Database -->
    <div class="hidden md:flex space-x-10 text-sm font-bold tracking-wide uppercase">
        <a href="{{ route('home') }}" class="hover:text-gray-300 transition">{{ $navMenu->home ?? 'HOME' }}</a>
        <a href="{{ route('tentang') }}" class="hover:text-gray-300 transition">{{ $navMenu->tentang ?? 'TENTANG' }}</a>
        <a href="{{ route('berita') }}" class="hover:text-gray-300 transition">{{ $navMenu->berita ?? 'BERITA' }}</a>
        <a href="{{ route('galeri') }}" class="hover:text-gray-300 transition">{{ $navMenu->galeri ?? 'GALERI' }}</a>
        <a href="{{ route('kontak') }}" class="hover:text-gray-300 transition">{{ $navMenu->kontak ?? 'KONTAK' }}</a>
    </div>
</nav>