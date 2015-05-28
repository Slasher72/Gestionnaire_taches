<?php
include 'connexionBDD.php'; 

$table = "`TACHES`";

//------------------- save order to database

$order = $_POST['ID'];
$k  = 1;

$str = implode(",", $order);

foreach ($order as $k => $val){
	
	$connexion->query = "UPDATE $table SET `orderList` = ".$k;
	$connexion->query .= " WHERE `ID_TACHE` = ".$val;
	
	
}
echo "Changes Saved";

?>