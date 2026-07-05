@props(['href' => null, 'variant' => 'black'])

@php
    $baseStyles = "inline-block px-10 py-4 text-sm font-bold uppercase tracking-wider transition duration-300 rounded-md text-center cursor-pointer";
    $variants = [
        'black' => 'bg-black text-white hover:bg-gray-800',
        'yellow' => 'text-yellow-600 hover:text-yellow-700 p-0 normal-case font-bold tracking-wide'
    ];
    $classes = $baseStyles . ' ' . ($variants[$variant] ?? $variants['black']);
@endphp

@if($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </a>
@else
    <button {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </button>
@endif