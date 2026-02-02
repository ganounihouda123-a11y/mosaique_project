<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Campagne;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class CampagneFactory extends Factory
{
    protected $model = Campagne::class;

    public function definition(): array
    {
        $dateDebut = Carbon::instance($this->faker->dateTimeBetween('2025-01-01', '2025-12-31'));
        $dateFin = (clone $dateDebut)->addDays(14);

        return [
            // TODO: Replace these with your actual columns from Campagne migration/model
            'date_debut' => $dateDebut->toDateString(),
            'date_fin' => $dateFin->toDateString(),
            'type' => $this->faker->randomElement(['Classique', 'Hors écran']),
            'ranking' => $this->faker->randomElement(['active', 'non_active']),
            'spot' => $this->faker->numberBetween(1, 50),
            'id_client' => DB::table('clients')->inRandomOrder()->value('id'),
            'id_categorie' => DB::table('categories')->inRandomOrder()->value('id'),
            // created_at/updated_at can be omitted; Eloquent handles timestamps by default
        ];
    }
}