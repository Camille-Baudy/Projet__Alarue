<?php
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

            <?php
            $start_array = array_map('intval', explode('-', $debut ));
            $end_array = array_map('intval', explode('-', $finSession ));
           // var_dump($start_array); var_dump($end_array);
            
            if($start_array[0] <= $end_array[0]) // on compare l'année
            {
              if($start_array[1] <= $end_array[1]) // on compare le mois
              {
                if($start_array[2] <= $end_array[2]) // on compare le jour
                {
            ?>

            <?php  echo "<h3>".$nomJour." ".$numJour." ".$nomMois." ".$nomAnnee."</h3>"?>

            <!-- <thead>
                    <tr>
                        <th scope="col" style="width:30%">Jour</th>
                        <th scope="col" style="width:70%">Diponibilités</th>
                    </tr>
            </thead> -->

             <tbody>
                <tr>
                <th scope="col" style="width:70%">
                <h4>Matin</h4>
                <!-- combobox matin (de 8h à  12h) -->
                <td>Horaire de début</td>
                <select name='matin' id='matin' class='form-control'>
                    <option value="8h00">8h00</option>
                    <option value="9h00">9h00</option>
                    <option value="10h00">10h00</option>
                    <option value="11h00">11h00</option>
                    <option value="12h00">12h00</option>
                    <option value="non-dispo">Non disponible</option>
                </select>
                <td>Horaire de fin</td>
                <select name='matin' id='matin' class='form-control'>
                    <option value="8h00">8h00</option>
                    <option value="9h00">9h00</option>
                    <option value="10h00">10h00</option>
                    <option value="11h00">11h00</option>
                    <option value="12h00">12h00</option>
                    <option value="non-dispo">Non disponible</option>
                </select>

                <h4>Midi</h4>
                <!-- combobox midi (de 12h à 14h) -->
                <td>Horaire de début</td>
                <select name='midi' id='midi' class='form-control'>
                    <option value="12h00">12h00</option>
                    <option value="13h00">13h00</option>
                    <option value="14h00">14h00</option>
                    <option value="non-dispo">Non disponible</option>
                </select>
                <td>Horaire de fin</td>
                <select name='midi' id='midi' class='form-control'>
                    <option value="12h00">12h00</option>
                    <option value="13h00">13h00</option>
                    <option value="14h00">14h00</option>
                    <option value="non-dispo">Non disponible</option>
                </select>

                <h4>Après-midi</h4>
                <!-- combobox après-midi (de 14h à 18h) -->
                <td>Horaire de début</td>
                <select name='midi' id='midi' class='form-control'>
                    <option value="14h00">14h00</option>
                    <option value="15h00">15h00</option>
                    <option value="16h00">16h00</option>
                    <option value="17h00">17h00</option>
                    <option value="18h00">18h00</option>
                    <option value="non-dispo">Non disponible</option>
                </select>
                <td>Horaire de fin</td>
                <select name='midi' id='midi' class='form-control'>
                    <option value="14h00">14h00</option>
                    <option value="15h00">15h00</option>
                    <option value="16h00">16h00</option>
                    <option value="17h00">17h00</option>
                    <option value="18h00">18h00</option>
                    <option value="non-dispo">Non disponible</option>
                </select>

                <h4>Soir</h4>
                <!-- combobox soir (de 18h à 02h) -->
                <td>Horaire de début</td>
                <select name='midi' id='midi' class='form-control'>
                    <option value="18h00">18h00</option>
                    <option value="19h00">19h00</option>
                    <option value="20h00">20h00</option>
                    <option value="21h00">21h00</option>
                    <option value="22h00">22h00</option>
                    <option value="23h00">23h00</option>
                    <option value="00h00">00h00</option>
                    <option value="01h00">01h00</option>
                    <option value="02h00">02h00</option>
                    <option value="non-dispo">Non disponible</option>
                </select>
                <td>Horaire de fin</td>
                <select name='midi' id='midi' class='form-control'>
                    <option value="18h00">18h00</option>
                    <option value="19h00">19h00</option>
                    <option value="20h00">20h00</option>
                    <option value="21h00">21h00</option>
                    <option value="22h00">22h00</option>
                    <option value="23h00">23h00</option>
                    <option value="00h00">00h00</option>
                    <option value="01h00">01h00</option>
                    <option value="02h00">02h00</option>
                    <option value="non-dispo">Non disponible</option>
                </select>
                </th>
                </tr>
                </tbody>
            <?php
                //combobox matin (de 8h à  12h)

                //combobox midi (de 12h à 14h)

                //combobox après-midi (de 14h à 18h)

                //combobox soir (de 18h à 02h)
                }
              }
            }

            ?>

                                        <input id="prodId" name="leJour" type="hidden" value="<?php echo $leJour ?>">

                                        <br/>
                                        <br/>


                                            <button type="submit" class="btn btn-primary">Terminer</button>


                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>