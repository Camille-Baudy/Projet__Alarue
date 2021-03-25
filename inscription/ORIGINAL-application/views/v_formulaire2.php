<div class ="progress">
    <div class="progress-bar" role="progressbar" style="width: 30%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">30%</div>
</div>
<form role="form" method="POST" action="index.php?action=utilisateur">
<h1 class="h1_home"> Inscription bénévoles - Zaccros</h1>
<br />
   
         <div class="container">
             <h1>Formulaires d'inscription</h1>
			 	<label class="text-danger">* est obligatoire</label>
             <form>
               <fieldset>
                    
                <label for="permis">As-tu le permis?</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="permis" id="radio1" value="oui">
                        <label class="form-check-label" for="radio1">Oui</label>
                      </div>
                   
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="permis" id="radio2" value="non">
                        <label class="form-check-label" for="radio2">Non</label>
                    </div>
                    <br />            
        
                   <label for="voiture">Si oui, as-tu une voiture personnelle?</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="voiture" id="radio3" value="oui">
                        <label class="form-check-label" for="radio3">Oui</label>
                    </div>
                   
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="voiture" id="radio4" value="non">
                        <label class="form-check-label" for="radio4">Non</label>
                    </div>

                    <br />

                    <div class="form-group">
                        <label for="tshirt">Quelle est votre taille de T-shirt ?</label><label class="text-danger">&nbsp*</label>
                            <select name="tshirt" class="form-control" required>
                                <option value="">Veuillez choisir...</option>
                                   <option value="S">S</option>
                                   <option value="M">M</option>
                                   <option value="L">L</option>
                                   <option value="XL">XL</option>
                                   <option value="XXL">XXL</option>
                                   <option value="XXXL">XXXL</option>
                            </select>
                   </div>
                   
                 <label for="anciennete">As-tu été bénévole aux Zaccros d'ma rue?</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="anciennete" id="radio5" value="non">
                        <label class="form-check-label" for="radio5">Non, je n'ai jamais participé au Zaccros</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="anciennete" id="radio6" value="oui">
                        <label class="form-check-label" for="radio6">Oui</label>
                    </div>
				   
				   <br />
                    <div class="form-group">
                        <label for="benevoleAmis">Y a t-il un/des bénévole(s) avec qui tu voudrais particulièrement travailler cette année?</label>
                        <input type="text" class="form-control" name="benevoleAmis" placeholder="Entrez le nom de votre/vos ami(s)">
                    </div>
                   
                    <label for="mission">Comment as-tu eu connaissance du festival?</label><label class="text-danger">&nbsp*</label>
				   		<select name="connaissances" class="form-control" required>
                                <option value="">Veuillez choisir...</option>
                                   <option value="Affiche/flyers">Affiches / flyers</option>
                                   <option value="Bouche à oreille">Bouche à oreille</option>
                                   <option value="Site internet">Site internet</option>
                                   <option value="Réseaux sociaux">Réseaux sociaux</option>
                                   <option value="Radio">Radio</option>
								   <option value="Presse">Presse</option>
                                   <option value="Autre">Autre</option>
                            </select>
                   <br />
                   <button type="submit" class="btn btn-primary">Continuer</button>
               </fieldset>
             </form>
         </div>
