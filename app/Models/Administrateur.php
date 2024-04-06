<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

Class Administrateur extends Model {
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = "Administrateur";
    protected $primaryKey = 'login';
    public $timestamps = false;
    protected $fillable = [
        'login',
        'password',
    ];

    private String $login;
    private String $password;

    public function __construct () {    
    }

    public static function create(String $login, String $password) {
        $administrateur = new Administrateur();
        $administrateur->login = $login;
        $administrateur->password = $password;
        $administrateur->save();
        return $administrateur;
    }
    public function getLogin() {
       return $this->login;
    }
    public function getPassword() {
        return $this->password;
    }

    public function setLogin(String $login) {
        $this->login = $login;
    }
    public function setPassword(String $password) {
        $this->password = $password;
    }
    
}