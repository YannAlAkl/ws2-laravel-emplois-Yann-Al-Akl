@extends('layouts.app')

@section('title', 'À propos')

@section('content')
<div class="min-h-screen bg-slate-50">

    <div class="bg-[#1E2D4A] text-white py-12 px-6">
        <div class="max-w-3xl mx-auto">
            <p class="text-cyan-400 text-sm font-semibold uppercase tracking-widest mb-2">À propos</p>
            <h1 class="text-4xl font-bold mb-3">Le portail carrières interne</h1>
            <p class="text-slate-300 text-lg">Un espace unique pour publier les postes et recevoir les candidatures de l'organisation.</p>
        </div>
    </div>

    <div class="max-w-3xl mx-auto px-6 py-10 space-y-6">

        <div class="bg-white rounded-xl border border-slate-200 px-8 py-7">
            <h2 class="text-xs font-bold text-cyan-600 uppercase tracking-widest mb-4">Notre mission</h2>
            <p class="text-slate-700 leading-relaxed">
                EmploiInterne centralise les opportunités de carrière au sein de l'entreprise. Les équipes
                administratives publient les offres, les collègues consultent les postes disponibles et
                soumettent leur candidature en quelques clics, CV à l'appui.
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
            <div class="bg-white rounded-xl border border-slate-200 px-6 py-6 text-center">
                <p class="text-3xl mb-2">📋</p>
                <h3 class="font-bold text-[#1E2D4A] mb-1">Consulter</h3>
                <p class="text-sm text-slate-500">Parcourez les offres actives, filtrées par type de poste.</p>
            </div>
            <div class="bg-white rounded-xl border border-slate-200 px-6 py-6 text-center">
                <p class="text-3xl mb-2">📨</p>
                <h3 class="font-bold text-[#1E2D4A] mb-1">Postuler</h3>
                <p class="text-sm text-slate-500">Soumettez votre candidature et téléversez votre CV en toute sécurité.</p>
            </div>
            <div class="bg-white rounded-xl border border-slate-200 px-6 py-6 text-center">
                <p class="text-3xl mb-2">🗂️</p>
                <h3 class="font-bold text-[#1E2D4A] mb-1">Gérer</h3>
                <p class="text-sm text-slate-500">L'administration crée les offres et suit les candidatures reçues.</p>
            </div>
        </div>

        <div class="bg-[#1E2D4A] text-white rounded-xl px-8 py-7 flex flex-col sm:flex-row items-center justify-between gap-4">
            <div>
                <h3 class="text-lg font-bold mb-1">Prêt à explorer les opportunités ?</h3>
                <p class="text-slate-300 text-sm">Découvrez les postes ouverts dès maintenant.</p>
            </div>
            <a href="{{ route('emplois.index') }}"
               class="shrink-0 bg-cyan-500 hover:bg-cyan-600 text-white font-bold px-6 py-3 rounded-xl transition-colors duration-200">
                Voir les offres →
            </a>
        </div>

    </div>
</div>
@endsection
