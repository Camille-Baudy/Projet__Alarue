
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <div class="container">
        <?php $debut = $laSession['periodeDebut']; $fin = $laSession['periodeFin'];  ?>
        <form role="form" method="POST" action="index.php?action=excelType">
            <br>
            <input id="prodId" name="type" type="hidden" value="Restauration">
            <input id="prodId" name="hdebut" type="hidden" value="10:00:00">
            <input id="prodId" name="hfin" type="hidden" value="23:00:00">
            <input id="prodId" name="excel" type="hidden" value="oui">
            <h1>Liste restauration</h1>
            <button><img src="<?php echo IMG."excel.png" ?>" height="10%" width="10%"> conversion en excel - restauration </button>
        </form>
        
        <br>
        <form role="form" method="POST" action="index.php?action=chercherRestaurations">
            <select name='date' id='date' class="form-control">
                                                                   
            <?php while($debut <= $fin): ?>
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

                    $nomAnnee = date("Y",strtotime($debut)); ?>
                
                <option value="<?php echo $debut ?>"><?php echo $nomJour." ".$numJour." ".$nomMois." ".$nomAnnee ?></option> 
                <?php $debut = date('Y-m-d', strtotime($debut. ' + 1 days')); ?>
            <?php endwhile; ?>
            </select>
            <br>
            <input class="zone btn btn-outline-secondary" type="submit" value="Rechercher des bénévoles pour la mission restauration" size="20" />
        </form>
        
        <?php if($leTableau == 1): ?>
        <br>
        <br>
            <?php
                $numJour = date("d",strtotime($date));
            
            
                $nmJour = date("D",strtotime($date));
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



                $nmMois = date("M",strtotime($date));
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

                $nomAnnee = date("Y",strtotime($date)); 
            ?>
            
            <h3><?php echo $nomJour." ".$numJour." ".$nomMois." ".$nomAnnee ?></h3> 
            
        
            <table class="table table-striped text-center">
                <thead>
                    <tr>
                        <th scope="col" style="width:10%">Heure</th>
                        <th scope="col" style="width:15%">Lieu</th>
                        <th scope="col" style="width:15%">Bénévoles</th>
                        <th scope="col" style="width:15%">Lieu Choisi</th>
                        <th scope="col" style="width:50%">Bénévoles Inscrits</th>
                    </tr>
                </thead>
                <tbody>
                    
                    <?php $uneDateDebut = $date." 10:00:00"; $uneDateFin = $date." 23:00:00"; $i=0; ?>
                        
                    <?php while ($uneDateDebut < $uneDateFin): ?>
                            
                            
                        <?php $i = $i+1; $idBenevolesLibres[$i] = personne\getIdBenevolesHoraireLibre($uneDateDebut, date('Y-m-d H:i:s', strtotime($uneDateDebut. ' + 30 minutes')), $idSession); 
                        ?>
                            
                            
                        <tr>
                            <!-- HEURE -->
                            <td>
                                <?php echo date("H",strtotime($uneDateDebut)).'h'.date("i",strtotime($uneDateDebut)); ?>
                                <br>
                                <?php echo date("H",strtotime($uneDateDebut. ' + 30 minutes')).'h'.date("i",strtotime($uneDateDebut. ' + 30 minutes')); ?>
                            </td>

                            <!-- LIEU -->
                            <td>
                            <form role="form" method="POST" action="index.php?action=addLieuMissionR">
                            <input id="prodId" name="dateDebut" type="hidden" value="<?php echo $uneDateDebut ?>">
                            <input id="prodId" name="dateFin" type="hidden" value="<?php echo date('Y-m-d H:i:s', strtotime($uneDateDebut. ' + 30 minutes')) ?>">

                            <div class="col-8">
                                <?php 
                                require_once MODELSPATH.'f_administrateur.php';
                                $lesLieux=personne\getLieux(); //récupère tous les lieux
                               ?>
                                <select name='nomLieu' id='nomLieu' class="form-control">
                                        <?php 
                                        foreach($lesLieux as $unLieu)
                                        { 
                                        ?>
                                            <option value="<?php echo $unLieu['nomLieu']; ?>" size="10">
                                            <?php
                                            echo $unLieu['idLieu']." - ".$unLieu['nomLieu'];
                                            ?>                                     
                                            </option></br>
                                        <?php
                                        }  
                                        ?>

                                </select>
                                <input class="zone btn btn-outline-secondary" type="submit" value="Ajouter lieu" size="10" />
                            </div>
                            </form>
                        </td>
                            
                            <!-- CHOIX DES BENEVOLES -->     
                            <td class="noline plain">
                        
                                
                                <div class="row">
                                    <div class="col-8">
                                        
                                        
                                        <form role="form" method="POST" action="index.php?action=ajouterRestauration"> 
                                        <div class="col-8">
                                        <select name='idBenevole' id='idBenevole' class="form-control">
                                        <?php $unI=0; ?>
                                        <?php foreach($idBenevolesLibres[$i] as $unIdBenevoleLibre) : ?>
                                            
                                            <option value="<?php echo $unIdBenevoleLibre; ?>" size="10">
                                                <?php 
                                                foreach($lesBenevoles as $unBenevole){ 
                                                    if($unBenevole['idUtilisateur']==$unIdBenevoleLibre){
                                                        echo $unBenevole['nom']." ".$unBenevole['prenom'];
                                                        $unI = 1;
                                                    }
                                                }  
                                                ?>
                                            </option>
                                        <?php endforeach; ?>
                                        </select>
                                        </div>
                                        <div class="col-2">
                                        <input id="prodId" name="dateDebut" type="hidden" value="<?php echo $uneDateDebut ?>">
                                        <input id="prodId" name="dateFin" type="hidden" value="<?php echo date('Y-m-d H:i:s', strtotime($uneDateDebut. ' + 30 minutes')) ?>">
                                        <input id="prodId" name="date" type="hidden" value="<?php echo $date ?>">
                                        <?php                                         
                                        require_once MODELSPATH.'f_administrateur.php';
                                        $leLieu=personne\getLeLieuMission(5, $uneDateDebut); 
                                        $varLieu = "";
                                        foreach($leLieu as $value)
                                        {
                                            $varLieu = $varLieu." / ".$value[0];
                                        }
                                        ?>
                                        <input id="prodId" name="lieu" type="hidden" value="<?php echo $varLieu; ?>">
                                        <?php if($unI != 0): ?>
                                            <input class="zone btn btn-outline-secondary" type="submit" value="Ajouter bénévole" size="10" />
                                        <?php endif; ?>
                                        </div>
                                        
                                    
                                        </form>
                                    </div>
                                    
                                </div>
                                
                                
                            </td>

                            <!-- BOUTON RETIRER LE LIEU CHOISI -->
                            <td>
                                
                            <table>

                            <input id="prodId" name="dateDebut" type="hidden" value="<?php echo $uneDateDebut ?>">
                            <input id="prodId" name="dateFin" type="hidden" value="<?php echo date('Y-m-d H:i:s', strtotime($uneDateDebut. ' + 30 minutes')) ?>">
                            <?php 
                            require_once MODELSPATH.'f_administrateur.php';
                            $lieuChoisi=personne\getLieuChoisi(5, $uneDateDebut);
                            ?>
                            <?php
                            if ($lieuChoisi!=null) {
                                foreach ($lieuChoisi as $lC) {
                                    ?>
                            <form role="form" method="POST" action="index.php?action=supprimerLieuChoisiMissionAP">
                                <input id="prodId" name="dateDebut" type="hidden" value="<?php echo $uneDateDebut ?>">
                                <input id="prodId" name="idMission" type="hidden" value=5>
                                <input id="prodId" name="nomLieu" type="hidden" value="<?php echo $lC['nomLieu'] ?>">
                                <?php echo $lC['nomLieu']; ?>
                                <br>
                                <input class="zone btn btn-outline-danger" type="submit" value="Retirer le lieu" size="10" />
                            </form>
                            <?php
                                }
                            }
                            ?>
                            </table>
                                </td>

                            <!-- BOUTON RETIRER BENEVOLE -->
                            <td>
                                
                                <table>
                                <?php foreach($lesHorairesBenevoles as $unHoraireBenevole): ?>
                                    <?php if($unHoraireBenevole['start'] == $uneDateDebut): ?>
                                        <td>                                           
                                            
                                            <?php foreach($lesBenevoles as $unBenevole):?>
                                                <?php if($unBenevole['idUtilisateur']==$unHoraireBenevole['idUtilisateur']): ?>
                                                    <form role="form" method="POST" action="index.php?action=supprimerRestauration">
                                                        <input id="prodId" name="dateDebut" type="hidden" value="<?php echo $uneDateDebut ?>">

                                                        <input id="prodId" name="dateFin" type="hidden" value="<?php echo date('Y-m-d H:i:s', strtotime($uneDateDebut. ' + 30 minutes')) ?>">

                                                        <input id="prodId" name="date" type="hidden" value="<?php echo $date ?>">


                                                        <input id="prodId" name="idBenevole" type="hidden" value="<?php echo $unBenevole['idUtilisateur'] ?>">
                                                        <?php echo $unBenevole['nom']." ".$unBenevole['prenom']; ?>
                                                        <br>
                                                        <input class="zone btn btn-outline-danger" type="submit" value="Retirer bénévole" size="10" />
                                                    </form>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </td>
                                        <td>
                                            
                                        </td>
                                                    
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                    </table>
                                    
                            
                                </td>
                                



                                


                            </tr>
                            
                                
                    
                    
                            

                


                <?php $uneDateDebut = date('Y-m-d H:i:s', strtotime($uneDateDebut. ' + 30 minutes')) ?>
            <?php endwhile; ?>
                </tbody>
            </table>
        
        <?php endif; ?>
        
        

    </div>
    



