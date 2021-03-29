<?php

namespace inscription;

//nous incluons les utilitaire de connexion
require_once 'f_connexion_database.php';

function auto_increment($nomTable, $nomColonne)
{
    $pdo = connexionBD();
    $sql = "SELECT max(" . $nomColonne . ") as id FROM " . $nomTable . "";
    $res = $pdo->query($sql);
    $resultat = $res->fetch();
    return $resultat['id'] + 1;
    disconnect();
}

/**
 * Crée un nouveau utilisateur
 * à partir des informations fournies en paramètre

 * @param $nom : le nom de l'utilisateur
 * @param $prenom : le prénom de l'utilisateur
 * @param $sexe
 * @param $email : l'adresse mail de l'utilisateur
 * @param $dateNaissance : la date de naissance de ""
 * @param $rue : la rue de ""
 * @param $cp : le code postal de ""
 * @param $ville : la ville de ""
 * @param $tel : le téléphone de ""
 * @param $permis : S'il a le permis
 * @param $voiture : S'il a une voiture personnel
 * @param $tshirt : la taille du T-shirt
 * @param anciennete : S'il a déjà participé au Zaccros
 * @param $benevoleAmis : le nom des personnes qu'ils souhaiteraient être avec eux
 * @param connaissance : Comment il a connu les Zaccros
 * @param $idSession : le numéro de la session
 * @param $avatar : la photo de profil
 */
function creeInscription($nom, $prenom, $sexe, $email, $dateNaissance, $rue, $cp, $ville, $tel, $permis, $voiture, $tshirt, $anciennete, $benevoleAmis, $connaissance, $idSession)
{
    $pdo = connexionBD();
    $idUtilisateur = auto_increment("utilisateur", "idUtilisateur");

    $sql = 'INSERT INTO utilisateur (idUtilisateur, nom, prenom, sexe, email, dateNaissance, rue, cp, ville, numTel, permis, voiture, tailleTshirt, anciennete, benevoleAmis, connaissance, commentaires, idSession)
     VALUES(:idUtilisateur, :nom, :prenom, :sexe, :email, :dateNaissance, :rue, :cp, :ville, :numTel, :permis, :voiture, :tailleTshirt, :anciennete, :benevoleAmis, :connaissance, :com, :idSession)';
    $res = $pdo->prepare($sql);
    $res->execute(array(':idUtilisateur' => $idUtilisateur, ':nom' => $nom, ':prenom' => $prenom, ':sexe' => $sexe, ':email' => $email, ':dateNaissance' => $dateNaissance, ':rue' => $rue, ':ville' => $ville, ':cp' => $cp, ':numTel' => $tel, ':permis' => $permis, ':voiture' => $voiture, ':tailleTshirt' => $tshirt, ':anciennete' => $anciennete, ':benevoleAmis' => $benevoleAmis, ':connaissance' => $connaissance, ':com' => '', ':idSession' => $idSession));
    disconnect();
}

/**
 * Retourne les informations de toutes les missions
 */
function getMissions()
{
    $pdo = connexionBD();
    $resultat = $pdo->query('select * from mission');
    $res = $resultat->fetchAll();
    disconnect();
    return $res;
}

/**
 * Retourne les sessions qui ne sont pas bloquées
 */
function getSession()
{
    $pdo = connexionBD();
    $resultat = $pdo->query('select * from session where bloque = 0');
    $res = $resultat->fetchAll();
    disconnect();
    return $res;
}

/**
 * Retourne l'id de la session
 */
function getIDSession()
{
    $pdo = connexionBD();
    $resultat = $pdo->query('SELECT idSession FROM session WHERE bloque = 0');
    $res = $resultat->fetchAll();
    disconnect();
    return $res;
}

/**
 * Crée une nouvelle mission
 * à partir des informations fournies en paramètre

 * @param $idMission : le numéro de la mission
 * @param $idUtilisateur : le numéro de l'utilisateur
 */
function ajouterMission($idMission, $idUtilisateur)
{
    $pdo = connexionBD();
    $sql = 'INSERT INTO liste_mission VALUES(:idMission,  :idUtilisateur, :idLieu)';
    $res = $pdo->prepare($sql);
    $idLieu = 0;
    $res->execute(array(':idMission' => $idMission, ':idUtilisateur' => $idUtilisateur, ':idLieu' => $idLieu));
    //$res->execute($sql);
    disconnect();
}

/**
 * Retourne le plus grand numéro d'utilisateur

 *@param $code : le code max => pas de paramètre
 */
function avoirId($code)
{
    $pdo = connexionBD();
    $sql = 'select max(idUtilisateur) as code from utilisateur';
    $res = $pdo->prepare($sql);
    $res->execute(array('code' => $code));
    $ligne = $res->fetch();
    return $ligne['code'];
    disconnect();
}

/**
 * Retourne les événements d'un utilisateur

 * @param $idUtilisateur : le numéro de l'utilisateur
 */
function getEvenement($idUtilisateur)
{

    $pdo = connexionBD();
    $sql = $pdo->query("SELECT id, title, start, end, color FROM h_utilisateur where idUtilisateur = '$idUtilisateur' ");
    $res = $sql->fetchAll();
    disconnect();
    return $res;
}

/**
 * Retourne les informations d'un utilisateur

 * @param $idUtilisateur : le numéro de l'utilisateur
 */
function getInfos($idUtilisateur)
{

    $pdo = connexionBD();
    $sql = $pdo->query("SELECT * FROM utilisateur where idUtilisateur = '$idUtilisateur'");
    $res = $sql->fetch();
    disconnect();
    return $res;
}

/**
 * Retourne la période d'une session d'un utilisateur

 * @param $idUtilisateur : le numéro de l'utilisateur
 */
function getPeriode($idUtilisateur)
{

    $pdo = connexionBD();
    $sql = $pdo->query("SELECT S.idSession, periodeDebut, periodeFin FROM session S INNER JOIN utilisateur U ON S.idSession = U.idSession where idUtilisateur = '$idUtilisateur'");
    $res = $sql->fetch();
    disconnect();
    return $res;
}


function infosUtilisateurs($idSession)
{
    $pdo = connexionBD();
    $req = "SELECT * from utilisateur U inner join liste_mission L on L.idUtilisateur = U.idUtilisateur where idSession = '$idSession' order by U.idUtilisateur";
    $res = $pdo->query($req);
    $Leslignes = $res->fetchAll();
    return $Leslignes;
    disconnect();
}

/**
 * Met à jour l'utilisateur
 * @param $idUtilisateur : le numéro de l'utilisateur
 * @param $avatar : la photo de profil
 */
function updateProfil($idUtilisateur, $avatar)
{
    $pdo = connexionBD();
    $sql = "UPDATE utilisateur SET avatar = '$avatar' Where idUtilisateur = '$idUtilisateur'";
    $res = $pdo->query($sql);
    return $res;
    disconnect();
}

// Partie Dorian

function getLaSession($idSession)
{
    $pdo = connexionBD();
    $resultat = $pdo->query("select * from session where idSession = " . $idSession);
    $res = $resultat->fetch();
    disconnect();
    return $res;
}

function getLesHorairesDef($idSession)
{
    $pdo = connexionBD();
    $resultat = $pdo->query('select * from h_utilisateur WHERE idSession = ' . $idSession);
    $res = $resultat->fetchAll();
    return $res;
}

function getLesHorairesUti($idSession)
{
    $pdo = connexionBD();
    $resultat = $pdo->query('select * from hu_utilisateur WHERE idSession = ' . $idSession);
    $res = $resultat->fetchAll();
    return $res;
}

function getBenevolesSession($idSession)
{
    $pdo = connexionBD();
    $resultat = $pdo->query('select * from utilisateur where idSession = ' . $idSession . ' ORDER BY nom');
    $res = $resultat->fetchAll();
    disconnect();
    return $res;
}

function export_data_to_csv($data, $filename)
{
    // Tells to the browser that a file is returned, with its name : $filename.csv
    header("Content-disposition: attachment; filename=$filename.xls");
    // Tells to the browser that the content is a csv file
    header("Content-Type: text/xls");

    $idSession = 1;
    $laSession = getLaSession($idSession);
    $debut = $laSession['periodeDebut'];
    $fin = $laSession['periodeFin'];
    $horaireBenevoles = getLesHorairesDef($idSession);
    $horaireBenevolesUtilise = getLesHorairesUti($idSession);
    $lesBenevoles = getBenevolesSession($idSession);
    $lesMissions = getMissions();

    require_once VIEWSPATH . 'excelBenevoles.php';

    // I open PHP memory as a file
    $fp = fopen("php://output", 'w');

    // Insert the UTF-8 BOM in the file
    fputs($fp, $bom = (chr(0xEF) . chr(0xBB) . chr(0xBF)));

    // I add the array keys as CSV headers
    fputcsv($fp, array_keys($data[0]), $delimiter, $enclosure);

    // Add all the data in the file
    foreach ($data as $fields) {
        fputcsv($fp, $fields, $delimiter, $enclosure);
    }

    // Close the file
    fclose($fp);

    // Stop the script
    die();
}


function getLeBenevole($idBenevole)
{
    $pdo = connexionBD();
    $resultat = $pdo->query('select * from utilisateur where idUtilisateur = ' . $idBenevole);
    $res = $resultat->fetch();
    disconnect();
    return $res;
}

function ajouterHoraireLibreBenevole($start, $end, $idBenevole, $idSession)
{

    $pdo = connexionBD();
    $sql = "INSERT INTO h_utilisateur (start, end, idUtilisateur, idSession, color) VALUES('" . $start . "', '" . $end . "', " . $idBenevole . " , " . $idSession . ", '#ff000f')";
    $res = $pdo->prepare($sql);
    $res->execute();
    disconnect();
}

function updateHoraireBenevole($id, $idUtilisateur, $start, $end)
{
    $pdo = connexionBD();
    $sql = "UPDATE h_utilisateur SET start = '$start', end = '$end' WHERE idUtilisateur = '$idUtilisateur' AND id = '$id'";
    $res = $pdo->query($sql);
    return $res;
    disconnect();
}

//récupérer la date du début du festival
function getDateSession()
{
    $pdo = connexionBD();
    $req = "SELECT periodeDebut, periodeFin FROM session";
    $res = $pdo->query($req)->fetch();
    return $res;
    disconnect();
}
