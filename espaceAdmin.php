<html>
    <head>
	<link rel="stylesheet" href="espaceAdmin.css" type="text/css">
    </head>
<body>

<?php

    include 'connexionBDD.php';?>
    <h1>Bienvenue dans votre espace d'administration !</h1>

<div id="tabs">
    <div class="tabs-onglets">
        <a href="#projet">Projet</a>
        <a href="#branche">Branche</a>
	<a href="#tache">T&acirc;che</a>
    </div>
    <div id="contenu">
	<div id="projet">
            <h1>Administrer un projet :</h1>
		<p>
                <form id="frm_admin_projet_ajout" method="post" >
                    <fieldset style="border: 3px double #333399">
                        <legend> Ajout d'un projet </legend>
			<label for="projet">Nom du projet : </label><input type="text" id="Projet" name="projet" value=""/><br><br>
                        
			<label for="IDuser">Entrer l'id de l'utilisateur choisi : </label><input type="text" id="IDuser" name="IDuser" value=""/><br><br>
			<label for='libelle'>Visualisation des utilisateurs : <select name='libelle' id='libelle'></label>
			<option value="vide">- - - Choisir un utilisateur - - -</option><br><br>

                        <?php
                            $resultat1 = $connexion->query("SELECT ID_USER, NOM, PRENOM FROM USER ORDER BY ID_USER ASC");
                            while ($ligne = $resultat1->fetch()) 
                            {
                                $listenom=$ligne['NOM'];
                                $listeprenom=$ligne['PRENOM'];
                                $listeID=$ligne['ID_USER'];
                                echo '<option value="'.$listenom.'">'.$listeID.'  -  '.$listenom.' '.$listeprenom.'</option>';
                            }?>
                        
                        <label for="IDbranche">Entrer l'id de la branche choisie : </label><input type="text" id="IDbranche" name="IDbranche" value=""/><br><br>
			<label for='libelle'>Visualisation des branches : <select name='libelle' id='libelle'></label>
			<option value="vide">- - - Choisir une branche - - -</option><br><br>
                        
                        <?php
                            $resultat2 = $connexion->query("SELECT ID_BRANCHE, NOM_BRANCHE FROM BRANCHE ORDER BY ID_BRANCHE ASC");
                            while ($ligne = $resultat2->fetch()) 
                            {
                                $listeidb=$ligne['ID_BRANCHE'];
                                $listenomb=$ligne['NOM_BRANCHE'];
                                echo '<option value="'.$listenomb.'">'.$listeidb.'  -  '.$listenomb.'</option>';
                            }

                        ?>
			<input type="submit" name="frm_admin_projet_ajout" value="Valider"/>
			<?php
                            if (isset($_POST['projet']) && isset($_POST['IDuser']) && isset($_POST['IDbranche']))
                            {
                                $projet = $_POST['projet'];
                                $IDuser = $_POST['IDuser'];
                                $IDbranche = $_POST['IDbranche'];
                                $resultat3= $connexion->query("INSERT INTO PROJET (ID_USER, NOM_PROJET, ID_BRANCHE) VALUES ('$IDuser', '$projet', '$IDbranche')");
                                echo "La cr&eacute;ation du projet &agrave; bien &eacute;t&eacute; effectu&eacute;e";
                            }
                 	?>

                    </fieldset>
		</form><br><br>

		<form id="frm_admin_projet_modif" method="post">
                    <fieldset style="border: 3px double #333399">
                        <legend> Modification d'un projet</legend>
			<label for="nprojet">Nom du projet : </label><input type="text" id="nprojet" name="nprojet" value=""/><br><br>
			<label for="newprojet">Nouveau nom du projet : </label><input type="text" id="newprojet" name="newprojet" value=""/><br><br>
                    </fieldset>
                    <input type="submit" name="frm_admin_projet_modif" value="Valider"/>
                    <?php
                    
                        if (isset($_POST['nprojet']) && isset($_POST['newprojet']))
			{
                            $nprojet = $_POST['nprojet'];
                            $newprojet = $_POST['newprojet'];
                            $resultat4 = $connexion->query("UPDATE PROJET SET NOM_PROJET = '$newprojet' WHERE NOM_PROJET = '$nprojet'");
                            echo "La modification &agrave; bien &eacute;t&eacute; effectu&eacute;e";
			}
			else
			{
                            echo "Merci de renseigner les champs concern&eacute;s avant de valider !!";
			}
                    ?>
		</form><br><br>

		<form id="frm_admin_projet_supp" method="post">
                    <fieldset style="border: 3px double #333399">
                        <legend> Suppression d'un projet</legend>
                        <label for="projetsupp">Nom du projet &agrave; supprimer: </label><input type="text" id="projetsupp" name="projetsupp" value=""/><br><br>
                    </fieldset>
                    <input type="submit" name="frm_admin_projet_supp" value="Valider"/>
                    <?php

			if (isset($_POST['projetsupp']))
			{
                            $nprojet2 = $_POST['projetsupp'];
                            $resultat6 = $connexion->query("DELETE FROM PROJET WHERE NOM_PROJET = '$nprojet2'");
                            echo "La suppression &agrave; bien &eacute;t&eacute; effectu&eacute;e";
			}
			else
			{
                            echo "Merci de renseigner un projet existant avant de valider !!";
			}
                    ?>
		</form><br><br>				
		</p>
	</div>
	<div id="branche">
            <h1>Administrer une branche :</h1>
		<p>
		<form id="frm_admin_branche" method="post" >
                    <fieldset style="border: 3px double #333399">
			<legend> Ajout d'une branche</legend>
			<label for="branche">Nom de la branche : </label><input type="text" id="branche" name="branche" value=""/><br><br>
                    </fieldset>
                    <input type="submit" name="frm_admin_nom_branche" value="Valider"/><br><br>
                    <?php
                        if (isset($_POST['branche']))
                        {
                            $branche = $_POST['branche'];
                            $resultat7= $connexion->query("INSERT INTO BRANCHE (NOM_BRANCHE) VALUES ('$branche')");
                        }
                    ?>
		</form><br><br>
                
		<form id="frm_admin_branche_modif" method="post" >
                    <fieldset style="border: 3px double #333399">
                        <legend> Modification d'une branche</legend>
			<label for="branche2">Nom de la branche : </label><input type="text" id="branche2" name="branche2" value=""/><br><br>
			<label for="newbranche">Nouveau nom de la branche : </label><input type="text" id="newbranche" name="newbranche" value=""/><br><br>
                    </fieldset>
                    <input type="submit" name="frm_admin_modif_branche" value="Valider"/><br><br>
                    <?php
                 					
			if (isset($_POST['branche2']) && isset($_POST['newbranche']))
			{
                            $nombranche = $_POST['branche2'];
                            $newbranche = $_POST['newbranche'];
                            $resultat9 = $connexion->query("UPDATE BRANCHE SET NOM_BRANCHE = '$newbranche' WHERE NOM_BRANCHE = '$nombranche'");
                            echo "La modification &agrave; bien &eacute;t&eacute; effectu&eacute;e";
			}
			else
			{
                            echo "Merci de renseigner les champs concernés avant de valider !!";
			}
                    ?>
		</form>
                
		<form id="frm_admin_branche_supp" method="post" >
                    <fieldset style="border: 3px double #333399">
                        <legend> Suppression d'une branche</legend>
                        <label for="branchesupp">Nom de la branche &agrave; supprimer: </label><input type="text" id="branchesupp" name="branchesupp" value=""/><br><br>
                    </fieldset>
                    <input type="submit" name="frm_admin_branchesupp" value="Valider"/><br><br>
                    <?php
                    
			if (isset($_POST['branchesupp']))
			{
                            $branchesupp = $_POST['branchesupp'];
                            $resultat10 = $connexion->query("DELETE FROM BRANCHE WHERE NOM_BRANCHE = '$branchesupp'");
                            echo "La suppression &agrave; bien &eacute;t&eacute; effectu&eacute;e";
			}
			else
			{
                            echo "Merci de renseigner les champs concern&eacute;s avant de valider ou renseigner un projet existant !!";
			}
                        ?>
		</form>
		</p>
	</div>
	<div id="tache">
            <h1>Administrer une tâche :</h1>
                <p>							
		<form id="frm_admin_tache_ajout" method="post" >
                    <fieldset style="border: 3px double #333399">
			<legend> Ajout d'une t&acirc;che</legend>
			<label for="tache">Nom de la t&acirc;che : </label><input type="text" id="tache" name="tache" value=""/><br><br>
			<label for="Projetassocie">Indiquer l'id du projet associ&eacute; : </label><input type="text" id="Projetassocie" name="Projetassocie" value=""/><br><br>

                        <label for='libelleprojet'>Visualisation des projets : <select name='libellep' id='libellep'></label>
                        <option value="vide1">- - - Choisir un projet - - -</option>
                        
                        <?php
                            $resultat11 = $connexion->query("SELECT ID_PROJET, NOM_PROJET FROM PROJET ORDER BY ID_PROJET ASC");
                            while ($ligne = $resultat11->fetch()) 
                            {
                                $listeID_PROJET=$ligne['ID_PROJET'];
                                $listeNOM_PROJET=$ligne['NOM_PROJET'];
                                echo '<option value="'.$listeNOM_PROJET.'">'.$listeID_PROJET.'  -  '.$listeNOM_PROJET.'</option>';
                            }
                        ?>
                        
			<br><br><label for="Brancheassocie">Indiquer l'id de la branche associ&eacute;e : </label><input type="text" id="Brancheassocie" name="Brancheassocie" value=""/><br><br>
                        <label for='libellebranche'>Visualisation des branches : <select name='libelleb' id='libelleb'></label>
                        <option value="vide2">- - - Choisir une branche - - -</option><br><br>

                        <?php
                            $resultat12 = $connexion->query("SELECT ID_BRANCHE, NOM_BRANCHE FROM BRANCHE ORDER BY ID_BRANCHE ASC");
                            while ($ligne = $resultat12->fetch()) 
                            {
                                $listeID_BRANCHE=$ligne['ID_BRANCHE'];
                                $listeNOM_BRANCHE=$ligne['NOM_BRANCHE'];
                                echo '<option value="'.$listeNOM_BRANCHE.'">'.$listeID_BRANCHE.'  -  '.$listeNOM_BRANCHE.'</option>';
                            }
                        ?>
			<input type="submit" name="frm_admin_tache_ajout" value="Valider"/>
                    </fieldset><br><br>
			<?php
                            if (isset($_POST['tache']) && isset($_POST['Projetassocie']) && isset($_POST['Brancheassocie']))
                            {
                                $tache = $_POST['tache'];
                                $Projetassocie = $_POST['Projetassocie'];
                                $Brancheassocie = $_POST['Brancheassocie'];
                                $resultat13= $connexion->query("INSERT INTO TACHES (ID_BRANCHE, ID_PROJET, NOM_TACHE) VALUES ('$Brancheassocie', '$Projetassocie', '$tache')");
                                echo "La cr&eacute;ation de la t&acirc;che &agrave; bien &eacute;t&eacute; effectu&eacute;e";
                            }
                 	?>
                </form>
                    <form id="frm_admin_tache_update" method="post" >
                    <fieldset style="border: 3px double #333399">
			<legend> Modification d'une t&acirc;che</legend>
			<label for="tache2">Nom de la t&acirc;che : </label><input type="text" id="tache2" name="tache2" value=""/><br><br>
                        <label for="newtache">Nouveau nom de la t&acirc;che : </label><input type="text" id="newtache" name="newtache" value=""/><br><br>
                    </fieldset><br><br>
                    <input type="submit" name="frm_admin_tache_update" value="Valider"/>
                    <?php
                 					
			if (isset($_POST['tache2']) && isset($_POST['newtache']))
			{
                            $tache2 = $_POST['tache2'];
                            $newtache = $_POST['newtache'];
                            $resultat14 = $connexion->query("UPDATE TACHES SET NOM_TACHE = '$newtache' WHERE NOM_TACHE = '$tache2'");
                            echo "La modification &agrave; bien &eacute;t&eacute; effectu&eacute;e";
			}
			else
			{
                            echo "Merci de renseigner les champs concernés avant de valider !!";
			}
                    ?>
                    </form>
                    <form id="frm_admin_tache_update" method="post" >
                    <fieldset style="border: 3px double #333399">
			<legend> Suppression d'une t&acirc;che</legend>
			<label for="tache">Nom de la t&acirc;che &agrave; supprimer: </label><input type="text" id="tache3" name="tache3" value=""/><br><br>
                    </fieldset><br><br>
                    <input type="submit" name="frm_admin_projet_supp" value="Valider"/>
                    <?php

			if (isset($_POST['tache3']))
			{
                            $tache3 = $_POST['tache3'];
                            $resultat15 = $connexion->query("DELETE FROM TACHES WHERE NOM_TACHE = '$tache3'");
                            echo "La suppression &agrave; bien &eacute;t&eacute; effectu&eacute;e";
			}
			else
			{
                            echo "Merci de renseigner un projet existant avant de valider !!";
			}
                    ?>
		</form>
		</p>
	</div>
    </div>
</div>
<script src="http://cdn.infographizm.com/javascript/jquery/jquery.js"></script>
<script src="http://cdn.infographizm.com/javascript/jquery/tabs.js"></script>
</body>
</html>