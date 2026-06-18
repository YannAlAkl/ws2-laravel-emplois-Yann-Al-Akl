@props(['name', 'label', 'type' => 'text', 'value' => '', 'required' => false, 'help' => null, 'placeholder' => ''])
<div>
    <label for="{{ $name }}" class="block text-sm font-semibold text-slate-700 mb-1.5">
        {{ $label }}
        @if($required)<span class="text-red-500">*</span>@endif
    </label>
    <input type="{{ $type }}" id="{{ $name }}" name="{{ $name }}" value="{{ old($name, $value) }}"
           placeholder="{{ $placeholder }}"
           class="w-full rounded-lg border px-4 py-2.5 text-sm text-slate-800 focus:outline-none focus:ring-2 focus:ring-cyan-400 focus:border-transparent {{ $errors->has($name) ? 'border-red-400 bg-red-50' : 'border-slate-300 bg-white' }}">
    @if($help)<p class="text-xs text-slate-400 mt-1.5">{{ $help }}</p>@endif
    @error($name)<p class="text-xs text-red-600 mt-1.5">{{ $message }}</p>@enderror
</div>
