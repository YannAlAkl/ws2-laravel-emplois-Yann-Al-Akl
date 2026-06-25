<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class MesCandidaturesController extends BaeController
{
  public function index(Request $request)
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
        abort_unless($candidature->user_id === $request->user()->id, 403); // bloque l'accès par URL
        $candidature->load('offreEmploi');

        return view('candidatures.detail', compact('candidature'));
    }
   }


}
