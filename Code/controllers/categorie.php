<?php
require_once "../models/Categorie.php";

$categorie =new Categorie();

if(isset($_POST['ajouter_seul'])){
    
    $categorie->setNom($_POST['nom']);
    $categorie->setDescription($_POST['description']);

    $categorie->ajouterCategorie();
    header("Location: ../views/categories.php");
    exit;
}

if(isset($_POST['ajouter_mass'])){
    $texte = $_POST['categories_list'];
    $lignes = explode("\n",$texte);
    $categories = [];

    foreach($lignes as $ligne){
        $parties = explode(";", $ligne, 2);
        $nom = trim($parties[0] ?? "");
        $desc = trim($parties[1] ?? null);

        if($nom !== ""){
            $categories[] = ['nom'=> $nom, 'desc'=> $desc];
        }
    }
    $categorie->ajouterEnMasse($categories);
    header("Location: ../views/categories.php");
    exit;
}
?>