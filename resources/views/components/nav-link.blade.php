@props(['active' => false])
<a {{ $attributes->merge(['class' => 'transition-colors duration-200 ' . ($active ? 'text-white font-semibold' : 'text-slate-300 hover:text-white')]) }}>
    {{ $slot }}
</a>
