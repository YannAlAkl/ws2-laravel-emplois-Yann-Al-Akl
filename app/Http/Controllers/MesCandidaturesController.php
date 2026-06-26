<?php

namespace App\Http\Controllers;
use App\Models\Candidature;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Pest\Plugins\Tia\Storage;

class MesCandidaturesController extends BaseController
{
  public function index(Request $request)
   {
        $candidatures = $request->user()
            ->candidatures()
            ->with('offreEmploi')
            ->latest()
            ->paginate(10);

        return view('candidatures.mes-candidatures', compact('candidatures'));
}
    public function show(Request $request, Candidature $candidature)
    {
        abort_unless($candidature->user_id === $request->user()->id, 403);
        $candidature->load('offreEmploi');

        return view('candidatures.detail', compact('candidature'));
    }
    public function cv (Request $request, Candidature $candidature){
        abort_unless($candidature->user_id === $request->user()->id, 403);
        return Storage::disk('local')->download(
            $candidature->cv_chemin,
            $candidature->cv_nom_original,
         );
    }
}
