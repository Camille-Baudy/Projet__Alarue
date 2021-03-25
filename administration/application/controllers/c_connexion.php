<?php
/* Le controleur de page qui gére les personnes */
//Déterminer quelle action est demandée

if(isset($_SESSION['newsession'])){
    if($_SESSION['newsession'] == 1){
        $securite = 1;
    }

}

if(isset($securite)){
    if($securite == 1)
    {
        if(isset($_GET['action'])){
            $action = $_GET['action'];
        }
        else
        {
            if(isset($_POST['action'])){
                $action = $_POST['action'];
            }
            else{
                $action='home';
            }
        }


        /*si action = une_valeur est envoyé au script nous avons récupéré dans $action la valeur et read sinon*/

        switch ($action) {
            /* HOME */

            case 'home':
            {
                if (isset($_REQUEST['idSession'])) {
                    $_SESSION['idsession'] = $_REQUEST['idSession'];
                }
                if (isset($_SESSION['idsession'])) {
                    $idSession = $_SESSION['idsession'];

                    $_SESSION['navbar'] = 0;
                    require_once MODELSPATH.'f_administrateur.php';
                    if (isset($_REQUEST['nom'])) {
                        $nomSession = $_REQUEST['nom'];
                        personne\modifierNomSession($idSession, $nomSession);
                    }


                    $lesBenevoles = personne\getBenevolesSession($idSession);
                    $lesLieux = personne\getLieux();
                    $laSession = personne\getLaSession($idSession);
                    $lesSessions = personne\getSessions();
                    require_once TEMPLATESPATH.'v_header.php';
                    require_once VIEWSPATH.'v_home.php';
                } else {
                    require_once MODELSPATH.'f_administrateur.php';
                    personne\essaiSuppression();


                    $lesSessions = personne\getSessions();
                    $lesSessionsSup = personne\getSessionsSuppression();
                    $date = date('y-m-j');

                    $lesSessions = personne\getSessions();
                    require_once VIEWSPATH.'v_session.php';
                    break;
                }

                break;
            }

            case 'valideConnexion2':
            {

                require_once MODELSPATH.'f_administrateur.php';

                if (isset($_REQUEST['nom'])) {
                    if (isset($_REQUEST['dateDebut'])) {
                        if (isset($_REQUEST['dateFin'])) {
                            $nomSession = $_REQUEST['nom'];
                            $debut = $_REQUEST['dateDebut'];
                            $fin = $_REQUEST['dateFin'];
                            if ($debut<=$fin) {
                                personne\ajouterSession($nomSession, $debut, $fin);
                            } else {
                                personne\ajouterSession($nomSession, $fin, $debut);
                            }
                        }
                    }
                }

                $lesSessions = personne\getSessions();
                //personne\essaiSuppression();

                //$lesSessionsSup = personne\getSessionsSuppression();

                require_once VIEWSPATH.'v_session.php';
                break;
            }


            case 'supprimerSession':
            {

                require_once MODELSPATH.'f_administrateur.php';



             //   personne\dateSupprimerSession($_REQUEST['idSession']);
                $lesSessions = personne\getSessions();
                $lesSessionsSup = personne\getSessionsSuppression();
                personne\supprimerSession($_REQUEST['idSession']);
                require_once VIEWSPATH.'v_session.php';
                break;
            }

            case 'annulerSupprimerSession':
            {

                require_once MODELSPATH.'f_administrateur.php';



                personne\annulerDateSupprimerSession($_REQUEST['idSession']);
                $lesSessions = personne\getSessions();
                $lesSessionsSup = personne\getSessionsSuppression();
                require_once VIEWSPATH.'v_session.php';
                break;
            }

            /* LIEU */

            case 'supprimerLieuChoisiMissionAP': //accueil public
            {
                $idSession = $_SESSION['idsession'];
                require_once MODELSPATH.'f_administrateur.php';
                $laSession = personne\getLaSession($idSession);

                //on récupère le nom du lieu
                $nomLieu=$_POST['nomLieu'];
                //on récupère l'heure du début
                $dateDebut=$_POST['dateDebut'];
                //on récupère l'id de la mission
                $idMission=$_POST['idMission'];
                //on supprimer toutes les affectations faites avec ce lieu
                personne\deleteAllAffectation($idMission,$nomLieu,$dateDebut);
                //on supprime le lieu de cette mission pour cette heure donnée
                personne\deleteLieuChoisiMission($idMission,$nomLieu,$dateDebut);

                require_once TEMPLATESPATH.'v_header.php';
                require_once VIEWSPATH.'v_accueil_public.php';
                break;
            }

            case 'supprimerLieuChoisiMissionB': //buvette
            {
                $idSession = $_SESSION['idsession'];
                require_once MODELSPATH.'f_administrateur.php';
                $laSession = personne\getLaSession($idSession);

                //on récupère le nom du lieu
                $nomLieu=$_POST['nomLieu'];
                //on récupère l'heure du début
                $dateDebut=$_POST['dateDebut'];
                //on récupère l'id de la mission
                $idMission=$_POST['idMission'];
                //on supprimer toutes les affectations faites avec ce lieu
                personne\deleteAllAffectation($idMission,$nomLieu,$dateDebut);
                //on supprime le lieu de cette mission pour cette heure donnée
                personne\deleteLieuChoisiMission($idMission,$nomLieu,$dateDebut);

                require_once TEMPLATESPATH.'v_header.php';
                require_once VIEWSPATH.'v_buvette.php';
                break;
            }

            case 'supprimerLieuChoisiMissionC': //caravane
            {
                $idSession = $_SESSION['idsession'];
                require_once MODELSPATH.'f_administrateur.php';
                $laSession = personne\getLaSession($idSession);

                //on récupère le nom du lieu
                $nomLieu=$_POST['nomLieu'];
                //on récupère l'heure du début
                $dateDebut=$_POST['dateDebut'];
                //on récupère l'id de la mission
                $idMission=$_POST['idMission'];
                //on supprimer toutes les affectations faites avec ce lieu
                personne\deleteAllAffectation($idMission,$nomLieu,$dateDebut);
                //on supprime le lieu de cette mission pour cette heure donnée
                personne\deleteLieuChoisiMission($idMission,$nomLieu,$dateDebut);

                require_once TEMPLATESPATH.'v_header.php';
                require_once VIEWSPATH.'v_caravane.php';
                break;
            }

            case 'supprimerLieuChoisiMissionD': //déco
            {
                $idSession = $_SESSION['idsession'];
                require_once MODELSPATH.'f_administrateur.php';
                $laSession = personne\getLaSession($idSession);

                //on récupère le nom du lieu
                $nomLieu=$_POST['nomLieu'];
                //on récupère l'heure du début
                $dateDebut=$_POST['dateDebut'];
                //on récupère l'id de la mission
                $idMission=$_POST['idMission'];
                //on supprimer toutes les affectations faites avec ce lieu
                personne\deleteAllAffectation($idMission,$nomLieu,$dateDebut);
                //on supprime le lieu de cette mission pour cette heure donnée
                personne\deleteLieuChoisiMission($idMission,$nomLieu,$dateDebut);

                require_once TEMPLATESPATH.'v_header.php';
                require_once VIEWSPATH.'v_deco.php';
                break;
            }

            case 'supprimerLieuChoisiMissionL': //logistique
            {
                $idSession = $_SESSION['idsession'];
                require_once MODELSPATH.'f_administrateur.php';
                $laSession = personne\getLaSession($idSession);

                //on récupère le nom du lieu
                $nomLieu=$_POST['nomLieu'];
                //on récupère l'heure du début
                $dateDebut=$_POST['dateDebut'];
                //on récupère l'id de la mission
                $idMission=$_POST['idMission'];
                //on supprimer toutes les affectations faites avec ce lieu
                personne\deleteAllAffectation($idMission,$nomLieu,$dateDebut);
                //on supprime le lieu de cette mission pour cette heure donnée
                personne\deleteLieuChoisiMission($idMission,$nomLieu,$dateDebut);

                require_once TEMPLATESPATH.'v_header.php';
                require_once VIEWSPATH.'v_logistique.php';
                break;
            }

            case 'supprimerLieuChoisiMissionR': //restauration
            {
                $idSession = $_SESSION['idsession'];
                require_once MODELSPATH.'f_administrateur.php';
                $laSession = personne\getLaSession($idSession);

                //on récupère le nom du lieu
                $nomLieu=$_POST['nomLieu'];
                //on récupère l'heure du début
                $dateDebut=$_POST['dateDebut'];
                //on récupère l'id de la mission
                $idMission=$_POST['idMission'];
                //on supprimer toutes les affectations faites avec ce lieu
                personne\deleteAllAffectation($idMission,$nomLieu,$dateDebut);
                //on supprime le lieu de cette mission pour cette heure donnée
                personne\deleteLieuChoisiMission($idMission,$nomLieu,$dateDebut);

                require_once TEMPLATESPATH.'v_header.php';
                require_once VIEWSPATH.'v_restauration.php';
                break;
            }

            case 'supprimerLieuChoisiMissionT': //technique
            {
                $idSession = $_SESSION['idsession'];
                require_once MODELSPATH.'f_administrateur.php';
                $laSession = personne\getLaSession($idSession);

                //on récupère le nom du lieu
                $nomLieu=$_POST['nomLieu'];
                //on récupère l'heure du début
                $dateDebut=$_POST['dateDebut'];
                //on récupère l'id de la mission
                $idMission=$_POST['idMission'];
                //on supprimer toutes les affectations faites avec ce lieu
                personne\deleteAllAffectation($idMission,$nomLieu,$dateDebut);
                //on supprime le lieu de cette mission pour cette heure donnée
                personne\deleteLieuChoisiMission($idMission,$nomLieu,$dateDebut);

                require_once TEMPLATESPATH.'v_header.php';
                require_once VIEWSPATH.'v_technique.php';
                break;
            }

            case 'modifierLieu':
            {
                $idSession = $_SESSION['idsession'];
                $_SESSION['navbar'] = 0;
                require_once MODELSPATH.'f_administrateur.php';
                $laSession = personne\getLaSession($idSession);
                $nomLieu = $_REQUEST['nom'];
                $idLieu = $_REQUEST['id'];
                personne\modifierLieu($idLieu, $nomLieu);
                $lesLieux = personne\getLieux();

                require_once TEMPLATESPATH.'v_header.php';
                require_once VIEWSPATH.'v_home.php';
                break;
            }

            case 'supprimerLieu':
            {
                $idSession = $_SESSION['idsession'];
                $_SESSION['navbar'] = 0;
                require_once MODELSPATH.'f_administrateur.php';
                $laSession = personne\getLaSession($idSession);
                $idLieu = $_REQUEST['id'];
                personne\supprimerLieu($idLieu);
                $lesLieux = personne\getLieux();

                require_once TEMPLATESPATH.'v_header.php';
                require_once VIEWSPATH.'v_home.php';
                break;
            }

            case 'creerLieu':
            {
                $idSession = $_SESSION['idsession'];
                $_SESSION['navbar'] = 0;
                require_once MODELSPATH.'f_administrateur.php';
                $laSession = personne\getLaSession($idSession);
                $nomLieu = $_REQUEST['nom'];
                personne\creerLieu($nomLieu);
                $lesLieux = personne\getLieux();

                require_once TEMPLATESPATH.'v_header.php';
                require_once VIEWSPATH.'v_home.php';
                break;
            }

            case 'creerOrganisationSpectacleLieu':
            {
                $_SESSION['navbar'] = 0;
                $idSession = $_SESSION['idsession'];
                require_once MODELSPATH.'f_administrateur.php';
                $laSession = personne\getLaSession($idSession);
                $debut = $laSession['periodeDebut'];
                $fin = $laSession['periodeFin'];

                $idLieu = $_REQUEST['idLieu'];
                $leLieu = personne\getLeLieu($idLieu);

                $heure = $_REQUEST['heure'];
                $minute = $_REQUEST['minute'];
                $idSpectacle = $_REQUEST['idSpectacle'];
                $date = $_REQUEST['date'];
                $info = $_REQUEST['info'];

                $lesOrganisationsSpectacles = personne\getOrganisationsSpectaclesSessionLieu($idSession, $idLieu);
                $lesCompagnies = personne\getCompagniesSession($idSession);
                $lesSpectacles = personne\getSpectaclesSession($idSession);

                $dateDebut= $date." ".$heure.":".$minute.":00";

                $secu = 0;
                foreach ($lesSpectacles as $unSpectacle) {
                    if ($unSpectacle['idSpectacle']==$idSpectacle) {
                        if ($unSpectacle['dureeMin']!=0) {
                            $secu = 1;
                            $minute = $minute+$unSpectacle['dureeMin'];
                            if ($minute==60) {
                                $minute = 0;
                                $heure = $heure+1;
                            }
                            if ($minute==90) {
                                $minute = 30;
                                $heure = $heure+1;
                            }
                            if ($minute==120) {
                                $minute = 0;
                                $heure = $heure+2;
                            }
                            if ($minute==150) {
                                $minute = 30;
                                $heure = $heure+2;
                            }
                            if ($minute==180) {
                                $minute = 0;
                                $heure = $heure+3;
                            }
                            if ($minute==210) {
                                $minute = 30;
                                $heure = $heure+3;
                            }
                            if ($heure >=24) {
                                $heure = $heure - 24;
                                $date = date('Y-m-d', strtotime($date. ' + 1 days'));
                            }
                        }
                    }
                }
                $dateFin= $date." ".$heure.":".$minute.":00";



                personne\ajouterOrganisationSpectacle($idSpectacle, $idSession, $dateDebut, $dateFin, $idLieu, $info, $secu);





                $lesOrganisationsSpectacles = personne\getOrganisationsSpectaclesSessionLieu($idSession, $idLieu);
                $lesCompagnies = personne\getCompagniesSession($idSession);
                $lesSpectacles = personne\getSpectaclesSession($idSession);
                $type = "OrganisationSpectacle";
                $lesHorairesBenevoles = personne\getLesHorairesBenevoles($idSession, $type);

                require_once TEMPLATESPATH.'v_header.php';
                require_once VIEWSPATH.'v_lieu_info.php';

                break;

            }

            case 'ModifierOrganisationSpectacleDateLieu':
            {
                $_SESSION['navbar'] = 0;
                $idSession = $_SESSION['idsession'];
                require_once MODELSPATH.'f_administrateur.php';
                $laSession = personne\getLaSession($idSession);
                $debut = $laSession['periodeDebut'];
                $fin = $laSession['periodeFin'];



                $heure = $_REQUEST['heure'];
                $minute = $_REQUEST['minute'];
                $idOrganisation = $_REQUEST['idOrganisation'];
                $date = $_REQUEST['date'];

                if (!empty($_REQUEST['choix'])) {
                    $date = date('Y-m-d', strtotime($date. ' + 1 days'));
                }

                $dateFin= $date." ".$heure.":".$minute.":00";

                personne\ModifierOrganisationSpectacleDate($idOrganisation, $dateFin);



                $idLieu = $_REQUEST['idLieu'];
                $leLieu = personne\getLeLieu($idLieu);
                $lesOrganisationsSpectacles = personne\getOrganisationsSpectaclesSessionLieu($idSession, $idLieu);
                $lesCompagnies = personne\getCompagniesSession($idSession);
                $lesSpectacles = personne\getSpectaclesSession($idSession);
                $type = "OrganisationSpectacle";
                $lesHorairesBenevoles = personne\getLesHorairesBenevoles($idSession, $type);

                require_once TEMPLATESPATH.'v_header.php';
                require_once VIEWSPATH.'v_lieu_info.php';

                break;

            }

            case 'voirLeLieu':
            {
                $_SESSION['navbar'] = 0;
                $idSession = $_SESSION['idsession'];
                require_once MODELSPATH.'f_administrateur.php';
                $laSession = personne\getLaSession($idSession);
                $debut = $laSession['periodeDebut'];
                $fin = $laSession['periodeFin'];

                /* POUR SUPPRIMER UNE ORGANISATION LIEE A UN LIEU */
                if (isset($_GET['unvar'])) {
                    $idOrganisation = $_GET['unvar'];
                    personne\SupprimerOrganisationSpectacle($idOrganisation);
                }
                else /* SINON ON AFFICHE LES INFOS CONCERNANT CETTE ORGANISATION */
                {
                    $idLieu = $_GET['var'];
                    $leLieu = personne\getLeLieu($idLieu);
                    $lesOrganisationsSpectacles = personne\getOrganisationsSpectaclesSessionLieu($idSession, $idLieu);
                    $lesCompagnies = personne\getCompagniesSession($idSession);
                    $lesSpectacles = personne\getSpectaclesSession($idSession);
                    $type = "OrganisationSpectacle";
                    $lesHorairesBenevoles = personne\getLesHorairesBenevoles($idSession, $type);

                }


                require_once TEMPLATESPATH.'v_header.php';
                require_once VIEWSPATH.'v_lieu_info.php';

                break;

            }

            case 'supprVoirLeLieu':
                {
                    $_SESSION['navbar'] = 0;
                    $idSession = $_SESSION['idsession'];
                    require_once MODELSPATH.'f_administrateur.php';
                    $laSession = personne\getLaSession($idSession);
                    $debut = $laSession['periodeDebut'];
                    $fin = $laSession['periodeFin'];

                    if (isset($_GET['unvar'])) {
                        $idOrganisation = $_GET['unvar'];
                        personne\SupprimerOrganisationSpectacle($idOrganisation);
                    }

                    require_once TEMPLATESPATH.'v_header.php';
                    require_once VIEWSPATH.'v_lieu_info.php';

                    break;

                }





             /* SESSIONS */

            case 'creerSession':
            {
                $_SESSION['navbar'] = 0;
                require_once MODELSPATH.'f_administrateur.php';
                require_once TEMPLATESPATH.'v_header.php';
                require_once VIEWSPATH.'v_session.php';
                break;
            }

            case 'validerSession':
            {
                $_SESSION['navbar'] = 0;
                $nomSession = $_POST['nom'];
                $debut = $_POST['dateDebut'];
                $fin = $_POST['dateFin'];
                require_once MODELSPATH.'f_administrateur.php';
                require_once TEMPLATESPATH.'v_header.php';
                require_once VIEWSPATH.'v_home.php';
                $creerSession = personne\ajouterSession($nomSession, $debut, $fin);

                break;
            }





            /* BENEVOLES */

            case 'voirBenevoles':
            {

                $_SESSION['navbar'] = 1;
                $idSession = $_SESSION['idsession'];
                require_once MODELSPATH.'f_administrateur.php';
                if (isset($_REQUEST['bloque'])) {
                    if ($_REQUEST['bloque']==0) {
                        personne\modifierBloquageSession($idSession, 1);
                    } else {
                        personne\modifierBloquageSession($idSession, 0);
                    }
                }
                $laSession = personne\getLaSession($idSession);
                $lesBenevoles = personne\getBenevolesSession($idSession);
                require_once TEMPLATESPATH.'v_header.php';
                require_once VIEWSPATH.'v_benevole.php';

                break;
            }

            case 'supprimerBenevole':
            {
                $_SESSION['navbar'] = 1;
                $idSession = $_SESSION['idsession'];
                $idBenevole = $_GET['var'];
                require_once MODELSPATH.'f_administrateur.php';
                $laSession = personne\getLaSession($idSession);
                personne\deleteBenevole($idBenevole);
                $lesBenevoles = personne\getBenevolesSession($idSession);
                require_once TEMPLATESPATH.'v_header.php';
                require_once VIEWSPATH.'v_benevole.php';

                break;
            }

            case 'voirLeBenevole':
            {
                $_SESSION['navbar'] = 1;
                $idSession = $_SESSION['idsession'];
                require_once MODELSPATH.'f_administrateur.php';
                $idBenevole = $_GET['var'];
                $_SESSION['idBenevole'] = $idBenevole;
                $leBenevole = personne\getLeBenevole($idBenevole);
                $lesMissions = personne\getMissionsBenevole($idBenevole);
                $lesAffectations = personne\getAllAffectation();
                require_once TEMPLATESPATH.'v_header.php';
                require_once VIEWSPATH.'v_benevole_info.php';

                break;

            }

            case 'voirCalendrier':
            {
                $_SESSION['navbar'] = 1;
                $idBenevole = $_SESSION['idBenevole'];
                require_once MODELSPATH.'f_administrateur.php';
                $events = personne\getEvenement($idBenevole);
                $eventsAutres = personne\getEvenementAutres($idBenevole);
                $laDate = personne\getPeriode($idBenevole);
                $info = personne\getLeBenevole($idBenevole);
                require_once CALENDARAPPATH.'v_calendrier.php';
                break;
            }

            case 'add':
            {
                $idBenevole = $_SESSION['idBenevole'];
                require_once MODELSPATH.'f_administrateur.php';
                $events = personne\getEvenement($idBenevole);
                require_once CALENDARAPPATH.'v_addEvent.php';
                break;
            }

            case 'edit':
            {
                $idBenevole = $_SESSION['idBenevole'];
                require_once MODELSPATH.'f_administrateur.php';
                $events = personne\getEvenement($idBenevole);
                require_once CALENDARAPPATH.'v_editEventTitle.php';
                require_once CALENDARAPPATH.'v_editEventDate.php';
                break;
            }

            case 'modifierInfoBenevole':
            {
                $_SESSION['navbar'] = 1;
                $idSession = $_SESSION['idsession'];
                $idBenevole = $_SESSION['idbenevole'];
                $info = $_REQUEST['info'];
                require_once MODELSPATH.'f_administrateur.php';
                personne\modifierInfoBenevole($idBenevole, $info);
                $lesBenevoles = personne\getBenevolesSession($idSession);
                require_once TEMPLATESPATH.'v_header.php';
                require_once VIEWSPATH.'v_benevole.php';
                break;
            }

            // AJOUTER LE LIEU POUR LES MISSIONS
            case 'addLieuMissionAP': //accueil public
            {
                //on récupère la mission
                $idMission=2;
                //on récupère le créneau horaire
                $debut=$_POST['dateDebut'];
                $fin=$_POST['dateFin'];
                //on récupère le lieu
                $lieu=$_POST['nomLieu'];
                $infoLieu=$lieu;                
                require_once MODELSPATH.'f_administrateur.php';
                //on stocke tout dans une table provisoire
                $var=personne\addLieuMission($idMission, $lieu, $debut, $fin);
                //on raffiche le template
                require_once TEMPLATESPATH.'v_header.php';
                //on raffiche la view
                $idSession = $_SESSION['idsession'];
                require_once MODELSPATH.'f_administrateur.php';
                $laSession = personne\getLaSession($idSession);
                require_once VIEWSPATH.'v_accueil_public.php';
                break;
            }

            case 'addLieuMissionB': //buvette
            {
                //on récupère la mission
                $idMission=6;
                //on récupère le créneau horaire
                $debut=$_POST['dateDebut'];
                $fin=$_POST['dateFin'];
                //on récupère le lieu
                $lieu=$_POST['nomLieu'];
                $infoLieu=$lieu;
                //on stocke tout dans une table provisoire
                require_once MODELSPATH.'f_administrateur.php';
                $var=personne\addLieuMission($idMission, $lieu, $debut, $fin);
                //on raffiche le template
                require_once TEMPLATESPATH.'v_header.php';
                //on raffiche la view
                $idSession = $_SESSION['idsession'];
                require_once MODELSPATH.'f_administrateur.php';
                $laSession = personne\getLaSession($idSession);
                require_once VIEWSPATH.'v_buvette.php';
                break;
            }

            case 'addLieuMissionC': //caravane
            {
                //on récupère la mission
                $idMission=3;
                //on récupère le créneau horaire
                $debut=$_POST['dateDebut'];
                $fin=$_POST['dateFin'];
                //on récupère le lieu
                $lieu=$_POST['nomLieu'];
                $infoLieu=$lieu;
                //on stocke tout dans une table provisoire
                require_once MODELSPATH.'f_administrateur.php';
                $var=personne\addLieuMission($idMission, $lieu, $debut, $fin);
                //on raffiche le template
                require_once TEMPLATESPATH.'v_header.php';
                //on raffiche la view
                $idSession = $_SESSION['idsession'];
                require_once MODELSPATH.'f_administrateur.php';
                $laSession = personne\getLaSession($idSession);
                require_once VIEWSPATH.'v_caravane.php';
                break;
            }

            case 'addLieuMissionD': //deco
            {
                //on récupère la mission
                $idMission=1;
                //on récupère le créneau horaire
                $debut=$_POST['dateDebut'];
                $fin=$_POST['dateFin'];
                //on récupère le lieu
                $lieu=$_POST['nomLieu'];
                $infoLieu=$lieu;
                //on stocke tout dans une table provisoire
                require_once MODELSPATH.'f_administrateur.php';
                $var=personne\addLieuMission($idMission, $lieu, $debut, $fin);
                //on raffiche le template
                require_once TEMPLATESPATH.'v_header.php';
                //on raffiche la view
                $idSession = $_SESSION['idsession'];
                require_once MODELSPATH.'f_administrateur.php';
                $laSession = personne\getLaSession($idSession);
                require_once VIEWSPATH.'v_deco.php';
                break;
            }

            case 'addLieuMissionL': //logistique
            {
                //on récupère la mission
                $idMission=7;
                //on récupère le créneau horaire
                $debut=$_POST['dateDebut'];
                $fin=$_POST['dateFin'];
                //on récupère le lieu
                $lieu=$_POST['nomLieu'];
                $infoLieu=$lieu;
                //on stocke tout dans une table provisoire
                require_once MODELSPATH.'f_administrateur.php';
                $var=personne\addLieuMission($idMission, $lieu, $debut, $fin);
                //on raffiche le template
                require_once TEMPLATESPATH.'v_header.php';
                //on raffiche la view
                $idSession = $_SESSION['idsession'];
                require_once MODELSPATH.'f_administrateur.php';
                $laSession = personne\getLaSession($idSession);
                require_once VIEWSPATH.'v_logistique.php';
                break;
            }

            case 'addLieuMissionR': //restauration
            {
                //on récupère la mission
                $idMission=5;
                //on récupère le créneau horaire
                $debut=$_POST['dateDebut'];
                $fin=$_POST['dateFin'];
                //on récupère le lieu
                $lieu=$_POST['nomLieu'];
                $infoLieu=$lieu;
                //on stocke tout dans une table provisoire
                require_once MODELSPATH.'f_administrateur.php';
                $var=personne\addLieuMission($idMission, $lieu, $debut, $fin);
                //on raffiche le template
                require_once TEMPLATESPATH.'v_header.php';
                //on raffiche la view
                $idSession = $_SESSION['idsession'];
                require_once MODELSPATH.'f_administrateur.php';
                $laSession = personne\getLaSession($idSession);
                require_once VIEWSPATH.'v_restauration.php';
                break;
            }

            case 'addLieuMissionT': //technique
            {
                //on récupère la mission
                $idMission=4;
                //on récupère le créneau horaire
                $debut=$_POST['dateDebut'];
                $fin=$_POST['dateFin'];
                //on récupère le lieu
                $lieu=$_POST['nomLieu'];
                $infoLieu=$lieu;
                //on stocke tout dans une table provisoire
                require_once MODELSPATH.'f_administrateur.php';
                $var=personne\addLieuMission($idMission, $lieu, $debut, $fin);
                //on raffiche le template
                require_once TEMPLATESPATH.'v_header.php';
                //on raffiche la view
                $idSession = $_SESSION['idsession'];
                require_once MODELSPATH.'f_administrateur.php';
                $laSession = personne\getLaSession($idSession);
                require_once VIEWSPATH.'v_technique.php';
                break;
            }


            /* COMPAGNIES */

            case 'voirCompagnies':
            {
                $_SESSION['navbar'] = 2;
                $idSession = $_SESSION['idsession'];
                require_once MODELSPATH.'f_administrateur.php';
                $lesCompagnies = personne\getCompagniesSession($idSession);
                require_once TEMPLATESPATH.'v_header.php';
                require_once VIEWSPATH.'v_compagnie.php';

                break;
            }

            case 'voirLaCompagnie':
            {
                $_SESSION['navbar'] = 2;
                $idSession = $_SESSION['idsession'];
                $idCompagnie = $_GET['var'];
                require_once MODELSPATH.'f_administrateur.php';
                $laCompagnie = personne\getLaCompagnie($idCompagnie);
                $lesSpectacles = personne\getSpectaclesCompagnie($idCompagnie);
                require_once TEMPLATESPATH.'v_header.php';
                require_once VIEWSPATH.'v_compagnie_info.php';

                break;
            }

            case 'creerCompagnie':
            {
                $_SESSION['navbar'] = 2;
                $idSession = $_SESSION['idsession'];
                $nomCompagnie = $_REQUEST['nom'];
                require_once MODELSPATH.'f_administrateur.php';
                if ($nomCompagnie!="") {
                    personne\creerCompagnie($idSession, $nomCompagnie);
                }
                $lesCompagnies = personne\getCompagniesSession($idSession);
                require_once TEMPLATESPATH.'v_header.php';
                require_once VIEWSPATH.'v_compagnie.php';

                break;
            }

            case 'modifierCompagnie':
            {
                $_SESSION['navbar'] = 2;
                $idSession = $_SESSION['idsession'];
                $idCompagnie = $_SESSION['idcompagnie'];
                $nomCompagnie = $_REQUEST['nom'];
                require_once MODELSPATH.'f_administrateur.php';
                if ($nomCompagnie!="") {
                    personne\modifierCompagnie($idCompagnie, $nomCompagnie);
                }

                $lesCompagnies = personne\getCompagniesSession($idSession);
                require_once TEMPLATESPATH.'v_header.php';
                require_once VIEWSPATH.'v_compagnie.php';

                break;
            }

            case 'supprimerCompagnie':
            {
                $_SESSION['navbar'] = 2;
                $idSession = $_SESSION['idsession'];
                $idCompagnie = $_GET['var'];
                require_once MODELSPATH.'f_administrateur.php';
                personne\supprimerCompagnie($idCompagnie);
                $lesCompagnies = personne\getCompagniesSession($idSession);
                require_once TEMPLATESPATH.'v_header.php';
                require_once VIEWSPATH.'v_compagnie.php';

                break;
            }





            /* SPECTACLES */

            case 'voirSpectacles':
            {
                $_SESSION['navbar'] = 3;
                $idSession = $_SESSION['idsession'];
                require_once MODELSPATH.'f_administrateur.php';
                $lesCompagnies = personne\getCompagniesSession($idSession);
                $lesSpectacles = personne\getSpectaclesSession($idSession);
                require_once TEMPLATESPATH.'v_header.php';
                require_once VIEWSPATH.'v_spectacle.php';

                break;
            }

            case 'voirLeSpectacle':
            {
                $_SESSION['navbar'] = 3;
                $idSession = $_SESSION['idsession'];
                $idSpectacle = $_GET['var'];
                require_once MODELSPATH.'f_administrateur.php';

                $type = "OrganisationSpectacle";
                $lesHorairesBenevoles = personne\getLesHorairesBenevoles($idSession, $type);

                $lesCompagnies = personne\getCompagniesSession($idSession);
                $laSession = personne\getLaSession($idSession);
                $leSpectacle = personne\getLeSpectacle($idSpectacle);
                $lesSpectacles = personne\getSpectaclesSession($idSession);
                $lesOrganisationsSpectacles = personne\getOrganisationsSpectaclesSession($idSession);
                $lesLieux = personne\getLieux();
                require_once TEMPLATESPATH.'v_header.php';
                require_once VIEWSPATH.'v_spectacle_info.php';

                break;
            }


            case 'SupprimerOrganisationDuSpectacle':
            {
                $_SESSION['navbar'] = 3;
                $idSession = $_SESSION['idsession'];
                $idSpectacle = $_SESSION['idspectacle'];
                require_once MODELSPATH.'f_administrateur.php';
                $idOrganisation = $_GET['var'];

                personne\SupprimerOrganisationSpectacle($idOrganisation);

                $type = "OrganisationSpectacle";
                $lesHorairesBenevoles = personne\getLesHorairesBenevoles($idSession, $type);

                $lesCompagnies = personne\getCompagniesSession($idSession);
                $laSession = personne\getLaSession($idSession);
                $leSpectacle = personne\getLeSpectacle($idSpectacle);
                $lesSpectacles = personne\getSpectaclesSession($idSession);
                $lesOrganisationsSpectacles = personne\getOrganisationsSpectaclesSession($idSession);
                $lesLieux = personne\getLieux();
                require_once TEMPLATESPATH.'v_header.php';
                require_once VIEWSPATH.'v_spectacle_info.php';
            }

            case 'creerOrganisationDuSpectacle':
            {
                $_SESSION['navbar'] = 3;
                $idSession = $_SESSION['idsession'];
                require_once MODELSPATH.'f_administrateur.php';
                $lesCompagnies = personne\getCompagniesSession($idSession);
                $lesSpectacles = personne\getSpectaclesSession($idSession);
                $lesOrganisationsSpectacles = personne\getOrganisationsSpectaclesSession($idSession);
                $laSession = personne\getLaSession($idSession);



                $heure = $_REQUEST['heure'];
                $minute = $_REQUEST['minute'];
                $idSpectacle = $_SESSION['idspectacle'];
                $date = $_REQUEST['date'];
                $idLieu = $_REQUEST['idLieu'];
                $info = $_REQUEST['info'];

                $dateDebut= $date." ".$heure.":".$minute.":00";

                $secu = 0;
                foreach ($lesSpectacles as $unSpectacle) {
                    if ($unSpectacle['idSpectacle']==$idSpectacle) {
                        if ($unSpectacle['dureeMin']!=0) {
                            $secu = 1;
                            $minute = $minute+$unSpectacle['dureeMin'];
                            if ($minute==60) {
                                $minute = 0;
                                $heure = $heure+1;
                            }
                            if ($minute==90) {
                                $minute = 30;
                                $heure = $heure+1;
                            }
                            if ($minute==120) {
                                $minute = 0;
                                $heure = $heure+2;
                            }
                            if ($minute==150) {
                                $minute = 30;
                                $heure = $heure+2;
                            }
                            if ($minute==180) {
                                $minute = 0;
                                $heure = $heure+3;
                            }
                            if ($minute==210) {
                                $minute = 30;
                                $heure = $heure+3;
                            }
                            if ($heure >=24) {
                                $heure = $heure - 24;
                                $date = date('Y-m-d', strtotime($date. ' + 1 days'));
                            }
                        }
                    }
                }
                $dateFin= $date." ".$heure.":".$minute.":00";



                personne\ajouterOrganisationSpectacle($idSpectacle, $idSession, $dateDebut, $dateFin, $idLieu, $info, $secu);

                $type = "OrganisationSpectacle";
                $lesHorairesBenevoles = personne\getLesHorairesBenevoles($idSession, $type);

                $lesCompagnies = personne\getCompagniesSession($idSession);
                $laSession = personne\getLaSession($idSession);
                $leSpectacle = personne\getLeSpectacle($idSpectacle);
                $lesSpectacles = personne\getSpectaclesSession($idSession);
                $lesOrganisationsSpectacles = personne\getOrganisationsSpectaclesSession($idSession);
                $lesLieux = personne\getLieux();
                require_once TEMPLATESPATH.'v_header.php';
                require_once VIEWSPATH.'v_spectacle_info.php';

                break;
            }

            case 'ModifierSpectacleOrgDate':
            {
                $_SESSION['navbar'] = 3;
                $idSession = $_SESSION['idsession'];
                $idSpectacle = $_SESSION['idspectacle'];
                require_once MODELSPATH.'f_administrateur.php';

                $heure = $_REQUEST['heure'];
                $minute = $_REQUEST['minute'];
                $idOrganisation = $_REQUEST['idOrganisation'];
                $date = $_REQUEST['date'];

                if (!empty($_REQUEST['choix'])) {
                    $date = date('Y-m-d', strtotime($date. ' + 1 days'));
                }

                $dateFin= $date." ".$heure.":".$minute.":00";

                personne\ModifierOrganisationSpectacleDate($idOrganisation, $dateFin);

                $type = "OrganisationSpectacle";
                $lesHorairesBenevoles = personne\getLesHorairesBenevoles($idSession, $type);


                $lesCompagnies = personne\getCompagniesSession($idSession);
                $laSession = personne\getLaSession($idSession);
                $leSpectacle = personne\getLeSpectacle($idSpectacle);
                $lesSpectacles = personne\getSpectaclesSession($idSession);
                $lesOrganisationsSpectacles = personne\getOrganisationsSpectaclesSession($idSession);
                $lesLieux = personne\getLieux();

                require_once TEMPLATESPATH.'v_header.php';
                require_once VIEWSPATH.'v_spectacle_info.php';

                break;
            }

            case 'creerSpectacle':
            {
                $_SESSION['navbar'] = 3;
                $idSession = $_SESSION['idsession'];
                $nomSpectacle = $_REQUEST['nom'];
                $idCompagnie = $_REQUEST['compagnie'];
                $duree = $_REQUEST['minute'];
                require_once MODELSPATH.'f_administrateur.php';
                if ($nomSpectacle!="") {
                    personne\creerSpectacle($idSession, $nomSpectacle, $duree, $idCompagnie);
                }

                $lesCompagnies = personne\getCompagniesSession($idSession);
                $lesSpectacles = personne\getSpectaclesSession($idSession);
                require_once TEMPLATESPATH.'v_header.php';
                require_once VIEWSPATH.'v_spectacle.php';

                break;
            }

            case 'supprimerSpectacle':
            {
                $_SESSION['navbar'] = 3;
                $idSession = $_SESSION['idsession']; /* on récupère l'id de la session */
                $idSpectacle = $_GET['var']; /* on récupère l'id de spectacle mit en paramètre dans l'url */
                require_once MODELSPATH.'f_administrateur.php'; /* on l'appel pour utiliser les fonctions */
                personne\supprimerSpectacle($idSpectacle);
                $lesCompagnies = personne\getCompagniesSession($idSession);
                $lesSpectacles = personne\getSpectaclesSession($idSession);
                require_once TEMPLATESPATH.'v_header.php';
                require_once VIEWSPATH.'v_spectacle.php';

                break;
            }

            case 'modifierSpectacle':
            {
                $_SESSION['navbar'] = 2;
                $idSession = $_SESSION['idsession'];
                $idSpectacle = $_SESSION['idspectacle'];
                $nomSpectacle = $_REQUEST['nom'];
                require_once MODELSPATH.'f_administrateur.php';
                if ($nomSpectacle!="") {
                    personne\modifierSpectacle($idSpectacle, $nomSpectacle);
                }

                $lesCompagnies = personne\getCompagniesSession($idSession);
                $lesSpectacles = personne\getSpectaclesSession($idSession);
                require_once TEMPLATESPATH.'v_header.php';
                require_once VIEWSPATH.'v_spectacle.php';

                break;
            }




            /* ORGANISATION_SPECTACLES */

            case 'voirOrganisationsSpectacles':
            {
                $_SESSION['navbar'] = 3;
                $idSession = $_SESSION['idsession'];
                require_once MODELSPATH.'f_administrateur.php';
                $lesCompagnies = personne\getCompagniesSession($idSession);
                $lesSpectacles = personne\getSpectaclesSession($idSession);
                $table = 0;

                if (isset($_REQUEST['dateDebut'])) {
                    if (isset($_REQUEST['dateFin'])) {
                        $table = 1;
                        $debut = $_REQUEST['dateDebut'];
                        $fin = $_REQUEST['dateFin'];
                    }
                }

                $type = "OrganisationSpectacle";
                $lesHorairesBenevoles = personne\getLesHorairesBenevoles($idSession, $type);

                $lesOrganisationsSpectacles = personne\getOrganisationsSpectaclesSession($idSession);
                $laSession = personne\getLaSession($idSession);
                $lesLieux = personne\getLieux();
                require_once TEMPLATESPATH.'v_header.php';
                require_once VIEWSPATH.'v_organisationSpectacle.php';

                break;
            }

            case 'ModifierOrganisationSpectacleDate':
            {
                $_SESSION['navbar'] = 3;
                $idSession = $_SESSION['idsession'];
                require_once MODELSPATH.'f_administrateur.php';

                $heure = $_REQUEST['heure'];
                $minute = $_REQUEST['minute'];
                $idOrganisation = $_REQUEST['idOrganisation'];
                $date = $_REQUEST['date'];
                $table = 1;
                $debut = $_REQUEST['debut'];
                $fin = $_REQUEST['fin'];

                if (!empty($_REQUEST['choix'])) {
                    $date = date('Y-m-d', strtotime($date. ' + 1 days'));
                }

                $dateFin= $date." ".$heure.":".$minute.":00";

                personne\ModifierOrganisationSpectacleDate($idOrganisation, $dateFin);

                $type = "OrganisationSpectacle";
                $lesHorairesBenevoles = personne\getLesHorairesBenevoles($idSession, $type);


                $lesCompagnies = personne\getCompagniesSession($idSession);
                $lesSpectacles = personne\getSpectaclesSession($idSession);
                $lesOrganisationsSpectacles = personne\getOrganisationsSpectaclesSession($idSession);
                $laSession = personne\getLaSession($idSession);
                $lesLieux = personne\getLieux();

                require_once TEMPLATESPATH.'v_header.php';
                require_once VIEWSPATH.'v_organisationSpectacle.php';

                break;
            }

            case 'voirUneOrganisationsSpectacles':
            {
                $_SESSION['navbar'] = 3;
                $idSession = $_SESSION['idsession'];
                $idOrganisation = $_GET['var'];
                require_once MODELSPATH.'f_administrateur.php';
                $lOrganisation = personne\getUneOrganisation($idOrganisation);
                $lesSpectacles = personne\getSpectaclesSession($idSession);
                $lesBenevoles = personne\getBenevolesSession($idSession);
                $lesBenevolesInscrits = personne\getBenevoleType("OrganisationSpectacle", $idOrganisation, $idSession);
                $debut = $lOrganisation['dateDebut'];
                $fin = $lOrganisation['dateFin'];
                $idBenevolesLibres = personne\getIdBenevolesHoraireLibre($debut, $fin, $idSession);
                $lesLieux = personne\getLieux();



                require_once TEMPLATESPATH.'v_header.php';
                require_once VIEWSPATH.'v_organisationSpectacle_info.php';

                break;
            }

            case 'modifierInfoOrganisation':
            {
                $_SESSION['navbar'] = 3;
                $idSession = $_SESSION['idsession'];
                $idOrganisation = $_REQUEST['idOrganisation'];
                $idLieu = $_REQUEST['idLieu'];
                $info = $_REQUEST['info'];
                require_once MODELSPATH.'f_administrateur.php';
                personne\ModifierOrganisationSpectacleInfo($idOrganisation, $idLieu, $info);
                $lOrganisation = personne\getUneOrganisation($idOrganisation);
                $lesSpectacles = personne\getSpectaclesSession($idSession);
                $lesBenevoles = personne\getBenevolesSession($idSession);
                $lesBenevolesInscrits = personne\getBenevoleType("OrganisationSpectacle", $idOrganisation, $idSession);
                $debut = $lOrganisation['dateDebut'];
                $fin = $lOrganisation['dateFin'];
                $idBenevolesLibres = personne\getIdBenevolesHoraireLibre($debut, $fin, $idSession);
                $lesLieux = personne\getLieux();



                require_once TEMPLATESPATH.'v_header.php';
                require_once VIEWSPATH.'v_organisationSpectacle_info.php';

                break;
            }

            case 'ajouterBenevoleOrganisation':
            {
                $_SESSION['navbar'] = 3;
                $idLieu = $_REQUEST['idLieu']; //ON RECUPERE L'ID DU LIEU
                $idSession = $_SESSION['idsession'];
                $idOrganisation = $_REQUEST['idOrganisation'];
                $debut = $_REQUEST['dateDebut'];
                $fin = $_REQUEST['dateFin'];
                $idBenevole = $_REQUEST['idBenevole'];
                $text = "OrganisationSpectacle";
                require_once MODELSPATH.'f_administrateur.php';
                personne\ajouterHoraireBenevole($debut, $fin, $idBenevole, $text, $idOrganisation, $idSession);
                $lOrganisation = personne\getUneOrganisation($idOrganisation);
                $lesSpectacles = personne\getSpectaclesSession($idSession);
                $lesBenevoles = personne\getBenevolesSession($idSession);
                $lesBenevolesInscrits = personne\getBenevoleType("OrganisationSpectacle", $idOrganisation, $idSession);
                $debut = $lOrganisation['dateDebut'];
                $fin = $lOrganisation['dateFin'];
                $idBenevolesLibres = personne\getIdBenevolesHoraireLibre($debut, $fin, $idSession);
                $lesLieux = personne\getLieux();



                require_once TEMPLATESPATH.'v_header.php';
                require_once VIEWSPATH.'v_organisationSpectacle_info.php';

                break;
            }

            case 'enleverBenevoleOrganisation':
            {
                $_SESSION['navbar'] = 3;
                $idSession = $_SESSION['idsession']; /* on récupère l'id de la session */
                $idOrganisation = $_SESSION['idorganisation']; /* on récupère l'id de l'organisation */
                $text = "OrganisationSpectacle"; /* ??? */
                $idBenevole = $_GET['var']; /* on récupère l'id du bénévole mit en paramètre dans l'url */
                require_once MODELSPATH.'f_administrateur.php'; /* on l'appel pour utiliser les fonctions */
                personne\enleverHoraireBenevole($idOrganisation, $idBenevole, $text); /* on supprime tous les créneaux horaires du bénévole */
              //  personne\deleteAffectation($idBenevole, $debut); // on supprime l'affectation
                $lOrganisation = personne\getUneOrganisation($idOrganisation); /* on récupère les infos de cette organisation */
                $lesSpectacles = personne\getSpectaclesSession($idSession); /* on récupère tous les spectacles de cette session */
                $lesBenevoles = personne\getBenevolesSession($_SESSION['idsession']); /* on récupère les bénévoles pour cette session */
                $lesBenevolesInscrits = personne\getBenevoleType("OrganisationSpectacle", $idOrganisation, $idSession); /* ??? */
                $debut = $lOrganisation['dateDebut']; /* on récupère la date du début */
                $fin = $lOrganisation['dateFin']; /* on récupère la date de fin */
                $idBenevolesLibres = personne\getIdBenevolesHoraireLibre($debut, $fin, $idSession); /* ??? */
                $lesLieux = personne\getLieux(); /* on récupère les infos de ce lieu */



                require_once TEMPLATESPATH.'v_header.php';
                require_once VIEWSPATH.'v_organisationSpectacle_info.php';

                break;
            }

            case 'creerOrganisationSpectacle':
            {
                $_SESSION['navbar'] = 3;
                $idSession = $_SESSION['idsession'];
                require_once MODELSPATH.'f_administrateur.php';
                $lesCompagnies = personne\getCompagniesSession($idSession);
                $lesSpectacles = personne\getSpectaclesSession($idSession);
                $lesOrganisationsSpectacles = personne\getOrganisationsSpectaclesSession($idSession);
                $laSession = personne\getLaSession($idSession);
                $debut = $_REQUEST['debut'];
                $fin = $_REQUEST['fin'];


                $table = 1;
                $heure = $_REQUEST['heure'];
                $minute = $_REQUEST['minute'];
                $idSpectacle = $_REQUEST['idSpectacle'];
                $date = $_REQUEST['date'];
                $idLieu = $_REQUEST['idLieu'];
                $info = $_REQUEST['info'];

                $dateDebut= $date." ".$heure.":".$minute.":00";

                $secu = 0;
                foreach ($lesSpectacles as $unSpectacle) {
                    if ($unSpectacle['idSpectacle']==$idSpectacle) {
                        if ($unSpectacle['dureeMin']!=0) {
                            $secu = 1;
                            $minute = $minute+$unSpectacle['dureeMin'];
                            if ($minute==60) {
                                $minute = 0;
                                $heure = $heure+1;
                            }
                            if ($minute==90) {
                                $minute = 30;
                                $heure = $heure+1;
                            }
                            if ($minute==120) {
                                $minute = 0;
                                $heure = $heure+2;
                            }
                            if ($minute==150) {
                                $minute = 30;
                                $heure = $heure+2;
                            }
                            if ($minute==180) {
                                $minute = 0;
                                $heure = $heure+3;
                            }
                            if ($minute==210) {
                                $minute = 30;
                                $heure = $heure+3;
                            }
                            if ($heure >=24) {
                                $heure = $heure - 24;
                                $date = date('Y-m-d', strtotime($date. ' + 1 days'));
                            }
                        }
                    }
                }
                $dateFin= $date." ".$heure.":".$minute.":00";



                personne\ajouterOrganisationSpectacle($idSpectacle, $idSession, $dateDebut, $dateFin, $idLieu, $info, $secu);


                $lesCompagnies = personne\getCompagniesSession($idSession);
                $lesSpectacles = personne\getSpectaclesSession($idSession);

                $type = "OrganisationSpectacle";
                $lesHorairesBenevoles = personne\getLesHorairesBenevoles($idSession, $type);

                $lesOrganisationsSpectacles = personne\getOrganisationsSpectaclesSession($idSession);
                $laSession = personne\getLaSession($idSession);
                $lesLieux = personne\getLieux();
                require_once TEMPLATESPATH.'v_header.php';
                require_once VIEWSPATH.'v_organisationSpectacle.php';

                break;
            }

            case 'SupprimerOrganisationSpectacle':
            {
                $_SESSION['navbar'] = 3;
                $idSession = $_SESSION['idsession'];
                require_once MODELSPATH.'f_administrateur.php';

                $debut = $_SESSION['debut'];
                $fin = $_SESSION['fin'];
                $idOrganisation = $_GET['var'];

                $table = 1;


                personne\SupprimerOrganisationSpectacle($idOrganisation);

                $type = "OrganisationSpectacle";
                $lesHorairesBenevoles = personne\getLesHorairesBenevoles($idSession, $type);
                $lesCompagnies = personne\getCompagniesSession($idSession);
                $lesSpectacles = personne\getSpectaclesSession($idSession);
                $lesOrganisationsSpectacles = personne\getOrganisationsSpectaclesSession($idSession);
                $laSession = personne\getLaSession($idSession);
                $lesLieux = personne\getLieux();

                require_once TEMPLATESPATH.'v_header.php';
                require_once VIEWSPATH.'v_organisationSpectacle.php';

                break;
            }

            // ENTRER_SITE

            case 'voirEntrerSite':
            {
                $_SESSION['navbar'] = 11;
                $idSession = $_SESSION['idsession'];
                $leTableau = 0;
                require_once MODELSPATH.'f_administrateur.php';
                $laSession = personne\getLaSession($idSession);
                require_once TEMPLATESPATH.'v_header.php';
                require_once VIEWSPATH.'v_entrer_site.php';

                break;
            }

            case 'chercherEntrerSite':
            {
                $_SESSION['navbar'] = 11;
                $idSession = $_SESSION['idsession'];
                $leTableau = 1;
                $date = $_REQUEST['date'];
                require_once MODELSPATH.'f_administrateur.php';
                $laSession = personne\getLaSession($idSession);

                $type = "EntréeSite";
                $lesHorairesBenevoles = personne\getLesHorairesBenevoles($idSession, $type);

                $lesBenevoles = personne\getBenevolesSession($idSession);



                require_once TEMPLATESPATH.'v_header.php';
                require_once VIEWSPATH.'v_entrer_site.php';

                break;
            }

            case 'addLieuMissionES':
            {
                //on récupère la mission
                $idMission=8;
                //on récupère le créneau horaire
                $debut=$_POST['dateDebut'];
                $fin=$_POST['dateFin'];
                //on récupère le lieu
                $lieu=$_POST['nomLieu'];
                $infoLieu=$lieu;                
                require_once MODELSPATH.'f_administrateur.php';
                //on stocke tout dans une table provisoire
                $var=personne\addLieuMission($idMission, $lieu, $debut, $fin);
                //on raffiche le template
                require_once TEMPLATESPATH.'v_header.php';
                //on raffiche la view
                $idSession = $_SESSION['idsession'];
                require_once MODELSPATH.'f_administrateur.php';
                $laSession = personne\getLaSession($idSession);
                require_once VIEWSPATH.'v_entrer_site.php';
                break;
            }

            case 'ajouterBenevoleEntreeSite':
            {
                $_SESSION['navbar'] = 11;
                $idSession = $_SESSION['idsession'];
                $leTableau = 1;
                $date = $_REQUEST['date'];
                $debut = $_REQUEST['dateDebut'];
                $fin = $_REQUEST['dateFin'];
                $text = "EntréeSite";
                $idAP = 0;
                $mission=8;
                $idBenevole = $_REQUEST['idBenevole'];
                require_once MODELSPATH.'f_administrateur.php';
                $lieu=$_REQUEST['lieu'];
                personne\addAffectation($idBenevole,$mission,$debut,$fin);                    
                personne\addLieuAffectation($lieu, $idBenevole, $debut);

                personne\ajouterHoraireBenevole($debut, $fin, $idBenevole, $text, $idAP, $idSession);

                $laSession = personne\getLaSession($idSession);

                $type = "EntréeSite";
                $lesHorairesBenevoles = personne\getLesHorairesBenevoles($idSession, $type);
                $lesBenevoles = personne\getBenevolesSession($idSession);



                require_once TEMPLATESPATH.'v_header.php';
                require_once VIEWSPATH.'v_entrer_site.php';

                break;
            }

            case 'supprimerLieuChoisiMissionES':
            {
                $_SESSION['navbar'] = 11;
                $idSession = $_SESSION['idsession'];
                $leTableau = 1;
                $date = $_REQUEST['date'];
                $debut = $_REQUEST['dateDebut'];
                $fin = $_REQUEST['dateFin'];
                $text = "EntréeSite";
                $idAP = 0;
                $idBenevole = $_REQUEST['idBenevole'];
                require_once MODELSPATH.'f_administrateur.php';
                personne\supprimerHoraireBenevole($debut, $fin, $idBenevole, $text, $idAP, $idSession);
                $mission=8;
                personne\deleteAffectation($idBenevole,$mission,$debut);
                $laSession = personne\getLaSession($idSession);

                $type = "EntréeSite";
                $lesHorairesBenevoles = personne\getLesHorairesBenevoles($idSession, $type);
                $lesBenevoles = personne\getBenevolesSession($idSession);



                require_once TEMPLATESPATH.'v_header.php';
                require_once VIEWSPATH.'v_entrer_site.php';

                break;
            }

            case 'supprimerBenevoleEntrerSite':
            {
                $_SESSION['navbar'] = 11;
                $idSession = $_SESSION['idsession'];
                $leTableau = 1;
                $date = $_REQUEST['date'];
                $debut = $_REQUEST['dateDebut'];
                $fin = $_REQUEST['dateFin'];
                $text = "EntréeSite";
                $idAP = 0;
                $idBenevole = $_REQUEST['idBenevole'];
                require_once MODELSPATH.'f_administrateur.php';
                personne\supprimerHoraireBenevole($debut, $fin, $idBenevole, $text, $idAP, $idSession);
                $mission=8;
                personne\deleteAffectation($idBenevole,$mission,$debut);
                $laSession = personne\getLaSession($idSession);

                $type = "EntréeSite";
                $lesHorairesBenevoles = personne\getLesHorairesBenevoles($idSession, $type);
                $lesBenevoles = personne\getBenevolesSession($idSession);



                require_once TEMPLATESPATH.'v_header.php';
                require_once VIEWSPATH.'v_entrer_site.php';

                break;
            }


            /* ACCUEIL PUBLIC */

            case 'voirAccueilsPublics':
            {
                $_SESSION['navbar'] = 4;
                $idSession = $_SESSION['idsession'];
                $leTableau = 0;
                require_once MODELSPATH.'f_administrateur.php';
                $laSession = personne\getLaSession($idSession);
                require_once TEMPLATESPATH.'v_header.php';
                require_once VIEWSPATH.'v_accueil_public.php';

                break;
            }

            case 'chercherAccueilPublic':
            {
                $_SESSION['navbar'] = 4;
                $idSession = $_SESSION['idsession'];
                $leTableau = 1;
                $date = $_REQUEST['date'];
                require_once MODELSPATH.'f_administrateur.php';
                $laSession = personne\getLaSession($idSession);

                $type = "AccueilPublic";
                $lesHorairesBenevoles = personne\getLesHorairesBenevoles($idSession, $type);

                $lesBenevoles = personne\getBenevolesSession($idSession);



                require_once TEMPLATESPATH.'v_header.php';
                require_once VIEWSPATH.'v_accueil_public.php';

                break;
            }

            case 'ajouterBenevoleAccueilPublic':
            {
                $_SESSION['navbar'] = 4;
                $idSession = $_SESSION['idsession'];
                $leTableau = 1;
                $date = $_REQUEST['date'];
                $debut = $_REQUEST['dateDebut'];
                $fin = $_REQUEST['dateFin'];
                $text = "AccueilPublic";
                $idAP = 0;
                $mission=2;
                $idBenevole = $_REQUEST['idBenevole'];
                require_once MODELSPATH.'f_administrateur.php';
                $lieu=$_REQUEST['lieu'];
                personne\addAffectation($idBenevole,$mission,$debut,$fin);                    
                personne\addLieuAffectation($lieu, $idBenevole, $debut);

                personne\ajouterHoraireBenevole($debut, $fin, $idBenevole, $text, $idAP, $idSession);

                $laSession = personne\getLaSession($idSession);

                $type = "AccueilPublic";
                $lesHorairesBenevoles = personne\getLesHorairesBenevoles($idSession, $type);
                $lesBenevoles = personne\getBenevolesSession($idSession);



                require_once TEMPLATESPATH.'v_header.php';
                require_once VIEWSPATH.'v_accueil_public.php';

                break;
            }

            case 'supprimerBenevoleAccueilPublic':
            {
                $_SESSION['navbar'] = 4;
                $idSession = $_SESSION['idsession'];
                $leTableau = 1;
                $date = $_REQUEST['date'];
                $debut = $_REQUEST['dateDebut'];
                $fin = $_REQUEST['dateFin'];
                $text = "AccueilPublic";
                $idAP = 0;
                $idBenevole = $_REQUEST['idBenevole'];
                require_once MODELSPATH.'f_administrateur.php';
                personne\supprimerHoraireBenevole($debut, $fin, $idBenevole, $text, $idAP, $idSession);
                $mission=2;
                personne\deleteAffectation($idBenevole,$mission,$debut);
                $laSession = personne\getLaSession($idSession);

                $type = "AccueilPublic";
                $lesHorairesBenevoles = personne\getLesHorairesBenevoles($idSession, $type);
                $lesBenevoles = personne\getBenevolesSession($idSession);



                require_once TEMPLATESPATH.'v_header.php';
                require_once VIEWSPATH.'v_accueil_public.php';

                break;
            }




            /* BUVETTE */

            case 'voirBuvettes':
            {
                $_SESSION['navbar'] = 5;
                $idSession = $_SESSION['idsession'];
                $leTableau = 0;
                require_once MODELSPATH.'f_administrateur.php';
                $laSession = personne\getLaSession($idSession);
                require_once TEMPLATESPATH.'v_header.php';
                require_once VIEWSPATH.'v_buvette.php';

                break;
            }

            case 'chercherBuvettes':
            {
                $_SESSION['navbar'] = 5;
                $idSession = $_SESSION['idsession'];
                $leTableau = 1;
                $date = $_REQUEST['date'];
                require_once MODELSPATH.'f_administrateur.php';
                $laSession = personne\getLaSession($idSession);

                $type = "Buvette";
                $lesHorairesBenevoles = personne\getLesHorairesBenevoles($idSession, $type);

                $lesBenevoles = personne\getBenevolesSession($idSession);



                require_once TEMPLATESPATH.'v_header.php';
                require_once VIEWSPATH.'v_buvette.php';

                break;
            }

            case 'ajouterBuvette':
            {
                $_SESSION['navbar'] = 5;
                $idSession = $_SESSION['idsession'];
                $leTableau = 1;
                $date = $_REQUEST['date'];
                $debut = $_REQUEST['dateDebut'];
                $fin = $_REQUEST['dateFin'];
                $text = "Buvette";
                $idAP = 0;
                $idBenevole = $_REQUEST['idBenevole'];
                $mission=6;
                require_once MODELSPATH.'f_administrateur.php';
                $lieu=$_REQUEST['lieu'];
                personne\addAffectation($idBenevole,$mission,$debut,$fin);                    
                personne\addLieuAffectation($lieu, $idBenevole, $debut);
                personne\ajouterHoraireBenevole($debut, $fin, $idBenevole, $text, $idAP, $idSession);

                $laSession = personne\getLaSession($idSession);

                $type = "Buvette";
                $lesHorairesBenevoles = personne\getLesHorairesBenevoles($idSession, $type);
                $lesBenevoles = personne\getBenevolesSession($idSession);



                require_once TEMPLATESPATH.'v_header.php';
                require_once VIEWSPATH.'v_buvette.php';

                break;
            }

            case 'supprimerBuvette':
            {
                $_SESSION['navbar'] = 5;
                $idSession = $_SESSION['idsession'];
                $leTableau = 1;
                $date = $_REQUEST['date'];
                $debut = $_REQUEST['dateDebut'];
                $fin = $_REQUEST['dateFin'];
                $text = "Buvette";
                $idAP = 0;
                $idBenevole = $_REQUEST['idBenevole'];
                require_once MODELSPATH.'f_administrateur.php';
                $mission=6;
                personne\deleteAffectation($idBenevole,$mission,$debut);

                personne\supprimerHoraireBenevole($debut, $fin, $idBenevole, $text, $idAP, $idSession);

                $laSession = personne\getLaSession($idSession);

                $type = "Buvette";
                $lesHorairesBenevoles = personne\getLesHorairesBenevoles($idSession, $type);
                $lesBenevoles = personne\getBenevolesSession($idSession);



                require_once TEMPLATESPATH.'v_header.php';
                require_once VIEWSPATH.'v_buvette.php';

                break;
            }



            /* CARAVANE */

            case 'voirCaravanes':
            {
                $_SESSION['navbar'] = 6;
                $idSession = $_SESSION['idsession'];
                $leTableau = 0;
                require_once MODELSPATH.'f_administrateur.php';
                $laSession = personne\getLaSession($idSession);
                require_once TEMPLATESPATH.'v_header.php';
                require_once VIEWSPATH.'v_caravane.php';

                break;
            }

            case 'chercherCaravanes':
            {
                $_SESSION['navbar'] = 6;
                $idSession = $_SESSION['idsession'];
                $leTableau = 1;
                $date = $_REQUEST['date'];
                require_once MODELSPATH.'f_administrateur.php';
                $laSession = personne\getLaSession($idSession);

                $type = "Caravane";
                $lesHorairesBenevoles = personne\getLesHorairesBenevoles($idSession, $type);

                $lesBenevoles = personne\getBenevolesSession($idSession);



                require_once TEMPLATESPATH.'v_header.php';
                require_once VIEWSPATH.'v_caravane.php';

                break;
            }

            case 'ajouterCaravane':
            {
                $_SESSION['navbar'] = 6;
                $idSession = $_SESSION['idsession'];
                $leTableau = 1;
                $date = $_REQUEST['date'];
                $debut = $_REQUEST['dateDebut'];
                $fin = $_REQUEST['dateFin'];
                $text = "Caravane";
                $idAP = 0;
                $mission=3;
                $idBenevole = $_REQUEST['idBenevole'];
                require_once MODELSPATH.'f_administrateur.php';
                $lieu=$_REQUEST['lieu'];
                personne\addAffectation($idBenevole,$mission,$debut,$fin);                    
                personne\addLieuAffectation($lieu, $idBenevole, $debut);
                personne\ajouterHoraireBenevole($debut, $fin, $idBenevole, $text, $idAP, $idSession);

                $laSession = personne\getLaSession($idSession);

                $type = "Caravane";
                $lesHorairesBenevoles = personne\getLesHorairesBenevoles($idSession, $type);
                $lesBenevoles = personne\getBenevolesSession($idSession);



                require_once TEMPLATESPATH.'v_header.php';
                require_once VIEWSPATH.'v_caravane.php';

                break;
            }

            case 'supprimerCaravane':
            {
                $_SESSION['navbar'] = 6;
                $idSession = $_SESSION['idsession'];
                $leTableau = 1;
                $date = $_REQUEST['date'];
                $debut = $_REQUEST['dateDebut'];
                $fin = $_REQUEST['dateFin'];
                $text = "Caravane";
                $idAP = 0;
                $idBenevole = $_REQUEST['idBenevole'];
                require_once MODELSPATH.'f_administrateur.php';
                $mission=3;
                personne\deleteAffectation($idBenevole,$mission,$debut);

                personne\supprimerHoraireBenevole($debut, $fin, $idBenevole, $text, $idAP, $idSession);

                $laSession = personne\getLaSession($idSession);

                $type = "Caravane";
                $lesHorairesBenevoles = personne\getLesHorairesBenevoles($idSession, $type);
                $lesBenevoles = personne\getBenevolesSession($idSession);



                require_once TEMPLATESPATH.'v_header.php';
                require_once VIEWSPATH.'v_caravane.php';

                break;
            }




            /* DÉCO */

            case 'voirDecos':
            {
                $_SESSION['navbar'] = 7;
                $idSession = $_SESSION['idsession'];
                $leTableau = 0;
                require_once MODELSPATH.'f_administrateur.php';
                $laSession = personne\getLaSession($idSession);
                require_once TEMPLATESPATH.'v_header.php';
                require_once VIEWSPATH.'v_deco.php';

                break;
            }

            case 'chercherDecos':
            {
                $_SESSION['navbar'] = 7;
                $idSession = $_SESSION['idsession'];
                $leTableau = 1;
                $date = $_REQUEST['date'];
                require_once MODELSPATH.'f_administrateur.php';
                $laSession = personne\getLaSession($idSession);

                $type = "Deco";
                $lesHorairesBenevoles = personne\getLesHorairesBenevoles($idSession, $type);

                $lesBenevoles = personne\getBenevolesSession($idSession);



                require_once TEMPLATESPATH.'v_header.php';
                require_once VIEWSPATH.'v_deco.php';

                break;
            }

            case 'ajouterDeco':
            {
                $_SESSION['navbar'] = 7;
                $idSession = $_SESSION['idsession'];
                $leTableau = 1;
                $date = $_REQUEST['date'];
                $debut = $_REQUEST['dateDebut'];
                $fin = $_REQUEST['dateFin'];
                $text = "Deco";
                $idAP = 0;
                $mission=1;
                $idBenevole = $_REQUEST['idBenevole'];
                require_once MODELSPATH.'f_administrateur.php';
                $lieu=$_REQUEST['lieu'];
                personne\addAffectation($idBenevole,$mission,$debut,$fin);                    
                personne\addLieuAffectation($lieu, $idBenevole, $debut);
                personne\ajouterHoraireBenevole($debut, $fin, $idBenevole, $text, $idAP, $idSession);

                $laSession = personne\getLaSession($idSession);

                $type = "Deco";
                $lesHorairesBenevoles = personne\getLesHorairesBenevoles($idSession, $type);
                $lesBenevoles = personne\getBenevolesSession($idSession);



                require_once TEMPLATESPATH.'v_header.php';
                require_once VIEWSPATH.'v_deco.php';

                break;
            }

            case 'supprimerDeco':
            {
                $_SESSION['navbar'] = 7;
                $idSession = $_SESSION['idsession'];
                $leTableau = 1;
                $date = $_REQUEST['date'];
                $debut = $_REQUEST['dateDebut'];
                $fin = $_REQUEST['dateFin'];
                $text = "Deco";
                $idAP = 0;
                $idBenevole = $_REQUEST['idBenevole'];
                require_once MODELSPATH.'f_administrateur.php';
                $mission=1;
                personne\deleteAffectation($idBenevole,$mission,$debut);

                personne\supprimerHoraireBenevole($debut, $fin, $idBenevole, $text, $idAP, $idSession);

                $laSession = personne\getLaSession($idSession);

                $type = "Deco";
                $lesHorairesBenevoles = personne\getLesHorairesBenevoles($idSession, $type);
                $lesBenevoles = personne\getBenevolesSession($idSession);



                require_once TEMPLATESPATH.'v_header.php';
                require_once VIEWSPATH.'v_deco.php';

                break;
            }



            /* LOGISTIQUE */

            case 'voirLogistiques':
            {
                $_SESSION['navbar'] = 8;
                $idSession = $_SESSION['idsession'];
                $leTableau = 0;
                require_once MODELSPATH.'f_administrateur.php';
                $laSession = personne\getLaSession($idSession);
                require_once TEMPLATESPATH.'v_header.php';
                require_once VIEWSPATH.'v_logistique.php';

                break;
            }

            case 'chercherLogistiques':
            {
                $_SESSION['navbar'] = 7;
                $idSession = $_SESSION['idsession'];
                $leTableau = 1;
                $date = $_REQUEST['date'];
                require_once MODELSPATH.'f_administrateur.php';
                $laSession = personne\getLaSession($idSession);

                $type = "Logistique";
                $lesHorairesBenevoles = personne\getLesHorairesBenevoles($idSession, $type);

                $lesBenevoles = personne\getBenevolesSession($idSession);



                require_once TEMPLATESPATH.'v_header.php';
                require_once VIEWSPATH.'v_logistique.php';

                break;
            }

            case 'ajouterLogistique':
            {
                $_SESSION['navbar'] = 7;
                $idSession = $_SESSION['idsession'];
                $leTableau = 1;
                $date = $_REQUEST['date'];
                $debut = $_REQUEST['dateDebut'];
                $fin = $_REQUEST['dateFin'];
                $text = "Logistique";
                $idAP = 0;
                $mission=7;
                $idBenevole = $_REQUEST['idBenevole'];
                require_once MODELSPATH.'f_administrateur.php';
                $lieu=$_REQUEST['lieu'];
                personne\addAffectation($idBenevole,$mission,$debut,$fin);                    
                personne\addLieuAffectation($lieu, $idBenevole, $debut);
                personne\ajouterHoraireBenevole($debut, $fin, $idBenevole, $text, $idAP, $idSession);

                $laSession = personne\getLaSession($idSession);

                $type = "Logistique";
                $lesHorairesBenevoles = personne\getLesHorairesBenevoles($idSession, $type);
                $lesBenevoles = personne\getBenevolesSession($idSession);



                require_once TEMPLATESPATH.'v_header.php';
                require_once VIEWSPATH.'v_logistique.php';

                break;
            }

            case 'supprimerLogistique':
            {
                $_SESSION['navbar'] = 7;
                $idSession = $_SESSION['idsession'];
                $leTableau = 1;
                $date = $_REQUEST['date'];
                $debut = $_REQUEST['dateDebut'];
                $fin = $_REQUEST['dateFin'];
                $text = "Logistique";
                $idAP = 0;
                $idBenevole = $_REQUEST['idBenevole'];
                require_once MODELSPATH.'f_administrateur.php';
                $mission=7;
                personne\deleteAffectation($idBenevole,$mission,$debut);

                personne\supprimerHoraireBenevole($debut, $fin, $idBenevole, $text, $idAP, $idSession);

                $laSession = personne\getLaSession($idSession);

                $type = "Logistique";
                $lesHorairesBenevoles = personne\getLesHorairesBenevoles($idSession, $type);
                $lesBenevoles = personne\getBenevolesSession($idSession);



                require_once TEMPLATESPATH.'v_header.php';
                require_once VIEWSPATH.'v_logistique.php';

                break;
            }




            /* RESTAURATION */

            case 'voirRestaurations':
            {
                $_SESSION['navbar'] = 9;
                $idSession = $_SESSION['idsession'];
                $leTableau = 0;
                require_once MODELSPATH.'f_administrateur.php';
                $laSession = personne\getLaSession($idSession);
                require_once TEMPLATESPATH.'v_header.php';
                require_once VIEWSPATH.'v_restauration.php';

                break;
            }

            case 'chercherRestaurations':
            {
                $_SESSION['navbar'] = 9;
                $idSession = $_SESSION['idsession'];
                $leTableau = 1;
                $date = $_REQUEST['date'];
                require_once MODELSPATH.'f_administrateur.php';
                $laSession = personne\getLaSession($idSession);

                $type = "Restauration";
                $lesHorairesBenevoles = personne\getLesHorairesBenevoles($idSession, $type);

                $lesBenevoles = personne\getBenevolesSession($idSession);



                require_once TEMPLATESPATH.'v_header.php';
                require_once VIEWSPATH.'v_restauration.php';

                break;
            }

            case 'ajouterRestauration':
            {
                $_SESSION['navbar'] = 9;
                $idSession = $_SESSION['idsession'];
                $leTableau = 1;
                $date = $_REQUEST['date'];
                $debut = $_REQUEST['dateDebut'];
                $fin = $_REQUEST['dateFin'];
                $text = "Restauration";
                $idAP = 0;
                $mission=5;
                $idBenevole = $_REQUEST['idBenevole'];
                require_once MODELSPATH.'f_administrateur.php';
                $lieu=$_REQUEST['lieu'];
                personne\addAffectation($idBenevole,$mission,$debut,$fin);                    
                personne\addLieuAffectation($lieu, $idBenevole, $debut);
                personne\ajouterHoraireBenevole($debut, $fin, $idBenevole, $text, $idAP, $idSession);

                $laSession = personne\getLaSession($idSession);

                $type = "Restauration";
                $lesHorairesBenevoles = personne\getLesHorairesBenevoles($idSession, $type);
                $lesBenevoles = personne\getBenevolesSession($idSession);



                require_once TEMPLATESPATH.'v_header.php';
                require_once VIEWSPATH.'v_restauration.php';

                break;
            }

            case 'supprimerRestauration':
            {
                $_SESSION['navbar'] = 9;
                $idSession = $_SESSION['idsession'];
                $leTableau = 1;
                $date = $_REQUEST['date'];
                $debut = $_REQUEST['dateDebut'];
                $fin = $_REQUEST['dateFin'];
                $text = "Restauration";
                $idAP = 0;
                $idBenevole = $_REQUEST['idBenevole'];
                require_once MODELSPATH.'f_administrateur.php';
                $mission=5;
                personne\deleteAffectation($idBenevole,$mission,$debut);

                personne\supprimerHoraireBenevole($debut, $fin, $idBenevole, $text, $idAP, $idSession);

                $laSession = personne\getLaSession($idSession);

                $type = "Restauration";
                $lesHorairesBenevoles = personne\getLesHorairesBenevoles($idSession, $type);
                $lesBenevoles = personne\getBenevolesSession($idSession);



                require_once TEMPLATESPATH.'v_header.php';
                require_once VIEWSPATH.'v_restauration.php';

                break;
            }





            /* TECHNIQUE */

            case 'voirTechniques':
            {
                $_SESSION['navbar'] = 10;
                $idSession = $_SESSION['idsession'];
                $leTableau = 0;
                require_once MODELSPATH.'f_administrateur.php';
                $laSession = personne\getLaSession($idSession);
                require_once TEMPLATESPATH.'v_header.php';
                require_once VIEWSPATH.'v_technique.php';

                break;
            }

            case 'chercherTechniques':
            {
                $_SESSION['navbar'] = 10;
                $idSession = $_SESSION['idsession'];
                $leTableau = 1;
                $date = $_REQUEST['date'];
                require_once MODELSPATH.'f_administrateur.php';
                $laSession = personne\getLaSession($idSession);

                $type = "Technique";
                $lesHorairesBenevoles = personne\getLesHorairesBenevoles($idSession, $type);

                $lesBenevoles = personne\getBenevolesSession($idSession);



                require_once TEMPLATESPATH.'v_header.php';
                require_once VIEWSPATH.'v_technique.php';

                break;
            }

            case 'ajouterTechnique':
            {
                $_SESSION['navbar'] = 10;
                $idSession = $_SESSION['idsession'];
                $leTableau = 1;
                $date = $_REQUEST['date'];
                $debut = $_REQUEST['dateDebut'];
                $fin = $_REQUEST['dateFin'];
                $text = "Technique";
                $idAP = 0;
                $mission=4;
                $idBenevole = $_REQUEST['idBenevole'];
                require_once MODELSPATH.'f_administrateur.php';
                $lieu=$_REQUEST['lieu'];
                personne\addAffectation($idBenevole,$mission,$debut,$fin);                    
                personne\addLieuAffectation($lieu, $idBenevole, $debut);
                personne\ajouterHoraireBenevole($debut, $fin, $idBenevole, $text, $idAP, $idSession);

                $laSession = personne\getLaSession($idSession);

                $type = "Technique";
                $lesHorairesBenevoles = personne\getLesHorairesBenevoles($idSession, $type);
                $lesBenevoles = personne\getBenevolesSession($idSession);



                require_once TEMPLATESPATH.'v_header.php';
                require_once VIEWSPATH.'v_technique.php';

                break;
            }

            case 'supprimerTechnique':
            {
                $_SESSION['navbar'] = 10;
                $idSession = $_SESSION['idsession'];
                $leTableau = 1;
                $date = $_REQUEST['date'];
                $debut = $_REQUEST['dateDebut'];
                $fin = $_REQUEST['dateFin'];
                $text = "Technique";
                $idAP = 0;
                $idBenevole = $_REQUEST['idBenevole'];
                require_once MODELSPATH.'f_administrateur.php';
                $mission=4;
                personne\deleteAffectation($idBenevole,$mission,$debut);

                personne\supprimerHoraireBenevole($debut, $fin, $idBenevole, $text, $idAP, $idSession);

                $laSession = personne\getLaSession($idSession);

                $type = "Technique";
                $lesHorairesBenevoles = personne\getLesHorairesBenevoles($idSession, $type);
                $lesBenevoles = personne\getBenevolesSession($idSession);



                require_once TEMPLATESPATH.'v_header.php';
                require_once VIEWSPATH.'v_technique.php';

                break;
            }




            /* EXCEL */

            case 'excelBenevoles':
            {
                require_once MODELSPATH.'f_administrateur.php';
                $idSession = $_SESSION['idsession'];
                $laSession = personne\getLaSession($idSession);
                $debut = $laSession['periodeDebut'];
                $fin = $laSession['periodeFin'];
                $horaireBenevoles = personne\getLesHorairesDef($idSession);
                $horaireBenevolesUtilise = personne\getLesHorairesUti($idSession);
                $lesBenevoles = personne\getBenevolesSession($idSession);
                $lesMissions = personne\getMissions();

                include("application/views/excels/excelBenevoles.php");
                break;
            }

            case 'excelBenevole':
            {
                require_once MODELSPATH.'f_administrateur.php';
                $idSession = $_SESSION['idsession'];
                $laSession = personne\getLaSession($idSession);
                $debut = $laSession['periodeDebut'];
                $fin = $laSession['periodeFin'];
                $horaireBenevoles = personne\getLesHorairesDef($idSession);
                $horaireBenevolesUtilise = personne\getLesHorairesUti($idSession);
                $unBenevole = personne\getLeBenevole($_REQUEST['idBenevole']);
                $lesMissions = personne\getMissions();
                $lesAffectations = personne\getAllAffectation();

                include("application/views/excels/excelBenevole.php");

                break;
            }

            case 'excelCompagnie':
            {
                require_once MODELSPATH.'f_administrateur.php';
                // Data used for the test
                $data = "";

                // Export the file
                personne\export_data_to_xls($data, "benevoles");
                break;
            }

            case 'excelSpectacle':
            {
                require_once MODELSPATH.'f_administrateur.php';
                $idSession = $_SESSION['idsession'];
                $laSession = personne\getLaSession($idSession);
                $debut = $laSession['periodeDebut'];
                $fin = $laSession['periodeFin'];
                $lesCompagnies = personne\getCompagniesSession($idSession);
                $lesSpectacles = personne\getSpectaclesSession($idSession);

                include("application/views/excels/excelSpectacle.php");
                break;
            }

            case 'excelOrganisationSpectacle':
            {
                require_once MODELSPATH.'f_administrateur.php';
                $idSession = $_SESSION['idsession'];
                $debut = $_REQUEST['debut'];
                $fin = $_REQUEST['fin'];
                $lesCompagnies = personne\getCompagniesSession($idSession);
                $lesSpectacles = personne\getSpectaclesSession($idSession);
                $lesOrganisationsSpectacles = personne\getOrganisationsSpectaclesSession($idSession);
                $lesLieux = personne\getLieux();

                $type = "OrganisationSpectacle";
                $lesHorairesBenevoles = personne\getLesHorairesBenevoles($idSession, $type);

                $laSession = personne\getLaSession($idSession);
                include("application/views/excels/excelOrganisationSpectacle.php");

                break;
            }

            case 'excelOrganisationSpectacleLieu':
            {
                require_once MODELSPATH.'f_administrateur.php';
                $idSession = $_SESSION['idsession'];
                $debut = $_REQUEST['debut'];
                $fin = $_REQUEST['fin'];
                $lesCompagnies = personne\getCompagniesSession($idSession);
                $lesSpectacles = personne\getSpectaclesSession($idSession);
                $lesOrganisationsSpectacles = personne\getOrganisationsSpectaclesSessionLieu($idSession, $_REQUEST['idLieu']);
                $lesLieux = personne\getLieux();

                $type = "OrganisationSpectacle";
                $lesHorairesBenevoles = personne\getLesHorairesBenevoles($idSession, $type);

                $laSession = personne\getLaSession($idSession);
                include("application/views/excels/excelOrganisationSpectacle.php");

                break;
            }

            case 'excelType':
            {
                require_once MODELSPATH.'f_administrateur.php';
                $idSession = $_SESSION['idsession'];

                $type = $_REQUEST['type'];
                $lesHorairesBenevoles = personne\getLesHorairesBenevoles($idSession, $type);

                $laSession = personne\getLaSession($idSession);
                $debut = $laSession['periodeDebut'];
                $fin = $laSession['periodeFin'];
                $hdebut = $_REQUEST['hdebut'];
                $hfin = $_REQUEST['hfin'];
                $ajout = 0;
                $difTime = 30;
                if (isset($_REQUEST['ajout'])) {
                    $ajout = 1;
                    $minute = $_REQUEST['ajout'];
                }
                if (isset($_REQUEST['difTime'])) {
                    $difTime = $_REQUEST['difTime'];
                }
                $lesBenevoles = personne\getBenevolesSession($idSession);

                include("application/views/excels/excelType.php");

                break;
            }

            case 'exit':
            {
                $_SESSION = array();
                session_destroy();
                include("application/views/v_connexion.php");
                break;
            }

            case 'voirSession':
            {
                include("application/views/v_session.php");
                break;
            }
                
        } /* ACCOLADE DE LA FIN DU SWITCH */
    }
    else
    {
        include ('c_connexion.php');
    }
}
else{
    if(isset($_GET['action']))
    {
        $action = $_GET['action'];
    }

        else
        {
            if(isset($_POST['action']))
            {
                $action = $_POST['action'];
            }

            else
                {
                    $action='demandeConnexion';
                }
            }

            switch($action)
            {
                case 'demandeConnexion':
                {
                    $mdp = "Aucun";
                    $mdpHash = "Aucun";
                    require_once MODELSPATH.'f_administrateur.php';
                    /* $info = "Logiciel de gestion des bénévoles ALARUE";
                    $information = "Développé par Artillan Dorian et Carlini Olivier"; */
                    $lesSessions = personne\getSessions();
                    require_once VIEWSPATH.'v_connexion.php';
                    break;
                }

                case 'valideConnexion':
                {
                    require_once MODELSPATH.'f_administrateur.php';
                    // Récupération du mot de passe
                    $mdp = $_REQUEST['password'];

                    $mdpHash = crypt($mdp, '$6$rounds=5000$usesomesillystringforsalt$');

                    $test = personne\getPassword();
                    $verification = 0;
                    foreach ($test as $unTest){
                        if ($unTest['password'] == $mdpHash){
                            $verification = 1;
                        }

                    }


                    if($verification == 0){
                        $lesSessions = personne\getSessions();
                      /*  $info = " Erreur(s) ! ";
                        $information = " Mot de passe incorrect ! ";  */
                        require_once VIEWSPATH.'v_connexion.php';
                    }
                    else{
                        $securite = 1;
                        $_SESSION['newsession']=1;
                        include ('c_connexion.php');

                    }
                    require_once VIEWSPATH.'v_connexion.php';

                    break;
                }

            }
}
