<?php

    class Propriete{
        // it's a good practice to declare the attributes as private.
        private $id;
        private $adresse;
        private $typee;
        private $surface;
        private $prix;
        private $etat;
        private $nombreChambres;
        
        public function _construct($I, $A, $T, $S, $P, $E, $NC){
            $this->id = $I;
            $this->$adresse = $A;
            $this->$typee = $T;
            $this->$surface = $S;
            $this->$prix = $P;
            $this->$etat = $E;
            $this->$nombreChambres = $NC;
        }

        // getters and setters
        public function getId(){
            return $this->id;
        }

        public function getAdresse(){
            return $this->adresse;
        }

        public function getTypee(){
            return $this->typee;
        }

        public function getSurface(){
            return $this->surface;
        }

        public function getPrix(){
            return $this->prix;
        }

        public function getEtat(){
            return $this->etat;
        }

        public function getNombreChambres(){
            return $this->nombreChambres;
        }

        public function setAdresse($A){
            $this->adresse = $A;
        }

        public function setType($T){
            $this->type = $T;
        }

        public function setSurface($S){
            $this->surface = $S;
        }

        public function setPrix($P){
            $this->prix = $P;
        }

        public function setEtat($E){
            $this->etat = $E;
        }

        public function setNombreChambres($NC){
            $this->nombreChambres = $NC;
        }
    }

?>