@extends('layouts.app')
@section('title', 'Inscription')
@section('content')
<div class="min-h-[70vh] flex items-center justify-center px-4 py-10">
    <div class="w-full max-w-md">
        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
            <div class="p-6">
                <div class="flex items-center gap-3 mb-5">
                    <div class="h-10 w-10 rounded-xl bg-[#1E2D4A] flex items-center justify-center">
                        <span class="text-white font-black">eI</span>
                    </div>
                    <div>
                        <h1 class="text-2xl font-extrabold text-slate-800 leading-tight">Créer un compte</h1>
                        <p class="text-sm text-slate-500">Rejoignez EmploiInterne</p>
                    </div>
                </div>

                <form method="POST" action="{{ route('register') }}" class="space-y-4">
                    @csrf

                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">Nom</label>
                        <input
                            name="name"
                            value="{{ old('name') }}"
                            required
                            autofocus
                            class="w-full rounded-xl border-slate-300 focus:border-[#1E2D4A] focus:ring-2 focus:ring-[#1E2D4A]/20"
                        >
                        @error('name')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">Courriel</label>
                        <input
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            required
                            class="w-full rounded-xl border-slate-300 focus:border-[#1E2D4A] focus:ring-2 focus:ring-[#1E2D4A]/20"
                        >
                        @error('email')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">Mot de passe</label>
                        <input
                            type="password"
                            name="password"
                            required
                            class="w-full rounded-xl border-slate-300 focus:border-[#1E2D4A] focus:ring-2 focus:ring-[#1E2D4A]/20"
                        >
                        @error('password')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">Confirmer le mot de passe</label>
                        <input
                            type="password"
                            name="password_confirmation"
                            required
                            class="w-full rounded-xl border-slate-300 focus:border-[#1E2D4A] focus:ring-2 focus:ring-[#1E2D4A]/20"
                        >
                    </div>

                    <button
                        type="submit"
                        class="w-full bg-[#1E2D4A] hover:bg-[#18243a] active:bg-[#152035] transition-colors text-white rounded-xl py-2.5 font-semibold"
                    >
                        S'inscrire
                    </button>

                    <p class="text-sm text-center text-slate-600">
                        Déjà inscrit ?
                        <a href="{{ route('login') }}" class="font-semibold text-[#1E2D4A] hover:text-[#0f1c32]">Se connecter</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

