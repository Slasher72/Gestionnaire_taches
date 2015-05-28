<html>
<head>
	<link rel="stylesheet" href="menuInfo.css" type="text/css">
</head>
<body>
<?php
    include 'function.php';
    include 'menu.php';
?>
<div id="tabs">
    <div class="tabs-onglets">
        <?php
        /**
         * Page concernant la branche developpement
         * @author Valentin PEAN
         * @version 1.0.0
         */
            include 'connexionBDD.php';
            $resultat19 = $connexion->query("SELECT NOM_PROJET FROM PROJET WHERE ID_BRANCHE = 2 ORDER BY NOM_PROJET ASC");
            while ($ligne1 = $resultat19->fetch())
            {
                ?><a href="#<?php echo $ligne1['NOM_PROJET']?>"><?php echo $ligne1['NOM_PROJET'] ?></a>
                <?php
            }?>

    </div>
    <div id="contenu">
        <div id="lundi">
            <h2>
                <div class="col">
                    <div id="wrapper">
                        <h2>Gestion des t&acirc;ches</h2>
			<p>Ici vous est pr&eacute;sent&eacute; l'ensemble des t&acirc;ches &agrave; r&eacute;aliser pour le projet concern&eacute;</p>

			<ul id="sortlist">
                            <?php sortTable2(); ?> <!-- AMEND THIS IN THE FUNCTIONS FILE -->
                            <div class="clear"></div>
                            <a id="button" class="button">Enregistrer</a>
                            <div class="clear"></div>
			</ul>			
                    </div>

                    <div id="message"></div>
                </div>
            </h2>
            <p></p>
        </div>
    </div>
</div>
<script src="http://cdn.infographizm.com/javascript/jquery/jquery.js"></script>
<script src="http://cdn.infographizm.com/javascript/jquery/tabs.js"></script>
</body>
</html>

