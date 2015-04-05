<?php
include 'connexionBDD.php';

// requête pour vérifier la présence du client dans la BDD
$resultat=$connexion->query("SELECT * from USER where LOGIN = '".$_POST['login']."' AND PASSWORD = '".$_POST['Password']."' AND LOGIN != 'ADMIN' AND LOGIN != ''");

if ($ligne = $resultat->fetch())
    { 
    session_start();

    $_SESSION['iduser']=$ligne['ID_USER'];
    $_SESSION['nom']=$ligne['NOM'];
    $_SESSION['prenom']=$ligne['PRENOM'];
    $_SESSION['metier']=$ligne['METIER'];
    $_SESSION['mail']=$ligne['MAIL'];
    $_SESSION['login']=$ligne['LOGIN'];
    $_SESSION['password']=$ligne['PASSWORD'];

    header('location:menu.php');
    }

    else if ($_POST['login'] == "ADMIN" AND $_POST['Password'] == "administrateur")
    {
        header('location:espaceAdmin.php');
    }
    
    else
    {
        // renvoie à l'index si le client n'existe pas
        header('location:acceuil.php?erreur');
    }

?>