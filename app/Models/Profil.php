<?php

namespace App\Models;

use DateTime;
use Illuminate\Validation\Rules\ImageFile;


class Profil {    

    private String $nom;

    private String $prenom;
    private Int $idCreateur;
    private ImageFile $image;
    private STATUT $statut;
    private DateTime $time;
    public function __construct(String $nom, String $prenom) {
        return true;
    }

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
    public function setTime(DateTime $time) {
        $this->time = $time;
    }
    public function getTime() {
        return $this->time;
    }        
}

enum STATUT {
    case ACTIF;
    case INACTIF;
    case EN_ATTENTE;
}