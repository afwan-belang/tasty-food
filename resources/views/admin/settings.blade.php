@extends('layouts.admin')

@section('page_title', 'PORTAL SECURITY & CREDENTIALS')

@section('admin_content')
<!-- MENGGUNAKAN GRID LAYOUT RESPONSIF DENGAN ANIMASI TRANSISI HALUS -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
    
    <!-- BOX LEFT: MANAJEMEN PROFIL (`rounded-2xl`) -->
    <div class="bg-white p-6 sm:p-8 rounded-2xl border border-gray-100 shadow-sm flex flex-col justify-between transition duration-200 hover:shadow-md">
        <div>
            <h3 class="text-xs font-black text-gray-950 uppercase tracking-wider mb-1">MANAJEMEN PROFIL</h3>
            <span class="text-[10px] text-gray-400 font-bold uppercase tracking-wide block mb-6">Ubah data identitas login utama administrasi web.</span>
            
            <form action="{{ route('admin.settings.profile') }}" method="POST" class="space-y-4">
                @csrf 
                @method('PUT')
                
                <div>
                    <label class="block text-[10px] font-black tracking-wider text-gray-950 uppercase mb-2">Nama Administrator</label>
                    <input type="text" name="name" value="{{ Auth::user()->name }}" required 
                           class="w-full h-11 px-4 text-xs font-semibold bg-white border border-gray-300 rounded-none focus:border-gray-950 focus:outline-none transition">
                </div>
                
                <div>
                    <label class="block text-[10px] font-black tracking-wider text-gray-950 uppercase mb-2">Email Akun Admin</label>
                    <input type="email" name="email" value="{{ Auth::user()->email }}" required 
                           class="w-full h-11 px-4 text-xs font-semibold bg-white border border-gray-300 rounded-none focus:border-gray-950 focus:outline-none transition">
                </div>
                
                <button type="submit" class="bg-gray-950 text-white border border-gray-950 px-5 py-3 text-[10px] font-black tracking-widest uppercase rounded-none hover:bg-white hover:text-gray-950 cursor-pointer transition duration-200 mt-2">
                    PERBARUI PROFIL
                </button>
            </form>
        </div>
    </div>

    <!-- BOX RIGHT: KATA SANDI PORTAL (`rounded-2xl`) -->
    <div class="bg-white p-6 sm:p-8 rounded-2xl border border-gray-100 shadow-sm flex flex-col justify-between transition duration-200 hover:shadow-md">
        <div>
            <h3 class="text-xs font-black text-gray-950 uppercase tracking-wider mb-1">KATA SANDI PORTAL</h3>
            <span class="text-[10px] text-gray-400 font-bold uppercase tracking-wide block mb-6">Amankan akses redaksi dengan memperbarui password secara berkala.</span>
            
            <form action="{{ route('admin.settings.password') }}" method="POST" class="space-y-4">
                @csrf 
                @method('PUT')
                
                <div>
                    <label class="block text-[10px] font-black tracking-wider text-gray-950 uppercase mb-2">Password Saat Ini</label>
                    <input type="password" name="current_password" required 
                           class="w-full h-11 px-4 text-xs font-semibold bg-white border border-gray-300 rounded-none focus:border-gray-950 focus:outline-none transition">
                </div>
                
                <div>
                    <label class="block text-[10px] font-black tracking-wider text-gray-950 uppercase mb-2">Password Baru Redaksi</label>
                    <input type="password" name="password" required 
                           class="w-full h-11 px-4 text-xs font-semibold bg-white border border-gray-300 rounded-none focus:border-gray-950 focus:outline-none transition">
                </div>
                
                <div>
                    <label class="block text-[10px] font-black tracking-wider text-gray-950 uppercase mb-2">Konfirmasi Password Baru</label>
                    <input type="password" name="password_confirmation" required 
                           class="w-full h-11 px-4 text-xs font-semibold bg-white border border-gray-300 rounded-none focus:border-gray-950 focus:outline-none transition">
                </div>
                
                <button type="submit" class="bg-gray-950 text-white border border-gray-950 px-5 py-3 text-[10px] font-black tracking-widest uppercase rounded-none hover:bg-white hover:text-gray-950 cursor-pointer transition duration-200 mt-2">
                    GANTI PASSWORD
                </button>
            </form>
        </div>
    </div>

</div>
@endsection