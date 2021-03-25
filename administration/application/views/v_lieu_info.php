
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <div class="container">
        
        
        <br>
        <h1>Information sur le lieu : <?php echo $leLieu['nomLieu']; ?></h1>
        <br>
        <?php if ($leLieu['idLieu']!=0): ?>
        <p>Souhaitez-vous modifier le nom du lieu ?</p>
        <form role="form" method="POST" action="index.php?action=modifierLieu">   
            <input type="text" class="form-control" name="nom" placeholder="Entrez le nouveau nom du lieu">
            <input id="prodId" name="idLieu" type="hidden" value="<?php echo $leLieu['idLieu'] ?>">
            <input class="zone btn btn-outline-secondary" type="submit" value="Modifier le nom du lieu" size="20" />
        </form>
        <br>
        <br>
        <form role="form" method="POST" action="index.php?action=supprimerLieu">   
            <input id="prodId" name="id" type="hidden" value="<?php echo $leLieu['idLieu'] ?>">
            <input class="zone btn btn-outline-danger" type="submit" value="Supprimer le lieu" size="20" />
        </form>
        <?php else: ?>
        <p>Il est impossible de supprimer ou modifier ce non-lieu</p>
        <?php endif;?>
        
        <form role="form" method="POST" action="index.php?action=excelOrganisationSpectacleLieu">
            <br>
            <input id="prodId" name="debut" type="hidden" value="<?php echo $debut ?>">
            <input id="prodId" name="fin" type="hidden" value="<?php echo $fin ?>">
            <input id="prodId" name="idLieu" type="hidden" value="<?php echo $leLieu['idLieu'] ?>">
            <input id="prodId" name="excel" type="hidden" value="oui">
            
            <h1>Représentations spectacles</h1>
            <button><img src="<?php echo IMG."excel.png" ?>" height="10%" width="10%"> conversion en excel - dates du lieu </button>
        </form>
        <?php $i=0 ?>
        <?php while ($i == 0) : ?>
            
            <?php if($debut <= $fin): ?>
                <br>
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
        
        
        
        
                
                <p><?php echo $nomJour." ".$numJour." ".$nomMois." ".$nomAnnee ; ?></p>
                <table class="table table-striped text-center table-responsive">
                    <thead>
                        <tr>
                            <th scope="col">Horaire début</th>
                            <th scope="col">Horaire fin</th>
                            <th scope="col">Nom du spectacle</th>
                            <th scope="col">Compagnie</th>
                            <th scope="col">Information</th>
                            <th scope="col">Voir représentation spectacle</th>
                            <th scope="col">Supprimer / Ajouter</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($lesOrganisationsSpectacles as $uneOrganisation): ?>
                            <?php 
                        
                                $numJourO = date("d",strtotime($uneOrganisation['dateDebut']));
                                $numJourS = date("d",strtotime($debut));
                        
                                $nomMoisO = date("M",strtotime($uneOrganisation['dateDebut']));
                                $nonMoisS = date("M",strtotime($debut));
                        
                                $anneeO = date("Y",strtotime($uneOrganisation['dateDebut']));
                                $anneeS = date("Y",strtotime($debut));
                                
                            ?>
                            <?php if($anneeO == $anneeS): ?>
                                <?php if($nomMoisO == $nonMoisS): ?>
                                    <?php if($numJourO == $numJourS): ?>
                        
                                        <tr>
                                            <td>
                                                <?php echo date("H",strtotime($uneOrganisation['dateDebut'])).'h'.date("i",strtotime($uneOrganisation['dateDebut'])); ?>
                                            </td>
                                            
                                            <td>
                                                <?php if($uneOrganisation['secu']==1): ?>
                                                
                                                    <?php echo date("H",strtotime($uneOrganisation['dateFin'])).'h'.date("i",strtotime($uneOrganisation['dateFin'])); ?>
                                                    <br><strong>
                                                    <?php if(date("d",strtotime($uneOrganisation['dateFin']))!=$numJourS){echo "J+1";} ?>
                                                    </strong>
                                                <?php else: ?>
                                                    <!-- Trigger the modal with a button -->
                                                    <button type="button" class="btn btn-warning btn-lg" data-toggle="modal" data-target="#<?php echo "t_".$uneOrganisation['idOrganisationSpectacle'] ?>">⦿</button>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="<?php echo "t_".$uneOrganisation['idOrganisationSpectacle'] ?>" role="dialog">
                                                        <form role="form" method="POST" action="index.php?action=ModifierOrganisationSpectacleDateLieu">
                                                        <div class="modal-dialog">

                                                            <!-- Modal content-->
                                                            <div class="modal-content">
                                                                <div class="modal-header">

                                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>Vous devez définir un horaire de fin de cette représentation, rappel : elle débute à <?php echo date("H",strtotime($uneOrganisation['dateDebut'])).'h'.date("i",strtotime($uneOrganisation['dateDebut'])); ?></p>
                                                                    <div class="row">
                                                                        <div class="col">
                                                                            <select name='heure' id='heure' class="form-control">
                                                                                <option value="0">0h</option>
                                                                                <option value="1">1h</option>
                                                                                <option value="2">2h</option>
                                                                                <option value="9">9h</option>
                                                                                <option value="10">10h</option>
                                                                                <option value="11">11h</option>
                                                                                <option value="12">12h</option>
                                                                                <option value="13">13h</option>
                                                                                <option value="14">14h</option>
                                                                                <option value="15">15h</option>
                                                                                <option value="16">16h</option>
                                                                                <option value="17">17h</option>
                                                                                <option value="18">18h</option>
                                                                                <option value="19">19h</option>
                                                                                <option value="20">20h</option>
                                                                                <option value="21">21h</option>
                                                                                <option value="22">22h</option>
                                                                                <option value="23">23h</option>
                                                                            </select>
                                                                            
                                                                            <br>
                                                                            <br>
                                                                            <input type="checkbox" name="choix" value="1"> l'horaire correspond au lendemain ?

                                                                        </div>
                                                                        <div class="col">
                                                                            <select name='minute' id='minute' class="form-control">
                                                                                <option value="0">0min</option>
                                                                                <option value="30">30min</option>
                                                                            </select>
                                                                            
                                                                            <input id="prodId" name="idOrganisation" type="hidden" value="<?php echo $uneOrganisation['idOrganisationSpectacle'] ?>">
                                                                            <input id="prodId" name="debut" type="hidden" value="<?php echo $leDebut ?>">
                                                                            <input id="prodId" name="fin" type="hidden" value="<?php echo $laFin ?>">
                                                                            <input id="prodId" name="date" type="hidden" value="<?php echo $debut ?>">
                                                                            

                                                                        </div>
                                                                        
                                                                    </div>
                                                                </div>
                                                                <input id="prodId" name="idLieu" type="hidden" value="<?php echo $leLieu['idLieu'] ?>">
                                                                <div class="modal-footer">
                                                                    <input class="zone btn btn-outline-secondary" type="submit" value="Affecter horaire de fin" size="20" />
                                                                </div>
                                                            </div>

                                                        </div>
                                                        </form>
                                                    </div>

                                                
                                                
                                                <?php endif; ?>
                                            
                                            </td>
                                            <td>
                                                <?php foreach($lesSpectacles as $unSpectacle): ?>
                                                    <?php if ($unSpectacle['idSpectacle']==$uneOrganisation['idSpectacle']): ?>
                                                        <?php echo $unSpectacle['nomSpectacle']; ?>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            
                                                
                                            </td>
                                            <td>
                                                <?php foreach($lesSpectacles as $unSpectacle): ?>
                                                    <?php if ($unSpectacle['idSpectacle']==$uneOrganisation['idSpectacle']): ?>
                                                        <?php foreach($lesCompagnies as $uneCompagnie): ?>
                                                            <?php if($uneCompagnie['idCompagnie']==$unSpectacle['idCompagnie']): ?>
                                                                <?php echo $uneCompagnie['nomCompagnie']; ?>
                                                            <?php endif; ?>
                                                        <?php endforeach; ?>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                                
                                            </td>
                                            
                                            <td>
                                                <?php echo $uneOrganisation['info']; ?>
                                                <br>
                                                <strong>
                                                    <?php
                                                        $iHoraire = 0;
                                                        foreach($lesHorairesBenevoles as $unHoraireBenevole){
                                                            if($unHoraireBenevole['idType']==$uneOrganisation['idOrganisationSpectacle']){
                                                                $iHoraire=$iHoraire+1;
                                                            }
                                                        }
                                                        if($iHoraire == 0){
                                                            echo "Aucun Bénévole";
                                                        }
                                                        elseif($iHoraire == 1){
                                                            echo $iHoraire." Bénévole";
                                                        }
                                                        else{
                                                            echo $iHoraire." Bénévoles";
                                                        }
                                                        
                                                    ?>
                                                </strong>
                                            </td>
                                            <td class="noline plain">
                                                <?php if($uneOrganisation['secu']==1): ?>
                                                    <a href="<?php echo "index.php?action=voirUneOrganisationsSpectacles&var=".$uneOrganisation['idOrganisationSpectacle']."" ?>" class="noline plain">
                                                        <button type="button" class="btn btn-info btn-lg">⦿</button>
                                                    </a>
                                                <?php endif; ?>
                                            </td>
                                            
                                            <!-- NOUVEAU BOUTON SUPPRIMER -->
                                            <td class="noline plain">
                                                <a href="<?php echo "index.php?action=voirLeLieu&unvar=".$uneOrganisation['idOrganisationSpectacle']."" ?>" class="noline plain">
                                                        <button type="button" class="btn btn-danger btn-lg">✖︎</button>
                                                    </a>

                                            </td>

                                        </tr>
                                    <?php endif; ?>
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php endforeach; ?>

                        <form role="form" method="POST" action="index.php?action=creerOrganisationSpectacleLieu"> 
                            <?php foreach($lesCompagnies as $uneCompagnie) : ?>
                                <?php foreach($lesSpectacles as $unSpectacle) : ?>

                                    <?php $validation = 1; ?>
                            
                                <?php endforeach; ?>

                            <?php endforeach; ?>

                            <?php if($validation==0): ?>
                            <tr>
                                <td>Il faut au minimum <a href="index.php?action=voirCompagnies">une compagnie</a> et un <a href="index.php?action=voirSpectacles">un spectacle</a> pour pouvoir créer une représentation de spectacle !</td>

                            </tr>
                            <?php else: ?>
                                <tr>
                                    
                                <td>
                                    <div class="row">
                                        <div class="col">
                                            <input id="prodId" name="debut" type="hidden" value="<?php echo $leDebut ?>">
                                            <input id="prodId" name="fin" type="hidden" value="<?php echo $laFin ?>">
                                            <select name='heure' id='heure' class="form-control">
                                                <option value="8">8h</option>
                                                <option value="9">9h</option>
                                                <option value="10">10h</option>
                                                <option value="11">11h</option>
                                                <option value="12">12h</option>
                                                <option value="13">13h</option>
                                                <option value="14">14h</option>
                                                <option value="15">15h</option>
                                                <option value="16">16h</option>
                                                <option value="17">17h</option>
                                                <option value="18">18h</option>
                                                <option value="19">19h</option>
                                                <option value="20">20h</option>
                                                <option value="21">21h</option>
                                                <option value="22">22h</option>
                                                <option value="23">23h</option>
                                            </select>
                                                
                                        </div>
                                        <div class="col">
                                            <select name='minute' id='minute' class="form-control">
                                                <option value="0">0min</option>
                                                <option value="30">30min</option>
                                            </select>
                                                
                                        </div>
                                    </div>
                                        
                                                                            
                                </td>
                                <td></td>
                                    
                                <td><select name='idSpectacle' id='idSpectacle' class="form-control">
                                    <?php foreach($lesSpectacles as $unSpectacle) : ?>

                                        <option value="<?php echo $unSpectacle['idSpectacle']; ?>"><?php echo $unSpectacle['nomSpectacle'];?></option>

                                    <?php endforeach; ?>

                                </select></td>
                                    
                                <td><input id="prodId" name="date" type="hidden" value="<?php echo $debut ?>"><input id="prodId" name="idLieu" type="hidden" value="<?php echo $leLieu['idLieu'] ?>"></td>
                                    
                                    
                                
                                
                                 
                                <td>
                                    <input id="info" name="info" class="form-control" placeholder="Entrez informations complémentaires" >
                                </td>
                                        
                                    
                                
                                <td></td>
                                <td><input class="zone btn btn-outline-secondary" type="submit" value="Créer organisation" size="20" /></td>

                            </tr>
                            <?php endif; ?>
                        </form> 

                    </tbody>
                </table>
                <?php $debut = date('Y-m-d', strtotime($debut. ' + 1 days')); ?>
            <?php else: ?>
                <?php $i=$i+1;?>
            <?php endif; ?>
        <?php endwhile; ?>
        

    </div>
    


