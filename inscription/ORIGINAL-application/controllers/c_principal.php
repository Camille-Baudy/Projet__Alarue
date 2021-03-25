<?php
/* Le controleur de page qui gére les personnes */
//Déterminer quelle action est demandée
if(isset($_GET['action']))
    $action = $_GET['action'];
else
    if(isset($_POST['action']))
        $action = $_POST['action'];
    else
        $action='home';

/*si action = une_valeur est envoyé au script nous avons récupéré dans $action la valeur et read sinon*/

switch($action)
{
	case 'home':
	{
		require_once TEMPLATESPATH.'v_header.php';	
		require_once MODELSPATH.'f_inscription.php';
		//Affiche les sessions
        $lesSessions = inscription\getSession();	
	}
		
	case 'inscription':
	{
		if(empty ($lesSessions))
		{
			require_once TEMPLATESPATH.'v_header.php';
			require VIEWSPATH.'v_festival.php';
		}
		else
		{
			require_once TEMPLATESPATH.'v_header.php';
			require VIEWSPATH.'v_home.php';
		}
		break;
	}
        
    case 'formulaire2' :
    {
		if(isset ($_REQUEST['nom']))
		{
			$_SESSION['festival'] = $_REQUEST['lstSession'];
			// Supprime les balises html et php dans la variable $nom
			$_SESSION['nom'] = strip_tags($_REQUEST['nom']);
			$_SESSION['prenom'] = strip_tags($_REQUEST['prenom']);
			$_SESSION['sexe'] = trim($_REQUEST['sexe']);
			$_SESSION['email'] = trim($_REQUEST['email']);
			$_SESSION['dateNaissance'] = trim($_REQUEST['dateNaissance']);
			$_SESSION['rue'] = strip_tags($_REQUEST['rue']);
			$_SESSION['ville'] = strip_tags($_REQUEST['ville']);
			$_SESSION['cp'] = trim($_REQUEST['cp']);
			$tel = strip_tags($_REQUEST['tel']);
			//Enleve les espaces dans la variable $tel
			$tel = str_replace(' ', '', $tel);
			$_SESSION['tel'] = $tel;
			require_once TEMPLATESPATH.'v_header.php';
			require_once VIEWSPATH.'v_formulaire2.php';
		}
		else
		{
			require_once TEMPLATESPATH.'v_header.php';
			require_once MODELSPATH.'f_inscription.php';
			//Affiche les sessions
			$lesSessions = inscription\getSession();	
			require VIEWSPATH.'v_home.php';
		}
        break;  
    }
        
    case 'utilisateur' :
    {
		if(isset ($_SESSION['nom']))
		{
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
			if(isset($_REQUEST['permis']))
			{
				$permis = $_REQUEST['permis'];
			}
			else
			{
				$permis = 'non';
			}
			if(isset($_REQUEST['voiture']))
			{
				$voiture = $_REQUEST['voiture'];
			}
			else
			{
				$voiture = 'non';
			}
			if(isset($_REQUEST['anciennete']))
			{
				$anciennete = $_REQUEST['anciennete'];
			}
			else
			{
				$anciennete = 'non';
			}
			if(isset($_REQUEST['benevoleAmis']))
			{
				 $benevoleAmis = strip_tags($_REQUEST['benevoleAmis']);
			}
			else
			{
				$benevoleAmis = "aucun";
			}
			//Supprime les balises html et php de la variable benevoleAmis
			$tshirt = $_REQUEST['tshirt'];
			$connaissance = $_REQUEST['connaissances'];
			$avatar = "";
			require_once TEMPLATESPATH.'v_header.php';
			require_once VIEWSPATH.'v_mission.php';
			require_once MODELSPATH.'f_inscription.php';
			//Ajout de l'utilisateur dans la BDD
			inscription\creeInscription($nom, $prenom, $sexe, $email, $dateNaissance, $rue, $cp, $ville, $tel, $permis, $voiture, $tshirt, $anciennete, $benevoleAmis, $connaissance, $idSession, $avatar);
		}
		else
		{
			require_once TEMPLATESPATH.'v_header.php';
			require_once MODELSPATH.'f_inscription.php';
			//Affiche les sessions
			$lesSessions = inscription\getSession();	
			require VIEWSPATH.'v_home.php';
		}
        break; 
    }
		
	case 'validationMission':
	{
		if(isset ($_SESSION['nom']))
		{
			$code = 0;
			require_once MODELSPATH.'f_inscription.php';
			require_once TEMPLATESPATH.'v_header.php';
			$idUtilisateur = inscription\avoirId($code);
			$listeMissions = array() ;
			$listeMissions = $_REQUEST['missions'] ;

			foreach($listeMissions as $uneMission){
				//Ajoute les missions par rapport à un utilisateur
				inscription\ajouterMission($uneMission, $idUtilisateur);		
			}	
			$mission = implode(",", $listeMissions);

			//Partie Horaire
			$_SESSION['utilisateur'] = $idUtilisateur;
			$idBenevole = $idUtilisateur;
			$unBenevole = inscription\getLeBenevole($idBenevole);
			$idSession = $unBenevole['idSession'];

			$uneSession = inscription\getLaSession($idSession);
			if(isset($_REQUEST['jourSup'])){
				$jourSup = $_REQUEST['jourSup'];
			}
			else{
				$jourSup = 0;
			}

			if(isset($_REQUEST['matin'])){
				$start = $_REQUEST['leJour']." 08:00:00";
				$end = $_REQUEST['leJour']." 12:00:00";
				inscription\ajouterHoraireLibreBenevole($start, $end, $idBenevole, $idSession);
			}

			if(isset($_REQUEST['midi'])){
				$start = $_REQUEST['leJour']." 12:00:00";
				$end = $_REQUEST['leJour']." 14:00:00";
				inscription\ajouterHoraireLibreBenevole($start, $end, $idBenevole, $idSession);
			}

			if(isset($_REQUEST['aprem'])){
				$start = $_REQUEST['leJour']." 14:00:00";
				$end = $_REQUEST['leJour']." 18:00:00";
				inscription\ajouterHoraireLibreBenevole($start, $end, $idBenevole, $idSession);
			}

			if(isset($_REQUEST['soir'])){
				$start = $_REQUEST['leJour']." 18:00:00";
				$end = $_REQUEST['leJour']." 22:00:00";
				inscription\ajouterHoraireLibreBenevole($start, $end, $idBenevole, $idSession);
			}

			if(isset($_REQUEST['finsoir'])){
				$start = $_REQUEST['leJour']." 22:00:00";
				$leJour = $_REQUEST['leJour'];
				$leJour = date('Y-m-d', strtotime($leJour. ' + 1 days'));
				$end = $leJour." 02:00:00";
				inscription\ajouterHoraireLibreBenevole($start, $end, $idBenevole, $idSession);
			}

			if($_REQUEST['leJour'] < $uneSession['periodeFin']){
				require_once VIEWSPATH.'v_date.php';
			}
			else
			{
				require_once VIEWSPATH.'v_choix.php';
			}
		}
		else
		{
			require_once TEMPLATESPATH.'v_header.php';
			require_once MODELSPATH.'f_inscription.php';
			//Affiche les sessions
			$lesSessions = inscription\getSession();	
			require VIEWSPATH.'v_home.php';	
		}
		break;
	}
		
	case 'calendrier':
	{
		require_once MODELSPATH.'f_inscription.php';
		$idUtilisateur = $_SESSION['utilisateur'];
		//Affiche les événements par rapport à un utilisateur
		$events = inscription\getEvenement($idUtilisateur);
		//Affiche les informations de l'utilisateur
		$info = inscription\getInfos($idUtilisateur);
		//Affiche la date de début et la date de fin par rapport à un utilisateur
		$laDate = inscription\getPeriode($idUtilisateur);
		require_once VIEWSPATH.'v_calendrier.php';
		break;
	}
		
	case 'add':
	{
		require_once MODELSPATH.'f_inscription.php';
		$events = inscription\getEvenement($idUtilisateur);
		$laDate = inscription\getPeriode($idUtilisateur);
		require_once VIEWSPATH.'addEvent.php';
		break;
	}
	
	case 'edit':
	{
		require_once MODELSPATH.'f_inscription.php';
		$events = inscription\getEvenement($idUtilisateur);
		require_once VIEWSPATH.'editEventTitle.php';
		require_once VIEWSPATH.'editEventDate.php';
		break;
	}
	
	case 'photo':
	{
		require_once TEMPLATESPATH.'v_header.php';
		require_once VIEWSPATH.'v_profil.php';
		break;
	}
		
	case 'fin':
	{
		require_once TEMPLATESPATH.'v_header.php';
		// Test si le fichier a bien été envoyé et s'il n'y a pas d'erreur
		if (isset($_FILES['photo']) AND $_FILES['photo']['error'] == 0)
		{
				// Test si le fichier n'est pas trop gros
				if ($_FILES['photo']['size'] <= 3145728)
				{
						// Test si l'extension est autorisée
						$infosfichier = pathinfo($_FILES['photo']['name']);
						$extension_upload = $infosfichier['extension'];
						$extensions_autorisees = array('jpg', 'jpeg', 'png');
						if (in_array($extension_upload, $extensions_autorisees))
						{
								// On peut valider le fichier et le stocker définitivement
								try
								{
									require_once MODELSPATH.'f_inscription.php';
									$idUtilisateur = $_SESSION['utilisateur'];
									$avatar = $idUtilisateur."_".date('y-m-j').".".$extension_upload;
									inscription\updateProfil($idUtilisateur, $avatar);
									move_uploaded_file($_FILES['photo']['tmp_name'], 'resources/images/' . basename($avatar));
									require_once VIEWSPATH.'v_end.php';
								}
								catch (Exception $e) 
								{
									echo $e->getMessage();
								}
								
						}
						else
						{
							require_once TEMPLATESPATH.'v_header.php';
							require_once VIEWSPATH.'v_profil.php';
							?>
								<div class="alert alert-warning" role="alert">
									<h3><center>Votre photo doit être au format jpg, jpeg, png.</center></h3>
								</div>
							<?php
							
						}
				}
				else
				{
					require_once TEMPLATESPATH.'v_header.php';
					require_once VIEWSPATH.'v_profil.php';
					?>
						<div class="alert alert-warning" role="alert">
							<h3><center>Votre photo est trop volumineuse</center></h3>
						</div>
					<?php
				}
		}
		else
		{
			require_once TEMPLATESPATH.'v_header.php';
			require_once VIEWSPATH.'v_end.php';
		}
		break;
	}
		
}