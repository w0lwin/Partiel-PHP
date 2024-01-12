<?php
require_once("../DAO.php");
require_once '../config.php';  
require_once('Propriete.php');
require_once('Locataire.php');
require_once('GestionFinanciere.php');
require_once('PanelTerminal.php');
require_once('contratLocation.php');

class PanelTerminal{

    // displayMenu() is the main menu of the program
    public function displayMenu($ProprieteDAO){
        echo"Bienvenue dans le panel de gestion Immobilière\n";
        echo"1. Liste des propriétés\n";
        echo"2. Gestion des propriété\n";
        echo"3. Menu des Locataires\n";
        echo"4. Gestion financière\n";

        $choix = readline("Votre choix : ");
        switch($choix){
            case 1:
                $this->displayProprietes($ProprieteDAO);
                break;
            case 2:
                $this->displayGestionProprietes($ProprieteDAO);
                break;
            case 3:
                $this->displayLocatairesMenu($LocataireDAO);
                break;
            case 4:
                $this->displayGestionFinanciereMenu();
                break;
            default:
                echo"Erreur de saisie\n";
                $this->displayMenu();
                break;
        }
    }

    // displayProprietes() displays the list of properties
    public function displayProprete($ProprieteDAO){
        $proprietes = $ProprieteDAO->getProprietes();
        foreach($proprietes as $propriete){
            echo $propriete->getId()." ".$propriete->getAdresse()." ".$propriete->getType()." ".$propriete->getSurface()." ".$propriete->getPrix()." ".$propriete->getEtat()."\n";
        }
        $choix = readline("Votre choix : ");
        $this->displayPropriete($choix);
    }

    // displayPropriete() displays the details of a property
    public function displayGestionProprietes($ProprieteDAO){

        echo"1. Ajouter\n";
        echo"2. Modifier\n";
        echo"3. Supprimer\n";
        echo"4. Retour\n";
        $choix = readline("Votre choix : ");
        switch($choix){
            case 1:
                $this->addPropriete($ProprieteDAO);
                break;
            case 2:
                $this->updatePropriete($id);
                break;
            case 3:
                $this->deletePropriete($id);
                break;
            case 4:
                $this->displayPropriete();
                break;
            default:
                echo"Erreur de saisie\n";
                $this->displayPropriete($id);
                break;
        }
    }

    // addPropriete() adds a property to the database
    public function addPropriete($ProprieteDAO){
        $adresse = readline("Adresse : ");
        $type = readline("Type : ");
        $surface = readline("Surface : ");
        $prix = readline("Prix : ");
        $etat = readline("Etat : ");
        $nombreChambres = readline("Nombre de chambres : ");
        echo("\n");
        echo($adresse);
        $propriete = new Propriete(null,$adresse,$type,$surface,$prix,$etat,$nombreChambres);
        //display propriete
        echo ("adresse : ");
        echo ($propriete->getAdresse());
        echo ("\n");
        echo ("type : ");
        echo ($propriete->getTypeE());
        echo ("\n");
        echo($ProprieteDAO->addPropriete($propriete));

    }

    // updatePropriete() updates a property in the database
    public function updatePropriete($ProprieteDAO,$id){
        $propriete = $ProprieteDAO->getPropriete($id);
        echo $propriete->getId()." ".$propriete->getAdresse()." ".$propriete->getType()." ".$propriete->getSurface()." ".$propriete->getPrix()." ".$propriete->getEtat()."\n";
        $adresse = readline("Adresse : ");
        $type = readline("Type : ");
        $surface = readline("Surface : ");
        $prix = readline("Prix : ");
        $etat = readline("Etat : ");
        $propriete->setAdresse($adresse);
        $propriete->setType($type);
        $propriete->setSurface($surface);
        $propriete->setPrix($prix);
        $propriete->setEtat($etat);
        $ProprieteDAO->updatePropriete($propriete);
        $this->displayGestionProprietes($ProprieteDAO);
    }

    // deletePropriete() deletes a property from the database
    public function deletePropriete($ProprieteDAO,$id){
        $ProprieteDAO->deletePropriete($id);
    }

    // displayGestionFinanciereMenu() displays the financial management menu
    public function displayLocatairesMenu($LocataireDAO){
        echo"1. Liste des locataires\n";
        echo"2. Gestion des locataires\n";
        echo"3. Retour\n";
        $choix = readline("Votre choix : ");
        switch($choix){
            case 1:
                $this->displayLocataires($LocataireDAO);
                break;
            case 2:
                $this->displayGestionLocataires($LocataireDAO);
                break;
            case 3:
                $this->displayMenu();
                break;
            default:
                echo"Erreur de saisie\n";
                $this->displayLocatairesMenu($LocataireDAO);
                break;
        }
    }

    // displayLocataires() displays the list of tenants
    public function displayLocataires($LocataireDAO){

    }
}

$ProprieteDAO = new ProprieteDAO($pdo);
$LocataireDAO = new LocataireDAO($pdo);

$PanelTerminal = new PanelTerminal();
$PanelTerminal->displayMenu($ProprieteDAO);
?>