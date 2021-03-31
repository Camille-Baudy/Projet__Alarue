<div class ="progress">
    <div class="progress-bar" role="progressbar" style="width: 90%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">90%</div>
</div>
<form method="post" action="index.php?action=fin" enctype="multipart/form-data">
 <h1 class="h1_home"> Inscription bénévoles - Zaccros</h1>
   
  <div class="container">
    <h1>Formulaires d'inscription</h1>
		<div class="container">
			<div class="form-row"> 
    			<label for="photo" >
    			Ajoutez une photo (formats : .png, .jpeg, .jpg| taille maximale : 3 Mo) :<br /></label>
    			<input type="file" id="photo" name="photo" />
			</div>
		</div>
		 <td class="centre info">
		 <input id="prodId" name="idB" type="hidden" value="<?php echo $idB; ?>">
			<input type="submit" value="Terminer l'inscription" name="btSubmit" class="btn btn-primary">
		</td>
	</div>

	
</form>