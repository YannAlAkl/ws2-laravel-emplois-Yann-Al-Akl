@extends('layouts.app')
@section('title', 'Connexion')
@section('content')
<div class="max-w-md mx-auto px-6 py-12">
<h1 class="text-2xl font-bold text-slate-800 mb-6">Connexion</h1>

    <form method="POST" action="{{ route('login') }}" class="space-y-4">
        @csrf
<div>
<label class="block text-sm mb-1">Courriel</label>
<input type="email" name="email" value="{{ old('email') }}" required autofocus
                   class="w-full rounded border-slate-300">
            @error('email') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
</div>
<div>
<label class="block text-sm mb-1">Mot de passe</label>
<input type="password" name="password" required class="w-full rounded border-slate-300">
</div>
<label class="flex items-center gap-2 text-sm">
<input type="checkbox" name="remember"> Se souvenir de moi
</label>
<button class="w-full bg-[#1E2D4A] text-white rounded py-2 font-semibold">Se connecter</button>
<p class="text-sm text-center">
            Pas de compte ? <a href="{{ route('register') }}" class="text-cyan-600">S'inscrire</a>
</p>
</form>
</div>
@endsection
