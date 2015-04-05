<html>
<head>
	<link rel="stylesheet" href="espaceAdmin.css" type="text/css">
</head>
<body>

<?php
include 'connexionBDD.php';
echo "Bienvenue dans votre espace d'administration !";
?>

<div id="tabs">
			<div class="tabs-onglets">
				<a href="#projet">Projet</a>
				<a href="#branche">Branche</a>
				<a href="#tache">Tâche</a>
			</div>
			<div id="contenu">
				<div id="projet">
					<h1>Administrer un projet :</h1>
					<p>
						
						<form id="frm_admin_projet_ajout" method="post" >
							<fieldset style="border: 3px double #333399">

								<legend> Ajout d'un projet </legend>
								<label for="projet">Nom du projet : </label><input type="text" id="Projet" name="projet" value=""/><br><br>
							</fieldset><br><br>

							<fieldset style="border: 3px double #333399">
								<legend> Ajout d'un utilisateur </legend>
								<label for="user">Utilisateur(s) concerné(s) : </label><br><br>
								<label for="IDuser">Entrer l'id de l'utilisateur choisi : </label><input type="text" id="IDuser" name="IDuser" value=""/><br><br>
								<label for='libelle'>Choisir <select name='libelle' id='libelle'></label>
								<option value="vide">- - - Choisir un utilisateur - - -</option><br><br>

								<?php

           							$resultat1 = $connexion->query("SELECT ID_USER, NOM, PRENOM FROM USER ORDER BY ID_USER ASC");
            						while ($ligne = $resultat1->fetch()) 
                					{
                 						$listenom=$ligne['NOM'];
                 						$listeprenom=$ligne['PRENOM'];
                 						$listeID=$ligne['ID_USER'];
                						echo '<option value="'.$listenom.'">'.$listeID.'  -  '.$listenom.' '.$listeprenom.'</option>';
            						}

           							$projet = $_POST['projet'];
									$IDuser = $_POST['IDuser'];

								?>
								<input type="submit" name="frm_admin_projet_ajout" value="Valider"/>
								<?php
								$resultat2= $connexion->query("INSERT INTO PROJET (ID_USER, NOM_PROJET) VALUES ('$IDuser', '$projet')");
                 				?>

							</fieldset>
						</form><br><br>

						<form id="frm_admin_projet_modif" method="post">

							<fieldset style="border: 3px double #333399">

								<legend> Modification d'un projet</legend>
								<label for="nprojet">Nom du projet : </label><input type="text" id="nprojet" name="nprojet" value=""/><br><br>
								<label for="newprojet">Nouveau nom du projet : </label><input type="text" id="newprojet" name="newprojet" value=""/><br><br>
								<?php
									$nprojet = $_POST['nprojet'];
									$newprojet = $_POST['newprojet'];
								?>
							</fieldset>
							<input type="submit" name="frm_admin_projet_modif" value="Valider"/>
							<?php

							$resultat4 = $connexion->query("SELECT NOM_PROJET FROM PROJET");
                 			$listeprojet=$ligne['NOM_PROJET'];

							if (isset($nprojet) && isset($newprojet))
							{
								$resultat3 = $connexion->query("UPDATE PROJET SET NOM_PROJET = '$newprojet' WHERE NOM_PROJET = '$nprojet'");
								echo "La modification à bien été effectuée";
							}
							else
							{
								echo "Merci de renseigner les champs concernés !!";
							}

							?>
						</form><br><br>

						<form id="frm_admin_projet_supp" method="post">
							<fieldset style="border: 3px double #333399">

								<legend> Suppression d'un projet</legend>
								<label for="projetsupp">Nom du projet à supprimer: </label><input type="text" id="projetsupp" name="projetsupp" value=""/><br><br>
							</fieldset>
							<input type="submit" name="frm_admin_projet_supp" value="Valider"/>
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
									<?php
										$branche = $_POST['branche'];
										$resultat3= $connexion->query("INSERT INTO BRANCHE (NOM_BRANCHE) VALUES \''.$branche.'\'");
									?>
								</fieldset><br><br>
							</form>

								<fieldset style="border: 3px double #333399">

									<legend> Modification d'une branche</legend>
									<label for="branche">Nom de la branche : </label><input type="text" id="branche" name="branche" value=""/><br><br>
									<label for="newbranche">Nouveau nom de la branche : </label><input type="text" id="newbranche" name="newbranche" value=""/><br><br>
								</fieldset><br><br>

								<fieldset style="border: 3px double #333399">

									<legend> Suppression d'une branche</legend>
									<label for="branchesupp">Nom de la branche à supprimer: </label><input type="text" id="branchesupp" name="branchesupp" value=""/><br><br>
								</fieldset><br><br>
							</form>
						</p>
				</div>
				<div id="tache">
					<h1>Administrer une tâche :</h1>
						<p>							
							<form id="frm_admin_tâche" method="post" >
								<fieldset style="border: 3px double #333399">

									<legend> Ajout d'une tâche</legend>
									<label for="tache">Nom de la tâche : </label><input type="text" id="tache" name="tache" value=""/><br><br>
									<label for="Projetassocie">Indiquer le projet associé : </label><input type="text" id="Projetassocie" name="Projetassocie" value=""/><br><br>
									<label for="Brancheassocie">Indiquer la branche associée : </label><input type="text" id="Brancheassocie" name="Brancheassocie" value=""/><br><br>
								</fieldset><br><br>

								<fieldset style="border: 3px double #333399">

									<legend> Modification d'une tâche</legend>
									<label for="tache">Nom de la tâche : </label><input type="text" id="tache" name="tache" value=""/><br><br>
									<label for="newtache">Nouveau nom de la tâche : </label><input type="text" id="newtache" name="newtache" value=""/><br><br>
								</fieldset><br><br>

								<fieldset style="border: 3px double #333399">

									<legend> Suppression d'une tâche</legend>
									<label for="tache">Nom de la tâche à supprimer: </label><input type="text" id="tache" name="tache" value=""/><br><br>
								</fieldset><br><br>
							</form>
						</p>
				</div>
			</div>
</div>
		<script src="http://cdn.infographizm.com/javascript/jquery/jquery.js"></script>
		<script src="http://cdn.infographizm.com/javascript/jquery/tabs.js"></script>


</body>
</html>