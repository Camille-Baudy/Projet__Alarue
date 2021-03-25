

    <div class="container">
        <?php $_SESSION['idbenevole']=$leBenevole['idUtilisateur'] ?>
        <br>
        <h1>Information sur le bénévole : </h1>
        <form role="form" method="POST" action="index.php?action=excelBenevole">
            <input id="prodId" name="idBenevole" type="hidden" value="<?php echo $leBenevole['idUtilisateur'] ; ?>">
            <input id="prodId" name="excel" type="hidden" value="oui">
            <button><img src="<?php echo IMG."excel.png" ?>" height="10%" width="10%"> conversion en excel - ce bénévole </button>
        </form>
        <h4>A connu l'association grâce à :</h4>
        <p><?php echo $leBenevole['connaissance'] ?></p>
        <br>
        <br>


        <div class="row">
            <div class="col-3">
                <img src="<?php if($leBenevole['avatar']==""){echo IMG."alarue2.png";}else{echo "http://inscription.zaccros.org/resources/images/".$leBenevole['avatar'];} ?>" class="img-thumbnail">
                <p><?php echo $leBenevole['nom']." ".$leBenevole['prenom'] ?> <?php if ($leBenevole['anciennete']=="non"): ?> n'a jamais participé à un festival <?php else: ?> a déjà participé à un festival<?php endif; ?></p>
            </div>


            <div class="col">
                <button class="btn btn-dark navbar-btn" ><h3><?php echo $leBenevole['nom']." ".$leBenevole['prenom'] ?></h3></button>
                <br>

                <br>
                <div class="row">
                    <div class="col-5">
                        <h4>Date de naissance :</h4>
                        <p><?php echo $leBenevole['dateNaissance'] ?></p>

                        <h4>Sexe : </h4>
                        <p><?php echo $leBenevole['sexe'] ?></p>
                    </div>
                    <div class="col">
                        <h4>Email :</h4>
                        <p><?php echo $leBenevole['email'] ?></p>

                        <h4>Téléphone :</h4>
                        <p><?php echo wordwrap($leBenevole['numTel'],2," ",1) ?></p>
                    </div>

                </div>



            </div>
        </div>
        <br>
        <br>

        <br>
        <br>
        <div class="row">
            <div class="col">
                <h5>Ville :</h5>
                <p><?php echo $leBenevole['ville'].", ".$leBenevole['cp'] ?></p>

                <h5>rue : </h5>
                <p><?php echo $leBenevole['rue'] ?></p>
            </div>
            <div class="col">
                <h5>Bénévole(s) ami(s) :</h5>
                <p><?php echo $leBenevole['benevoleAmis'] ?></p>

                <h5>Taille T-shirt : </h5>
                <p><?php echo $leBenevole['tailleTshirt'] ?></p>
            </div>
            <div class="col">
                <h5>Permis :</h5>
                <p><?php echo $leBenevole['permis'] ?></p>

                <h5>Voiture : </h5>
                <p><?php echo $leBenevole['voiture'] ?></p>
            </div>
        </div>

        <br>
        <br>
        <h2>Liste des missions que souhaiterait faire <?php echo $leBenevole['nom']." ".$leBenevole['prenom'] ?> : </h2>
        <br>
        <br>
        <?php $info = 0; ?>
        <?php foreach($lesMissions as $uneMission): ?>
            <?php if ($uneMission['idMission']==1): ?>
                <?php $info = 1; ?>
                <div class="form-group">
                     <div class="input-group-prepend">
                         <button type="button" class="btn btn-primary">Décoration</button>
                         <input type="text" class="form-control" placeholder="Participer à la déco de l'année (gros chantiers ou petits ateliers). Faire les installations sur place, pas besoin de  savoir bricoler !"readonly>
                     </div>
                </div>
            <?php endif; ?>
            <?php if ($uneMission['idMission']==2): ?>
                <?php $info = 1; ?>
                <div class="form-group">
                     <div class="input-group-prepend">
                         <button type="button" class="btn btn-secondary">Accueil Public</button>
                         <input type="text" class="form-control" placeholder="Accueillir, renseigner le public et tenir la boutique. C'est l'image des Zaccros devant le grand public !"readonly>
                     </div>
                </div>
            <?php endif; ?>
            <?php if ($uneMission['idMission']==3): ?>
                <?php $info = 1; ?>
                <div class="form-group">
                     <div class="input-group-prepend">
                         <button type="button" class="btn btn-success">Encadrement Spectacles</button>
                         <input type="text" class="form-control" placeholder="Accompagner les compagnies, leur donner un coup de main et encadrer le public lors des spectacles."readonly>
                     </div>
                   </div>
            <?php endif; ?>
            <?php if ($uneMission['idMission']==4): ?>
                <?php $info = 1; ?>
                <div class="form-group">
                     <div class="input-group-prepend">
                         <button type="button" class="btn btn-danger">Technique</button>
                         <input type="text" class="form-control" placeholder="Son, lumière et installation technique sont des missions qui t'attendent en technique, mais pas besoin d'être un pro!"readonly>
                     </div>
                </div>
            <?php endif; ?>
            <?php if ($uneMission['idMission']==5): ?>
                <?php $info = 1; ?>
                <div class="form-group">
                     <div class="input-group-prepend">
                         <button type="button" class="btn btn-warning">Catering</button>
                         <input type="text" class="form-control" placeholder="Gérer le coin repas, le lieu où tout le monde se rencontre. On a tous besoin de manger !"readonly>
                     </div>
                </div>
            <?php endif; ?>
            <?php if ($uneMission['idMission']==6): ?>
                <?php $info = 1; ?>
                <div class="form-group">
                     <div class="input-group-prepend">
                         <button type="button" class="btn btn-info">Buvette</button>
                         <input type="text" class="form-control" placeholder="S'occuper du service au bar, sous le chapiteau des Zaccros." readonly>
                     </div>
                </div>
            <?php endif; ?>
            <?php if ($uneMission['idMission']==7): ?>
                <?php $info = 1; ?>
                <div class="form-group">
                     <div class="input-group-prepend">
                         <button type="button" class="btn btn-light">Logistique</button>
                         <input type="text" class="form-control" placeholder="Logistique - Aider à l'installation des infrastructures (chapiteaux, tentes, scènes)."readonly>
                     </div>
                </div>
            <?php endif; ?>


        <?php endforeach; ?>

        <?php if ($info==0): ?>
            <h3>Le bénévole n'a aucune mission de préférence</h3>
        <?php endif; ?>

        <br>
        <br>
        <br>
        <br>

        <!-- AJOUTER DES INFOS ADMIN SUR LE BENEVOLE -->
        <form role="form" method="POST" action="index.php?action=modifierInfoBenevole">
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Information administrateur sur le bénévole : </label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="info"><?php echo $leBenevole['commentaires'] ?></textarea>
            </div>
            <input class="zone btn btn-outline-secondary" type="submit" value="Ajouter" size="20" />
        </form>

    </div>

    <!-- VOIR SON EMPLOI DU TEMPS SOUS FORME DE CALENDRIER -->
	<div class="container">
		<form role="form" method="POST" action="index.php?action=voirCalendrier">
            <input class="zone btn btn-primary" type="submit" value="Voir Calendrier" size="20" />
        </form>
	</div>
