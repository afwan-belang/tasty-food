@props(['image', 'title', 'desc'])

<style>
    .tasty-compact-shadow {
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.04);
    }
    
    .tasty-hover-glow:hover {
        box-shadow: 0 20px 40px rgba(217, 119, 6, 0.12); /* Kombinasi warna amber dengan opacity lembut */
    }

    .tasty-font-details {
        font-size: 12.5px;
        line-height: 1.55;
        letter-spacing: 0.01em;
    }
</style>

<div {{ $attributes->merge(['class' => 'bg-white rounded-[24px] tasty-compact-shadow px-4 pb-8 pt-20 text-center flex flex-col items-center relative mt-16 lg:mt-6 border border-gray-100/60 group hover:-translate-y-2 tasty-hover-glow transition-all duration-300 ease-out']) }} style="height: 300px;">
    
    <div class="w-32 h-32 rounded-full absolute -top-16 left-1/2 -translate-x-1/2 shadow-md overflow-hidden bg-white flex items-center justify-center ring-0 ring-transparent group-hover:ring-4 group-hover:ring-amber-500/40 group-hover:-translate-y-1 transition-all duration-300 ease-out z-20">
        <img src="{{ asset($image) }}" 
             alt="{{ $title }}" 
             class="w-full h-full object-cover scale-100 select-none pointer-events-none">
    </div>
    
    <div class="flex flex-col items-center justify-start flex-grow w-full mt-2 relative z-10">
        <h3 class="font-black text-lg lg:text-xl mb-3 uppercase tracking-wide text-gray-950 group-hover:text-amber-600 transition-colors duration-300">
            {{ $title }}
        </h3>
        <p class="text-gray-500 tasty-font-details max-w-[195px] mx-auto text-center font-normal transition-colors duration-300 group-hover:text-gray-700">
            {{ $desc }}
        </p>
    </div>
    
</div>