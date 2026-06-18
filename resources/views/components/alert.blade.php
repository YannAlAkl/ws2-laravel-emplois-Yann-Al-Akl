@props(['type' => 'success'])
@php
    $styles = $type === 'error'
        ? 'bg-red-50 border-red-200 text-red-700'
        : 'bg-emerald-50 border-emerald-200 text-emerald-700';
    $icone = $type === 'error' ? '❌' : '✅';
@endphp
<div {{ $attributes->merge(['class' => "flex items-center gap-3 border rounded-lg px-4 py-3 text-sm $styles"]) }}>
    <span>{{ $icone }}</span>
    <div>{{ $slot }}</div>
</div>
