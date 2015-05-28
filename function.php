<?php
include'connexionBDD.php';

//-------------------- SORT TABLE FUNCTION
/**
 * Fonction permettant l'affichage des tâches pour l'ID_BRANCHE 1 (interface homme/machine)
 * @global type $connexion
 * @author Valentin PEAN
 * @version 1.0.0
 * @return li retourne une liste de tâches
 */
function sortTable(){

$table = "TACHES";
global $connexion;
$resultat22 = $connexion->query("SELECT * FROM $table WHERE ID_BRANCHE = '1' order by ABS(orderList) ASC");
while($ligne = $resultat22->fetch()){

echo "<li class='ui-state-default' id='ID_".$ligne['ID_TACHE'] ."'>".$ligne['NOM_TACHE']."</li>";
}
}

/**
 * Fonction permettant l'affichage des tâches pour l'ID_BRANCHE 2 (developpement)
 * @global type $connexion
 * @author Valentin PEAN
 * @version 1.0.0
 * @return li retourne une liste de tâches
 */
function sortTable2(){

$table = "TACHES";
global $connexion;
$resultat22 = $connexion->query("SELECT * FROM $table WHERE ID_BRANCHE = '2' order by ABS(orderList) ASC");
while($ligne = $resultat22->fetch()){

echo "<li class='ui-state-default' id='ID_".$ligne['ID_TACHE'] ."'>".$ligne['NOM_TACHE']."</li>";
}
}

/**
 * Fonction permettant l'affichage des tâches pour l'ID_BRANCHE 3 (administration)
 * @global type $connexion
 * @author Valentin PEAN
 * @version 1.0.0
 * @return li retourne une liste de tâches
 */
function sortTable3(){

$table = "TACHES";
global $connexion;
$resultat22 = $connexion->query("SELECT * FROM $table WHERE ID_BRANCHE = '3' order by ABS(orderList) ASC");
while($ligne = $resultat22->fetch()){

echo "<li class='ui-state-default' id='ID_".$ligne['ID_TACHE'] ."'>".$ligne['NOM_TACHE']."</li>";
}
}

?>