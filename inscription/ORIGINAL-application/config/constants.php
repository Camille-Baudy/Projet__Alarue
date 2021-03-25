<?php

//Url l'url de votre site à modifier en fonction du déploiement
    define('URL','http://inscription.zaccros.org/');
//CSURL où se trouve ma cs
    define('CSURL', URL.'resources/cs/');
//CSSURL où se trouve ma css
    define('CSSURL', URL.'resources/css/');
//JSURL où se trouve mon javascript
    define('JSURL', URL.'resources/js/');
//CONTROLLERPATH où se trouvent mes controleurs de page
    define('CONTROLLERSPATH', APPATH.'controllers'.DIRECTORY_SEPARATOR);
//VIEWSPATH où se trouvent mes vues
    define('VIEWSPATH',APPATH.'views'.DIRECTORY_SEPARATOR);
//MODELSPATH où se trouvent mes models
    define('MODELSPATH', APPATH.'functions'.DIRECTORY_SEPARATOR);
//TEMPLATESPATH où se trouvent mes templates
    define('TEMPLATESPATH', VIEWSPATH.'templates'.DIRECTORY_SEPARATOR);
//IMG où se trouvent mes images
    define('IMG', URL.'resources/images/');

//Les informations de connexion
//DB_HOST l'adresse IP ou le nom de la machine qui héberhe le SGBD
    define('DB_HOST', 'db5000324877.hosting-data.io');
//DB_NAME le nom de la base de données
    define('DB_NAME','dbs316935');
//Le login sur la base
    define('DB_LOGIN','dbu590171');
//Le mot de passe sur la base
    define('DB_PASSWORD', 'Alarue58*');


?>