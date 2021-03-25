<?php
// Connexion à la base de données
require_once('application/config/constants.php');
//echo $_POST['title'];
if (isset($_POST['start']) && isset($_POST['end'])){
	
	$start = $_POST['start'];
	$end = $_POST['end'];
	$idUtilisateur = $_SESSION['utilisateur'];
	$idSession = $laDate['idSession'];

	$sql = "INSERT INTO h_utilisateur(start, end, idUtilisateur, idSession, color) values ('$start', '$end', '$idUtilisateur', '$idSession', '#ff000f')";
	
	
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