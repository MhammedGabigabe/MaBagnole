<?php
require_once "BaseModel.php";

class Categorie extends BaseModel {
    private $idCategorie;
    private $nom;
    private $description ;

    public function getId(){
        return $this->idCategorie;
    }

    public function setNom($valeur){
        $this->nom = $valeur;
    }

    public function getNom(){
        return $this->nom;
    }

    public function setDescription($valeur){
        $this->description = $valeur;
    }

    public function getDescription(){
        return $this->description;
    }

    public function ajouterCategorie(){
        $requete = "INSERT INTO categories(nom, description) VALUES (:n, :d);";
        $stmt = $this->db->prepare($requete);
        $stmt->bindParam(":n", $this->nom);
        $stmt->bindParam(":d", $this->description);
        return $stmt->execute();
    }

    
}
?>