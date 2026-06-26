<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OffreEmploiResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
   public function toArray(Request $request): array
{
    return [
        'id'               => $this->id,
        'titre'            => $this->titre,
        'entreprise'       => $this->entreprise,
        'ville'            => $this->ville,
        'type_emploi'      => $this->type_emploi,
        'salaire'          => $this->salaire,
        'est_active'       => $this->est_active,
        'date_publication' => $this->date_publication,
        'nb_candidatures'  => $this->whenCounted('candidatures'),
    ];
}
}
