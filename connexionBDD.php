<?php
/**
 * Page de connexion à la BDD
 * @author Valentin PEAN
 * @version 1.0.0
 * 
 */
$PARAM_hote = 'bts.bts-malraux72.net';
$PARAM_port = '63330';
$PARAM_nom_bd ='valentin.pean';
$PARAM_utilisateur ='valentin.pean';
$PARAM_mot_passe ='peanvplpbg';
$connexion = new PDO ('mysql:host='.$PARAM_hote.';port='.$PARAM_port.';dbname='.$PARAM_nom_bd,$PARAM_utilisateur,$PARAM_mot_passe);

/*$PARAM_hote = '172.16.99.3';
$PARAM_nom_bd ='valentin.pean';
$PARAM_utilisateur ='valentin.pean';
$PARAM_mot_passe ='peanvplpbg';
$connexion = new PDO ('mysql:host='.$PARAM_hote.';dbname='.$PARAM_nom_bd,$PARAM_utilisateur,$PARAM_mot_passe);*/

?>
