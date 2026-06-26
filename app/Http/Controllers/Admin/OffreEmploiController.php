<?php

namespace App\Http\Controllers\Admin;

use App\Models\OffreEmploi;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class OffreEmploiController extends BaseController
{
    public function index(Request $request)

{

    $parPage = (int) $request->input('par_page', 10);

    if (! in_array($parPage, [10, 25, 50])) {

        $parPage = 10;

    }

    $offreEmplois = OffreEmploi::withCount('candidatures')

        ->orderByDesc('created_at')

        ->paginate($parPage)

        ->withQueryString();

    return view('admin.offres.index', compact('offreEmplois'));

}
 

    public function create()
    {
        return view('admin.offres.create');
    }

    public function store(Request $request)
    {
        $donnees = $this->valider($request);

        $offre = new OffreEmploi();
        $offre->titre            = $donnees['titre'];
        $offre->entreprise       = $donnees['entreprise'];
        $offre->ville            = $donnees['ville'];
        $offre->type_emploi      = $donnees['type_emploi'];
        $offre->salaire          = $donnees['salaire'] ?? null;
        $offre->description      = $donnees['description'];
        $offre->responsabilites  = $donnees['responsabilites'];
        $offre->exigences        = $donnees['exigences'];
        $offre->est_active       = $request->boolean('est_active');
        $offre->date_publication = $donnees['date_publication'] ?? null;
        $offre->save();

        return redirect()->route('admin.offres.index')
            ->with('success', 'Offre créée avec succès.');
    }

    public function edit(OffreEmploi $offreEmploi)
    {
        return view('admin.offres.edit', compact('offreEmploi'));
    }

    public function update(Request $request, OffreEmploi $offreEmploi)
    {
        $donnees = $this->valider($request);

        $offreEmploi->titre            = $donnees['titre'];
        $offreEmploi->entreprise       = $donnees['entreprise'];
        $offreEmploi->ville            = $donnees['ville'];
        $offreEmploi->type_emploi      = $donnees['type_emploi'];
        $offreEmploi->salaire          = $donnees['salaire'] ?? null;
        $offreEmploi->description      = $donnees['description'];
        $offreEmploi->responsabilites  = $donnees['responsabilites'];
        $offreEmploi->exigences        = $donnees['exigences'];
        $offreEmploi->est_active       = $request->boolean('est_active');
        $offreEmploi->date_publication = $donnees['date_publication'] ?? null;
        $offreEmploi->save();

        return redirect()->route('admin.offres.index')
            ->with('success', 'Offre mise à jour.');
    }

    public function destroy(OffreEmploi $offreEmploi)
    {
        $offreEmploi->delete();

        return redirect()->route('admin.offres.index')
            ->with('success', 'Offre supprimée.');
    }

    public function candidatures(OffreEmploi $offreEmploi)
    {
        $offreEmploi->load('candidatures');

        return view('admin.offres.candidatures', [
            'offreEmploi'  => $offreEmploi,
            'candidatures' => $offreEmploi->candidatures,
        ]);
    }

    private function valider(Request $request): array
    {
        return $request->validate([
            'titre'            => 'required|string|max:255',
            'entreprise'       => 'required|string|max:255',
            'ville'            => 'required|string|max:255',
            'type_emploi'      => 'required|string|max:255',
            'salaire'          => 'nullable|string|max:255',
            'description'      => 'required|string',
            'responsabilites'  => 'required|string',
            'exigences'        => 'required|string',
            'est_active'       => 'boolean',
            'date_publication' => 'nullable|date',
        ]);
    }
}
