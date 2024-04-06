<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Administrateur\Administrateur;

class AccesTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_routes_existes_and_auth(): void
    {
        


        $response = $this->put('/api/profil',[
            'nom' => 'GRANJON',
            'prenom'=>'Julien',
        ]);
        $response->assertStatus(403);

        $response = $this->put('/api/profil',[
            'nom' => 'GRANJON',
            'prenom'=>'Julien',
            'login' => 'Admin',
            'password' => 'passwordwrong',
        ]);
        $response->assertStatus(403);        

        $response = $this->put('/api/profil',[
            'nom' => 'GRANJON',
            'prenom'=>'Julien',
            'login' => 'admin',
            'password' => 'password',
        ]);

        $response->assertStatus(200);
    }
}
