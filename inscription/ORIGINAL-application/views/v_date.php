<?php
    if($jourSup == 0){
        $leJour = $uneSession['periodeDebut'];
        $jourSup = 1;
    }
    else{
        $leJour = date('Y-m-d', strtotime($uneSession['periodeDebut']. ' + '.$jourSup.' days'));
        $jourSup = $jourSup + 1;
    }
                                    
    
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
<form role="form" method="POST" action="index.php?action=validationMission">
<h1 class="h1_home"> Inscription bénévoles - Zaccros</h1>
<br />
         <div class="container">
            <h1>Merci de renseigner vos horaires !</h1>
             
            <h3>Du <?php echo $uneSession["periodeDebut"]." au ".$uneSession["periodeFin"] ?></h3>
             
             
            <div class="container xxouter-div">
                <div class="row xxiner-div">
                    <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                        <div class="card card-signin my-5">
                            <div class="card-body">
                                

                                <h3><?php echo $nomJour." ".$numJour." ".$nomMois." ".$nomAnnee ?></h3>
                                <?php $i = 0 ; $unJour = $leJour; ?>
                                <?php while($unJour <= $uneSession['periodeFin']): ?>
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
                                            <input class="form-check-input" type="radio" name="matin" id="radio1" value="oui">
                                            <label class="form-check-label" for="radio1">Matin (8h-12h)</label>
                                        </div>

                                        <br/>

                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="midi" id="radio1" value="oui">
                                            <label class="form-check-label" for="radio1">Midi (12h-14h)</label>
                                        </div>

                                        <br/>

                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="aprem" id="radio1" value="oui">
                                            <label class="form-check-label" for="radio1">Après-Midi (14h-18h)</label>
                                        </div>

                                        <br/>

                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="soir" id="radio1" value="oui">
                                            <label class="form-check-label" for="radio1">Soir (18h-22h)</label>
                                        </div> 

                                        <br/>

                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="finsoir" id="radio1" value="oui">
                                            <label class="form-check-label" for="radio1">Fin de Soirée (22h-2h)</label>
                                        </div> 
                                        
                                        <input id="prodId" name="idBenevole" type="hidden" value="<?php echo $idBenevole ?>">
                                        <input id="prodId" name="jourSup" type="hidden" value="<?php echo $jourSup ?>">
                                        <input id="prodId" name="leJour" type="hidden" value="<?php echo $leJour ?>">

                                        <br/>
                                        <br/>





                                        <button type="reset"class="btn btn-warning">Réinitialiser</button>
										<button type="submit" class="btn btn-primary">Suivant</button>

                                    </fieldset>
                                </form>
								<a href="<?php echo $_SERVER['HTTP_REFERER']; ?>">Retour</a>
                            </div>
                        </div>
                    </div>
                </div>
             </div>
             <p>À la fin de ce formulaire, vous pourrez choisir de régler ou non précisément vos horaires de disponibilités si les intervalles actuellement proposés ne vous conviennent pas !</p>
             <p><strong>ATTENTION : </strong> afin de pouvoir ajuster vos dates, il faut au préalable s'inscrire à un intervalle</p>
             <p>Exemple : Vous souhaitez être présent le matin de 10h à 12h. Vous devez donc préalablement cocher la case "matin" et une fois sur le calendrier, modifier manuellement ces dates.</p>
        </div>
