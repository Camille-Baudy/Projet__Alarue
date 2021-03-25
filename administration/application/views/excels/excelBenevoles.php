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
    
<?php foreach($lesBenevoles as $unBenevole): ?>
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

    </tr>
    <tr></tr>
    
<?php endforeach; ?>
    
</table>