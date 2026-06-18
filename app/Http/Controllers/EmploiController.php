<?php

namespace App\Http\Controllers;

use App\Models\OffreEmploi;
use Illuminate\Routing\Controller as BaseController;

class EmploiController extends BaseController
{
    public function show()
    {
        $offreEmplois = OffreEmploi::where('est_active', true)
            ->orderByDesc('date_publication')
            ->get();

        return view('emplois.show', compact('offreEmplois'));
    }

    public function showEmploi(OffreEmploi $offreEmploi)
    {
        $emploi = $offreEmploi;

        return view('emplois.offreEmploi', compact('emploi'));
    }
}
