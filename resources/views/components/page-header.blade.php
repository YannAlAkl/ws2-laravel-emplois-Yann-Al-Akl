@props(['title', 'subtitle' => null, 'eyebrow' => 'Administration'])
<div class="bg-[#1E2D4A] text-white py-10 px-6">
    <div class="max-w-6xl mx-auto">
        @if($eyebrow)
            <p class="text-cyan-400 text-sm font-semibold uppercase tracking-widest mb-2">{{ $eyebrow }}</p>
        @endif
        <h1 class="text-3xl font-bold">{{ $title }}</h1>
        @if($subtitle)
            <p class="text-slate-300 mt-1">{{ $subtitle }}</p>
        @endif
    </div>
</div>
