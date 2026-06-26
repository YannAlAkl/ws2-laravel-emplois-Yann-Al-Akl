<?php

namespace Database\Seeders;

use App\Models\OffreEmploi;
use App\Models\User;
use App\Models\Candidature;
use Illuminate\Database\Seeder;


class OffreEmploiSeeder extends Seeder
{
    public function run(): void
    {

        $candidatTest = User::factory()->create([
            'name'  => 'Yann Test',
            'email' => 'Yann@example.com',
        ]);
        $candidats = User::factory(5)->create()->push($candidatTest);


        $offres = OffreEmploi::factory(30)->create();


        foreach ($candidats as $candidat) {
            Candidature::factory(rand(2, 6))->create([
                'user_id'         => $candidat->id,
                'offre_emploi_id' => $offres->random()->id,
                'courriel'        => $candidat->email,
            ]);
        }
    }
}
