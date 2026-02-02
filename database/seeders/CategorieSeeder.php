<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            ['nom' => 'Action',  'created_at' => now(), 'updated_at' => now()],
            ['nom' => 'Aventure','created_at' => now(), 'updated_at' => now()],
            ['nom' => 'Comédie', 'created_at' => now(), 'updated_at' => now()],
            ['nom' => 'Drame',   'created_at' => now(), 'updated_at' => now()],
            ['nom' => 'Horreur', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
