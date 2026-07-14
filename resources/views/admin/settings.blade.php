@extends('layouts.admin')

@section('page_title', 'PORTAL SECURITY & CREDENTIALS')

@section('admin_content')
<div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
    
    <div class="bg-white p-6 sm:p-8 rounded-2xl border border-gray-100 shadow-sm flex flex-col justify-between transition duration-200 hover:shadow-md">
        <div>
            <h3 class="text-xs font-black text-gray-950 uppercase tracking-wider mb-1 flex items-center gap-2"><i class="fa-solid fa-user-gear text-amber-500"></i> MANAJEMEN PROFIL</h3>
            <span class="text-[10px] text-gray-400 font-bold uppercase tracking-wide block mb-6">Ubah data identitas login utama administrasi web.</span>
            
            <form action="{{ route('admin.settings.profile') }}" method="POST" class="space-y-4">
                @csrf 
                @method('PUT')
                
                <div>
                    <label class="block text-[10px] font-black tracking-wider text-gray-950 uppercase mb-2">Nama Administrator</label>
                    <input type="text" name="name" value="{{ Auth::user()->name }}" required 
                           class="w-full h-12 px-4 text-xs font-semibold bg-gray-50/50 border border-gray-300 focus:border-gray-950 focus:bg-white focus:outline-none transition-all">
                </div>
                
                <div>
                    <label class="block text-[10px] font-black tracking-wider text-gray-950 uppercase mb-2">Email Akun Admin</label>
                    <input type="email" name="email" value="{{ Auth::user()->email }}" required 
                           class="w-full h-12 px-4 text-xs font-semibold bg-gray-50/50 border border-gray-300 focus:border-gray-950 focus:bg-white focus:outline-none transition-all">
                </div>
                
                <button type="submit" class="bg-gray-950 text-white border border-gray-950 px-5 py-3.5 text-[10px] font-black tracking-widest uppercase rounded-none hover:bg-amber-500 hover:text-gray-950 cursor-pointer transition duration-200 mt-2 flex items-center gap-1.5">
                    <i class="fa-solid fa-circle-check"></i> PERBARUI PROFIL
                </button>
            </form>
        </div>
    </div>

    <div class="bg-white p-6 sm:p-8 rounded-2xl border border-gray-100 shadow-sm flex flex-col justify-between transition duration-200 hover:shadow-md">
        <div>
            <h3 class="text-xs font-black text-gray-950 uppercase tracking-wider mb-1 flex items-center gap-2"><i class="fa-solid fa-lock text-amber-500"></i> KATA SANDI PORTAL</h3>
            <span class="text-[10px] text-gray-400 font-bold uppercase tracking-wide block mb-6">Amankan akses redaksi dengan memperbarui password secara berkala.</span>
            
            <form action="{{ route('admin.settings.password') }}" method="POST" class="space-y-4">
                @csrf 
                @method('PUT')
                
                <div>
                    <label class="block text-[10px] font-black tracking-wider text-gray-950 uppercase mb-2">Password Saat Ini</label>
                    <input type="password" name="current_password" required 
                           class="w-full h-12 px-4 text-xs font-semibold bg-gray-50/50 border border-gray-300 focus:border-gray-950 focus:bg-white focus:outline-none transition-all">
                </div>
                
                <div>
                    <label class="block text-[10px] font-black tracking-wider text-gray-950 uppercase mb-2">Password Baru Redaksi</label>
                    <input type="password" name="password" required 
                           class="w-full h-12 px-4 text-xs font-semibold bg-gray-50/50 border border-gray-300 focus:border-gray-950 focus:bg-white focus:outline-none transition-all">
                </div>
                
                <div>
                    <label class="block text-[10px] font-black tracking-wider text-gray-950 uppercase mb-2">Konfirmasi Password Baru</label>
                    <input type="password" name="password_confirmation" required 
                           class="w-full h-12 px-4 text-xs font-semibold bg-gray-50/50 border border-gray-300 focus:border-gray-950 focus:bg-white focus:outline-none transition-all">
                </div>
                
                <button type="submit" class="bg-gray-950 text-white border border-gray-950 px-5 py-3.5 text-[10px] font-black tracking-widest uppercase rounded-none hover:bg-amber-500 hover:text-gray-950 cursor-pointer transition duration-200 mt-2 flex items-center gap-1.5">
                    <i class="fa-solid fa-key"></i> GANTI PASSWORD
                </button>
            </form>
        </div>
    </div>

</div>
@endsection