
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <div class="container table-responsive">
        <br>
        <h1>Information sur la compagnie : <?php echo $laCompagnie['nomCompagnie']; ?></h1>
        <br>
        <p>Souhaitez-vous modifier le nom de la compagnie ?</p>
        <form role="form" method="POST" action="index.php?action=modifierCompagnie">
            <? $_SESSION['idcompagnie']=$laCompagnie['idCompagnie']; ?> 
            <input type="text" class="form-control" name="nom" placeholder="Entrez le nouveau nom de la compagnie">
            <input class="zone btn btn-outline-secondary" type="submit" value="Modifier le nom de la compagnie" size="20" />
            
        </form>
        <br>
        <br>
        <h2>Liste des spectacles associés à cette compagnie</h2>
        <table class="table table-striped text-center">
            <thead>
                <tr>
                    <th scope="col">Nom du spectacle</th>
                    <th scope="col">Durée en minute</th>
                    <th scope="col">Voir organisation spectacle</th>
                    <th scope="col">Supprimer / Ajouter</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($lesSpectacles as $unSpectacle): ?>
                    <tr>
                        <?php $nomAttache = $unSpectacle['nomSpectacle']; $nomAttache = str_replace(' ', '', $nomAttache); ?>


                            <td><?php echo $unSpectacle['nomSpectacle']; ?></td>
                            
                            
                            <td><?php if ($unSpectacle['dureeMin'] == 0 ) {echo "En continue"; } else{echo $unSpectacle['dureeMin'];} ?>
                                
                            </td>
                            
                            <td class="noline plain">
                                <a href="<?php echo "index.php?action=voirLeSpectacle&var=".$unSpectacle['idSpectacle']."" ?>" class="noline plain">
                                    <button type="button" class="btn btn-info btn-lg">⦿</button>
                                </a>
                            </td>


                            <td>
                                <!-- Trigger the modal with a button -->
                                <button type="button" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#<?php echo $nomAttache."_".$unSpectacle['idSpectacle'] ?>">✖︎</button>

                                <!-- Modal -->
                                <div class="modal fade" id="<?php echo $nomAttache."_".$unSpectacle['idSpectacle'] ?>" role="dialog">
                                    <div class="modal-dialog">

                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">

                                                <button type="button" class="close" data-dismiss="modal">&times;</button>

                                            </div>
                                            <div class="modal-body">
                                                <p>Souhaitez vous <strong>VRAIMENT</strong> souhaitez supprimer les spectacles : <?php echo $unSpectacle['nomSpectacle']; ?></p>
                                                <br>
                                                <p>Cela supprimera tous les SPECTACLES lié à ce nom. </p>
                                                <p>Cela libérera le planning des bénévoles qui étaient affectés à ces spectacles</p>
                                                
                                            </div>
                                            <div class="modal-footer">
                                                <h4 class="modal-title">
                                                    <a href="<?php echo "index.php?action=supprimerSpectacle&var=".$unSpectacle['idSpectacle']."" ?>" class="noline plain">
                                                        <button type="button" class="btn btn-danger btn-lg">SUPPRIMER ?</button>
                                                    </a>
                                                </h4>
                                                <button type="button" class="btn btn-info btn-lg" data-dismiss="modal">Fermer</button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    
                    
                    
                                
            </tbody>
        </table>

    </div>
    


