<?php header('Content-Disposition:attachment ; filename="'.$type.'_'.$laSession['nomSession'].'.xls"'); ?>

<table>
	<tr>
        <td><?php echo utf8_decode($type); ?></td>
    </tr>
    <tr></tr>
    <?php $i=0 ?>
    <?php while ($i == 0) : ?>

        <?php if($debut <= $fin): ?>
            <br>
            <tr>
                <?php 
        
                    $numJour = date("d",strtotime($debut));
            
            
                    $nmJour = date("D",strtotime($debut));
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



                    $nmMois = date("M",strtotime($debut));
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



                    $nomAnnee = date("Y",strtotime($debut));
        
                ?>
                <td><?php echo $nomJour." ".$numJour." ".utf8_decode($nomMois)." ".$nomAnnee ?></td>
                <td></td>
            </tr>
            <tr>
				<td>Horaires</td>
                <td><?php $var = 'Bénévoles'; echo utf8_decode($var); ?></td>
            </tr>
            <?php $uneDateDebut = $debut." ".$hdebut; $uneDateFin = $debut." ".$hfin; ?>
            <?php if($ajout==1){$uneDateFin = date('Y-m-d H:i:s', strtotime($uneDateFin. ' + '.$minute.' minutes'));} ?>
                
            <?php while ($uneDateDebut < $uneDateFin): ?>
                <tr>
                    <td>
                        <?php echo date("H",strtotime($uneDateDebut)).'h'.date("i",strtotime($uneDateDebut)); ?> - <?php echo date("H",strtotime($uneDateDebut. ' + '.$difTime.' minutes')).'h'.date("i",strtotime($uneDateDebut. ' + '.$difTime.' minutes')); ?>
                    </td>

                    <?php foreach($lesHorairesBenevoles as $unHoraireBenevole): ?>
                            <?php if($unHoraireBenevole['start'] == $uneDateDebut): ?>
                                                                                       
                                                
                                <?php foreach($lesBenevoles as $unBenevole):?>
                                    <?php if($unBenevole['idUtilisateur']==$unHoraireBenevole['idUtilisateur']): ?>
                                            <?php $leStyle = 1; ?>
                                        
                                    <?php endif; ?>
                                <?php endforeach; ?>
                                    
                                                    
                            <?php endif; ?>
                    <?php endforeach; ?>
                    
                    <td>
                        <?php foreach($lesHorairesBenevoles as $unHoraireBenevole): ?>
                            <?php if($unHoraireBenevole['start'] == $uneDateDebut): ?>
                                                                                       
                                                
                                <?php foreach($lesBenevoles as $unBenevole):?>
                                    <?php if($unBenevole['idUtilisateur']==$unHoraireBenevole['idUtilisateur']): ?>
                                            <?php echo utf8_decode($unBenevole['nom']."_".$unBenevole['prenom']."  /  "); ?>
                                        
                                    <?php endif; ?>
                                <?php endforeach; ?>
                                    
                                                    
                            <?php endif; ?>
                        <?php endforeach; ?>
                        
                    </td>
                    
                </tr>
    
                <?php $uneDateDebut = date('Y-m-d H:i:s', strtotime($uneDateDebut. ' + '.$difTime.' minutes')) ?>
            <?php endwhile; ?>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>

        
        
    
            <?php $debut = date('Y-m-d', strtotime($debut. ' + 1 days')); ?>
            <?php else: ?>
                <?php $i=$i+1;?>
            <?php endif; ?>
        <?php endwhile; ?>

</table>