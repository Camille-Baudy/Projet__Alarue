
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <div class="container table-responsive">
        
        <br>
        <form role="form" method="POST" action="index.php?action=voirBenevoles">
            <input id="prodId" name="bloque" type="hidden" value="<?php echo $laSession['bloque']; ?>">
            
            <h1>Liste bénévoles <?php if($laSession['bloque']==0): ?><button type="submit"  class="btn btn-info btn-lg">🔓</button><?php else: ?><button type="submit" class="btn btn-danger btn-lg">🔒</button><?php endif; ?></h1>
        </form>
        <form role="form" method="POST" action="index.php?action=excelBenevoles">
            <input id="prodId" name="excel" type="hidden" value="oui">
            <button><img src="<?php echo IMG."excel.png" ?>" height="10%" width="10%"> conversion en excel - bénévoles </button>
        </form>
        
        <br>
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
                    <th scope="col">Supprimer</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($lesBenevoles as $unBenevole): ?>
                    <tr>
                        <?php $nomAttache = $unBenevole['nom']; $nomAttache = str_replace(' ', '', $nomAttache); ?>
                        <td><img src="<?php if($unBenevole['avatar']==""){echo IMG."alarue2.png";}else{echo "http://inscription.zaccros.org/resources/images/".$unBenevole['avatar'];} ?>" width="96px" height="65px" class="img-thumbnaill"></td>
                        <td><?php echo $unBenevole['nom'] ?></td>
                        <td><?php echo $unBenevole['prenom'] ?></td>
                        <td><?php echo $unBenevole['sexe'] ?></td>
                        <td><?php echo $unBenevole['email'] ?></td>
                        <td><?php echo $unBenevole['rue'] ?></td>
                        <td><?php echo $unBenevole['ville'].", ".$unBenevole['cp'] ?></td>
                        <td><?php echo wordwrap($unBenevole['numTel'],2," ",1)?></td>
                        <td class="noline plain">
                            <a href="<?php echo "index.php?action=voirLeBenevole&var=".$unBenevole['idUtilisateur']."" ?>" class="noline plain">
                                <button type="button" class="btn btn-info btn-lg">⦿</button>
                            </a>
                        </td>
                        <!-- BOUTON SUPPRIMER // NOUVEAU -->
                        <td class="noline plain">
                            <a href="<?php echo 'index.php?action=supprimerBenevole&var='.$unBenevole['idUtilisateur'].'' ?>" class="noline plain">
                                <button type="button" class="btn btn-danger btn-lg">✖︎</button>
                            </a>
                        </td>

                    </tr>
                <?php endforeach; ?>
                
            </tbody>
        </table>

    </div>
    


