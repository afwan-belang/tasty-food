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

    @if(!request()->routeIs(['home', 'tentang', 'berita', 'galeri', 'kontak']))
    <x-layout.navbar />
@endif
    <main class="flex-grow">
        @yield('content')
    </main>

    <x-layout.footer />

</body>
</html>