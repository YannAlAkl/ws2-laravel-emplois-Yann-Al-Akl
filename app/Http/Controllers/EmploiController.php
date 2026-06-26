<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\OffreEmploi;
use Illuminate\Routing\Controller as BaseController;

class EmploiController extends BaseController
{
    public function show(Request $request)
{
    $parPage = (int) $request->input('par_page', 10);
    if (! in_array($parPage, [10, 25, 50])) {
        $parPage = 10;
    }

    $offreEmplois = OffreEmploi::where('est_active',true)
        ->orderByDesc('date_publication')
        ->paginate($parPage)
        ->withQueryString();

    return view('emplois.show', compact('offreEmplois'));
}

    public function showEmploi(OffreEmploi $offreEmploi)
    {
        $emploi = $offreEmploi;

        return view('emplois.offreEmploi', compact('emploi'));
    }
}
