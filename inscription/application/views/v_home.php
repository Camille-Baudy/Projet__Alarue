<div class ="progress">
    <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
</div>
<form role="form" method="POST" action="index.php?action=formulaire2">
<h1 class="h1_home"> Inscription bénévoles - Zaccros</h1>
<br />
	
	<link href="<?php echo CSSURL."vicopo.css" ?>" rel="stylesheet">	
 	<script type="text/javascript" src="<?php echo JSURL.'jquery.min.js' ?>"></script>
 	<script type="text/javascript" src="<?php echo JSURL.'api.min.js' ?>"></script>
 	<script type="text/javascript" src="<?php echo JSURL.'index.js' ?>"></script>
	
         <div class="container">
             <h1>Formulaire d'inscription</h1>
			 	<label class="text-danger">* est obligatoire</label><br />
			 
             <form>
               <fieldset>
				   
				<div class="form-group col-md-4">
					<label for="lstSession">Liste des festivals : </label>
				 	<select class="form-control" name="lstSession">
						<?php foreach($lesSessions as $uneSession) : ?>
							<?php if($uneSession['bloque']==0): ?>
								  <option value="<?php echo $uneSession['idSession']; ?>"><?php echo $uneSession['nomSession'];?></option>
							<?php endif; ?>

						<?php endforeach; ?>


					</select>
				</div>
                 
                <!-- Partie personnelle -->
                 <div class="form-row">
					 <div class="form-group col-md-5">
                   		<label for="nom">Entrez votre nom : </label><label class="text-danger">&nbsp*</label>
                   		<input type="text" class="form-control" name="nom" required placeholder="Entrez votre nom">
                 	</div>
                 	<div class="form-group col-md-5">
                   		<label for="nom">Entrez votre prénom :</label><label class="text-danger">&nbsp*</label>
                   		<input type="text" class="form-control" name="prenom" required placeholder="Entrez votre prénom">
					</div>
                 </div>
                
                 <div class="form-group">
                   <label for="sexe">Tu es ...</label><label class="text-danger">&nbsp*</label>
                   <select name="sexe" class="form-control" required>
                     <option value="">Veuillez choisir...</option>
                       <option value="Femme">Une femme</option>
                       <option value="Homme">Un homme</option>
                       <option value="Autre">Autre</option>
                   </select>
                 </div>
                   
                <div class="form-group">
                   <label for="email">Entrez votre mail :</label><label class="text-danger">&nbsp*</label>
                   <input type="email" class="form-control" name="email" required placeholder="adresse.email@test.com">
                </div>
                   
                <div class="form-row">
					<div class="form-group col-md-6">
                   		<label for="date">Entrez votre date de naissance :</label><label class="text-danger">&nbsp*</label>
                   		<input type="date" class="form-control" name="dateNaissance" required placeholder="jj/mm/aaaa">
					</div>
					<div class="form-group col-md-3">
                   		<label for="tel">Numéro de téléphone :</label><label class="text-danger">&nbsp*</label>
                   		<input type="text" class="form-control" name="tel" maxlength="10" required placeholder="0280701266">
					</div>
                </div>
            
                <div class="form-group">
                   <label for="rue">Entrez votre rue :</label><label class="text-danger">&nbsp*</label>
                   <input type="text" class="form-control" name="rue"  required placeholder="Entrez votre rue">
                 </div>
                   
                <div class="form-row">
                    <div class="form-group col-md-5">
						<label for="cp">Entrez votre code postal :</label><label class="text-danger">&nbsp*</label><br/>
						<input id="code" placeholder="Code postal" name="cp" maxlength="5" autocomplete="off" autofocus required>
					</div>
					<div class="form-group col-md-5">
						<label for="ville">Entrez le nom de votre ville (en majuscule):</label><label class="text-danger">&nbsp*</label><br/>
						<input id="city" size="50" placeholder="VILLE" name="ville" autocomplete="off" required>
					</div>
				</div>
				   
				<div id="output">
					
				</div>
                   
                   <br />
                                  
                   <button type="reset"class="btn btn-warning">Annuler</button>
				   <button type="submit" class="btn btn-primary">Suivant</button>
               </fieldset>
			 </form>

		 </div>

