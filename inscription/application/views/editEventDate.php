<?php

// Connexion à la base de données
require_once('application/config/constants.php');

if (isset($_POST['Event'][0]) && isset($_POST['Event'][1]) && isset($_POST['Event'][2])){
	
	
	$id = $_POST['Event'][0];
	$start = $_POST['Event'][1];
	$end = $_POST['Event'][2];

	$sql = "UPDATE H_Utilisateur SET start = '$start', end = '$end' WHERE id = $id ";

	$pdo = connexionBD();
	$query = $pdo->prepare( $sql );
	if ($query == false) {
	 print_r($pdo->errorInfo());
	 die ('Erreur prepare');
	}
	$sth = $query->execute();
	if ($sth == false) {
	 print_r($query->errorInfo());
	 die ('Erreur execute');
	}else{
		die ('OK');
	}
	disconnect();

}
//header('Location: '.$_SERVER['HTTP_REFERER']);

	
?>
