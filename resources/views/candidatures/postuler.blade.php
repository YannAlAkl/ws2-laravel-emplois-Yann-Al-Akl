@extends('layouts.app')

@section('title', 'Postuler — ' . $offreEmploi->titre)

@section('content')
<div class="min-h-screen bg-slate-50">

    <div class="bg-white border-b border-slate-200">
        <div class="max-w-3xl mx-auto px-6 py-3">
            <a href="{{ route('emplois.show', $offreEmploi->id) }}"
               class="inline-flex items-center gap-2 text-sm text-slate-500 hover:text-cyan-600 transition-colors duration-200">
                ← Retour à l'offre
            </a>
        </div>
    </div>

    <div class="max-w-3xl mx-auto px-6 py-10">

        <div class="mb-8">
            <p class="text-cyan-600 text-sm font-semibold uppercase tracking-widest mb-1">Candidature</p>
            <h1 class="text-3xl font-bold text-[#1E2D4A]">{{ $offreEmploi->titre }}</h1>
            <p class="text-slate-500 mt-1">{{ $offreEmploi->entreprise }} · {{ $offreEmploi->ville }}</p>
        </div>

        @if($errors->any())
        <div class="mb-6">
            <x-alert type="error">
                <div>
                    <p class="font-semibold mb-1">Veuillez corriger les erreurs suivantes :</p>
                    <ul class="list-disc list-inside space-y-1">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </x-alert>
        </div>
        @endif

        <div id="erreur-cv" class="mb-6 hidden">
            <x-alert type="error"><span id="erreur-cv-message"></span></x-alert>
        </div>

        <form id="form-candidature" action="{{ route('candidatures.store', $offreEmploi->id) }}" method="POST" enctype="multipart/form-data"
              class="bg-white rounded-xl border border-slate-200 px-8 py-8 space-y-6">
            @csrf

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                <x-form.field name="prenom" label="Prénom" required placeholder="Jean" />
                <x-form.field name="nom"    label="Nom"    required placeholder="Tremblay" />
            </div>

            <x-form.field name="courriel" label="Courriel" type="email" required placeholder="jean.tremblay@exemple.com" />

            <x-form.field name="telephone" label="Téléphone" placeholder="514 000-0000" help="Facultatif" />

            <div>
                <label for="message" class="block text-sm font-semibold text-slate-700 mb-1.5">
                    Message de motivation <span class="text-slate-400 font-normal">(facultatif)</span>
                </label>
                <textarea id="message" name="message" rows="5"
                          class="w-full rounded-lg border border-slate-300 bg-white px-4 py-2.5 text-sm text-slate-800
                                 focus:outline-none focus:ring-2 focus:ring-cyan-400 focus:border-transparent resize-none"
                          placeholder="Décrivez brièvement votre intérêt pour ce poste...">{{ old('message') }}</textarea>
            </div>

            <div>
                <label for="cv" class="block text-sm font-semibold text-slate-700 mb-1.5">
                    Curriculum vitae <span class="text-red-500">*</span>
                </label>
                <input type="file" id="cv" name="cv" accept=".pdf,.doc,.docx,.txt,.rtf,.odt"
                       class="w-full text-sm text-slate-600 file:mr-4 file:py-2 file:px-4
                              file:rounded-full file:border-0 file:text-sm file:font-semibold
                              file:bg-cyan-50 file:text-cyan-700 hover:file:bg-cyan-100
                              border rounded-lg px-3 py-2
                              {{ $errors->has('cv') ? 'border-red-400 bg-red-50' : 'border-slate-300 bg-white' }}">
                <p class="text-xs text-slate-400 mt-1.5">Formats acceptés : PDF, DOC, DOCX, TXT, RTF, ODT · Taille maximale : 2 Mo</p>
            </div>

            <div class="border-t border-slate-100 pt-4 flex flex-col sm:flex-row items-center justify-between gap-4">
                <a href="{{ route('emplois.show', $offreEmploi->id) }}"
                   class="text-sm text-slate-500 hover:text-slate-700 transition-colors duration-200">
                    Annuler
                </a>
                <x-button type="submit">Soumettre ma candidature</x-button>
            </div>

        </form>

    </div>
</div>

<script>
    const formulaire   = document.getElementById('form-candidature');
    const champCv      = document.getElementById('cv');
    const boiteErreur  = document.getElementById('erreur-cv');
    const texteErreur  = document.getElementById('erreur-cv-message');

    const extensionsAutorisees = ['pdf', 'doc', 'docx', 'txt', 'rtf', 'odt'];
    const tailleMax = 2 * 1024 * 1024;

    function afficherErreur(message) {
        texteErreur.textContent = message;
        boiteErreur.classList.remove('hidden');
    }

    function cacherErreur() {
        boiteErreur.classList.add('hidden');
    }

    formulaire.addEventListener('submit', function (e) {
        const fichier = champCv.files[0];

        if (!fichier) {
            e.preventDefault();
            afficherErreur('Veuillez sélectionner un fichier CV.');
            return;
        }

        const extension = fichier.name.split('.').pop().toLowerCase();

        if (!extensionsAutorisees.includes(extension)) {
            e.preventDefault();
            afficherErreur('Format de fichier non autorisé. Formats acceptés : PDF, DOC, DOCX, TXT, RTF, ODT.');
            return;
        }

        if (fichier.size > tailleMax) {
            e.preventDefault();
            afficherErreur('Le fichier est trop volumineux (maximum 2 Mo).');
            return;
        }

        cacherErreur();
    });
</script>
@endsection
