<?php
    $debutSession="";
    $finSession="";
    foreach($dateSession as $ds)
    {
        $debutSession = $ds['periodeDebut'];
        $finSession = $ds['periodeFin'];
    }

    $debut = $debutSession; //on créer une variable $debut qui stocke la date de début du festival
    $jourSup = 0; //on met le compteur à 0
    while($debut <= $finSession) //tant que la date de début et plus petite que la date de fin
    {
        $jourSup += 1; //on rajoute +1 au compteur
        $debut = date('Y-m-d', strtotime($debut. ' + 1 days')); //on rajoute +1 jour à la date de début
    }

    if($jourSup == 0){
        $leJour = $debutSession;
        $jourSup = 1;
    }
    else{
        $leJour = date('Y-m-d', strtotime($debutSession. ' + '.$jourSup.' days'));
        $jourSup = $jourSup + 1;
    }
           
    $leJour=date('Y-m-d', strtotime($debutSession));
    
    $numJour = date("d",strtotime($leJour));
            
            
    $nmJour = date("D",strtotime($leJour));
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
    $nmMois = date("M",strtotime($leJour));
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

    $nomAnnee = date("Y",strtotime($leJour)); 

?>



<div class ="progress">
    <div class="progress-bar" role="progressbar" style="width: 70%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">70%</div>
</div>
<form role="form" method="POST" action="index.php?action=validationHoraire">
<h1 class="h1_home"> Inscription bénévoles - Zaccros</h1>
<br />
         <div class="container">
            <h1>Merci de renseigner vos horaires !</h1>
             <h2>Test</h2>

            <?php
            while($debut <= $finSession)
            {
            ?>
            
            <h3><?php echo $nomJour." ".$numJour." ".$nomMois." ".$nomAnnee ?></h3> 

            <thead>
                    <tr>
                        <th scope="col" style="width:30%">Jour</th>
                        <th scope="col" style="width:70%">Diponibilités</th>
                    </tr>
            </thead>

            <tbody>

                <td>TEST</td>
            </tbody>
            <?php
                //combobox matin (de 8h à  12h)

                //combobox midi (de 12h à 14h)

                //combobox après-midi (de 14h à 18h)

                //combobox soir (de 18h à 02h)
            }

            ?>



          <!--  <h3>Du <?php echo $debutSession." au ".$finSession ?></h3>
             
             
            <div class="container xxouter-div">
                <div class="row xxiner-div">
                    <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                        <div class="card card-signin my-5">
                            <div class="card-body">
                                

                                <h3><?php echo $nomJour." ".$numJour." ".$nomMois." ".$nomAnnee ?></h3>
                                <?php $i = 0 ; $unJour = $leJour; ?>
                                <?php while($unJour <= date('Y-m-d', strtotime($finSession))) : ?>
                                    <?php $i = $i+1 ?>
                                    
                                    <?php $unJour = date('Y-m-d', strtotime($unJour. ' + 1 days')); ?>
                                <?php endwhile; ?>
                                <p>
                                    <?php if($i==1): ?>
                                        Dernier jour à définir
                                    <?php else: ?>
                                        Encore <?php echo $i; ?> jours à définir
                                    <?php endif; ?>
                                    
                                </p>
                                    
                                <hr class="my-4">
                                <br/>
			 
                                <form role="form" method="POST" action="index.php?action=calendrier">
                                    <fieldset>


                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="8h" id="radio1" value="oui">
                                            <label class="form-check-label" for="radio1">8h</label>
                                        </div>
                                        <br/>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="9h" id="radio1" value="oui">
                                            <label class="form-check-label" for="radio1">9h</label>
                                        </div>
                                        <br/>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="10h" id="radio1" value="oui">
                                            <label class="form-check-label" for="radio1">10h</label>
                                        </div>
                                        <br/>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="11h" id="radio1" value="oui">
                                            <label class="form-check-label" for="radio1">11h</label>
                                        </div>
                                        <br/>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="12h" id="radio1" value="oui">
                                            <label class="form-check-label" for="radio1">12h</label>
                                        </div>
                                        <br/>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="13h" id="radio1" value="oui">
                                            <label class="form-check-label" for="radio1">13h</label>
                                        </div>
                                        <br/>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="14h" id="radio1" value="oui">
                                            <label class="form-check-label" for="radio1">14h</label>
                                        </div>
                                        <br/>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="15h" id="radio1" value="oui">
                                            <label class="form-check-label" for="radio1">15h</label>
                                        </div>
                                        <br/>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="16h" id="radio1" value="oui">
                                            <label class="form-check-label" for="radio1">16h</label>
                                        </div>
                                        <br/>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="17h" id="radio1" value="oui">
                                            <label class="form-check-label" for="radio1">17h</label>
                                        </div>
                                        <br/>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="18h" id="radio1" value="oui">
                                            <label class="form-check-label" for="radio1">18h</label>
                                        </div>
                                        <br/>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="19h" id="radio1" value="oui">
                                            <label class="form-check-label" for="radio1">19h</label>
                                        </div>
                                        <br/>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="20h" id="radio1" value="oui">
                                            <label class="form-check-label" for="radio1">20h</label>
                                        </div>
                                        <br/>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="21h" id="radio1" value="oui">
                                            <label class="form-check-label" for="radio1">21h</label>
                                        </div>
                                        <br/>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="22h" id="radio1" value="oui">
                                            <label class="form-check-label" for="radio1">22h</label>
                                        </div>
                                        <br/>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="23h" id="radio1" value="oui">
                                            <label class="form-check-label" for="radio1">23h</label>
                                        </div>
                                        <br/>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="00h" id="radio1" value="oui">
                                            <label class="form-check-label" for="radio1">00h</label>
                                        </div>
                                        <br/>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="01h" id="radio1" value="oui">
                                            <label class="form-check-label" for="radio1">01h</label>
                                        </div>
                                        <br/>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="02h" id="radio1" value="oui">
                                            <label class="form-check-label" for="radio1">02h</label>
                                        </div>

                                        <br/>
                                        
                                        <input id="prodId" name="idBenevole" type="hidden" value="<?php echo $idBenevole ?>"> -->
                                       <!-- <input id="prodId" name="jourSup" type="hidden" value="<?php echo $jourSup ?>"> -->
                                        <input id="prodId" name="leJour" type="hidden" value="<?php echo $leJour ?>">

                                        <br/>
                                        <br/>





                                        <button type="reset"class="btn btn-warning">Réinitialiser</button>
                                        <?php if($i==1): ?>
                                            <form role="form" method="POST" action="index.php?action=validationHoraire">
                                            <button type="submit" class="btn btn-primary">Terminer</button>
                                            </form>
                                        <?php else: ?>
                                            <button type="submit" class="btn btn-primary">Suivant</button>
                                        <?php endif; ?>

                                    </fieldset>
                                </form>
								<a href="<?php echo $_SERVER['HTTP_REFERER']; ?>">Retour</a>
                            </div>
                        </div>
                    </div>
                </div>