<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Client;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $clients = [
            [
                'name' => 'Alice Martin',
                'email' => 'alice.martin@example.com',
                'campagne_nom' => 'Campagne A',
                'adresse' => '10 Rue de la Paix, Paris, FR',
                'telephone' => '+33 1 23 45 67 89',
            ],
            [
                'name' => 'Jean Dupont',
                'email' => 'jean.dupont@example.com',
                'campagne_nom' => 'Campagne B',
                'adresse' => '25 Avenue Victor Hugo, Lyon, FR',
                'telephone' => '+33 4 78 00 00 00',
            ],
            [
                'name' => 'Sophie Bernard',
                'email' => 'sophie.bernard@example.com',
                'campagne_nom' => 'Campagne C',
                'adresse' => '2 Boulevard Saint-Germain, Paris, FR',
                'telephone' => '+33 1 44 00 00 00',
            ],
        ];

        foreach ($clients as $data) {
            Client::create($data);
        }

        // Optionally also generate additional fake clients
        // Client::factory()->count(20)->create();
    }
}
