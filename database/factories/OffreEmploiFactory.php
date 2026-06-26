<?php

namespace Database\Factories;

use App\Models\OffreEmploi;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<OffreEmploi>
 */
class OffreEmploiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
         return [
            'titre'=> fake()->jobTitle(),
            'entreprise'=> fake()->company(),
            'ville'=> fake()->randomElement(['Montréal','Québec','Laval','Sherbrooke',
            'Gatineau']),
             'type_emploi'=> fake()->randomElement(['Temps plein','Temps partiel','Contrat',
             'Stage']),
             'salaire'=> fake()->numberBetween(45, 110).' 000 $',
             'description'=> fake()->paragraph(4),
             'responsabilites' => implode("\n", fake()->sentences(3)),
             'exigences'=> implode("\n", fake()->sentences(3)),
             'est_active'=> fake()->boolean(80),
             'date_publication' => fake()->dateTimeBetween('-2 months', 'now')
             ->format('Y-m-d'),];

    }
}
