
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <div class="container">
            <br>
            
            <h1>Liste compagnies</h1>

        <br>
        <table class="table table-striped text-center">
            <thead>
                <tr>
                    <th scope="col">Nom de la compagnie</th>
                    <th scope="col">Voir compagnie</th>
                    <th scope="col">Supprimer / Ajouter</th>
                </tr>
            </thead>
            <tbody>
                <form role="form" method="POST" action="index.php?action=creerCompagnie"> 
                    <?php foreach($lesCompagnies as $uneCompagnie): ?>
                        <tr>
                            <?php $nomAttache = $uneCompagnie['nomCompagnie']; $nomAttache = str_replace(' ', '', $nomAttache); ?>


                            <td><?php echo $uneCompagnie['nomCompagnie'] ?></td>
                            
                            <td class="noline plain">
                                <a href="<?php echo "index.php?action=voirLaCompagnie&var=".$uneCompagnie['idCompagnie']."" ?>" class="noline plain">
                                    <button type="button" class="btn btn-info btn-lg">⦿</button>
                                </a>
                            </td>
                            
                        <!-- BOUTON SUPPRIMER // NOUVEAU -->
                        <td class="noline plain">
                            <a href="<?php echo 'index.php?action=supprimerCompagnie&var='.$uneCompagnie['idCompagnie'].'' ?>" class="noline plain">
                                <button type="button" class="btn btn-danger btn-lg">✖︎</button>
                            </a>
                        </td>

                            <!-- BOUTON SUPPRIMER ORIGINAL // NE MARCHE PAS 
                            <td>
                                COMMENTAIRE : Trigger the modal with a button 
                                <button type="button" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#<?php echo "t_".$uneCompagnie['idCompagnie'] ?>">✖︎</button>

                                COMMENTAIRE : Modal 
                                <div class="modal fade" id="<?php echo "t_".$uneCompagnie['idCompagnie'] ?>" role="dialog">
                                    <div class="modal-dialog">

                                        COMMENTAIRE : Modal content
                                        <div class="modal-content">
                                            <div class="modal-header">

                                                <button type="button" class="close" data-dismiss="modal">&times;</button>

                                            </div>
                                            <div class="modal-body">
                                                <p>Souhaitez vous <strong>VRAIMENT</strong> supprimer la compagnie : <?php echo $uneCompagnie['nomCompagnie']; ?></p>
                                                <br>
                                                <p>Cela supprimera la compagnie AINSI QUE tous les SPECTACLES liés à cette compagnie. </p>
                                                <p>Cela libérera le planning des bénévoles qui étaient affectés aux spectacles de cette compagnie. </p>
                                                
                                            </div>
                                            <div class="modal-footer">
                                                <h4 class="modal-title">
                                                    <a href="<?php echo "index.php?action=supprimerCompagnie&var=".$uneCompagnie['idCompagnie']."" ?>" class="noline plain">
                                                        <button type="button" class="btn btn-danger btn-lg">SUPPRIMER ?</button>
                                                    </a>
                                                </h4>
                                                <button type="button" class="btn btn-info btn-lg" data-dismiss="modal">Fermer</button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </td>
                            -->
                            
                            
                        </tr>
                    <?php endforeach; ?>
                    <tr>
                        <td><input type="text" class="form-control" name="nom" required placeholder="Entrez le nom de la compagnie"></td>
                        <td></td>
                        <td><input class="zone btn btn-outline-secondary" type="submit" value="Créer nouvelle compagnie" size="20" /></td>
                    
                    </tr>
                </form> 
                
            </tbody>
        </table>

    </div>
    


