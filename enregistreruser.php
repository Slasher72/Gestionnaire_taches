<html>
  <head>
    <link rel="stylesheet" href="style_enregistreruser.css" type="text/css">
  </head>
  <body>
    <div id="userForm">
      <div id="title">Enregistrement de votre compte</div>

        <form action="ValidationEnregistrement.php" name="frmSubscribe" id="frmSubscribe" method="post" >
          <div id="field-nom">
            <input type="text" id="usernom" name="nom" placeholder="Votre Nom" value="" class="userNom" />
          </div>
          <div id="field-prenom">
            <input type="text" id="userPrenom" name="prenom" placeholder="Votre Prénom" value="" class="userPrenom" />
          </div>
          <div id="field-metier">
            <input type="text" id="userMetier" name="metier" placeholder="Votre Métier" value="" class="userMetier" />
          </div>
          <div id="field-mail">
            <input type="mail" id="userMail" name="mail" placeholder="Votre Mail" value="" class="userMail" />
          </div>
          <div id="field-login">
            <input type="text" id="userlogin" name="login" placeholder="Votre Login" value="" class="userLogin" />
          </div>
          <div id="field-password">
            <input type="password" id="userPassword" name="Password" placeholder="Votre Password" class="userPassword" autocomplete="off" /> 
          </div>
            <input type="submit" id="subscribe" name="subscribe" value="S'enregistrer" class="subscribe-button" />
        </form>
      </div>
    </div>
  </body> 
</html>