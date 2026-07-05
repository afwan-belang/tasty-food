@extends('layouts.app')

@section('content')
<div class="relative w-full h-[400px] bg-gray-800 flex items-center justify-start px-8 lg:px-24 pt-20">
    <h1 class="text-5xl font-bold text-white relative z-10 uppercase">KONTAK KAMI</h1>
</div>

<section class="py-20 px-8 lg:px-24 bg-white">
    <h2 class="text-3xl font-bold mb-10 uppercase text-left">Kontak Kami</h2>
    
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
        <form class="space-y-6">
            <div class="grid grid-cols-1 gap-6">
                <input type="text" placeholder="Subject" class="w-full border border-gray-300 p-4 rounded-md focus:outline-none focus:border-black">
                <input type="text" placeholder="Name" class="w-full border border-gray-300 p-4 rounded-md focus:outline-none focus:border-black">
                <input type="email" placeholder="Email" class="w-full border border-gray-300 p-4 rounded-md focus:outline-none focus:border-black">
            </div>
            <div class="h-full">
                <textarea placeholder="Message" rows="8" class="w-full border border-gray-300 p-4 rounded-md focus:outline-none focus:border-black"></textarea>
            </div>
            <button type="submit" class="w-full bg-black text-white py-4 font-bold uppercase hover:bg-gray-900 transition rounded-md">KIRIM</button>
        </form>
        
        <div class="w-full h-full min-h-[400px] bg-gray-200 rounded-xl overflow-hidden relative">
            <div class="absolute inset-0 flex items-center justify-center text-gray-500">
                [ Embed Google Maps Disini ]
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-12 mt-20 text-center">
        <div class="flex flex-col items-center">
            <div class="w-16 h-16 bg-black text-white rounded-full flex items-center justify-center text-2xl mb-4">✉</div>
            <h3 class="font-bold text-lg mb-2">EMAIL</h3>
            <p class="text-gray-600">tastyfood@gmail.com</p>
        </div>
        <div class="flex flex-col items-center">
            <div class="w-16 h-16 bg-black text-white rounded-full flex items-center justify-center text-2xl mb-4">📞</div>
            <h3 class="font-bold text-lg mb-2">PHONE</h3>
            <p class="text-gray-600">+62 812 3456 7890</p>
        </div>
        <div class="flex flex-col items-center">
            <div class="w-16 h-16 bg-black text-white rounded-full flex items-center justify-center text-2xl mb-4">📍</div>
            <h3 class="font-bold text-lg mb-2">LOCATION</h3>
            <p class="text-gray-600">Kota Bandung, Jawa Barat</p>
        </div>
    </div>
</section>
@endsection