<?php

require_once('application/config/constants.php');
if (isset($_POST['delete']) && isset($_POST['id'])){
	
	
	$id = $_POST['id'];
	
	$pdo = connexionBD();
	$sql = "DELETE FROM H_Utilisateur WHERE id = $id";
	$query = $pdo->prepare( $sql );
	if ($query == false) {
	 print_r($pdo->errorInfo());
	 die ('Erreur prepare');
	}
	$res = $query->execute();
	if ($res == false) {
	 print_r($query->errorInfo());
	 die ('Erreur execute');
	}
	disconnect();
	
}else{
	
	$id = $_POST['id'];
	$start = $_POST['start'];
	$end = $_POST['end'];
	
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
	}
	disconnect();

}
header('Location: '.$_SERVER['HTTP_REFERER']);

	
?>
