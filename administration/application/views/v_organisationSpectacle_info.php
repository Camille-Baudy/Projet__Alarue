
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <div class="container">
        
        <?php 
        
                    $_SESSION['idorganisation'] = $lOrganisation['idOrganisationSpectacle'];
                    $debut = $lOrganisation['dateDebut'];
        
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
        
        <br>
        <h1>
            
            Information sur la représentation du spectacle : <?php foreach($lesSpectacles as $unSpectacle) { if($unSpectacle['idSpectacle']==$lOrganisation['idSpectacle']){echo $unSpectacle['nomSpectacle'];} }  ?>
        </h1>
        <h2>
            <?php echo $nomJour." ".$numJour." ".$nomMois." ".$nomAnnee; ?>
        </h2>
        <br>
            <p>
                <strong>Début :</strong> <?php echo date("H",strtotime($lOrganisation['dateDebut'])).'h'.date("i",strtotime($lOrganisation['dateDebut'])); ?>
            </p>
            <p>
                <strong>Fin :</strong> <?php echo date("H",strtotime($lOrganisation['dateFin'])).'h'.date("i",strtotime($lOrganisation['dateFin'])); ?>
            </p>
            <!-- LE LIEU DU SPECTACLE -->
            <form role="form" method="POST" action="index.php?action=modifierInfoOrganisation">
                <p>Lieu : <select name='idLieu' id='idLieu' class="form-control">
                    <?php $newSecu = "0"; ?>
                    <?php //POUR RECUPERER LE NOM DU LIEU POUR LES BENEVOLES
                            $nomLieuTableauExcel = ""; ?>
                    <?php foreach($lesLieux as $unLieu)
                            { 
                                if($unLieu['idLieu']==$lOrganisation['idLieu'])
                                { 
                                    $newSecu="1"; 
                                    $nomLieuTableauExcel = $unLieu['idLieu']; //on stocke le nom du lieu
                                } 
                            } 
                    ?>
                    
                    <option value="<?php echo $lOrganisation['idLieu']; if($newSecu == "0"){echo $newSecu;} ?>">
                        <?php foreach($lesLieux as $unLieu){ 
                            if($unLieu['idLieu']==$lOrganisation['idLieu'])
                                { echo $unLieu['nomLieu'];
                                } 
                        }  ?>
                    </option>
                    <?php foreach($lesLieux as $unLieu): ?>
                        <?php if($unLieu['idLieu']!=$lOrganisation['idLieu']): ?>
                            <option value="<? echo $unLieu['idLieu'] ?>"><?php echo $unLieu['nomLieu']; ?></option>
                        <?php endif; ?>

                    <?php endforeach; ?>

                </select>
                    
                <input id="prodId" name="idOrganisation" type="hidden" value="<?php echo $lOrganisation['idOrganisationSpectacle'] ?>">
                </p>

                <!-- AJOUTER DES INFORMATIONS CONCERNANT CE SPECTACLE -->
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Information complémentaires sur l'organisation de ce spectacle : </label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="info"><?php echo $lOrganisation['info'] ?></textarea>
                </div>
                <input class="zone btn btn-outline-secondary" type="submit" value="Modifier" size="20" />
            </form>
        
        
        
        
        <br>
        <br>
        <!-- LISTE DES BENEVOLES -->
        <h3>Liste des bénévoles inscrits à cette représentation de spectacle :</h3>
        
        <table class="table table-striped text-center table-responsive">
            <thead>
                <tr>
                    <th scope="col">Photo</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Sexe</th>
                    <th scope="col">Email</th>
                    <th scope="col">Rue</th>
                    <th scope="col">Ville</th>
                    <th scope="col">Téléphone</th>
                    <th scope="col">Voir profil</th>
                    <th scope="col">Retirer / Ajouter</th>
                </tr>
            </thead>
            <tbody>
                
                <?php foreach($lesBenevolesInscrits as $unBenevoleInscrit): ?>
                    <tr>
                        <?php $nomAttache = $unBenevoleInscrit['nom']; $nomAttache = str_replace(' ', '', $nomAttache); ?>
                    
                        <td><img src="http://zaccrosadmin.xeriorteam.fr/resources/images/alarue2.png" class="img-thumbnaill"></td>
                        <td><?php echo $unBenevoleInscrit['nom'] ?></td>
                        <td><?php echo $unBenevoleInscrit['prenom'] ?></td>
                        <td><?php echo $unBenevoleInscrit['sexe'] ?></td>
                        <td><?php echo $unBenevoleInscrit['email'] ?></td>
                        <td><?php echo $unBenevoleInscrit['rue'] ?></td>
                        <td><?php echo $unBenevoleInscrit['ville'].", ".$unBenevoleInscrit['cp'] ?></td>
                        <td><?php echo wordwrap($unBenevoleInscrit['numTel'],2," ",1)?></td>
                        <td class="noline plain">
                            <a href="<?php echo "index.php?action=voirLeBenevole&var=".$unBenevoleInscrit['idUtilisateur']."" ?>" class="noline plain">
                                <button type="button" class="btn btn-info btn-lg">⦿</button>
                            </a>
                        </td>

                        <!-- BOUTON SUPPRIMER // NOUVEAU -->
                        <td class="noline plain">
                            <a href="<?php echo "index.php?action=enleverBenevoleOrganisation&var=".$unBenevoleInscrit['idUtilisateur']."" ?>" class="noline plain">
                                <button type="button" class="btn btn-danger btn-lg">✖︎</button>
                            </a>
                        </td>

                    </tr>
                <?php endforeach; ?>
                <tr>
                    <!-- AJOUTER DES BENEVOLES -->
                    <?php 
                        $secu = 1;
                        foreach($idBenevolesLibres as $unIdBenevoleLibre){
                            $secu = 0;
                        } ?>
                    
                    <?php if($secu == 0): ?>
                        <form role="form" method="POST" action="index.php?action=ajouterBenevoleOrganisation">
                            <td></td>
                            <td colspan="2">
                                
                                <select name='idBenevole' id='idBenevole' class="form-control">
                                    <? //$idBenevolesLibres = array_unique($idBenevolesLibres); ?>
                                    <?php foreach($idBenevolesLibres as $unIdBenevoleLibre) : ?>
                                        <?php $newsecu = 0; ?>
                                        <option value="<?php echo $unIdBenevoleLibre; ?>"><?php 
                                            foreach($lesBenevoles as $unBenevole){ 
                                                if($unBenevole['idUtilisateur']==$unIdBenevoleLibre){
                                                    $newsecu = 1;
                                                    echo $unBenevole['nom']." ".$unBenevole['prenom'];
                                                }
                                            }  ?>
                                        </option>

                                    <?php endforeach; ?>

                                </select>
                            </td>
                            <td><input id="prodId" name="idLieu" type="hidden" value="<?php echo $nomLieuTableauExcel; ?>"></td>
                            
                            <td><input id="prodId" name="idOrganisation" type="hidden" value="<?php echo $lOrganisation['idOrganisationSpectacle'] ?>"></td>
                            
                            <td><input id="prodId" name="dateDebut" type="hidden" value="<?php echo $lOrganisation['dateDebut'] ?>"></td>
                            
                            <td><input id="prodId" name="dateFin" type="hidden" value="<?php echo $lOrganisation['dateFin'] ?>"></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><?php if($newsecu == 1): ?><input class="zone btn btn-outline-secondary" type="submit" value="Ajouter bénévole" size="20" /><?php endif; ?></td>
                        </form>
                    <?php else: ?>
                        <td>
                            Aucun ajout possible.
                        </td>
                    <?php endif; ?>
                </tr>
                
            </tbody>
        </table>        

    </div>
    


