@extends('layouts.app')
@section('title', 'Vérifier le courriel')
@section('content')
<div class="max-w-md mx-auto px-6 py-12 text-center">
<h1 class="text-2xl font-bold text-slate-800 mb-4">Vérifie ton courriel</h1>
<p class="text-slate-600 mb-6">
        Un lien de vérification a été envoyé. Clique dessus pour activer ton compte.
</p>
<form method="POST" action="{{ route('verification.send') }}">
        @csrf
<button class="bg-[#1E2D4A] text-white rounded px-5 py-2 font-semibold">
            Renvoyer le lien
</button>
</form>
</div>
@endsection
