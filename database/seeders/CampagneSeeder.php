<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Campagne;

// Add imports for seeding without factories
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class CampagneSeeder extends Seeder
{
    public function run(): void
    {
        // Adjust the count as needed
        // Campagne::factory()->count(20)->create();

        // Seed campagnes without factories, honoring foreign keys
        $clientIds = DB::table('clients')->pluck('id')->all();
        $categoryIds = DB::table('categories')->pluck('id')->all();

        if (empty($clientIds) || empty($categoryIds)) {
            // Prerequisite data missing; skip seeding to avoid FK errors
            return;
        }

        $now = Carbon::now();
        $types = ['Classique', 'Hors écran'];
        $rankings = ['active', 'non_active'];

        $rows = [];
        for ($i = 1; $i <= 10; $i++) {
            $dateDebut = Carbon::create(2025, 1, 1)->addDays(($i - 1) * 7);
            $dateFin = (clone $dateDebut)->addDays(14);

            $rows[] = [
                'date_debut' => $dateDebut->toDateString(),
                'date_fin' => $dateFin->toDateString(),
                'type' => $types[array_rand($types)],
                'ranking' => $rankings[array_rand($rankings)],
                'spot' => random_int(1, 50),
                'id_client' => $clientIds[array_rand($clientIds)],
                'id_categorie' => $categoryIds[array_rand($categoryIds)],
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        DB::table('campagnes')->insert($rows);
        
    }
}