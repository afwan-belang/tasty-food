<footer class="bg-[#111111] text-white pt-20 pb-8 px-6 lg:px-24 border-t-[6px] border-gray-900 mt-auto">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-12 mb-16">
        <div>
            <h3 class="text-2xl font-bold mb-4">Tasty Food</h3>
            <p class="text-sm text-gray-400 mb-6 leading-relaxed">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            <div class="flex space-x-4">
                <div class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center hover:bg-blue-600 cursor-pointer transition">FB</div>
                <div class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center hover:bg-blue-400 cursor-pointer transition">TW</div>
            </div>
        </div>
        <div>
            <h4 class="font-bold mb-4 text-lg">Useful links</h4>
            <ul class="text-sm text-gray-400 space-y-3">
                <li><a href="#" class="hover:text-white transition">Blog</a></li>
                <li><a href="#" class="hover:text-white transition">Hewan</a></li>
                <li><a href="{{ route('galeri') }}" class="hover:text-white transition">Galeri</a></li>
                <li><a href="#" class="hover:text-white transition">Testimonial</a></li>
            </ul>
        </div>
        <div>
            <h4 class="font-bold mb-4 text-lg">Privacy</h4>
            <ul class="text-sm text-gray-400 space-y-3">
                <li><a href="#" class="hover:text-white transition">Karir</a></li>
                <li><a href="{{ route('tentang') }}" class="hover:text-white transition">Tentang Kami</a></li>
                <li><a href="{{ route('kontak') }}" class="hover:text-white transition">Kontak Kami</a></li>
                <li><a href="#" class="hover:text-white transition">Servis</a></li>
            </ul>
        </div>
        <div>
            <h4 class="font-bold mb-4 text-lg">Contact Info</h4>
            <ul class="text-sm text-gray-400 space-y-4">
                <li class="flex items-center space-x-3"><span class="w-5 h-5 bg-gray-800 flex-shrink-0"></span><span>tastyfood@gmail.com</span></li>
                <li class="flex items-center space-x-3"><span class="w-5 h-5 bg-gray-800 flex-shrink-0"></span><span>+62 812 3456 7890</span></li>
                <li class="flex items-center space-x-3"><span class="w-5 h-5 bg-gray-800 flex-shrink-0"></span><span>Kota Bandung, Jawa Barat</span></li>
            </ul>
        </div>
    </div>
    <div class="text-center text-xs text-gray-600 pt-8 border-t border-gray-900">Copyright ©2023 All rights reserved</div>
</footer>