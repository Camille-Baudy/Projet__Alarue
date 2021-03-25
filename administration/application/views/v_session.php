<head>
    <title>Gestion des bénévoles / ALARUE</title>

    <link rel=stylesheet href="<?php echo CSSURL.'bootstrap.min.css'?>">
    <script src="<?php echo JSURL."bootstrap.min.js" ?>"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-1.12.0.js" integrity="sha256-yFU3rK1y8NfUCd/B4tLapZAy9x0pZCqLZLmFL3AWb7s=" crossorigin="anonymous"></script>


</head>

<title>Gestion des bénévoles / ALARUE</title>
    
    <link rel=stylesheet href="<?php echo CSSURL.'bootstrap.min.css'?>" integrity="sha384iq8mTJ0ASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <script src="<?php echo JSURL."bootstrap.min.js" ?>"  integrity="sha364-0mSbJDEHialfmuBBQP6A4Qrprq50VfW37PRR3j5ELqxsslyVq0tnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>

    
    <div class="container xxouter-div">
        <div class="row xxiner-div">
          <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
            <?php $passer=0; ?>
            <?php foreach($lesSessions as $uneSession) : ?>

               <?php $passer=1; ?>

            <?php endforeach; ?> 
            <?php if($passer==1): ?>
            <div class="card-body">
                
                <h5 class="card-title text-center">Connexion à un festival</h5>
                <form class="form-signin" method="POST" action="index.php?action=home">
                    
                    <!-- CHOIX DU FESTIVAL / SESSION -->
                    <p>Choisissez un festival : </p>
                    <select name='idSession' id='idSession' class="form-control">
            
                        <?php foreach($lesSessions as $uneSession) : ?>

                            <option value="<?php echo $uneSession['idSession']; ?>"><?php echo $uneSession['idSession']." - ".$uneSession['nomSession'];?></option>

                        <?php endforeach; ?>


                  </select>

                  <div class="custom-control custom-checkbox mb-3">
                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                  </div>
                  <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Continuer</button>
                  <hr class="my-4">

                </form>
                
                  
                </div>
                <?php endif; ?>

                <!-- CREATION D'UN FESTIVAL / SESSION -->
                <div class="card-body">
                    <h5 class="card-title text-center">Créer un festival</h5>
                    <form action="index.php?action=valideConnexion2" method="POST">
                        <fieldset>

                        <!-- Création session -->
                            <div class="form-group">
                                <label for="nomSession">Entrez le nom de ce festival :</label>
                                <input type="text" class="form-control" id="nom" name="nom" required placeholder="Nom de la session">
                            </div>
                            <div class="form-group">
                               <label for="date">Entrez une date de début :</label>
                               <input type="date" class="form-control" id="dateDebut" name="dateDebut" required placeholder="jj/mm/aaaa">
                            </div>
                            <div class="form-group">
                               <label for="date">Entrez une date de fin :</label>
                               <input type="date" class="form-control" id="dateFin" name="dateFin" required placeholder="jj/mm/aaaa">
                            </div>




                            <button type="submit" class="btn btn-primary">Créer festival</button>
                        </fieldset>
                    </form>
                    
                    <hr class="my-4">
                    
                    
                </div>
                
                
                <?php if($passer==1): ?>
                <div class="card-body">
                    
                    <div class="card-body">
                
                    <h5 class="card-title text-center">Festivals en suppression</h5>
                        <table class="table table-striped text-center">
                            <thead>
                                <tr>
                                    <th scope="col">Nom festival</th>
                                   <!-- <th scope="col">Date de suppression</th> -->
                                    <th scope="col">Suppression</th>
                                </tr>
                            </thead>
                            <tbody>
                                

                                    <!-- COMBOBOX POUR CHOISIR LE FESTIVAL / SESSION A SUPPRIMER -->
                                    <form class="form-signin" method="POST" action="index.php?action=supprimerSession">
                                    <tr>
                                        <td>
                                            <select name='idSession' id='idSpectacle' class="form-control">
                                                <?php foreach($lesSessions as $uneSession) : ?>

                                                    <option value="<?php echo $uneSession['idSession']; ?>"><?php echo $uneSession['idSession']." - ".$uneSession['nomSession'];?></option>

                                                <?php endforeach; ?>

                                            </select>
                                        </td>
                                   <!--     <td>Suppression dans 10 jours</td> -->
                                        <td><button class="btn btn-lg btn-danger btn-block text-uppercase" type="submit">X</button></td>
                                    </tr>

                                    </form> 

                            </tbody>
                        </table>
                
                  
                    </div>
                
                
                  
                </div>
                <?php endif; ?>
                
                
                
                
            </div>
          </div>
        </div>
    </div>

