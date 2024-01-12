<?php
    class ContratLocation{
        // it's a good practice to declare the attributes as private.
        private $idContrat;
        private $idPropriete;
        private $idLocataire;
        private $dateDebut;
        private $dateFin;
        private $loyer;
        private $paiementEffectue;
        private $etatContrat;

        public function __construct($IC,$IP,$IL,$DD,$DF,$L,$P,$E){
            $this->idContrat = $IC;
            $this->idPropriete = $IP;
            $this->idLocataire = $IL;
            $this->dateDebut = $DD;
            $this->dateFin = $DF;
            $this->loyer =$L;
            $this->paiementEffectue = $P;
            $this->etatContrat = $E;
        }

        // getters and setters
        public function getIdContrat(){
            return $this->idContrat;
        }

        public function getIdPropriete(){
            return $this->idPropriete;
        }

        public function getIdLocataire(){
            return $this->idLocataire;
        }

        public function getDateDebut(){
            return $this->dateDebut;
        }

        public function getDateFin(){
            return $this->dateFin;
        }

        public function getLoyer(){
            return $this->loyer;
        }

        public function getPaiementEffectue(){
            return $this->paiementEffectue;
        }

        public function getEtatContrat(){
            return $this->etatContrat;
        }

        public function setIdPropriete($IP){
            $this->idPropriete = $IP;
        }

        public function setIdLocataire($IL){
            $this->idLocataire = $IL;
        }

        public function setDateDebut($DD){
            $this->dateDebut = $DD;
        }

        public function setDateFin($DF){
            $this->dateFin = $DF;
        }

        public function setLoyer($L){
            $this->loyer = $L;
        }

        public function setPaiementEffectue($P){
            $this->paiementEffectue = $P;
        }

        public function setEtatContrat($E){
            $this->etatContrat = $E;
        }


    }






?>