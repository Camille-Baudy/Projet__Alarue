<div class ="progress">
    <div class="progress-bar" role="progressbar" style="width: 70%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">70%</div>
</div>
<form role="form" method="POST" action="index.php?action=validationHoraire">
<h1 class="h1_home"> Inscription bénévoles - Zaccros</h1>
<br />
         <div class="container">
            <h1>Merci de renseigner vos horaires !</h1>
            

            </br>
            <h3><?php echo $leDebut; ?></h3>


             <tbody>
                <tr>
                <th scope="col" style="width:70%">
                <h4>Matin</h4>
                <!-- combobox matin (de 8h à  12h) -->
                <td>Horaire de début</td>
                <select name='matin-d' id='matin-d' class='form-control'>
                    <option value="08:00:00">8h00</option>
                    <option value="09:00:00">9h00</option>
                    <option value="10:00:00">10h00</option>
                    <option value="11:00:00">11h00</option>
                    <option value="non-dispo" selected="selected">Je ne suis pas disponible</option>
                </select>
                <td>Horaire de fin</td>
                <select name='matin-f' id='matin-f' class='form-control'>
                    <option value="09:00:00">9h00</option>
                    <option value="10:00:00">10h00</option>
                    <option value="11:00:00">11h00</option>
                    <option value="12:00:00">12h00</option>
                    <option value="non-dispo" selected="selected">Je ne suis pas disponible</option>
                </select></br>

                <h4>Midi</h4>
                <!-- combobox midi (de 12h à 14h) -->
                <td>Horaire de début</td>
                <select name='midi-d' id='midi-d' class='form-control'>
                    <option value="12:00:00">12h00</option>
                    <option value="13:00:00">13h00</option>
                    <option value="non-dispo" selected="selected">Je ne suis pas disponible</option>
                </select>
                <td>Horaire de fin</td>
                <select name='midi-f' id='midi-f' class='form-control'>
                    <option value="13:00:00">13h00</option>
                    <option value="14:00:00">14h00</option>
                    <option value="non-dispo" selected="selected">Je ne suis pas disponible</option>
                </select></br>

                <h4>Après-midi</h4>
                <!-- combobox après-midi (de 14h à 18h) -->
                <td>Horaire de début</td>
                <select name='apresmidi-d' id='apresmidi-d' class='form-control'>
                    <option value="14:00:00">14h00</option>
                    <option value="15:00:00">15h00</option>
                    <option value="16:00:00">16h00</option>
                    <option value="17:00:00">17h00</option>
                    <option value="non-dispo" selected="selected">Je ne suis pas disponible</option>
                </select>
                <td>Horaire de fin</td>
                <select name='apresmidi-f' id='apresmidi-f' class='form-control'>
                    <option value="15:00:00">15h00</option>
                    <option value="16:00:00">16h00</option>
                    <option value="17:00:00">17h00</option>
                    <option value="18:00:00">18h00</option>
                    <option value="non-dispo" selected="selected">Je ne suis pas disponible</option>
                </select></br>

                <h4>Soir</h4>
                <!-- combobox soir (de 18h à 02h) -->
                <td>Horaire de début</td>
                <select name='soir-d' id='soir-d' class='form-control'>
                    <option value="18:00:00">18h00</option>
                    <option value="19:00:00">19h00</option>
                    <option value="20:00:00">20h00</option>
                    <option value="21:00:00">21h00</option>
                    <option value="22:00:00">22h00</option>
                    <option value="23:00:00">23h00</option>
                    <option value="00:00:00">00h00</option>
                    <option value="01:00:00">01h00</option>
                    <option value="non-dispo" selected="selected">Je ne suis pas disponible</option>
                </select>
                <td>Horaire de fin</td>
                <select name='soir-f' id='soir-f' class='form-control'>
                <option value="19:00:00">19h00</option>
                    <option value="20:00:00">20h00</option>
                    <option value="21:00:00">21h00</option>
                    <option value="22:00:00">22h00</option>
                    <option value="23:00:00">23h00</option>
                    <option value="00:00:00">00h00</option>
                    <option value="01:00:00">01h00</option>
                    <option value="02:00:00">02h00</option>
                    <option value="non-dispo" selected="selected">Je ne suis pas disponible</option>
                </select>
                </th>
                </tr>
                <input id="prodId" name="leDebut" type="hidden" value="<?php echo $leDebut; ?>">
                <input id="prodId" name="jourSup" type="hidden" value="<?php echo $jourSup -= 1 ; ?>">
                <input id="prodId" name="idB" type="hidden" value="<?php echo $idB; ?>">
                </tbody>
                </br>

                                        <input id="prodId" name="leJour" type="hidden" value="<?php echo $debut ?>">

                                        <br/>
                                        <br/>


                                            <?php if($jourSup > 0){ ?>
                                            <button type="submit" class="btn btn-primary">Continuer</button>
                                            <?php } else { ?>
                                            <button type="submit" class="btn btn-primary">Terminer</button>
                                            <?php } ?>

                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>