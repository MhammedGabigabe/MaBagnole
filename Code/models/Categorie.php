<?php
require_once "BaseModel.php";

class Categorie extends BaseModel {
    private $idCategorie;
    private $nom;
    private $description ;

    public function setId($valeur){
        $this->idCategorie = $valeur;
    }

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
        $requete = "INSERT INTO categories (nom, description) VALUES (:n, :d);";
        $stmt = $this->db->prepare($requete);
        $stmt->bindParam(":n", $this->nom);
        $stmt->bindParam(":d", $this->description);
        return $stmt->execute();
    }

    public function ajouterEnMasse($categories){
        $requete = "INSERT INTO categories (nom, description) VALUES (:n, :d)";
        $stmt = $this->db->prepare($requete);

        foreach ($categories as $cat) {
                $stmt->bindValue(":n", $cat['nom']);
                $stmt->bindValue(":d", $cat['desc']);
                $stmt->execute();
        }
    }

    public function getAll(){
        $requete = "SELECT *FROM categories";
        $stmt = $this->db->prepare($requete);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function supprimerCategorie($id){
        $requete = "DELETE FROM categories WHERE id_categorie = :id;";
        $stmt = $this->db->prepare($requete);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
    }

    public function getById($id){
        $requete = "SELECT * FROM categories WHERE id_categorie = :id;";
        $stmt = $this->db->prepare($requete);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function modifierCategorie(){
        $requete = "UPDATE categories SET nom = :n, description = :d WHERE id_categorie = :id;";
        $stmt = $this->db->prepare($requete);
        $stmt->bindParam(":n", $this->nom);
        $stmt->bindParam(":d", $this->description);
        $stmt->bindParam(":id",$this->idCategorie);
        return $stmt->execute();
    }
}
?>