<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;

Class Administrateur extends User {
    
    use HasFactory;

    protected $fillable = ['login','password'];

    public $timestamps = false;
   
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
    public function getId() {
        return $this->id;
    }
    public function setId(int $id) {
        $this->id = $id;
    }
    public function IsAuth(String $passwordTest) {
        return password_verify((string) $passwordTest ,$this->attributes['password']);
    }
    
}