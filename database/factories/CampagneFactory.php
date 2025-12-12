<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Campagne;

class CampagneFactory extends Factory
{
    protected $model = Campagne::class;

    public function definition(): array
    {
        return [
            // TODO: Replace these with your actual columns from Campagne migration/model
            'name' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(),
            'start_date' => $this->faker->date(),
            'end_date' => $this->faker->date(),
            'budget' => $this->faker->numberBetween(1000, 100000),
            'status' => $this->faker->randomElement(['draft', 'active', 'paused', 'completed']),
        ];
    }
}