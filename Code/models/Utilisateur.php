<?php
require_once "BaseModel.php";

abstract class Utilisateur extends BaseModel{
    protected $idUtilisateur;
    protected $nom;
    protected $email;
    protected $mdp;
    protected $role;

    public function __set($p, $v){
        if(property_exists($this, $p)){
            $this->$p = $v;
        }else{
            throw new Exception("la propriété '$p' n'existe pas dans la classe" .get_class($this));
        }
    }

    public function __get($p){
        if(property_exists($this,$p)){
            return $this->$p;
        }else{
            throw new Exception("la propriété '$p' n'existe pas dans la classe" .get_class($this));
        }
    }

}

?>