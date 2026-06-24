@extends('layouts.app')
@section('title', 'Inscription')
@section('content')
<div class="max-w-md mx-auto px-6 py-12">
<h1 class="text-2xl font-bold text-slate-800 mb-6">Créer un compte</h1>

    <form method="POST" action="{{ route('register') }}" class="space-y-4">
        @csrf
<div>
<label class="block text-sm mb-1">Nom</label>
<input name="name" value="{{ old('name') }}" required autofocus
                   class="w-full rounded border-slate-300">
            @error('name') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
</div>
<div>
<label class="block text-sm mb-1">Courriel</label>
<input type="email" name="email" value="{{ old('email') }}" required
                   class="w-full rounded border-slate-300">
            @error('email') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
</div>
<div>
<label class="block text-sm mb-1">Mot de passe</label>
<input type="password" name="password" required class="w-full rounded border-slate-300">
            @error('password') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
</div>
<div>
<label class="block text-sm mb-1">Confirmer le mot de passe</label>
<input type="password" name="password_confirmation" required class="w-full rounded border-slate-300">
</div>
<button class="w-full bg-[#1E2D4A] text-white rounded py-2 font-semibold">S'inscrire</button>
<p class="text-sm text-center">
            Déjà inscrit ? <a href="{{ route('login') }}" class="text-cyan-600">Se connecter</a>
</p>
</form>
</div>
@endsection
