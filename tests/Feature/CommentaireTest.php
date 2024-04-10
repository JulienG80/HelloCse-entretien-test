<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

use function PHPUnit\Framework\assertNotEquals;
use function PHPUnit\Framework\assertTrue;

class CommentaireTest extends TestCase
{
    /**
     * A basic test example.
     */
    //On pourrait tester que le commentaire existe bien et qu'il est relié à un profil existant
    public function test_add_commentaire(): void
    {
        $response = $this->post('/api/profil/1/commentaire',[
            'contenu' => 'Message de test',
            'login' => 'Admin',
            'password' => 'PassWord',
        ]);        
        $response->assertStatus(200);
    }

    public function test_bad_commentaire(): void
    {
        $response = $this->post('/api/profil/999/commentaire',[
            'contenu' => 'Message de test',
            'login' => 'Admin',
            'password' => 'PassWord',
        ]);        
        $response->assertStatus(200);

       
    }       
}
