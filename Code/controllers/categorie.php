<?php
require_once "../models/Categorie.php";

if(isset($_POST['ajouter_seul'])){
    $categorie =new Categorie();

    $categorie->setNom($_POST['nom']);
    $categorie->setDescription($_POST['description']);

    $categorie->ajouterCategorie();
    header("Location: ../views/categories.php");
    exit;
}
?>