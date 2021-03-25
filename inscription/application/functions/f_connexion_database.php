<?php

require_once APPATH.'config'.DIRECTORY_SEPARATOR.'constants.php';

function connexionBD(){
	// paramètres de la base de données
	$sgbdname=DB_NAME;
	$host=DB_HOST;
	$charset='utf8';

	// utilisateur connecté à la base de donnée
	$username = DB_LOGIN;
	$password = DB_PASSWORD;

	// pour avoir des erreurs SQL plus claires 
	$erreur = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

	try {
	    $bdd = new PDO('mysql:host='.$host.';dbname='.$sgbdname.';charset='.$charset, $username, $password, $erreur);
	} catch (PDOException $e) {
	    die ('Connexion échouée : ' . $e->getMessage() );
	}
	return $bdd;
}

function disconnect()
{
    $bdd = null;
}
