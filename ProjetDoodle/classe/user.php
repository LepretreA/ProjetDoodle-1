<?php
include 'bdd.php';
class User {
    private $id_;
    private $nom_;
    private $plage_;
    private $color_;

    public function __construct($id, $nom, $plage, $color) {
        $this->id_ = $id;
        $this->nom_ = $nom;
        $this->plage_ = $plage;
        $this->color_ = $color;
    }

    public function CreateUser($nom1, $plage1, $color1)
    {
        $requete = "SELECT * FROM User WHERE `Nom` = '".$nom1."';";
        $result = $GLOBALS["pdo"]->query($requete);
        if($result->rowCount() > 0) {
            $tab = $result->fetch();
            $this->id_ = $tab['ID'];
            $this->nom_ = $tab['Nom'];
            $this->plage_ = $tab['Plage'];
            $this->color_ = $tab['Color'];
        }
        else{
            $requete = "INSERT INTO `User`(`Nom`, `Plage`, `Color`) VALUES ('" . $nom1 . "','" . $plage1 . "', '" . $color1 . "')";
            $result = $GLOBALS["pdo"]->query($requete);
            $this->id_ = $GLOBALS["pdo"]->lastInsertId();
            $this->nom_ = $nom1;
            $this->plage_ = $plage1;
            $this->color_ = $color1;
    
        }
    }
    public function getUserById($id){
        $requete = "SELECT * FROM `User` WHERE `ID` = '".$id."'";
        $resultat = $GLOBALS["pdo"]->query($requete);
        if($tab = $resultat->fetch()){
            $this->id_ = $tab['id'];
            $this->nom_ = $tab['nom'];
            $this->plage_ = $tab['plage'];
            $this->color_ = $tab['color'];
        }
    }
}
?>