<?php
   session_start();
   if ( (isset($_SESSION['usernameClient']) && isset($_SESSION['passwordClient']) )){
       header("location:../index.php");
   }
   
$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$login=$_POST['login'];
$password=$_POST['password'];
?>

<?php

try
{
	$bdd = new PDO('mysql:host=localhost;dbname=lyk;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

$userReq = $bdd -> prepare('INSERT INTO client(nom_user, prenom ,login,password)
                            VALUES (:nom_user , :prenom ,:login,:password)');
$userReq -> execute(array(
    'nom_user' => $nom,
    'prenom' => $prenom,
    'login' => $login,
    'password' => $password

)) ;

?>                       
                          



