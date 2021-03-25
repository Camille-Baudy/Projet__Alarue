<?php

require_once('application/config/constants.php');
if (isset($_POST['delete']) && isset($_POST['id'])){
	
	
	$id = $_POST['id'];
	$start = $_POST['start'];
	$idBenevole = $_SESSION['idBenevole'];
	
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
	
	$date = substr($start, 0, -9);
	$sql = "DELETE FROM HU_Utilisateur Where start LIKE '$date %' and idUtilisateur = $idBenevole";
	
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

	
}else{
	
	$id = $_POST['id'];
	$start = $_POST['start'];
	$end = $_POST['end'];
	$idBenevole = $_SESSION['idBenevole'];
	
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
	
	$date = substr($start, 0, -9);
	$sql = "DELETE FROM HU_Utilisateur Where start LIKE '$date %' and idUtilisateur = $idBenevole";
	
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
