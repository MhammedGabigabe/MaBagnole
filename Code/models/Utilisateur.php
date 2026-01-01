<?php
require_once "BaseModel.php";

abstract class Utilisateur extends BaseModel{
    protected $idUtilisateur;
    protected $nom;
    protected $email;
    protected $mdp;
    protected $role;



}

?>