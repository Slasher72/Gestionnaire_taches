<html>
  <head>
    <link rel="stylesheet" href="style_enregistreruser.css" type="text/css">
    <link rel="stylesheet" href="style.css" type="text/css">
  </head>
  <body>

<?php
include 'connexionBDD.php';

echo "<h1>Resultat d'inscription:</h1>";


  if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['metier']) && isset($_POST['mail']) && isset($_POST['login']) && isset($_POST['Password']))
  {
      //Recuperation des resultats du formulaire
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $metier = $_POST['metier'];
    $mail = $_POST['mail'];
    $login = $_POST['login'];
    $Password = $_POST['Password'];
    $insertion = $connexion->exec("INSERT INTO USER VALUES (NULL, '".$nom."', '".$prenom."', '".$metier."', '".$mail."', '".$login."', '".$Password."')");
    echo "Votre Inscription a bien été réalisée, Vous pouvez dorénavant accéder à votre compte personnel !!";
  }
  else
  {
    echo "Merci de renseigner les champs concern&eacute;s avant de valider !!";
  }
     
 ?>

<div id="buttonret">
        <form name="frmLogin" id="frmLogin" method="post" action="acceuil.php">
          <input type="submit" id="userSubmit" name="login" value="Retour à la connexion" class="login-button" />
        </form>
    </div>


</body>
</html>