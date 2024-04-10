<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Administrateur\Administrateur;

use function PHPUnit\Framework\assertNotEquals;
use function PHPUnit\Framework\assertTrue;

class ProfilTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_add_profil(): void
    {
        //Test route add profil with wrong password
        $response = $this->put('/api/profil',[
            'nom' => 'GRANJON',
            'prenom'=>'Julien error',
            'login' => 'Admin',
            'password' => 'passwordwrong',
        ]);        
        $response->assertStatus(401);

        //Test route add profil with good password
        $response = $this->put('/api/profil',[
            'nom' => 'GRANJON',
            'prenom'=>'Julien',
            'login' => 'Admin',
            'password' => 'PassWord',
        ]); 
        $response->assertStatus(200);
    }

    public function test_get_profil(): void
    {
        $response = $this->get('/api/profil');
        $response->dump();
        $response->json();
        $response->assertStatus(200);
    }

    public function test_get_admin_profil(): void
    {
        $response = $this->POST('/api/profil',[           
            'login' => 'Admin',
            'password' => 'PassWord',
        ]);
        $response->dump();
        $response->assertStatus(200);
    }

    public function test_update_profil(): void
    {
        $response = $this->POST('/api/profil/2',[           
            'login' => 'Admin',
            'password' => 'PassWord',
            'prenom' => 'mack',
            'image' =>  'data:image/png;base64,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',
        ]);
        $response->assertStatus(200);
    }

    public function test_delete_profil(): void
    {
        $response = $this->delete('/api/profil/1',[           
            'login' => 'Admin',
            'password' => 'PassWord',
        ]);
        $response->assertStatus(200);
    }

       
}
