<html>
  <head>
    <link rel="stylesheet" href="menu.css" type="text/css">
  </head>
  <body>
      
<div id="blue-menu">
    <?php
    include 'connexionBDD.php';
    
    $resultat16 = $connexion->query("SELECT NOM_BRANCHE FROM BRANCHE WHERE NOM_BRANCHE = 'interface homme/machine'");
        while ($ligne = $resultat16->fetch())
        {
            ?><a href="menuInterface_Homme.php">
            <h5><?php echo $ligne['NOM_BRANCHE'] ?></h5>
            <div><?php echo $ligne['NOM_BRANCHE'] ?></div>
            </a>
            <?php
        }
    
    $resultat17 = $connexion->query("SELECT NOM_BRANCHE FROM BRANCHE WHERE NOM_BRANCHE = 'developpement'");
        while ($ligne = $resultat17->fetch())
        {
            ?><a href="menuDeveloppement.php">
            <h5><?php echo $ligne['NOM_BRANCHE'] ?></h5>
            <div><?php echo $ligne['NOM_BRANCHE'] ?></div>
            </a>
            <?php          
        }
    
    $resultat18 = $connexion->query("SELECT NOM_BRANCHE FROM BRANCHE WHERE NOM_BRANCHE = 'administration'");
        while ($ligne = $resultat18->fetch())
        {
            ?><a href="menuAdministration.php">
            <h5><?php echo $ligne['NOM_BRANCHE'] ?></h5>
            <div><?php echo $ligne['NOM_BRANCHE'] ?></div>
            </a>
            <?php
        }?>

    
</div>
      
    <h1>Bienvenue dans votre espace personnel !!
        Vous pourrez consulter ici les projets des diff&egrave;rentes branches ainsi que les diff&egrave;rentes t&acirc;ches &agrave; effectuer !!</h1>
        
      
  </body>
</html>
