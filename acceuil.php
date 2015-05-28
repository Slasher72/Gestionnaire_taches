
<html>
  <head>
    <link rel="stylesheet" href="style.css" type="text/css">
  </head>
  <body>
    <div id="userLoginForm">
      <div id="title">Votre site de gestionnaire de t&acirc;ches</div>

        <form name="frmLogin" id="frmLogin" method="post" action="verif-authentification.php">

          <div id="field-login">
            <input type="text" id="userlogin" name="login" placeholder="Login" value="" class="login" />
          </div>
          <div id="field-password">
            <input type="password" id="userPassword" name="Password" placeholder="Password" class="login-password" autocomplete="off" /> 
          </div>

          <input type="submit" id="userSubmit" name="usersubmit" value="Se connecter" class="login-button" />
          <a href='enregistreruser.php'><input type="button" id="subscribe" name="subscribe" value="S'enregistrer" class="subscribe-button" /></a>
        </form>
    </div>
  </body> 
</html>