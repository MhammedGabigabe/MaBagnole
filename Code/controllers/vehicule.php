<?php
require_once "../models/Vehicule.php";

$vehicule = new Vehicule();

$listeVehicules = $vehicule->getAll();

if(isset($_POST['ajouter_seul'])){
    $vehicule->immatriculation = $_POST['immatriculation'];
    $vehicule->modele = $_POST['modele'];
    $vehicule->marque = $_POST['marque'];
    $vehicule->prixJour = $_POST['prix_jour'];
    $vehicule->image = $_POST['image'];
    $vehicule->boiteVitesse = $_POST['boite_vitesse'];
    $vehicule->motorisation = $_POST['motorisation'];
    $vehicule->idCategorie = $_POST['id_categ'];

    $vehicule->ajouterVehicule();
    header("Location: ../views/vehicules.php");
    exit;
}
?>