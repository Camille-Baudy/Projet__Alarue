
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <div class="container table-responsive">
        <?php $validation = 0; ?>

            <br>
            <h1>Encadrement spectacles</h1>
        <br>
        <table class="table table-striped text-center table-responsive">
            <thead>
                <tr>
                    <th scope="col">Nom du spectacle</th>
                    <th scope="col">Compagnie</th>
                    <th scope="col">Durée en minute de la mission</th>
                    <th scope="col">Voir organisation spectacle</th>
                    <th scope="col">Supprimer / Ajouter</th>
                </tr>
            </thead>
            <tbody>
                
                <form role="form" method="POST" action="index.php?action=creerSpectacle"> 
                    <?php foreach($lesSpectacles as $unSpectacle): ?>
                        <tr>
                            <?php $nomAttache = $unSpectacle['nomSpectacle']; $nomAttache = str_replace(' ', '', $nomAttache); ?>


                            <td><?php echo $unSpectacle['nomSpectacle']; ?></td>
                            
            
                            <td><?php foreach($lesCompagnies as $uneCompagnie): ?> 
                                <?php if ($uneCompagnie['idCompagnie'] == $unSpectacle['idCompagnie'] ) {
                                        echo $uneCompagnie['nomCompagnie'];
                                    } ?>
                                <?php endforeach; ?> 
                            </td>
                            
                            
                            <td><?php if ($unSpectacle['dureeMin'] == 0 ) {echo "En continu"; } else{echo $unSpectacle['dureeMin'];} ?>
                            
                            </td>
                            
                            
                            <td class="noline plain">
                                <a href="<?php echo "index.php?action=voirLeSpectacle&var=".$unSpectacle['idSpectacle']."" ?>" class="noline plain">
                                    <button type="button" class="btn btn-info btn-lg">⦿</button>
                                </a>
                            </td>
                            
                        <!-- BOUTON SUPPRIMER // NOUVEAU -->
                        <td class="noline plain">
                            <a href="<?php echo 'index.php?action=supprimerSpectacle&var='.$unSpectacle['idSpectacle'].'' ?>" class="noline plain">
                                <button type="button" class="btn btn-danger btn-lg">✖︎</button>
                            </a>
                        </td>

                        </tr>
                    <?php endforeach; ?>
                    <?php foreach($lesCompagnies as $uneCompagnie) : ?>

                        <?php $validation = 1; ?>

                    <?php endforeach; ?>
                    
                    <?php if($validation==0): ?>
                    <tr>
                        <td>Il faut au minimum <a href="index.php?action=voirCompagnies">une compagnie</a> pour pouvoir créer un spectacle !</td>
                    
                    </tr>
                    <?php else: ?>
                        <tr>
                        <td><input type="text" class="form-control" name="nom" required placeholder="Entrez le nom du spectacle"></td>
                        <td><select name='compagnie' id='compagnie' class="form-control">
                            <?php foreach($lesCompagnies as $uneCompagnie) : ?>

                                <option value="<?php echo $uneCompagnie['idCompagnie']; ?>"><?php echo $uneCompagnie['nomCompagnie'];?></option>

                            <?php endforeach; ?>

                        </select></td>
                        <td>
                            <select name='minute' id='minute' class="form-control">
                                <option value="0">En continu</option>
                                <option value="30">30</option>
                                <option value="60">60</option>
                                <option value="90">90</option>
                                <option value="120">120</option>
                                <option value="150">150</option>
                            </select>
                        </td>
                            
                        <td></td>

                        <td><input class="zone btn btn-outline-secondary" type="submit" value="Créer nouveau spectacle" size="20" /></td>
                    
                    </tr>
                    <?php endif; ?>
                </form> 
                
            </tbody>
        </table>

    </div>
    


