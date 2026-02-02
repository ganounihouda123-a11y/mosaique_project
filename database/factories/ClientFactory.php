<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Client;

class ClientFactory extends Factory
{
    protected $model = Client::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'          => $this->faker->name(),
            'email'         => $this->faker->unique()->safeEmail(),
            'campagne_nom'  => $this->faker->company(),
            'adresse'       => $this->faker->address(),
            'telephone'     => $this->faker->phoneNumber(),
        ];
    }
}
