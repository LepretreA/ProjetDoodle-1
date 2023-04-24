<?php
include 'bdd.php';
include 'index.php';


/*
$retour=array();
$Semaine = $_POST['numSemaine'];
$case = array($_GET["Plage"]);
*/
//$json = array("Semaine"=> $_POST["Semaine"] ,"Case"=>$_POST['Case']) ;
//$encoded = json_encode($json);
//$Plage = json_encode($_POST['Plage']);


$pseudo = $_SESSION['nom_utilisateur'];
$id = $_SESSION['id'];
$color = 'HH12FF';

$data=json_decode(file_get_contents('php://input'),true);

$array = json_encode($data);

echo $data['Semaine'];
echo $data['Case'];


//$numeroCalendrier = val cal dans l'url; (trouver comment la recup)


//si ta rien -> INSERT si tu a un truc -> UPDATE

$requete = "SELECT `ID` FROM User WHERE `Nom` = '" . $pseudo . "';";
$result = $GLOBALS["pdo"]->query($requete);
if ($result == false) {
    echo 'la requete fonctionne ';
    $req = "INSERT INTO `User`('Nom','Plage','Color') VALUES ('" .$pseudo. "','" .$array. "','".$color."')";
    $GLOBALS["pdo"]->query($req);
}else{
    $req = "UPDATE User set Plage='".$array."' where ID = '".$_SESSION['id']."'";
        $GLOBALS["pdo"]->query($req);

}
?>