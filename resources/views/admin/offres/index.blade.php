@extends('layouts.app')

@section('title', 'Gestion des offres')

@section('content')
<div class="min-h-screen bg-slate-50">

    <x-page-header
        title="Offres d'emploi"
        :subtitle="$offreEmplois->count() . ' offre' . ($offreEmplois->count() > 1 ? 's' : '') . ' enregistrée' . ($offreEmplois->count() > 1 ? 's' : '')" />

    <div class="max-w-6xl mx-auto px-6 py-10">
        <div class="flex flex-col sm:flex-row items-center justify-between gap-4 mb-6">
            <p class="text-sm text-slate-500">Gérer les offres publiées et accéder aux candidatures reçues.</p>
            <x-button href="{{ route('admin.offres.create') }}">+ Nouvelle offre</x-button>
        </div>

        @if($offreEmplois->isEmpty())
        <div class="rounded-xl border border-dashed border-slate-300 bg-white p-12 text-center text-slate-500">
            <p class="text-2xl mb-3">Aucune offre trouvée</p>
            <p>Créez une nouvelle offre pour commencer.</p>
        </div>
        @else
        <x-panel class="overflow-x-auto shadow-sm">
            <table class="min-w-full text-left text-sm">
                <thead class="bg-slate-50 text-slate-600 uppercase tracking-[0.15em] text-xs">
                    <tr>
                        <th class="px-5 py-4">Titre</th>
                        <th class="px-5 py-4">Entreprise</th>
                        <th class="px-5 py-4">Ville</th>
                        <th class="px-5 py-4">Type</th>
                        <th class="px-5 py-4">Statut</th>
                        <th class="px-5 py-4">Candidatures</th>
                        <th class="px-5 py-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @foreach($offreEmplois as $offre)
                    <tr class="hover:bg-slate-50 transition-colors duration-150">
                        <td class="px-5 py-4 font-medium text-slate-800">{{ $offre->titre }}</td>
                        <td class="px-5 py-4 text-slate-600">{{ $offre->entreprise }}</td>
                        <td class="px-5 py-4 text-slate-600">{{ $offre->ville }}</td>
                        <td class="px-5 py-4 text-slate-600">{{ $offre->type_emploi }}</td>

                        <td class="px-5 py-4">
                            @if($offre->est_active)
                                <x-badge color="emerald">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Active
                                </x-badge>
                            @else
                                <x-badge color="slate">
                                    <span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span> Inactive
                                </x-badge>
                            @endif
                        </td>

                        <td class="px-5 py-4">
                            <a href="{{ route('admin.offres.candidatures', $offre->id) }}"
                               class="inline-flex items-center gap-1 font-semibold text-cyan-600 hover:text-cyan-800 hover:underline">
                                {{ $offre->candidatures_count ?? 0 }}
                                candidature{{ ($offre->candidatures_count ?? 0) > 1 ? 's' : '' }}
                            </a>
                        </td>

                        <td class="px-5 py-4">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('admin.offres.edit', $offre->id) }}"
                                   class="inline-flex items-center rounded-full border border-slate-200 bg-slate-50 px-3 py-2 text-xs font-semibold text-slate-700 hover:bg-slate-100 transition">
                                    Modifier
                                </a>
                                <form action="{{ route('admin.offres.destroy', $offre->id) }}" method="POST"
                                      onsubmit="return confirm('Supprimer définitivement l\'offre « {{ $offre->titre }} » ? Cette action est irréversible.');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="inline-flex items-center rounded-full bg-red-50 px-3 py-2 text-xs font-semibold text-red-700 hover:bg-red-100 transition">
                                        Supprimer
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </x-panel>
        @endif
    </div>
</div>
@endsection
