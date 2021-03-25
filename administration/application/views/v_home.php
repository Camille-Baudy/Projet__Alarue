

    
    <div class="container">
        
        <br>
        <form role="form" method="POST" action="index.php?action=home">
            <h2>Bienvenue dans : 
                    <select name='idSession' id='idSession' >
                        <option value="<?php echo $laSession['idSession']; ?>"><?php echo $laSession['nomSession']." ".$laSession['periodeDebut']." - ".$laSession['periodeFin']; ?></option>
                
                        <?php foreach($lesSessions as $uneSession): ?>
                            <?php if($uneSession['idSession']!=$laSession['idSession']): ?>
                                <option value="<? echo $uneSession['idSession']; ?>"><?php echo $uneSession['nomSession']." ".$uneSession['periodeDebut']." / ".$uneSession['periodeFin']; ?></option>
                            <?php endif; ?>

                        <?php endforeach; ?>
                    </select>

            </h2>
            <h4>Nombre de bénévoles de ce festival : <?php $i=0; foreach($lesBenevoles as $unBenevole){ $i = $i+1; } echo $i; ?></h4>
            <input class="zone btn btn-outline-secondary" type="submit" value="Changer de festival" size="20" />
            
        </form>
        <br>
        
        <p>Souhaitez-vous modifier le nom du festival ?</p>
        <form role="form" method="POST" action="index.php?action=home">   
            <input type="text" class="form-control" name="nom" placeholder="Entrez le nouveau nom du festival">
            <input class="zone btn btn-outline-secondary" type="submit" value="Modifier le nom du festival" size="20" />
        </form>
        
        <br>
        
        <div class="row">
            <div class="col-sm">
                <table class="table table-striped text-center">
                    <thead>
                        <tr>
                            <th scope="col">Lieu</th>
                            <th scope="col">Éditer / Ajouter</th>
                        </tr>
                    </thead>
                    <tbody>
                        <form role="form" method="POST" action="index.php?action=creerLieu"> 
                            <?php foreach($lesLieux as $unLieu): ?>
                                <tr>
                                    <td><?php echo $unLieu['nomLieu'] ?></td>

                                    <td class="noline plain">
                                        <a href="<?php echo "index.php?action=voirLeLieu&var=".$unLieu['idLieu']."" ?>" class="noline plain">
                                            <button type="button" class="btn btn-info btn-lg">⦿</button>
                                        </a>
                                    </td>

                                </tr>
                            <?php endforeach; ?>
                            <tr>
                                <td><input type="text" class="form-control" name="nom" placeholder="Entrez nom lieu"></td>
                                <td><input class="zone btn btn-outline-secondary" type="submit" value="Créer lieu" size="20" /></td>

                            </tr>
                        </form> 

                    </tbody>
                    
                </table>
            </div>
            <div class="col-sm">                
                <!-- weather widget start --><div id="m-booked-bl-simple-week-vertical-11926"> <div class="booked-wzs-160-275 weather-customize" style="background-color:#2d3238; width:197px;" id="width2 " > <a target="_blank" class="booked-wzs-top-160-275" href="https://www.booked.net/"><img src="//s.bookcdn.com/images/letter/s5.gif" alt="booked net" /></a> <div class="booked-wzs-160-275_in"> <div class="booked-wzs-160-275-data"> <div class="booked-wzs-160-275-left-img wrz-18"></div> <div class="booked-wzs-160-275-right"> <div class="booked-wzs-day-deck"> <div class="booked-wzs-day-val"> <div class="booked-wzs-day-number"><span class="plus">+</span>8</div> <div class="booked-wzs-day-dergee"> <div class="booked-wzs-day-dergee-val">&deg;</div> <div class="booked-wzs-day-dergee-name">C</div> </div> </div> <div class="booked-wzs-day"> <div class="booked-wzs-day-d"><span class="plus">+</span>9&deg;</div> <div class="booked-wzs-day-n"><span class="plus">+</span>2&deg;</div> </div> </div> <div class="booked-wzs-160-275-info"> <div class="booked-wzs-160-275-city">Nevers</div> <div class="booked-wzs-160-275-date">Lundi, 02</div> </div> </div> </div> <a target="_blank" href="https://hotelmix.fr/weather/nevers-2672" class="booked-wzs-bottom-160-275" > <table cellpadding="0" cellspacing="0" class="booked-wzs-table-160"> <tr> <td class="week-day"> <span class="week-day-txt">Mardi</span></td> <td class="week-day-ico"><div class="wrz-sml wrzs-18"></div></td> <td class="week-day-val"><span class="plus">+</span>7&deg;</td> <td class="week-day-val">0&deg;</td> </tr> <tr> <td class="week-day"> <span class="week-day-txt">Mercredi</span></td> <td class="week-day-ico"><div class="wrz-sml wrzs-18"></div></td> <td class="week-day-val"><span class="plus">+</span>8&deg;</td> <td class="week-day-val">0&deg;</td> </tr> <tr> <td class="week-day"> <span class="week-day-txt">Jeudi</span></td> <td class="week-day-ico"><div class="wrz-sml wrzs-18"></div></td> <td class="week-day-val"><span class="plus">+</span>10&deg;</td> <td class="week-day-val"><span class="plus">+</span>3&deg;</td> </tr> <tr> <td class="week-day"> <span class="week-day-txt">Vendredi</span></td> <td class="week-day-ico"><div class="wrz-sml wrzs-22"></div></td> <td class="week-day-val"><span class="plus">+</span>7&deg;</td> <td class="week-day-val"><span class="plus">+</span>3&deg;</td> </tr> <tr> <td class="week-day"> <span class="week-day-txt">Samedi</span></td> <td class="week-day-ico"><div class="wrz-sml wrzs-18"></div></td> <td class="week-day-val"><span class="plus">+</span>7&deg;</td> <td class="week-day-val">0&deg;</td> </tr> <tr> <td class="week-day"> <span class="week-day-txt">Dimanche</span></td> <td class="week-day-ico"><div class="wrz-sml wrzs-03"></div></td> <td class="week-day-val"><span class="plus">+</span>8&deg;</td> <td class="week-day-val">-2&deg;</td> </tr> </table> <div class="booked-wzs-center"> <span class="booked-wzs-bottom-l">Prévisions sur 7 jours</span> </div> </a> </div> </div><script type="text/javascript"> var css_file=document.createElement("link"); css_file.setAttribute("rel","stylesheet"); css_file.setAttribute("type","text/css"); css_file.setAttribute("href",'https://s.bookcdn.com/css/w/booked-wzs-widget-160x275.css?v=0.0.1'); document.getElementsByTagName("head")[0].appendChild(css_file); function setWidgetData(data) { if(typeof(data) != 'undefined' && data.results.length > 0) { for(var i = 0; i < data.results.length; ++i) { var objMainBlock = document.getElementById('m-booked-bl-simple-week-vertical-11926'); if(objMainBlock !== null) { var copyBlock = document.getElementById('m-bookew-weather-copy-'+data.results[i].widget_type); objMainBlock.innerHTML = data.results[i].html_code; if(copyBlock !== null) objMainBlock.appendChild(copyBlock); } } } else { alert('data=undefined||data.results is empty'); } } </script> <script type="text/javascript" charset="UTF-8" src="https://widgets.booked.net/weather/info?action=get_weather_info&ver=6&cityID=2672&type=4&scode=124&ltid=3457&domid=581&anc_id=85732&cmetric=1&wlangID=3&color=2d3238&wwidth=197&header_color=ffffff&text_color=333333&link_color=08488D&border_form=1&footer_color=ffffff&footer_text_color=333333&transparent=0"></script>
                
                
                <!-- weather widget end -->
            </div>
            <div class="col-sm">
                
            </div>
        </div>
        
    </div>
    


