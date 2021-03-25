
<head>
    <title>Gestion des bénévoles / ALARUE</title> 

    <link rel=stylesheet href="<?php echo CSSURL.'bootstrap.min.css'?>">
    <script src="<?php echo JSURL."bootstrap.min.js" ?>"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-1.12.0.js" integrity="sha256-yFU3rK1y8NfUCd/B4tLapZAy9x0pZCqLZLmFL3AWb7s=" crossorigin="anonymous"></script>


</head>

<header>
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">
            <img src="http://administration.zaccros.org/resources/images/alarue.png" width="90" height="20" class="d-inline-block align-top" alt="">   
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item <?php if ($_SESSION['navbar'] == 1) : ?>active<?php endif; ?>">
                    <a class="nav-link" href="index.php?action=voirBenevoles">Bénévoles</a>
                </li>
                <li class="nav-item <?php if ($_SESSION['navbar'] == 2) : ?>active<?php endif; ?>">
                    <a class="nav-link" href="index.php?action=voirCompagnies">Compagnies</a>
                </li>
                
                <li class="nav-item <?php if ($_SESSION['navbar'] == 3) : ?>active<?php endif; ?>">
                    <a class="nav-link" href="index.php?action=voirSpectacles">Encadrement_spectacles</a>
                </li>

                <li class="nav-item <?php if ($_SESSION['navbar'] == 11) : ?>active<?php endif; ?>">
                    <a class="nav-link" href="index.php?action=voirEntrerSite">Entrée_site</a>
                </li>

                <li class="nav-item <?php if ($_SESSION['navbar'] == 4) : ?>active<?php endif; ?>">
                    <a class="nav-link" href="index.php?action=voirAccueilsPublics">Accueil_Public</a>
                </li>
                
                <li class="nav-item <?php if ($_SESSION['navbar'] == 5) : ?>active<?php endif; ?>">
                    <a class="nav-link" href="index.php?action=voirBuvettes">Buvette</a>
                </li>
                
                <li class="nav-item <?php if ($_SESSION['navbar'] == 6) : ?>active<?php endif; ?>">
                    <a class="nav-link" href="index.php?action=voirCaravanes">Caravane</a>
                </li>
                
                <li class="nav-item <?php if ($_SESSION['navbar'] == 7) : ?>active<?php endif; ?>">
                    <a class="nav-link" href="index.php?action=voirDecos">Déco</a>
                </li>
                
                <li class="nav-item <?php if ($_SESSION['navbar'] == 8) : ?>active<?php endif; ?>">
                    <a class="nav-link" href="index.php?action=voirLogistiques">Logistique</a>
                </li>
                
                <li class="nav-item <?php if ($_SESSION['navbar'] == 9) : ?>active<?php endif; ?>">
                    <a class="nav-link" href="index.php?action=voirRestaurations">Restauration</a>
                </li>

                <li class="nav-item <?php if ($_SESSION['navbar'] == 10) : ?>active<?php endif; ?>">
                    <a class="nav-link" href="index.php?action=voirTechniques">Technique</a>
                </li>
             
            </ul>            
        </div>
    </nav>
    

<script src="http://zaccros.xeriorteam.fr/resources/js/jquery.min.js"></script>
<script src="http://zaccros.xeriorteam.fr/resources/js/bootstrap.min.js"></script>


</header>
	

<body>



    
  