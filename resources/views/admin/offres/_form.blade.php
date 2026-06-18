
@php($offre = $offreEmploi ?? null)

<div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
    <x-form.field name="titre"       label="Titre du poste" :value="$offre->titre ?? ''"       required placeholder="Développeur web" />
    <x-form.field name="entreprise"  label="Entreprise"     :value="$offre->entreprise ?? ''"  required placeholder="Microsoft" />
    <x-form.field name="ville"       label="Ville"          :value="$offre->ville ?? ''"       required placeholder="Montréal" />
    <x-form.field name="type_emploi" label="Type d'emploi"  :value="$offre->type_emploi ?? ''" required placeholder="Temps plein" />
    <x-form.field name="salaire"     label="Salaire"        :value="$offre->salaire ?? ''"     placeholder="55 000 $" help="Facultatif" />
    <x-form.field name="date_publication" label="Date de publication" type="date"
                  :value="isset($offre->date_publication) ? \Carbon\Carbon::parse($offre->date_publication)->format('Y-m-d') : ''" />
</div>

<div>
    <label for="description" class="block text-sm font-semibold text-slate-700 mb-1.5">
        Description <span class="text-red-500">*</span>
    </label>
    <textarea id="description" name="description" rows="4"
              class="w-full rounded-lg border px-4 py-2.5 text-sm text-slate-800 focus:outline-none focus:ring-2 focus:ring-cyan-400 focus:border-transparent resize-none {{ $errors->has('description') ? 'border-red-400 bg-red-50' : 'border-slate-300 bg-white' }}"
              placeholder="Présentation générale du poste...">{{ old('description', $offre->description ?? '') }}</textarea>
    @error('description')<p class="text-xs text-red-600 mt-1.5">{{ $message }}</p>@enderror
</div>

<div>
    <label for="responsabilites" class="block text-sm font-semibold text-slate-700 mb-1.5">
        Responsabilités <span class="text-red-500">*</span>
    </label>
    <textarea id="responsabilites" name="responsabilites" rows="4"
              class="w-full rounded-lg border px-4 py-2.5 text-sm text-slate-800 focus:outline-none focus:ring-2 focus:ring-cyan-400 focus:border-transparent resize-none {{ $errors->has('responsabilites') ? 'border-red-400 bg-red-50' : 'border-slate-300 bg-white' }}"
              placeholder="Une responsabilité par ligne...">{{ old('responsabilites', $offre->responsabilites ?? '') }}</textarea>
    @error('responsabilites')<p class="text-xs text-red-600 mt-1.5">{{ $message }}</p>@enderror
</div>

<div>
    <label for="exigences" class="block text-sm font-semibold text-slate-700 mb-1.5">
        Exigences <span class="text-red-500">*</span>
    </label>
    <textarea id="exigences" name="exigences" rows="4"
              class="w-full rounded-lg border px-4 py-2.5 text-sm text-slate-800 focus:outline-none focus:ring-2 focus:ring-cyan-400 focus:border-transparent resize-none {{ $errors->has('exigences') ? 'border-red-400 bg-red-50' : 'border-slate-300 bg-white' }}"
              placeholder="Une exigence par ligne...">{{ old('exigences', $offre->exigences ?? '') }}</textarea>
    @error('exigences')<p class="text-xs text-red-600 mt-1.5">{{ $message }}</p>@enderror
</div>

<div class="flex items-center gap-3">
    <input type="hidden" name="est_active" value="0">
    <input type="checkbox" id="est_active" name="est_active" value="1"
           {{ old('est_active', $offre->est_active ?? true) ? 'checked' : '' }}
           class="h-4 w-4 rounded border-slate-300 text-cyan-500 focus:ring-cyan-400">
    <label for="est_active" class="text-sm font-medium text-slate-700">Offre active (visible sur le site public)</label>
</div>
