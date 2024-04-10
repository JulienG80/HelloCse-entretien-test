<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Administrateur\Administrateur;

use function PHPUnit\Framework\assertNotEquals;
use function PHPUnit\Framework\assertTrue;

class AuthentificationTest extends TestCase
{
    /**
     * Test que seul les bons identifiants sont acceptés
     */
    public function test__auth(): void
    {
        $response = $this->put('/api/profil',[
            'login' => 'Admin',
            'password' => 'passwordwrong',
        ]);
        $response->assertStatus(401);    
        
        $response = $this->put('/api/profil',[
            'login' => 'Admin',
            'password' => 'passwordWrong',
        ]);
        $response->assertStatus(401);    

        $response = $this->put('/api/profil',[
            'login' => 'admin',
            'password' => 'PassWord',
        ]);

        $response->assertStatus(302);
    }
}
