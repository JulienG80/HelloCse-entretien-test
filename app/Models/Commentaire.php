<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

Class Commentaire extends Model{

    use HasFactory;

    protected $fillable = ['contenu','idAdministrateur','idProfil','timeCommentaire'];

    public function getContenu(): String {
        return $this->contenu;
    }
    public function getIdAdministrateur(): Int {
        return $this->idAdministrateur;
    }
    public function getIdProfil(): Int {
        return $this->idProfil;
    }
    public function getTimeCommentaire(): DateTime {
        return $this->timeCommentaire;
    }
    public function setIdAdministrateur(Int $idAdministrateur) {
        $this->idAdministrateur = $idAdministrateur;
    }
    public function setIdProfil(Int $idProfil) {
        $this->idProfil = $idProfil;
    }
    public function setContenu(String $contenu) {
        $this->contenu = $contenu;
    }
}