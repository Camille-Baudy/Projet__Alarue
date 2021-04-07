<?php
// Il sera nommé utilisateur.xls
header('Content-Disposition: attachment; filename="benevoles_'.$laSession['nomSession'].'.xls"');
?>

<table>
    <tr>
        <td>NOM</td>
        <td>PRENOM</td>
        <td>SEXE</td>
        <td>EMAIL</td>
        <td>AMIS</td>
        <td>PERMIS</td>
        <td>VOITURE</td>
        <td>DECO</td>
        <td>ACC PUB</td>
        <td>ACC COMP</td>
        <td>TECH</td>
        <td>CATERING</td>
        <td>BAR</td>
        <td>LOGIS</td>
        <td>RUE</td>
        <td>CP</td>
        <td>VILLE</td>
        <td>TELEPHONE</td>
        <td>T-SHIRT</td>
        <td>NAISSANCE</td>
        <td>ANCIENNETÉ</td>
        <td>CONNAISSANCE</td>
        <td>INFO ADMIN</td>
        <td>DISPONIBILITE</td>
	</tr>


    <tr>
        <td><?php echo utf8_decode($unBenevole['nom']) ?></td>
        <td><?php echo utf8_decode($unBenevole['prenom']) ?></td>
        <td><?php echo $unBenevole['sexe'] ?></td>
        <td><?php echo $unBenevole['email'] ?></td>
        <td><?php echo utf8_decode($unBenevole['benevoleAmis']) ?></td>
        <td><?php echo $unBenevole['permis'] ?></td>
        <td><?php echo $unBenevole['voiture'] ?></td>

        <!-- NOUVEAU CODE POUR AFFICHER QUELLES MISSIONS A CHOISI LE BENEVOLE -->
        <td><?php   foreach($lesMissions as $uneMission):
                        if($uneMission['idUtilisateur'] == $unBenevole['idUtilisateur']):
                            if($uneMission['idMission'] == 1):
                                echo "X";
                            else:
                                echo "";
                            endif;
                        else:
                            echo "";
                        endif;
                    endforeach;
            ?>
        </td>

        <td><?php   foreach($lesMissions as $uneMission):
                        if($uneMission['idMission'] == 2):
                            if($uneMission['idUtilisateur'] == $unBenevole['idUtilisateur']):
                                echo "X";
                            endif;
                        endif;
                    endforeach;
            ?>
        </td>

        <td><?php   foreach($lesMissions as $uneMission):
                        if($uneMission['idMission'] == 3):
                            if($uneMission['idUtilisateur'] == $unBenevole['idUtilisateur']):
                                echo "X";
                            endif;
                        endif;
                    endforeach;
            ?>
        </td>

        <td><?php   foreach($lesMissions as $uneMission):
                        if($uneMission['idMission'] == 4):
                            if($uneMission['idUtilisateur'] == $unBenevole['idUtilisateur']):
                                echo "X";
                            endif;
                        endif;
                    endforeach;
            ?>
        </td>

        <td><?php   foreach($lesMissions as $uneMission):
                        if($uneMission['idMission'] == 5):
                            if($uneMission['idUtilisateur'] == $unBenevole['idUtilisateur']):
                                echo "X";
                            endif;
                        endif;
                    endforeach;
            ?>
        </td>

        <td><?php   foreach($lesMissions as $uneMission):
                        if($uneMission['idMission'] == 6):
                            if($uneMission['idUtilisateur'] == $unBenevole['idUtilisateur']):
                                echo "X";
                            endif;
                        endif;
                    endforeach;
            ?>
        </td>

        <td><?php   foreach($lesMissions as $uneMission):
                        if($uneMission['idMission'] == 7):
                            if($uneMission['idUtilisateur'] == $unBenevole['idUtilisateur']):
                                echo "X";
                            endif;
                        endif;
                    endforeach;
            ?>
        </td>

        <td><?php echo utf8_decode($unBenevole['rue']) ?></td>
        <td><?php echo $unBenevole['cp'] ?></td>
        <td><?php echo utf8_decode($unBenevole['ville']) ?></td>
        <td><?php echo $unBenevole['numTel'] ?></td>
        <td><?php echo $unBenevole['tailleTshirt'] ?></td>
        <td><?php echo $unBenevole['dateNaissance'] ?></td>
        <td><?php echo $unBenevole['anciennete'] ?></td>
        <td><?php echo utf8_decode($unBenevole['connaissance']) ?></td>
        <td><?php echo utf8_decode($unBenevole['commentaires']) ?></td>
        <td>
            <?php
                $idUtilisateur=personne\getIdBenevole($unBenevole['nom'], $unBenevole['prenom'], $unBenevole['sexe'], $unBenevole['email']);
                $lesdisponibités= array();
                foreach($idUtilisateur as $id)
                {
                    $lesdisponibités[]=personne\getLesHorairesDuBenevole($id[0]);
                    var_dump($lesdisponibités);
                    foreach($lesdisponibités as $uneDispo)
                    {
                        $i=0;
                        $dispo = $uneDispo[$i];
                        if($dispo[5] == $id[0])
                        {
                            echo $dispo[2]." // ".$dispo[3]."</br>";
                        }
                        $i= $i + 1;
                    }
                }
            ?>
        </td>
    </tr>



    <tr></tr>
    <tr></tr>
    <tr></tr>

    <!-- PLANNING DU BENEVOLE -->

    <!-- colonne avec nom prénom du bénévole -->
    <tr>
        <td><?php $nom = utf8_decode($unBenevole['nom']);
                  $prenom = utf8_decode($unBenevole['prenom']);
                  echo $nom." ".$prenom; ?></td>

            <?php $leDebut = $debut; $laFin = $fin ?>
            <?php $infoJour = 0; ?>
            <?php while($leDebut <= $laFin): ?>
                <?php $infoJour = $infoJour+1; ?>

                <?php

                    $numJour = date("d",strtotime($leDebut));


                    $nmJour = date("D",strtotime($leDebut));
                    $nomJour = "";
                    if($nmJour == "Mon"){
                        $nomJour = "Lundi";
                    }
                    if($nmJour == "Tue"){
                        $nomJour = "Mardi";
                    }
                    if($nmJour == "Wed"){
                        $nomJour = "Mercredi";
                    }
                    if($nmJour == "Thu"){
                        $nomJour = "Jeudi";
                    }
                    if($nmJour == "Fri"){
                        $nomJour = "Vendredi";
                    }
                    if($nmJour == "Sat"){
                        $nomJour = "Samedi";
                    }
                    if($nmJour == "Sun"){
                        $nomJour = "Dimanche";
                    }



                    $nmMois = date("M",strtotime($leDebut));
                    $nomMois = "";

                    if($nmMois == "Jan"){
                        $nomMois = "Janvier";
                    }
                    if($nmMois == "Feb"){
                        $nomMois = "Février";
                    }
                    if($nmMois == "Mar"){
                        $nomMois = "Mars";
                    }
                    if($nmMois == "Apr"){
                        $nomMois = "Avril";
                    }
                    if($nmMois == "May"){
                        $nomMois = "Mai";
                    }
                    if($nmMois == "Jun"){
                        $nomMois = "Juin";
                    }
                    if($nmMois == "Jul"){
                        $nomMois = "Juillet";
                    }
                    if($nmMois == "Aug"){
                        $nomMois = "Août";
                    }
                    if($nmMois == "Sep"){
                        $nomMois = "Septembre";
                    }
                    if($nmMois == "Oct"){
                        $nomMois = "Octobre";
                    }
                    if($nmMois == "Nov"){
                        $nomMois = "Novembre";
                    }
                    if($nmMois == "Dec"){
                        $nomMois = "December";
                    }



                     $nomAnnee = date("Y",strtotime($leDebut)); 

                ?>
                <!-- le jour -->
                <td><?php echo $nomJour." ".$numJour." ".utf8_decode($nomMois) ?></td>

                <?php $leDebut = date('Y-m-d', strtotime($leDebut. ' + 1 days')); ?>

                <?php endwhile; ?>
    </tr>




    <!-- colonne des heures -->

    <?php $uneDateDebut = $debut." 08:00:00"; $uneDateFin = $debut." 23:00:00"; $uneDateFin = date('Y-m-d H:i:s', strtotime($uneDateFin. ' + 180 minutes')); ?>
    <?php while($uneDateDebut<=$uneDateFin): ?>
        <tr>
        <!-- tranche horaire -->
            <td>
                <?php echo date("H",strtotime($uneDateDebut)).'h'.date("i",strtotime($uneDateDebut)); ?> -
                <?php echo date("H",strtotime($uneDateDebut. ' + 30 minutes')).'h'.date("i",strtotime($uneDateDebut. ' + 30 minutes')); ?>
            </td>

            <?php $lesJours=0; ?>
            <?php $unDateDebut = $uneDateDebut; $unDateFin = $uneDateFin; ?>
            <?php while($lesJours < $infoJour): ?>
                <?php if($lesJours != 0): ?>
            
                    <?php $unDateDebut = date('Y-m-d H:i:s', strtotime($unDateDebut. ' + 1 days')); ?>
            
                <?php endif; ?>
                
            
                <?php $info = 0 ; $utiliseInfo = ""; ?>
                
                <?php 
                foreach($horaireBenevoles as $unHoraireBenevole)
                {
                    if($unHoraireBenevole['idUtilisateur']==$unBenevole['idUtilisateur'])
                    {
                        if($unDateDebut >= $unHoraireBenevole['start'] && $unDateDebut < $unHoraireBenevole['end'])
                        {
                            foreach($horaireBenevolesUtilise as $unHoraireBenevolesUtilise)
                            {
                                if($unHoraireBenevolesUtilise['idUtilisateur']==$unBenevole['idUtilisateur'])
                                {
                                    if($unDateDebut >= $unHoraireBenevolesUtilise['start'] && $unDateDebut < $unHoraireBenevolesUtilise['end'])
                                    {
                                        $info = 2; 
                                        $utiliseInfo = $unHoraireBenevolesUtilise['type'];
                                        foreach($lesAffectations as $lieu) //boucle foreach pour affecter le lieu à la mission
                                        {
                                            if($lieu['dateDebut'] == $unHoraireBenevolesUtilise['start'] )
                                            {
                                                $varLieu = " / ".utf8_decode($lieu['nomLieu']);
                                                $utiliseInfo = $utiliseInfo.$varLieu;
                                            }
                                        }
                                        if($utiliseInfo == "OrganisationSpectacle") //si ce n'est pas une mission
                                        {
                                            $info = 3; 
                                            $lorganisation = personne\getUneOrganisation($unHoraireBenevolesUtilise['idType']); 
                                            $idSpec = $lorganisation['idSpectacle']; 
                                            $leSpectacle = personne\getLeSpectacle($idSpec); //on récupère le nom du spectacle
                                            $utiliseInfo = " Organisation spectacle : ".$leSpectacle['nomSpectacle'];
                                        }
                                    }
                                }
                            }
                            if ($info==0)
                            {
                                $info = 1; 
                                $utiliseInfo = ""; 
                            }
                        }
                    }
                }          
                ?>
            
                <td <?php if($info==1): ?>
                    <?php endif; ?>
                    <?php if($info==2): ?>
                        <?php endif; ?>
                        <?php if($info==3): ?>
                            <?php endif; ?>>
                <?php echo $utiliseInfo; ?></td>
                <?php $lesJours=$lesJours+1; ?>
            <?php endwhile; ?>
                    <!-- les disponibilités du bénévoles -->

            
        </tr>
        <?php $uneDateDebut = date('Y-m-d H:i:s', strtotime($uneDateDebut. ' + 30 minutes')); ?>

    <?php endwhile; ?>
        <!-- fin colonne des heures -->




</table>
