<?php

class Locataire{
    // it's a good practice to declare the attributes as private.
    private $id;
    private $nom;
    private $prenom;
    private $dateNaissance;
    private $refBancaire;
    private $historique;

    public function __construct($I,$N,$P,$D,$R,$H){
        $this->id = $I;
        $this->nom = $N;
        $this->prenom = $P;
        $this->dateNaissance = $D;
        $this->refBancaire = $R;
        $this->historique = $H;
    }

    // getters and setters
    public function getId(){
        return $this->id;
    }

    public function getNom(){
        return $this->nom;
    }

    public function getPrenom(){
        return $this->prenom;
    }

    public function getDateNaissance(){
        return $this->dateNaissance;
    }

    public function getRefBancaire(){
        return $this->refBancaire;
    }

    public function getHistorique(){
        return $this->historique;
    }

    public function setNom($N){
        $this->nom = $N;
    }

    public function setPrenom($P){
        $this->prenom = $P;
    }

    public function setDateNaissance($D){
        $this->dateNaissance = $D;
    }

    public function setRefBancaire($R){
        $this->refBancaire = $R;
    }

    public function setHistorique($H){
        $this->historique = $H;
    }
}




?>