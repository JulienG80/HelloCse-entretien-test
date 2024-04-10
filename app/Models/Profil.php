<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Validation\Rules\ImageFile;
use Illuminate\Database\Eloquent\Model;


enum STATUT {
    case ACTIF;
    case INACTIF;
    case EN_ATTENTE;

    public static function random(): string
    {
        $arr = array_column(self::cases(), 'name');

        return $arr[array_rand($arr)];
    }
}

class Profil extends Model {    

    use HasFactory;
    public $fillable = ['nom','prenom','idCreateur'];

    protected $hidden = ['statut'];
   

    public function setNom(string $nom) {
        $this->nom = $nom;
    }
    public function getNom() {
        return $this->nom;
    }
    public function setPrenom(String $prenom) {
        $this->prenom = $prenom;   
    }
    public function getPrenom() {
        return $this->prenom;
    }
    public function setIdCreateur($idCreateur) { 
        $this->idCreateur = $idCreateur; 
    }
    public function getIdCreateur() {
        return $this->idCreateur;
    }
    public function setImage(ImageFile $image) {
        $this->image = $image;
    }
    public function getImage() {
        return $this->image;
    }
    public function setStatut(STATUT $statut) {
        $this->statut = $statut;
    }
    public function getStatut() {
        return $this->statut;
    }    
}
