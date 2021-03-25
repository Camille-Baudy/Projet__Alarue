<?php
//Il sera nommé compagnie.xls
header('Content-Disposition: attachment; filename="OrganisationSpectacle_'.$debut.'_'.$fin.'.xls"');
?>
<table>
	<?php $leDebut = $debut; $laFin = $fin; ?>
    <?php while($leDebut<=$laFin): ?>
        <tr>
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
            <td><?php echo $nomJour." ".$numJour." ".utf8_decode($nomMois) ?></td>
            
    
    
        </tr>
        <tr>
            <td>DEBUT</td>
            <td>FIN</td>
            <td>LIEU</td>
            <td>INFORMATION</td>
            <td>SPECTACLE</td>
            <td>COMPAGNIE</td>
            <td><?php echo utf8_decode("DUREE")?></td>
            <td>INSCRITS</td>
    
        </tr>
        
        <?php foreach($lesOrganisationsSpectacles as $uneOrganisationSpectacle): ?>
            <?php if(date("M",strtotime($uneOrganisationSpectacle['dateDebut']))==date("M",strtotime($leDebut)) && date("D",strtotime($uneOrganisationSpectacle['dateDebut']))==date("D",strtotime($leDebut)) && date("d",strtotime($uneOrganisationSpectacle['dateDebut']))==date("d",strtotime($leDebut)) && date("Y",strtotime($uneOrganisationSpectacle['dateDebut']))==date("Y",strtotime($leDebut))): ?>
            <tr>
            
                <td><?php echo date("H",strtotime($uneOrganisationSpectacle['dateDebut'])).'h'.date("i",strtotime($uneOrganisationSpectacle['dateDebut'])); ?></td>
                <td><?php echo date("H",strtotime($uneOrganisationSpectacle['dateFin'])).'h'.date("i",strtotime($uneOrganisationSpectacle['dateFin'])); ?></td>
                
                <?php foreach($lesLieux as $unLieu): ?>
                    <?php if ($unLieu['idLieu']==$uneOrganisationSpectacle['idLieu']): ?>
                        <td><?php echo utf8_decode($unLieu['nomLieu']); ?></td>
                    <?php endif; ?>
                <?php endforeach; ?>
                
                <td><?php echo utf8_decode($uneOrganisationSpectacle['info']); ?></td>
                
                
                <?php foreach($lesSpectacles as $unSpectacle): ?>
                    <?php if ($uneOrganisationSpectacle['idSpectacle']==$unSpectacle['idSpectacle']): ?>
                        <td><?php echo utf8_decode($unSpectacle['nomSpectacle']); ?></td>
                        <?php $idCompagnie = $unSpectacle['idCompagnie']; $duree = $unSpectacle['dureeMin']; ?>
                    <?php endif; ?>
                <?php endforeach; ?>
                
                
                <?php foreach($lesCompagnies as $uneCompagnie): ?>
                    <?php if ($uneCompagnie['idCompagnie']==$idCompagnie): ?>
                        <td><?php echo utf8_decode($uneCompagnie['nomCompagnie']); ?></td>
                    <?php endif; ?>
                <?php endforeach; ?>
                <td><?php if($duree==0){echo "En continu";}else{echo $duree;} ?></td>
                
                <td>
                    <?php
                        $iHoraire = 0;
                        foreach($lesHorairesBenevoles as $unHoraireBenevole){
                            if($unHoraireBenevole['idType']==$uneOrganisationSpectacle['idOrganisationSpectacle']){
                                $iHoraire=$iHoraire+1;
                                if($iHoraire==1){
                                    $unBenevole = personne\getLeBenevole($unHoraireBenevole['idUtilisateur']);
                                    $lesBenevoles[] = personne\getLeBenevole($unHoraireBenevole['idUtilisateur']);
                                }
                                else{
                                    $lesBenevoles[] = personne\getLeBenevole($unHoraireBenevole['idUtilisateur']);
                                }
                                
                            }
                        }
                    
                        $text = "";
                        foreach($lesBenevoles as $leBenevole){
                            $text = $text.$leBenevole['nom']." ".$leBenevole['prenom']." / ";
                        }
                        
                        if($iHoraire == 0){
                            echo utf8_decode("Aucun Benevole");
                            
                        }
                        elseif($iHoraire == 1){
                            echo utf8_decode($iHoraire." Benevole : ".$unBenevole['nom']." ".$unBenevole['prenom']);
                            
                        }
                        else{
                            echo utf8_decode($iHoraire." Benevoles : ".$text);
                            
                        }
                        unset($text);
                        unset($lesBenevoles);
                                                        
                    ?>
                
                </td>
                
            </tr>
                
            <?php endif; ?>
            
            
        <?php endforeach; ?>
    
        <tr></tr>
        <tr></tr>
        <tr></tr>
        <?php $leDebut = date('Y-m-d', strtotime($leDebut. ' + 1 days')); ?>
    <?php endwhile; ?>
</table>