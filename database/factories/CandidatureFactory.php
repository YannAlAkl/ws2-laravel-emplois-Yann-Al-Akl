<?php

namespace Database\Factories;

use App\Models\Candidature;
use App\Models\OffreEmploi;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Candidature>
 */
class CandidatureFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
{
    return [
            'offre_emploi_id' => OffreEmploi::factory(),
            'user_id'         => null,
            'prenom'          => fake()->firstName(),
            'nom'             => fake()->lastName(),
            'courriel'        => fake()->safeEmail(),
            'telephone'       => fake()->phoneNumber(),
            'message'         => fake()->paragraph(),
            'cv_chemin'       => 'cvs/exemple.pdf',
            'cv_nom_original' => 'cv.pdf',
            'cv_type_mime'    => 'application/pdf',
            'cv_taille'       => fake()->numberBetween(20000, 500000),
            'statut'          => fake()->randomElement(['recu','en_revision','accepte','refuse']),
        ];
    }
}
