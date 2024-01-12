<?php




    class ProprieteDAO{
        private $db;

        // Constructor to initialize the PDO object
        public function __construct($db){
            $this->db = $db;
        }

        // getPropriete() returns a Propriete object from the database
        public function getPropriete($id){
            $query = "SELECT * FROM Propriete WHERE id = :id";
            $statement = $this->db->prepare($query);
            $statement->execute(array(':id' => $id));
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            $propriete = new Propriete($result['id'], $result['adresse'], $result['typee'], $result['surface'], $result['prix'], $result['etat']);
            return $propriete;
        }

        // getProprietes() returns an array of Propriete objects from the database
        public function getProprietes(){
            $query = "SELECT * FROM Propriete";
            $statement = $this->db->prepare($query);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            $proprietes = array();
            foreach($result as $row){
                $proprietes[] = new Propriete($row['id'], $row['adresse'], $row['typee'], $row['surface'], $row['prix'], $row['etat']);
            }
            return $proprietes;
        }

        // addPropriete() adds a Propriete object to the database
        public function addPropriete(Propriete $propriete){

            // $query = "INSERT INTO Propriete(adresse, typee, surface, prix, etat) VALUES (:adresse, :typee, :surface, :prix, :etat)";
            // $statement = $this->db->prepare($query);
            // $statement->execute(array(':adresse' => $propriete->getAdresse(), ':typee' => $propriete->getTypee(), ':surface' => $propriete->getSurface(), ':prix' => $propriete->getPrix(), ':etat' => $propriete->getEtat()));

            $query = "INSERT INTO Proprietes(adresse, typee, surface, prix, etat";
            $values = "VALUES (?, ?, ?, ?, ?)";
            $array = [
                $propriete->getAdresse(),
                $propriete->getTypee(),
                $propriete->getSurface(),
                $propriete->getPrix(),
                $propriete->getEtat()
            ];
            
            if($propriete->getNombreChambres() != null){
                $query .= ", nombreChambres";
                $values .= ", ?";
                $array[] = $propriete->getNombreChambres();
            }

            $query .= ") ".$values;

            $statement = $this->db->prepare($query);

            $statement->execute($array);

            return $this->db->lastInsertId();

        }

        // updatePropriete() updates a Propriete object in the database
        public function updatePropriete(Propriete $propriete){
            $query = "UPDATE Propriete SET adresse = :adresse, typee = :typee, surface = :surface, prix = :prix, etat = :etat WHERE id = :id";
            $statement = $this->db->prepare($query);
            $statement->execute(array(':adresse' => $propriete->getAdresse(), ':typee' => $propriete->getTypee(), ':surface' => $propriete->getSurface(), ':prix' => $propriete->getPrix(), ':etat' => $propriete->getEtat(), ':id' => $propriete->getId()));
        }

        // deletePropriete() deletes a Propriete object from the database
        public function deletePropriete($id){
            $query = "DELETE FROM Propriete WHERE id = :id";
            $statement = $this->db->prepare($query);
            $statement->execute(array(':id' => $id));
        }
    }

    class LocataireDAO{
        private $db;

        // Constructor to initialize the PDO object
        public function __construct($db){
            $this->db = $db;
        }
            
        // getLocataire() returns a Locataire object from the database
        public function getLocataire($id){
            $query = "SELECT * FROM Locataire WHERE id = :id";
            $statement = $this->db->prepare($query);
            $statement->execute(array(':id' => $id));
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            $locataire = new Locataire($result['id'], $result['nom'], $result['prenom'], $result['dateNaissance'], $result['refBancaire'], $result['historique']);
            return $locataire;
        }

        // getLocataires() returns an array of Locataire objects from the database
        public function getLocataires(){
            $query = "SELECT * FROM Locataire";
            $statement = $this->db->prepare($query);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            $locataires = array();
            foreach($result as $row){
                $locataires[] = new Locataire($row['id'], $row['nom'], $row['prenom'], $row['dateNaissance'], $row['refBancaire'], $row['historique']);
            }
            return $locataires;
        }

        public function addLocataire(Locataire $locataire){
            $query = "INSERT INTO Locataire(nom, prenom, dateNaissance, refBancaire, historique) VALUES (:nom, :prenom, :dateNaissance, :refBancaire, :historique)";
            $statement = $this->db->prepare($query);
            $statement->execute(array(':nom' => $locataire->getNom(), ':prenom' => $locataire->getPrenom(), ':dateNaissance' => $locataire->getDateNaissance(), ':refBancaire' => $locataire->getRefBancaire(), ':historique' => $locataire->getHistorique()));
        }

        public function updateLocataire(Locataire $locataire){
            $query = "UPDATE Locataire SET nom = :nom, prenom = :prenom, dateNaissance = :dateNaissance, refBancaire = :refBancaire, historique = :historique WHERE id = :id";
            $statement = $this->db->prepare($query);
            $statement->execute(array(':nom' => $locataire->getNom(), ':prenom' => $locataire->getPrenom(), ':dateNaissance' => $locataire->getDateNaissance(), ':refBancaire' => $locataire->getRefBancaire(), ':historique' => $locataire->getHistorique(), ':id' => $locataire->getId()));
        }

        public function deleteLocataire($id){
            $query = "DELETE FROM Locataire WHERE id = :id";
            $statement = $this->db->prepare($query);
            $statement->execute(array(':id' => $id));
        }

    }


?>