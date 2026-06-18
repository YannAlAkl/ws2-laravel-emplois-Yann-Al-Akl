<?php

namespace App\Http\Controllers\Admin;

use App\Models\Candidature;
use App\Models\OffreEmploi;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Storage;

class CandidatureController extends BaseController
{
    public function postuler(OffreEmploi $offreEmploi)
    {
        return view('candidatures.postuler', compact('offreEmploi'));
    }

    public function soumettreCandidature(Request $request, OffreEmploi $offreEmploi)
    {
        $request->validate([
            'prenom'    => 'required|string|max:255',
            'nom'       => 'required|string|max:255',
            'courriel'  => 'required|email|max:255',
            'telephone' => 'nullable|string|max:20',
            'message'   => 'nullable|string',
            'cv'        => 'required|file|mimes:pdf,doc,docx,txt,rtf,odt|max:2048',
        ], [
            'cv.mimes' => 'Le CV doit etre un fichier PDF, DOC, DOCX, TXT, RTF ou ODT.',
            'cv.max'   => 'Le CV ne doit pas depasser 2 Mo.',
        ]);

        $fichier  = $request->file('cv');
        $cvChemin = $fichier->store('cvs', 'local');

        $candidature = new Candidature();
        $candidature->offre_emploi_id = $offreEmploi->id;
        $candidature->prenom          = $request->prenom;
        $candidature->nom             = $request->nom;
        $candidature->courriel        = $request->courriel;
        $candidature->telephone       = $request->telephone;
        $candidature->message         = $request->message;
        $candidature->cv_chemin       = $cvChemin;
        $candidature->cv_nom_original = $fichier->getClientOriginalName();
        $candidature->cv_type_mime    = $fichier->getClientMimeType();
        $candidature->cv_taille       = $fichier->getSize();
        $candidature->statut          = 'recu';
        $candidature->save();

        return redirect()->route('emplois.index')
            ->with('success', 'Candidature soumise avec succes. Merci !');
    }

    public function cv(Request $request, Candidature $candidature)
    {
        abort_unless(Storage::disk('local')->exists($candidature->cv_chemin), 404);

        if ($request->boolean('download')) {
            return Storage::disk('local')->download(
                $candidature->cv_chemin,
                $candidature->cv_nom_original
            );
        }

        return Storage::disk('local')->response(
            $candidature->cv_chemin,
            $candidature->cv_nom_original,
            ['Content-Type' => $candidature->cv_type_mime]
        );
    }
}
