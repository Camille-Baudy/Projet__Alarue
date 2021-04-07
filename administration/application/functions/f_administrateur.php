<?php
namespace personne;

//nous incluons les utilitaire de connexion
require_once 'f_connexion_database.php';


function getPassword(){
    $pdo = connexionBD();
    $resultat = $pdo->query('select * from administrateur');
    $res = $resultat->fetchAll();
    disconnect();
    return $res;

}

function auto_increment($nomTable, $nomColonne){
    $pdo = connexionBD();
    $sql = "SELECT max(".$nomColonne.") as id FROM ".$nomTable."";
    $res = $pdo -> query($sql);
    $resultat = $res->fetch();
    return $resultat['id']+1;
    disconnect();
}

/* SESSIONS */

function getSessions(){
    $pdo = connexionBD();
    $resultat = $pdo->query('select * from session');
    $res = $resultat->fetchAll();
    disconnect();
    return $res;

}

function getSessionsSuppression(){
    $pdo = connexionBD();
    $resultat = $pdo->query('select * from session');
    $res = $resultat->fetchAll();
    disconnect();
    return $res;

}

function modifierNomSession($idSession, $nomSession){
    $pdo = connexionBD();
    $sql = "UPDATE session SET nomSession = :nom WHERE idSession = :id";
    $res = $pdo->prepare($sql);
    $res->execute(array(':nom'=>$nomSession, ':id'=>$idSession));
    disconnect();

}

function modifierBloquageSession($idSession, $bloque){
    $pdo = connexionBD();
    $sql = "UPDATE session SET bloque = :bloque WHERE idSession = :id";
    $res = $pdo->prepare($sql);
    $res->execute(array(':bloque'=>$bloque, ':id'=>$idSession));
    disconnect();

}

function getLaSession(){
    $pdo = connexionBD();
    $resultat = $pdo->query('select * from session');
    $res = $resultat->fetch();
    disconnect();
    return $res;

}

function ajouterSession($nomSession, $debut, $fin){
    $pdo = connexionBD();
    $idSession = auto_increment("session","idSession");

    $sql = "INSERT INTO session (nomSession, periodeDebut, periodeFin, bloque) VALUES('".$nomSession."','".$debut."','".$fin."', 0)";
    $res = $pdo->prepare($sql);
    $res->execute();
    disconnect();


}

function dateSupprimerSession($idSession){
    $pdo = connexionBD();
    $date = date('y-m-j');
    $date = date('Y-m-d', strtotime($date. ' + 10 days'));
    $sql = "UPDATE session SET suppression = :date WHERE idSession = :id";
    $res = $pdo->prepare($sql);
    $res->execute(array(':date'=>$date, ':id'=>$idSession));


    disconnect();



}

function essaiSuppression(){
    $lesSessions = getSessionsSuppression();
    $date = date('y-m-j');
    foreach ($lesSessions as $uneSession){
        $dateEssai = $uneSession['suppression'];
        if($dateEssai <= $date){
            supprimerSession($uneSession['idSession']);
        }
    }
}

function supprimerSession($idSession){
    $pdo = connexionBD();

    //suppression organisation de spectacle
    $sql = "DELETE FROM organisationspectacle WHERE idSession = ".$idSession;
    $res = $pdo->prepare($sql);
    $res->execute();
    disconnect();

    //suppression des spectacles
    $sql = "DELETE FROM spectacle WHERE idSession = ".$idSession;
    $res = $pdo->prepare($sql);
    $res->execute();
    disconnect();

    //suppression des compagnies
    $sql = "DELETE FROM compagnie WHERE idSession = ".$idSession;
    $res = $pdo->prepare($sql);
    $res->execute();
    disconnect();

    //suppression des HU_Utilisateur
    $sql = "DELETE FROM hu_utilisateur WHERE idSession = ".$idSession;
    $res = $pdo->prepare($sql);
    $res->execute();
    disconnect();

    //suppression des H_Utilisateur
    $sql = "DELETE FROM h_utilisateur WHERE idSession = ".$idSession;
    $res = $pdo->prepare($sql);
    $res->execute();
    disconnect();

    //suppression des Utilisateur

    $resultat = $pdo->query('select * from utilisateur WHERE idSession = '.$idSession);
    $res = $resultat->fetchAll();

    foreach($res as $unRes){

        $sql = "DELETE FROM liste_mission WHERE idUtilisateur = ".$unRes['idUtilisateur'];
        $res = $pdo->prepare($sql);
        $res->execute();

    }

    $sql = "DELETE FROM utilisateur WHERE idSession = ".$idSession;
    $res = $pdo->prepare($sql);
    $res->execute();









    //suppression session
    $sql = "DELETE FROM session WHERE idSession = ".$idSession;
    $res = $pdo->prepare($sql);
    $res->execute();
    disconnect();

}

function annulerDateSupprimerSession($idSession){
    $pdo = connexionBD();
    $sql = "UPDATE session SET suppression = NULL WHERE idSession = :id";
    $res = $pdo->prepare($sql);
    $res->execute(array(':id'=>$idSession));


    disconnect();



}



/* LIEU */
function getLieux(){
    $pdo = connexionBD();
    $resultat = $pdo->query('select * from lieu order by idLieu');
    $res = $resultat->fetchAll();
    disconnect();
    return $res;

}

function getLieuChoisi($idMission, $uneDateDebut)
{
    $pdo = connexionBD();
    $resultat = $pdo->query("SELECT nomLieu FROM lieu_mission WHERE idMission = ".$idMission." AND dateDebut = '".$uneDateDebut."'");
    $res = $resultat->fetchAll();
    disconnect();
    return $res;
}

function getAllAffectation()
{
    $pdo = connexionBD();
    $resultat = $pdo->query("SELECT * FROM affectation");
    $res = $resultat->fetchAll();
    disconnect();
    return $res;
}

function deleteLieuChoisiMission($idMission,$nomLieu,$dateDebut)
{
    $pdo = connexionBD();
    $sql = "DELETE FROM lieu_mission WHERE idMission = ".$idMission." AND nomLieu = '".$nomLieu."' AND dateDebut = '".$dateDebut."'";
    $res = $pdo->prepare($sql);
    $res->execute();
    disconnect();
}

function getNomLieux()
{
    $pdo = connexionBD();
    $resultat = $pdo->query('select nomLieu from lieu order by nomLieu');
    $res = $resultat->fetchAll();
    disconnect();
    return $res;

}

function getLeLieu($idLieu){
    $pdo = connexionBD();
    $resultat = $pdo->query('select * from lieu where idLieu = '.$idLieu);
    $res = $resultat->fetch();
    disconnect();
    return $res;

}

function getLeLieuMission($idMission, $dateDebut)
{
    $pdo = connexionBD();
    $resultat = $pdo->query("SELECT nomLieu FROM lieu_mission WHERE idMission = ".$idMission." AND dateDebut = '".$dateDebut."'");
    $res = $resultat->fetchAll();
    disconnect();
    return $res;
}

function selectLieuMission($idMission, $debut) //on récupère le lieu_mission pour voir si une ligne existe déjà
{
    $pdo = connexionBD();
    $resultat = $pdo->query("SELECT * FROM lieu_mission WHERE idMission = ".$idMission." AND dateDebut = '".$debut."'");
    $res = $resultat->fetch();
    disconnect();
    return $res;
}


function modifierLieu($idLieu, $nomLieu){
    $pdo = connexionBD();
    $sql = "UPDATE lieu SET nomLieu = :com WHERE idLieu = :id";
    $res = $pdo->prepare($sql);
    $res->execute(array(':com'=>$nomLieu, ':id'=>$idLieu));
    disconnect();

}

function supprimerLieu($idLieu){
    $pdo = connexionBD();

    $sql = "UPDATE organisationspectacle SET idLieu = NULL WHERE idLieu = :id";
    $res = $pdo->prepare($sql);
    $res->execute(array(':id'=>$idLieu));


    $sql = "DELETE FROM lieu WHERE idLieu = ".$idLieu;
    $res = $pdo->prepare($sql);
    $res->execute();
    disconnect();

}

function creerLieu($nomLieu){
    $pdo = connexionBD();
    $sql = "INSERT INTO lieu (nomLieu) VALUES(:nom)";
    $res = $pdo->prepare($sql);
    $res->execute(array(':nom'=>$nomLieu));
    disconnect();

}




/* BENEVOLES */
function getBenevoles(){
    $pdo = connexionBD();
    $resultat = $pdo->query('select * from utilisateur ORDER BY nom');
    $res = $resultat->fetchAll();
    disconnect();
    return $res;

}

function getBenevoleType($type, $idType, $idSession){
    $pdo = connexionBD();
    $resultat = $pdo->query('select * from hu_utilisateur H INNER JOIN utilisateur U ON H.idUtilisateur=U.idUtilisateur WHERE type = "'.$type.'" AND idType = '.$idType.' AND H.idSession = '.$idSession);
    $res = $resultat->fetchAll();
    disconnect();
    return $res;
}

function getLeBenevole($idBenevole){
    $pdo = connexionBD();
    $resultat = $pdo->query('select * from utilisateur where idUtilisateur = '.$idBenevole);
    $res = $resultat->fetch();
    disconnect();
    return $res;

}

function getEvenement($idBenevole){

	$pdo = connexionBD();
	$sql = $pdo->query("SELECT id, title, start, end FROM h_utilisateur where idUtilisateur = '$idBenevole' ");
	$res = $sql->fetchAll();
	disconnect();
	return $res;
}

function getEvenementAutres($idBenevole){

	$pdo = connexionBD();
	$sql = $pdo->query("SELECT id, title, start, end FROM hu_utilisateur where idUtilisateur = '$idBenevole' ");
	$res = $sql->fetchAll();
	disconnect();
	return $res;
}

function getPeriode($idBenevole){

	$pdo = connexionBD();
	$sql = $pdo->query("SELECT S.idSession, periodeDebut, periodeFin FROM session S INNER JOIN utilisateur U ON S.idSession = U.idSession where idUtilisateur = '$idBenevole'");
	$res = $sql->fetch();
	disconnect();
	return $res;
}


function deleteBenevole($idBenevole){
    $pdo = connexionBD();
    deleteMissionsBenevole($idBenevole);
    deleteHorairesBenevole($idBenevole);
    $sql = "DELETE FROM utilisateur WHERE idUtilisateur = ".$idBenevole;
    $res = $pdo->prepare($sql);
    $res->execute();
    disconnect();
}

function getBenevolesSession(){
    $pdo = connexionBD();
    $resultat = $pdo->query('select * from utilisateur  ORDER BY nom');
    $res = $resultat->fetchAll();
    disconnect();
    return $res;

}

function modifierInfoBenevole($idBenevole, $info){
    $pdo = connexionBD();
    $sql = "UPDATE utilisateur SET commentaires = :com WHERE idUtilisateur = :id";
    $res = $pdo->prepare($sql);
    $res->execute(array(':com'=>$info, ':id'=>$idBenevole));
    disconnect();

}



/* H_BENEVOLES */
function deleteHorairesBenevole($idBenevole){
    $pdo = connexionBD();
    $sql = "DELETE FROM h_utilisateur WHERE idUtilisateur = ".$idBenevole;
    $res = $pdo->prepare($sql);
    $res->execute();

    $sql = "DELETE FROM hu_utilisateur WHERE idUtilisateur = ".$idBenevole;
    $res = $pdo->prepare($sql);
    $res->execute();
}

function deleteHorairesType($type, $idType){
    $pdo = connexionBD();
    $sql = "DELETE FROM hu_utilisateur WHERE type = '".$type."' AND idType = ".$idType;
    $res = $pdo->prepare($sql);
    $res->execute();
    disconnect();
}

function ajouterHoraireBenevole($start, $end, $idBenevole, $type, $idType, $idSession){

    $pdo = connexionBD();
    $sql = "INSERT INTO hu_utilisateur (start, end, idUtilisateur, type, idType, idSession) VALUES('".$start."', '".$end."', ".$idBenevole." , '".$type."', ".$idType.", ".$idSession.", '#228B22')";
    $res = $pdo->prepare($sql);
    $res->execute();
    disconnect();

}

function supprimerHoraireBenevole($start, $end, $idBenevole, $type, $idType, $idSession){

    $pdo = connexionBD();
    $sql = "DELETE FROM hu_utilisateur WHERE start = '".$start."' AND end = '".$end."' AND idUtilisateur =  ".$idBenevole." AND type = '".$type."' AND idType = ".$idType." AND idSession = ".$idSession;
    $res = $pdo->prepare($sql);
    $res->execute();
    disconnect();

}

function enleverHoraireBenevole($idType, $idBenevole, $type){

    $pdo = connexionBD();
    $sql = "DELETE FROM hu_utilisateur WHERE type = '".$type."' AND idType = ".$idType." AND idUtilisateur = ".$idBenevole;
    $res = $pdo->prepare($sql);
    $res->execute();
    disconnect();

}

function getLesHorairesBenevoles($idSession, $type){
    $pdo = connexionBD();
    $resultat = $pdo->query("select * from hu_utilisateur WHERE idSession = ".$idSession." AND type = '".$type."'");
    $res = $resultat->fetchAll();
    disconnect();
    return $res;

}

function getIdBenevolesHoraireLibre($debut, $fin, $idSession){
    $pdo = connexionBD();
    $idBenevolesHC = getIdBenevolesHorairesChoisis($debut, $fin, $idSession);

    foreach($idBenevolesHC as $unIdBenevolesHC){

        $passe = 1;

        if($unIdBenevolesHC != 0){
            $resultat = $pdo->query('select * from hu_utilisateur WHERE idSession = '.$idSession.' AND idUtilisateur ='.$unIdBenevolesHC);
            $res = $resultat->fetchAll();

            foreach($res as $unRes){
                $leDebut = $unRes['start'];
                $leDebut = date('Y-m-d H:i:s', strtotime($leDebut. ' + 1 minutes'));
                $laFin = $unRes['end'];
                $laFin = date('Y-m-d H:i:s', strtotime($laFin. ' - 1 minutes'));

                while ($leDebut <= $laFin){
                    $arrayPeriode[] = $leDebut;
                    $leDebut = date('Y-m-d H:i:s', strtotime($leDebut. ' + 10 minutes'));
                }
                if(isset($arrayPeriode)){
                    foreach($arrayPeriode as $uneArrayPeriode){
                        if($uneArrayPeriode >= $debut && $uneArrayPeriode <= $fin){
                            $passe = 0;
                        }
                    }

                    unset($arrayPeriode);

                }


            }



        }
        if($passe == 1){
            $idBenevole[]=$unIdBenevolesHC;
        }

    }

    if(isset($idBenevole)){
        $un=1;
    }
    else{
        $idBenevole[]=0;
    }
    return $idBenevole;



}

function getIdBenevole($nom, $prenom, $sexe, $mail)
{
    $pdo = connexionBD();
    $resultat = $pdo->query("SELECT idUtilisateur FROM utilisateur WHERE nom = '".$nom."' AND prenom = '".$prenom."' AND sexe = '".$sexe."' AND email = '".$mail."'");
    $res = $resultat->fetch();
    return $res;
}

function getLesHorairesDuBenevole($idUtilisateur)
{
    $pdo = connexionBD();
    $resultat = $pdo->query("SELECT * FROM h_utilisateur WHERE idUtilisateur = ".$idUtilisateur);
    $res = $resultat->fetchAll();
    return $res;
}

function getLesHorairesDef($idSession){
    $pdo = connexionBD();
    $resultat = $pdo->query('select * from h_utilisateur WHERE idSession = '.$idSession);
    $res = $resultat->fetchAll();
    return $res;


}

function getLesHorairesUti($idSession){
    $pdo = connexionBD();
    $resultat = $pdo->query('select * from hu_utilisateur WHERE idSession = '.$idSession);
    $res = $resultat->fetchAll();
    return $res;


}

function getIdBenevolesHorairesChoisis($debut, $fin, $idSession){
    $pdo = connexionBD();
    $lesBenevoles = getBenevolesSession($idSession);

    $unePasse=0;

    foreach($lesBenevoles as $unBenevole){

        $resultat = $pdo->query('select * from h_utilisateur WHERE idSession = '.$idSession.' AND idUtilisateur ='.$unBenevole['idUtilisateur']);
        $res = $resultat->fetchAll();

        $passe=0;


        foreach($res as $unRes){
            if ($unRes['start'] <= $debut && $unRes['end'] >= $fin){
                $passe=1;
            }
        }

        if($passe==1){
            $idBenevoles[] = $unBenevole['idUtilisateur'];
            $unePasse=1;
        }

    }

    if($unePasse==0){
        $idBenevoles[] = 0;
    }

    return $idBenevoles;

}







/* COMPAGNIES */
function getCompagniesSession($idSession){
    $pdo = connexionBD();
    $resultat = $pdo->query('select * from compagnie where idSession = '.$idSession);
    $res = $resultat->fetchAll();
    disconnect();
    return $res;

}

function getLaCompagnie($idCompagnie){
    $pdo = connexionBD();
    $resultat = $pdo->query('select * from compagnie where idCompagnie = '.$idCompagnie.' ORDER BY nomCompagnie');
    $res = $resultat->fetch();
    disconnect();
    return $res;

}

function supprimerCompagnie($idCompagnie){
    $pdo = connexionBD();
    supprimerLesSpectacles($idCompagnie);

    $sql = "DELETE FROM compagnie WHERE idCompagnie = ".$idCompagnie;
    $res = $pdo->prepare($sql);
    $res->execute();
}

function creerCompagnie($idSession, $nomCompagnie){
    $pdo = connexionBD();


    $sql = "INSERT INTO compagnie (nomCompagnie, idSession) VALUES(:nom, :idSession)";
    $res = $pdo->prepare($sql);
    $res->execute(array(':nom'=>$nomCompagnie, ':idSession'=>$idSession));
    disconnect();

}

function modifierCompagnie($idCompagnie, $nomCompagnie){
    $pdo = connexionBD();


    $sql = "UPDATE compagnie SET nomCompagnie = :nom WHERE idCompagnie = :id";
    $res = $pdo->prepare($sql);
    $res->execute(array(':nom'=>$nomCompagnie, ':id'=>$idCompagnie));
    disconnect();

}




/* SPECTACLES */
function getSpectaclesSession($idSession){
    $pdo = connexionBD();
    $resultat = $pdo->query('select * from spectacle where idSession = '.$idSession.' ORDER BY nomSpectacle');
    $res = $resultat->fetchAll();
    disconnect();
    return $res;

}

function getSpectaclesCompagnie($idCompagnie){
    $pdo = connexionBD();
    $resultat = $pdo->query('select * from spectacle where idCompagnie = '.$idCompagnie.' ORDER BY nomSpectacle');
    $res = $resultat->fetchAll();
    disconnect();
    return $res;

}

function supprimerSpectacle($idSpectacle){
    supprimerLesOrganisationsSpectacle($idSpectacle);
    $pdo = connexionBD();
    $sql = "DELETE FROM spectacle WHERE idSpectacle = ".$idSpectacle;
    $res = $pdo->prepare($sql);
    $res->execute();
}

function supprimerLesSpectacles($idCompagnie){
    $lesSpectacles = getSpectaclesCompagnie($idCompagnie);
    foreach ($lesSpectacles as $unSpectacle){
        supprimerLesOrganisationsSpectacle($unSpectacle['idSpectacle']);
    }

    $pdo = connexionBD();
    $sql = "DELETE FROM spectacle WHERE idCompagnie = ".$idCompagnie;
    $res = $pdo->prepare($sql);
    $res->execute();
}

function creerSpectacle($idSession, $nomSpectacle, $duree, $idCompagnie){
    $pdo = connexionBD();
    $sql = "INSERT INTO spectacle (nomSpectacle, dureeMin, idSession, idCompagnie) VALUES(:nom, :duree, :idSession, :idCompagnie)";
    $res = $pdo->prepare($sql);
    $res->execute(array(':nom'=>$nomSpectacle, ':duree'=>$duree, ':idSession'=>$idSession, ':idCompagnie'=>$idCompagnie));
    disconnect();

}

function getLeSpectacle($idSpectacle){
    $pdo = connexionBD();
    $resultat = $pdo->query('select * from spectacle where idSpectacle = '.$idSpectacle);
    $res = $resultat->fetch();
    disconnect();
    return $res;

}



function modifierSpectacle($idSpectacle, $nomSpectacle){
    $pdo = connexionBD();


    $sql = "UPDATE spectacle SET nomSpectacle = :nom WHERE idSpectacle = :id";
    $res = $pdo->prepare($sql);
    $res->execute(array(':nom'=>$nomSpectacle, ':id'=>$idSpectacle));
    disconnect();

}




/* ORGANISATION_SPECTACLES */

function supprimerLesOrganisationsSpectacle($idSpectacle){
    $pdo = connexionBD();

    $resultat = $pdo->query('select * from organisationspectacle where idSpectacle = '.$idSpectacle);
    $res = $resultat->fetchAll();

    foreach($res as $unRes){
        SupprimerOrganisationSpectacle($unRes['idOrganisationSpectacle']);
    }


    disconnect();
}

function SupprimerOrganisationSpectacle($idOrganisation){
    $pdo = connexionBD();
    $sql = "DELETE FROM organisationspectacle WHERE idOrganisationSpectacle = ".$idOrganisation;
    $res = $pdo->prepare($sql);
    $res->execute();

    deleteHorairesType("OrganisationSpectacle", $idOrganisation);

    disconnect();
}

function ajouterOrganisationSpectacle($idSpectacle, $idSession, $dateDebut, $dateFin, $idLieu, $info, $secu){
    $pdo = connexionBD();

    if($idLieu == 0){
        $sql = "INSERT INTO organisationspectacle (idSpectacle, idSession, dateDebut, dateFin, info, secu) VALUES(:idSpectacle, :idSession, :dateDebut, :dateFin, :info, :secu)";
        $res = $pdo->prepare($sql);
        $res->execute(array(':idSpectacle'=>$idSpectacle, ':idSession'=>$idSession, ':dateDebut'=>$dateDebut, ':dateFin'=>$dateFin, ':info'=>$info, ':secu'=>$secu));
    }
    else{
        $sql = "INSERT INTO organisationspectacle (idSpectacle, idSession, dateDebut, dateFin, idLieu, info, secu) VALUES(:idSpectacle, :idSession, :dateDebut, :dateFin, :lieu, :info, :secu)";
        $res = $pdo->prepare($sql);
        $res->execute(array(':idSpectacle'=>$idSpectacle, ':idSession'=>$idSession, ':dateDebut'=>$dateDebut, ':dateFin'=>$dateFin, ':lieu'=>$idLieu, ':info'=>$info, ':secu'=>$secu));

    }



    disconnect();

}

function getOrganisationsSpectaclesSession($idSession){
    $pdo = connexionBD();
    $resultat = $pdo->query('select * from organisationspectacle where idSession = '.$idSession.' ORDER BY dateDebut');
    $res = $resultat->fetchAll();
    disconnect();
    return $res;
}

function getOrganisationsSpectaclesSessionLieu($idSession, $idLieu){
    $pdo = connexionBD();
    $resultat = $pdo->query('select * from organisationspectacle where idSession = '.$idSession.' AND idLieu = '.$idLieu.' ORDER BY dateDebut');
    $res = $resultat->fetchAll();
    disconnect();
    return $res;
}

function getUneOrganisation($idOrganisation){
    $pdo = connexionBD();
    $resultat = $pdo->query('select * from organisationspectacle where idOrganisationSpectacle = '.$idOrganisation);
    $res = $resultat->fetch();
    disconnect();
    return $res;

}

function ModifierOrganisationSpectacleInfo($idOrganisation, $idLieu, $info){
    $pdo = connexionBD();

    $sql = "UPDATE organisationspectacle SET info = :info WHERE idOrganisationSpectacle = :id";
    $res = $pdo->prepare($sql);
    $res->execute(array(':info'=>$info, ':id'=>$idOrganisation));

    if($idLieu!="0"){
        $sql = "UPDATE organisationspectacle SET idLieu = :idLieu WHERE idOrganisationSpectacle = :id";
        $res = $pdo->prepare($sql);
        $res->execute(array(':idLieu'=>$idLieu, ':id'=>$idOrganisation));
    }
    disconnect();

}

function ModifierOrganisationSpectacleDate($idOrganisation, $dateFin){
    $pdo = connexionBD();
    $sql = "UPDATE organisationspectacle SET dateFin = :date WHERE idOrganisationSpectacle = :id";
    $res = $pdo->prepare($sql);
    $res->execute(array(':date'=>$dateFin, ':id'=>$idOrganisation));

    $sql = "UPDATE organisationspectacle SET secu = 1 WHERE idOrganisationSpectacle = :id";
    $res = $pdo->prepare($sql);
    $res->execute(array(':id'=>$idOrganisation));
    disconnect();

}





/* ACCUEILS_PUBLICS */
function getAccueilPublicSession($idSession){
    $pdo = connexionBD();
    $resultat = $pdo->query('select * from accueilpublic where idSession = '.$idSession.' ORDER BY start');
    $res = $resultat->fetchAll();
    disconnect();
    return $res;
}

/* AFFECTATION */
/* on stock dans la bdd dans quel représentation le bénévole est affecté */
function addAffectation($idBenevole, $idMission, $debut, $fin) //AJOUTER UNE AFFECTATION
{
    $pdo = connexionBD();
    $req = "INSERT INTO affectation (idUtilisateur, idMission, dateDebut, dateFin)
            VALUES (:benevole, :mission, :debut, :fin)";
    $res = $pdo->prepare($req);
    $res->execute(array(':benevole'=>$idBenevole, ':mission'=>$idMission, ':debut'=>$debut, ':fin'=>$fin));
    disconnect();
}

function addLieuAffectation($lieu, $idBenevole, $dateDebut)
{
    $pdo = connexionBD();
    $req="UPDATE affectation SET nomLieu = :lieu WHERE idUtilisateur = :benevole AND dateDebut = :debut";
    $res=$pdo->prepare($req);
    $res->execute(array(':lieu' => $lieu, ':benevole' => $idBenevole, ':debut' => $dateDebut));
    disconnect();

}

function selectLieu($idMission,$debut,$fin) //récupéré le lieu de la mission
{
    $pdo=connexionBD();
    $req=$pdo->query("SELECT nomLieu FROM lieu_mission WHERE idMission = ".$idMission." AND dateDebut = '".$debut."'");
    $res=$req->fetchAll();
    return $res;
    disconnect();
}

function deleteAllAffectation($idMission,$nomLieu,$dateDebut)
{
    $pdo=connexionBD();
    $req = "DELETE FROM affectation WHERE  idMission = ".$idMission." AND nomLieu = '".$nomLieu."' AND dateDebut = '".$dateDebut."'";
    $res = $pdo->prepare($req);
    $res->execute();
}

//on supprime l'affectation de ce bénévole
function deleteAffectation($idBenevole, $mission, $debut)
{
    $pdo = connexionBD();
    $req = "DELETE FROM affectation WHERE idUtilisateur = ".$idBenevole." AND idMission = ".$mission." AND dateDebut = '".$debut."'";
    $res = $pdo->prepare($req);
    $res->execute();

}

//on récupère l'id du lieu
function getLieuPlanningBenevol($idUtilisateur, $debut, $fin)
{
    $pdo = connexionBD();
    $req = $pdo->query("SELECT idLieu FROM affectation WHERE idUtilisateur = ".$idUtilisateur." AND dateRepresentationDebut =< ".$debut." AND dateRepresentationFin => ".$fin."");
    $res = $req->fetch();
    disconnect();
    return $res;

}

//on récupère le nom du lieu
function getNomLieu($idLieu)
{
    $pdo=connexionBD();
    $req=$pdo->query('SELECT nomLieu FROM lieu WHERE idLieu = '.$idLieu);
    $res=$req->fetch();
    disconnect();
    return $req;
}


/* MISSIONS */

///////////////////////////////////////////
// A VOIR
function addLieuMission($idMission, $lieu, $debut, $fin) //AJOUTER LE LIEU AVEC LA MISSION
{
    $pdo = connexionBD();
    $req = "INSERT INTO lieu_mission (idMission, nomLieu, dateDebut, dateFin) VALUES (:idM, :lieu, :debut, :fin)";
    $res = $pdo->prepare($req);
    $res->execute(array(':idM'=>$idMission, ':lieu'=>$lieu, ':debut'=>$debut, ':fin'=>$fin));
    disconnect();
}

function getAllLieuMission()
{
    $pdo=connexionBD();
    $req=$pdo->query('SELECT * FROM lieu_mission GROUP BY idMission');
    $res=$req->fetch();
    disconnect();
    return $req;
}
///////////////////////////////////////////

function deleteMissionsBenevole($idBenevole){
    $pdo = connexionBD();
    $sql = "DELETE FROM liste_mission WHERE idUtilisateur = ".$idBenevole;
    $res = $pdo->prepare($sql);
    $res->execute();
}

function getMissionsBenevole($idBenevole){
    $pdo = connexionBD();
    $resultat = $pdo->query('select * from liste_mission where idUtilisateur = '.$idBenevole);
    $res = $resultat->fetchAll();
    disconnect();
    return $res;
}

function getMissions(){
    $pdo = connexionBD();
    $resultat = $pdo->query('select * from liste_mission');
    $res = $resultat->fetchAll();
    disconnect();
    return $res;
}









/* OLIVIER */

function infosCompagnie()
{
	$pdo = connexionBD();
	$req = "SELECT idOrganisationSpectacle, dateDebut, dateFin, info, nomCompagnie, nomSpectacle, dureeMin, nomLieu
			from Lieu L INNER JOIN ( organisationspectacle O INNER JOIN (spectacle S INNER JOIN compagnie C
			On C.idCompagnie = S.idCompagnie) ON S.idSpectacle = O.idSpectacle) ON O.idLieu = L.idLieu
			ORDER BY dateDebut, dateFin";
	$res = $pdo->query($req);
	$Leslignes = $res->fetchAll();
	return $Leslignes;
	disconnect();
}

function infosCompagnieLieu($idLieu)
{
	$pdo = connexionBD();
	$req = "SELECT idOrganisationSpectacle, dateDebut, dateFin, info, nomCompagnie, nomSpectacle, dureeMin
			from lieu L INNER JOIN ( organisationspectacle O INNER JOIN (spectacle S INNER JOIN compagnie C
			On C.idCompagnie = S.idCompagnie) ON S.idSpectacle = O.idSpectacle) ON O.idLieu = L.idLieu
			WHERE L.idLieu = '$idLieu' ORDER BY dateDebut, dateFin";
	$res = $pdo->query($req);
	$Leslignes = $res->fetchAll();
	return $Leslignes;
	disconnect();
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

function export_data_to_xls($data, $filename)
{
	// Tells to the browser that a file is returned, with its name : $filename.xls
    header("Content-disposition: attachment; filename=$filename.xls");
    // Tells to the browser that the content is a xls file
    header("Content-Type: text/xls");

	$idSession = $_SESSION['idsession'];
    $laSession = getLaSession($idSession);
    $lesCompagnies = getCompagniesSession($idSession);

    include("application/views/excels/excelCompagnie.php");

    // I open PHP memory as a file
    $fp = fopen("php://output", 'w');

    // Insert the UTF-8 BOM in the file
    fputs($fp, $bom =( chr(0xEF) . chr(0xBB) . chr(0xBF) ));

    // I add the array keys as CSV headers
    fputcsv($fp,array_keys($data[0]),$delimiter,$enclosure);

    // Add all the data in the file
    foreach ($data as $fields) {
        fputcsv($fp, $fields,$delimiter,$enclosure);
    }

    // Close the file
    fclose($fp);

    // Stop the script
    die();
}

?>
