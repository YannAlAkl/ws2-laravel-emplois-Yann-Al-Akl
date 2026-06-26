@extends('layouts.app')

@section('title', 'Détail candidature')

@section('content')
<div class="min-h-screen bg-slate-50">

    <div class="bg-white border-b border-slate-200">
        <div class="max-w-3xl mx-auto px-6 py-3">
            <a href="{{ route('mes-candidatures.index') }}"
               class="inline-flex items-center gap-2 text-sm text-slate-500 hover:text-cyan-600 transition-colors duration-200">
                ← Retour à mes candidatures
            </a>
        </div>
    </div>

    <div class="max-w-3xl mx-auto px-6 py-10">
        <div class="mb-8">
            <p class="text-cyan-600 text-sm font-semibold uppercase tracking-widest mb-1">Candidature</p>
            <h1 class="text-3xl font-bold text-[#1E2D4A]">{{ $candidature->offreEmploi->titre ?? '—' }}</h1>
            <p class="text-slate-500 mt-1">
                {{ $candidature->offreEmploi->entreprise ?? '' }}
                {{ ($candidature->offreEmploi->ville ?? null) ? ' · '.$candidature->offreEmploi->ville : '' }}
            </p>
        </div>

        <div class="bg-white rounded-xl border border-slate-200 p-6 space-y-5">
            <div>
                <p class="text-sm font-semibold text-slate-700">Statut</p>
                @php($statut = $candidature->statut ?? 'recu')
                <p class="mt-1 text-slate-600">{{ $statut }}</p>
            </div>

            <div>
                <p class="text-sm font-semibold text-slate-700">Informations</p>
                <div class="mt-2 grid grid-cols-1 sm:grid-cols-2 gap-3 text-sm text-slate-600">
                    <div><span class="font-semibold text-slate-700">Nom :</span> {{ $candidature->prenom }} {{ $candidature->nom }}</div>
                    <div><span class="font-semibold text-slate-700">Courriel :</span> {{ $candidature->courriel }}</div>
                    <div><span class="font-semibold text-slate-700">Téléphone :</span> {{ $candidature->telephone ?? '-' }}</div>
                    <div><span class="font-semibold text-slate-700">Reçue le :</span> {{ $candidature->created_at ? $candidature->created_at->format('d/m/Y') : '-' }}</div>
                </div>
            </div>

            <div>
                <p class="text-sm font-semibold text-slate-700">Message</p>
                <p class="mt-2 text-sm text-slate-600 whitespace-pre-wrap">{{ $candidature->message ?: '-' }}</p>
            </div>

            <div class="border-t border-slate-100 pt-4 flex flex-col sm:flex-row items-center justify-between gap-4">
                <div class="text-sm text-slate-500">
                    <span class="font-semibold text-slate-700">CV :</span>
                    <span>{{ $candidature->cv_nom_original ?: '—' }}</span>
                </div>

                <div class="flex items-center gap-3">
                    <a href="{{ route('mes-candidatures.cv', $candidature->id) }}" target="_blank"
                       class="text-cyan-600 hover:text-cyan-800 text-sm font-semibold">Voir</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

