<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call(([
            Profil_Seeder::class,
            Commentaire_Seeder::class,
            Administrateur_Seeder::class,
        ]));

        
    }
}
