
<head>
    <title>Gestion des bénévoles / ALARUE</title>

    <link rel=stylesheet href="<?php echo CSSURL.'bootstrap.min.css'?>">
    <script src="<?php echo JSURL."bootstrap.min.js" ?>"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-1.12.0.js" integrity="sha256-yFU3rK1y8NfUCd/B4tLapZAy9x0pZCqLZLmFL3AWb7s=" crossorigin="anonymous"></script>


</head>

<body>
    <script src="<?php echo JSURL."jquery.min.js"?>"></script>
    <script src="<?php echo JSURL."bootstrap.min.js"?>"></script>

    
    
    <div class="container xxouter-div">
        <h2>Logiciel de gestion des bénévoles ALARUE</h2>
        <p>Développé par des élèves du BTS SIO de Nevers</p>
        <div class="row xxiner-div">
          <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
              <div class="card-body">
                <h5 class="card-title text-center">Connexion</h5>
                <form class="form-signin" method="POST" action="index.php?action=valideConnexion">


                  <div class="form-label-group">
                    <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Mot de passe" required>
                    <label for="inputPassword"></label>
                  </div>
                  

                  <div class="custom-control custom-checkbox mb-3">
                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                  </div>
                  <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Continuer</button>
                  <hr class="my-4">

                </form>
                <!-- SI LE MOT DE PASSE EST INCORRECT -->
                <h5><?php if($mdpHash!="Aucun"){echo "Mot de passe incorrect !";} ?></h5>
                <h6><?php if($mdpHash!="Aucun"){echo $mdpHash;} ?></h6>

              </div>
            </div>
          </div>
        </div>
    </div>
 <footer>
	<p>Merci de préviligier un navigateur internet <B><u>autre que</u></B> Google Chrome (Mozilla, Edge, Ecosia, Opera, Brave...).</br> Nous vous remercions de votre compréhension.</p>
</footer>
        
    


