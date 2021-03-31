<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
/* Le controleur de page qui gére les personnes */
//Déterminer quelle action est demandée
if (isset($_GET['action']))
	$action = $_GET['action'];
else
    if (isset($_POST['action']))
	$action = $_POST['action'];
else
	$action = 'home';

/*si action = une_valeur est envoyé au script nous avons récupéré dans $action la valeur et read sinon*/

switch ($action) {
	case 'home': {
			require_once TEMPLATESPATH . 'v_header.php';
			require_once MODELSPATH . 'f_inscription.php';
			//Sélection des sessions pas bloquées
			$lesSessions = inscription\getSession();
		}

	case 'inscription': {
			//Si Aucun festival créé
			if (empty($lesSessions)) {
				//Pas de liste
				//require_once TEMPLATESPATH.'v_header.php';
				require VIEWSPATH . 'v_festival.php';
			} else {
				//require_once TEMPLATESPATH.'v_header.php';
				require VIEWSPATH . 'v_home.php';
			}
			break;
		}

	case 'formulaire2': {
			if (isset($_REQUEST['nom'])) {
				$_SESSION['festival'] = $_REQUEST['lstSession'];

				// Supprime les balises html et php dans la variable $nom

				$_SESSION['nom']           = strip_tags($_REQUEST['nom']);
				$_SESSION['prenom']        = strip_tags($_REQUEST['prenom']);
				$_SESSION['sexe']          = trim($_REQUEST['sexe']);
				$_SESSION['email']         = trim($_REQUEST['email']);
				$_SESSION['dateNaissance'] = trim($_REQUEST['dateNaissance']);
				$_SESSION['rue']           = strip_tags($_REQUEST['rue']);
				$_SESSION['ville']         = strip_tags(strtoupper($_REQUEST['ville']));
				$_SESSION['cp']            = trim($_REQUEST['cp']);
				$tel                       = strip_tags($_REQUEST['tel']);

				//Enleve les espaces dans la variable $tel

				$tel = str_replace(' ', '', $tel);
				$_SESSION['tel'] = $tel;

				require_once TEMPLATESPATH . 'v_header.php';
				require_once VIEWSPATH . 'v_formulaire2.php';
			} else {
				require_once TEMPLATESPATH . 'v_header.php';
				require_once MODELSPATH . 'f_inscription.php';
				//Affiche les sessions => revenir à la page de démarrage d'inscription 
				$lesSessions = inscription\getSession();
				require VIEWSPATH . 'v_home.php';
			}
			break;
		}

	case 'utilisateur': {
			if (isset($_SESSION['nom'])) {
				//Vérifie si la variable est vide ou non
				$idSession = $_SESSION['festival'];
				$nom = $_SESSION['nom'];
				$prenom = $_SESSION['prenom'];
				$sexe = $_SESSION['sexe'];
				$email = $_SESSION['email'];
				$dateNaissance = $_SESSION['dateNaissance'];
				$rue = $_SESSION['rue'];
				$ville = $_SESSION['ville'];
				$cp = $_SESSION['cp'];
				$tel = $_SESSION['tel'];
				if (isset($_REQUEST['permis'])) {
					$permis = $_REQUEST['permis'];
				} else {
					$permis = 'non';
				}
				if (isset($_REQUEST['voiture'])) {
					$voiture = $_REQUEST['voiture'];
				} else {
					$voiture = 'non';
				}
				if (isset($_REQUEST['anciennete'])) {
					$anciennete = $_REQUEST['anciennete'];
				} else {
					$anciennete = 'non';
				}
				if (isset($_REQUEST['benevoleAmis'])) {
					$benevoleAmis = strip_tags($_REQUEST['benevoleAmis']);
				} else {
					$benevoleAmis = "aucun";
				}
				//Supprime les balises html et php de la variable benevoleAmis
				$tshirt = $_REQUEST['tshirt'];
				$connaissance = $_REQUEST['connaissances'];
				$avatar = "";
				require_once TEMPLATESPATH . 'v_header.php';
				require_once VIEWSPATH . 'v_mission.php';
				require_once MODELSPATH . 'f_inscription.php';
				//Ajout de l'utilisateur dans la BDD
				inscription\creeInscription($nom, $prenom, $sexe, $email, $dateNaissance, $rue, $cp, $ville, $tel, $permis, $voiture, $tshirt, $anciennete, $benevoleAmis, $connaissance, $idSession);
				//on récupère l'id de ce bénévole
				$idB=inscription\getIdBenevole($nom, $prenom, $sexe, $email, $dateNaissance, $tel);
			} else {
				//Revenir page accueil inscription
				require_once TEMPLATESPATH . 'v_header.php';
				require_once MODELSPATH . 'f_inscription.php';
				//Affiche les sessions
				//	$lesSessions = inscription\getSession();
				require VIEWSPATH . 'v_home.php';
			}
			break;
		}

	case 'validationMission': {

			if (isset($_SESSION['nom'])) {
				$code = 0;
				require_once MODELSPATH . 'f_inscription.php';
				require_once TEMPLATESPATH . 'v_header.php';

				//Attention si plusieurs utilisateurs s'incrivent en même temps !!!! récup max()
				//Préférer conserver id dans une variable session au moment de la création.
				$idUtilisateur = inscription\avoirId($code);

				$dateSession = inscription\getDateSession();

				$listeMissions = array();
                $listeMissions = $_REQUEST['missions'];

                foreach ($listeMissions as $uneMission) {
                    //Ajoute les missions par rapport à un utilisateur
                    inscription\ajouterMission($uneMission, $idUtilisateur);
                }
                $mission = implode(",", $listeMissions);
                $debutSession = $dateSession['periodeDebut'];
                $finSession = $dateSession['periodeFin'];

                //passer au format français
                setlocale(LC_TIME, "fr_FR", "French");
                $lesdates = array();

				$debut = $debutSession; //on créer une variable $debut qui stocke la date de début du festival
				$leDebut = $debut;
                $jourSup = 0; //on met le compteur à 0
                while ($debut <= $finSession) //tant que la date de début et plus petite que la date de fin
                {
                    $lesdates[$jourSup]['leJour'] = date('Y-m-d', strtotime($debut));
                    $lesdates[$jourSup]['nomJour'] = strftime("%A", strtotime($debut));
                    $lesdates[$jourSup]['numJour'] = strftime("%d", strtotime($debut));
                    $lesdates[$jourSup]['nomMois'] = strftime("%B", strtotime($debut));
                    $lesdates[$jourSup]['nomAnnee'] = strftime("%G", strtotime($debut));

                    $jourSup += 1; //on rajoute +1 au compteur
                    $debut = date('Y-m-d', strtotime($debut . ' + 1 days')); //on rajoute +1 jour à la date de début
				}
				
				$idB = $_POST['idB'];
				$leDebut = date('Y-m-d', strtotime($debut . ' - '. $jourSup . ' days'));
				require_once VIEWSPATH . 'v_date.php';

			} else {
				require_once TEMPLATESPATH . 'v_header.php';
				require_once MODELSPATH . 'f_inscription.php';
				//Affiche les sessions
				$lesSessions = inscription\getSession();

				require VIEWSPATH . 'v_profil.php';
			}
			break;
		}

		

		case 'validationHoraire': {

			if (isset($_SESSION['nom'])) {
				$code = 0;
				require_once MODELSPATH . 'f_inscription.php';

				//Attention si plusieurs utilisateurs s'incrivent en même temps !!!! récup max()
				//Préférer conserver id dans une variable session au moment de la création.
				$idUtilisateur = inscription\avoirId($code);

				//Partie Horaire
				$_SESSION['utilisateur'] = $idUtilisateur;
				$idBenevole = $idUtilisateur;

				$unBenevole = inscription\getLeBenevole($idBenevole);
				$idSession = inscription\getIDSession();
				$id="";
				foreach ($idSession as $idS)
				{
					$id=$idS['idSession'];
				}

				//$leDebut correspond à la date dans v_date.php
				$leDebut=$_POST['leDebut'];

				$horaireDebutMatin="";
				$horaireFinMatin="";
				//horaire de début MATIN
				if (isset($_POST['matin-d'])) 
				{
					if($_POST['matin-d'] == "non-dispo")
					{
						//on ne fait rien car la personne n'est pas disponible
					}
					else
					{
						$horaireDebutMatin=$leDebut." ".$_POST['matin-d'];

					}
				}
				//horaire de fin MATIN
				if (isset($_POST['matin-f'])) 
				{
					if ($_POST['matin-f'] == "non-dispo") 
					{
						//on ne fait rien car la personne n'est pas disponible
                    }
					else
					{
						$horaireFinMatin=$leDebut." ".$_POST['matin-f'];				
						//on enregistre l'horaire du matin
						inscription\ajouterHoraireLibreBenevole($horaireDebutMatin, $horaireFinMatin, $idBenevole, $id);
					}
				}

				$horaireDebutMidi="";
				$horaireFinMidi="";
				//horaire de début MIDI
				if (isset($_POST['midi-d'])) 
				{
					if($_POST['midi-d'] == "non-dispo")
					{

					}
					else
					{
						$horaireDebutMidi=$leDebut." ".$_POST['midi-d'];
					}
				}
				//horaire de fin MIDI
				if (isset($_POST['midi-f'])) 
				{
					if($_POST['midi-f'] == "non-dispo")
					{

					}
					else
					{
						$horaireFinMidi=$leDebut." ".$_POST['midi-f'];
						//on enregistre l'horaire du midi
						inscription\ajouterHoraireLibreBenevole($horaireDebutMidi, $horaireFinMidi, $idBenevole, $id);
					}
				}


				$horaireDebutAM="";
				$horaireFinAM="";
				//horaire de début APRES-MIDI
				if (isset($_POST['apresmidi-d'])) 
				{
					if($_POST['apresmidi-d'] == "non-dispo")
					{

					}
					else
					{
						$horaireDebutAM=$leDebut." ".$_POST['apresmidi-d'];
					}
				}
				//horaire de fin APRES-MIDI
				if (isset($_POST['apresmidi-f'])) 
				{
					if($_POST['apresmidi-f'] == "non-dispo")
					{

					}
					else
					{
						$horaireFinAM=$leDebut." ".$_POST['apresmidi-f'];						
						//on enregistre l'horaire de l'après-midi
						inscription\ajouterHoraireLibreBenevole($horaireDebutAM, $horaireFinAM, $idBenevole, $id);
					}
				}

				$horaireDebutSoir="";
				$horaireFinSoir="";
				//horaire de début SOIR
				if (isset($_POST['soir-d'])) 
				{
					if($_POST['soir-d'] == "non-dispo")
					{

					}
					else
					{
						if($_POST['soir-d'] == "00:00:00" || $_POST['soir-d'] == "01:00:00" || $_POST['soir-d'] == "02:00:00")
						{
							//on rajoute + 1 jour car on passe au lendemain
							$leDebut=date('Y-m-d', strtotime($leDebut . ' + 1 days'));
						}
						$horaireDebutSoir=$leDebut." ".$_POST['soir-d'];
					}
				}
				//horaire de fin SOIR
				if (isset($_POST['soir-f'])) 
				{
					if($_POST['soir-f'] == "non-dispo")
					{

					}
					else
					{
						if($_POST['soir-f'] == "00:00:00" || $_POST['soir-f'] == "01:00:00" || $_POST['soir-f'] == "02:00:00")
						{
							//on rajoute + 1 jour car on passe au lendemin
							$leDebut=date('Y-m-d', strtotime($leDebut . ' + 1 days'));
						}
						$horaireFinSoir=$leDebut." ".$_POST['soir-f'];
						//on enregistre l'horaire du soir
						inscription\ajouterHoraireLibreBenevole($horaireDebutSoir, $horaireFinSoir, $idBenevole, $id);
					}
				}

				if ($_POST['jourSup'] > 0) //si le compteur n'est pas à 0, cela veut dire qu'il reste des jours pour le festival
				{
					$leDebut = $_POST['leDebut'];
					$leDebut = date('Y-m-d', strtotime($leDebut . ' + 1 days'));
					$jourSup = $_POST['jourSup'];
					$idB = $_POST['idB'];
					require_once TEMPLATESPATH . 'v_header.php';
					require_once VIEWSPATH . 'v_date.php';
				}
				else //si le compteur est à 0, alors il ne reste plus de jour pour le festival
				{
					$idB = $_POST['idB'];
					require_once TEMPLATESPATH . 'v_header.php';
					require_once VIEWSPATH . 'v_profil.php';
				}
				
			} else {
				//je sais pas pour l'instant
			}
			break;
		}



	case 'photo': {
			$idUtilisateur = $_POST['idUtilisateur'];
			$start = $_POST['start'];
			$end = $_POST['end'];
			$id = $_POST['id'];
			require_once MODELSPATH . 'f_inscription.php';
			inscription\updateHoraireBenevole($id, $idUtilisateur, $start, $end);
			require_once TEMPLATESPATH . 'v_header.php';
			require_once VIEWSPATH . 'v_profil.php';
			break;
		}

	case 'fin': {
			require_once TEMPLATESPATH . 'v_header.php';
			// Test si le fichier a bien été envoyé et s'il n'y a pas d'erreur
			if (isset($_FILES['photo']) and $_FILES['photo']['error'] == 0) {
				// Test si le fichier n'est pas trop gros
				if ($_FILES['photo']['size'] <= 3145728) {
					// Test si l'extension est autorisée
					$infosfichier = pathinfo($_FILES['photo']['name']);
					$extension_upload = $infosfichier['extension'];
					$extensions_autorisees = array('jpg', 'jpeg', 'png');
					if (in_array($extension_upload, $extensions_autorisees)) {
						// On peut valider le fichier et le stocker définitivement
						try {
							require_once MODELSPATH . 'f_inscription.php';
							$idUtilisateur = $_POST['idB'];
							$avatar = $idUtilisateur . "_" . date('y-m-j') . "." . $extension_upload;
							inscription\updateProfil($idUtilisateur, $avatar);
							move_uploaded_file($_FILES['photo']['tmp_name'], 'resources/images/' . basename($avatar));
							require_once VIEWSPATH . 'v_end.php';
						} catch (Exception $e) {
							echo $e->getMessage();
						}
					} else {
						require_once TEMPLATESPATH . 'v_header.php';
						require_once VIEWSPATH . 'v_profil.php';
?>
						<div class="alert alert-warning" role="alert">
							<h3>
								<center>Votre photo doit être au format jpg, jpeg, png.</center>
							</h3>
						</div>
					<?php

					}
				} else {
					require_once TEMPLATESPATH . 'v_header.php';
					require_once VIEWSPATH . 'v_profil.php';
					?>
					<div class="alert alert-warning" role="alert">
						<h3>
							<center>Votre photo est trop volumineuse</center>
						</h3>
					</div>
<?php
				}
			} else {
				require_once TEMPLATESPATH . 'v_header.php';
				require_once VIEWSPATH . 'v_end.php';
			}
			break;
		}
}
