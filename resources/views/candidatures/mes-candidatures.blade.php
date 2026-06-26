@extends('layouts.app')

@section('title', 'Mes candidatures')

@section('content')
<div class="min-h-screen bg-slate-50">

    <div class="bg-[#1E2D4A] text-white py-10 px-6">
        <div class="max-w-6xl mx-auto">
            <p class="text-cyan-400 text-sm font-semibold uppercase tracking-widest mb-2">Mes candidatures</p>
            <h1 class="text-3xl font-bold">Suivi de vos candidatures</h1>
            <p class="text-slate-300 mt-1">{{ $candidatures->total() }} candidature{{ $candidatures->total() > 1 ? 's' : '' }}</p>
        </div>
    </div>

    <div class="max-w-6xl mx-auto px-6 py-10">
        @if($candidatures->isEmpty())
            <div class="rounded-xl border border-dashed border-slate-300 bg-white p-12 text-center text-slate-500">
                <p class="text-2xl mb-3">Aucune candidature</p>
                <p>Postulez à une offre pour voir vos candidatures ici.</p>
            </div>
        @else
            <div class="overflow-x-auto rounded-xl border border-slate-200 bg-white shadow-sm">
                <table class="min-w-full text-left text-sm">
                    <thead class="bg-slate-50 text-slate-600 uppercase tracking-[0.15em] text-xs">
                        <tr>
                            <th class="px-5 py-4">Offre</th>
                            <th class="px-5 py-4">Statut</th>
                            <th class="px-5 py-4">Reçue le</th>
                            <th class="px-5 py-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @foreach($candidatures as $candidature)
                            <tr class="hover:bg-slate-50 transition-colors duration-150">
                                <td class="px-5 py-4">
                                    <div class="font-medium text-slate-800">
                                        {{ $candidature->offreEmploi->titre ?? '-' }}
                                    </div>
                                    <div class="text-xs text-slate-500 mt-1">
                                        {{ $candidature->offreEmploi->entreprise ?? '' }}{{ $candidature->offreEmploi && $candidature->offreEmploi->ville ? ' · '.$candidature->offreEmploi->ville : '' }}
                                    </div>
                                </td>

                                <td class="px-5 py-4">
                                    @php
                                        $statut = $candidature->statut ?? 'recu';
                                        $badgeClasses = match($statut) {
                                            'recu' => 'bg-cyan-50 text-cyan-700 border-cyan-200',
                                            'en_rev' => 'bg-amber-50 text-amber-700 border-amber-200',
                                            'acceptee' => 'bg-emerald-50 text-emerald-700 border-emerald-200',
                                            'refusee' => 'bg-rose-50 text-rose-700 border-rose-200',
                                            default => 'bg-slate-50 text-slate-700 border-slate-200',
                                        };
                                    @endphp
                                    <span class="inline-flex items-center rounded-full border px-3 py-1 text-xs font-semibold {{ $badgeClasses }}">
                                        {{ $statut }}
                                    </span>
                                </td>

                                <td class="px-5 py-4 text-slate-600">
                                    {{ $candidature->created_at ? $candidature->created_at->format('d/m/Y') : '-' }}
                                </td>

                                <td class="px-5 py-4">
                                    <div class="flex flex-wrap items-center gap-3">
                                        <a href="{{ route('mes-candidatures.show', $candidature->id) }}"
                                           class="text-cyan-600 hover:text-cyan-800 text-sm font-semibold">
                                            Voir
                                        </a>

                                        <a href="{{ route('mes-candidatures.cv', $candidature->id) }}" target="_blank"
                                           class="text-slate-500 hover:text-slate-700 text-sm font-semibold">
                                            CV
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-6">
                {{ $candidatures->links() }}
            </div>
        @endif
    </div>
</div>
@endsection

