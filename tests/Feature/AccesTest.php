<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Administrateur\Administrateur;

use function PHPUnit\Framework\assertNotEquals;
use function PHPUnit\Framework\assertTrue;

class AccesTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_routes_existes_and_auth(): void
    {
        //Test route add profil
        $response = $this->put('/api/profil');        
        assertTrue( $response->getStatusCode() !== 404);        
        //Test that route "add profil" need auth
        $response->assertStatus(302);

        //Test route add commentaire
        $response = $this->post('/api/profil/0/commentaire');
        assertTrue( $response->getStatusCode() != 404);
        //Test that route "add commentaire" need auth
        $response->assertStatus(302);

        //Test route get all profils
        $response = $this->get('/api/profil',[
        ]);
        assertTrue( $response->getStatusCode() != 404);
        $response->assertStatus(200);  

        //Test route edit profil
        $response = $this->post('/api/profil',[
        ]);
        assertTrue( $response->getStatusCode() != 404);
        $response->assertStatus(302);

        //Test route delete profil
        $response = $this->delete('/api/profil/{1}',[
        ]);
        assertTrue( $response->getStatusCode() != 404);
        $response->assertStatus(302);  
    }
}
