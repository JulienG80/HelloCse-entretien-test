<?php

namespace App\Commentaire;

use DateTime;

Class Commentaire {

    private String $contenu;
    private Int $idAdministrateur;
    private Int $idProfil;
    private DateTime $timeCommentaire;

    public function __construct() {
        
    }
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
    public function setTimeCommentaire(DateTime $timeCommentaire) {
        $this->timeCommentaire = $timeCommentaire;
    }
    public function setContenu(String $contenu) {
        $this->contenu = $contenu;
    }




}