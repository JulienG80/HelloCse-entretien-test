<?php

namespace Database\Seeders;

use App\Models\Administrateur;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Administrateur_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Administrateur::factory()->create(
            [
                'login' => 'admin',
                'password' => password_hash('PassWord',PASSWORD_DEFAULT)
             ]
        );

    }
}
