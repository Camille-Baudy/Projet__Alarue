<div class ="progress">
    <div class="progress-bar" role="progressbar" style="width: 70%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">70%</div>
</div>
<form role="form" method="POST" action="index.php?action=validationHoraire">
<h1 class="h1_home"> Inscription bénévoles - Zaccros</h1>
<br />
         <div class="container">
            <h1>Merci de renseigner vos horaires !</h1>
            

            <?php $leDebut = date('Y-m-d', strtotime($debut . ' - '. $jourSup . ' days')); ?>

            <?php while($jourSup > 0 ) 
            { 
            ?>

            </br>
            <h3><?php echo $leDebut; ?></h3>


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
                    <option value="non-dispo-matin" selected="selected">Je ne suis pas disponible</option>
                </select>
                <td>Horaire de fin</td>
                <select name='matin' id='matin' class='form-control'>
                    <option value="9h00">9h00</option>
                    <option value="10h00">10h00</option>
                    <option value="11h00">11h00</option>
                    <option value="12h00">12h00</option>
                    <option value="non-dispo-matin" selected="selected">Je ne suis pas disponible</option>
                </select></br>

                <h4>Midi</h4>
                <!-- combobox midi (de 12h à 14h) -->
                <td>Horaire de début</td>
                <select name='midi' id='midi' class='form-control'>
                    <option value="12h00">12h00</option>
                    <option value="13h00">13h00</option>
                    <option value="non-dispo-midi" selected="selected">Je ne suis pas disponible</option>
                </select>
                <td>Horaire de fin</td>
                <select name='midi' id='midi' class='form-control'>
                    <option value="13h00">13h00</option>
                    <option value="14h00">14h00</option>
                    <option value="non-dispo-midi" selected="selected">Je ne suis pas disponible</option>
                </select></br>

                <h4>Après-midi</h4>
                <!-- combobox après-midi (de 14h à 18h) -->
                <td>Horaire de début</td>
                <select name='midi' id='midi' class='form-control'>
                    <option value="14h00">14h00</option>
                    <option value="15h00">15h00</option>
                    <option value="16h00">16h00</option>
                    <option value="17h00">17h00</option>
                    <option value="non-dispo-apresmidi" selected="selected">Je ne suis pas disponible</option>
                </select>
                <td>Horaire de fin</td>
                <select name='midi' id='midi' class='form-control'>
                    <option value="15h00">15h00</option>
                    <option value="16h00">16h00</option>
                    <option value="17h00">17h00</option>
                    <option value="18h00">18h00</option>
                    <option value="non-dispo-apresmidi" selected="selected">Je ne suis pas disponible</option>
                </select></br>

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
                    <option value="non-dispo-soir" selected="selected">Je ne suis pas disponible</option>
                </select>
                <td>Horaire de fin</td>
                <select name='midi' id='midi' class='form-control'>
                    <option value="19h00">19h00</option>
                    <option value="20h00">20h00</option>
                    <option value="21h00">21h00</option>
                    <option value="22h00">22h00</option>
                    <option value="23h00">23h00</option>
                    <option value="00h00">00h00</option>
                    <option value="01h00">01h00</option>
                    <option value="02h00">02h00</option>
                    <option value="non-dispo-soir" selected="selected">Je ne suis pas disponible</option>
                </select>
                </th>
                </tr>
                </tbody>
                </br>
            <?php
            $jourSup -= 1;
            $leDebut = date('Y-m-d', strtotime($leDebut . ' + 1 days')); //on rajoute +1 jour à la date de début
                } //fin de la boucle while


            ?>

                                        <input id="prodId" name="leJour" type="hidden" value="<?php echo $debut ?>">

                                        <br/>
                                        <br/>


                                            <button type="submit" class="btn btn-primary">Terminer</button>


                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>