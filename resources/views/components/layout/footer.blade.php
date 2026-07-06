<footer class="bg-[#0b0d0f] text-gray-400 pt-20 pb-8 px-6 md:px-12 lg:px-24 select-none">
    <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-16 items-start">
        
        <div class="flex flex-col items-start space-y-5">
            <h4 class="text-white font-black text-xl tracking-wider uppercase">Tasty Food</h4>
            <p class="text-gray-400 text-xs lg:text-sm leading-relaxed font-normal text-justify">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
            </p>
            
            <div class="flex space-x-3 pt-2">
                <a href="#" class="hover:opacity-80 transition duration-200">
                    <img src="{{ asset('asset/001-facebook.png') }}" class="w-9 h-9 object-contain" alt="Facebook Tasty Food">
                </a>
                <a href="#" class="hover:opacity-80 transition duration-200">
                    <img src="{{ asset('asset/002-twitter.png') }}" class="w-9 h-9 object-contain" alt="Twitter Tasty Food">
                </a>
            </div>
        </div>

        <div class="flex flex-col space-y-4">
            <h4 class="text-white font-black text-base tracking-wide">Useful links</h4>
            <ul class="space-y-3 text-xs lg:text-sm font-bold text-gray-200">
                <li><a href="{{ route('berita') }}" class="hover:text-white transition">Blog</a></li>
                <li><a href="#" class="hover:text-white transition">Hewan</a></li>
                <li><a href="{{ route('galeri') }}" class="hover:text-white transition">Galeri</a></li>
                <li><a href="#" class="hover:text-white transition">Testimonial</a></li>
            </ul>
        </div>

        <div class="flex flex-col space-y-4">
            <h4 class="text-white font-black text-base tracking-wide">Privacy</h4>
            <ul class="space-y-3 text-xs lg:text-sm font-bold text-gray-200">
                <li><a href="#" class="hover:text-white transition">Karir</a></li>
                <li><a href="{{ route('tentang') }}" class="hover:text-white transition">Tentang Kami</a></li>
                <li><a href="{{ route('kontak') }}" class="hover:text-white transition">Kontak Kami</a></li>
                <li><a href="#" class="hover:text-white transition">Servis</a></li>
            </ul>
        </div>

        <div class="flex flex-col space-y-4">
            <h4 class="text-white font-black text-base tracking-wide">Contact Info</h4>
            <ul class="space-y-4 text-xs lg:text-sm text-gray-300 font-medium">
                
                <li class="flex items-center gap-3">
                    <img src="{{ asset('asset/ic_markunread_24px.png') }}" class="w-[18px] h-[18px] object-contain flex-shrink-0" alt="Email Icon">
                    <span>tastyfood@gmail.com</span>
                </li>
                
                <li class="flex items-center gap-3">
                    <img src="{{ asset('asset/ic_call_24px.png') }}" class="w-[18px] h-[18px] object-contain flex-shrink-0" alt="Phone Icon">
                    <span>+62 812 3456 7890</span>
                </li>
                
                <li class="flex items-center gap-3">
                    <img src="{{ asset('asset/ic_place_24px.png') }}" class="w-[18px] h-[18px] object-contain flex-shrink-0" alt="Location Icon">
                    <span>Kota Bandung, Jawa Barat</span>
                </li>
                
            </ul>
        </div>

    </div>

    <div class="border-t border-gray-800/60 pt-6 text-center text-[11px] text-gray-500 tracking-wider">
        Copyright &copy;2023 All rights reserved
    </div>
</footer>