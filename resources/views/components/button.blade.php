@props(['href' => null, 'variant' => 'primary'])
@php
    $variantes = [
        'primary'   => 'bg-cyan-500 hover:bg-cyan-600 text-white shadow-sm',
        'secondary' => 'border border-slate-300 text-slate-600 hover:border-[#1E2D4A] hover:text-[#1E2D4A]',
        'danger'    => 'bg-red-50 text-red-700 hover:bg-red-100',
    ];
    $base = 'inline-flex items-center justify-center rounded-xl px-5 py-3 text-sm font-semibold transition-colors duration-200';
    $classe = $base . ' ' . ($variantes[$variant] ?? $variantes['primary']);
@endphp
@if($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classe]) }}>{{ $slot }}</a>
@else
    <button {{ $attributes->merge(['class' => $classe, 'type' => 'submit']) }}>{{ $slot }}</button>
@endif
