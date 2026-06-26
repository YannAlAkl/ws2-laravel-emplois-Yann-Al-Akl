<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\OffreEmploiResource;
use App\Models\OffreEmploi;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class OffreEmploiController extends BaseController
{
    public function index(Request $request)
    {
        $offres = OffreEmploi::withCount('candidatures')
            ->where('est_active', true)
            ->paginate($request->integer('par_page', 10));

        return OffreEmploiResource::collection($offres);
    }

    public function show(OffreEmploi $offreEmploi)
    {
        return new OffreEmploiResource($offreEmploi->loadCount('candidatures'));
    }
}
