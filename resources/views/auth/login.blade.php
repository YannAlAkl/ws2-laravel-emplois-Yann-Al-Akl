@extends('layouts.app')
@section('title', 'Connexion')
@section('content')
<div class="min-h-[70vh] flex items-center justify-center px-4 py-10">
    <div class="w-full max-w-md">
        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
            <div class="p-6">
                <div class="flex items-center gap-3 mb-5">
                    <div class="h-10 w-10 rounded-xl bg-[#1E2D4A] flex items-center justify-center">
                        <span class="text-white font-black"></span>
                    </div>
                    <div>
                        <h1 class="text-2xl font-extrabold text-slate-800 leading-tight">Connexion</h1>
                        <p class="text-sm text-slate-500">Accédez à vos offres d’emploi</p>
                    </div>
                </div>

                <form method="POST" action="{{ route('login') }}" class="space-y-4">
                    @csrf

                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">Courriel</label>
                        <input
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            required
                            autofocus
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
                    </div>

                    <div class="flex items-center justify-between gap-4">
                        <label class="flex items-center gap-2 text-sm text-slate-700 select-none">
                            <input
                                type="checkbox"
                                name="remember"
                                class="h-4 w-4 rounded border-slate-300 text-[#1E2D4A] focus:ring-[#1E2D4A]/20"
                            >
                            Se souvenir de moi
                        </label>
                    </div>

                    <button
                        type="submit"
                        class="w-full bg-[#1E2D4A] hover:bg-[#18243a] active:bg-[#152035] transition-colors text-white rounded-xl py-2.5 font-semibold"
                    >
                        Se connecter
                    </button>

                    <p class="text-sm text-center text-slate-600">
                        Pas de compte ?
                        <a href="{{ route('register') }}" class="font-semibold text-[#1E2D4A] hover:text-[#0f1c32]">S'inscrire</a>
                    </p>
                </form>
            </div>
        </div>

        @if(session('error'))
            <div class="mt-4">
                <x-alert type="error">{{ session('error') }}</x-alert>
            </div>
        @endif
    </div>
</div>
@endsection

