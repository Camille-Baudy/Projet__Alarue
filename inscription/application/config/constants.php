<?php

//Url l'url de votre site à modifier en fonction du déploiement
define('URL', 'http://localhost:8080/alarue-local.test/inscription/');

//CSURL où se trouve ma cs
define('CSURL', URL . 'resources/cs/');
//CSSURL où se trouve ma css
define('CSSURL', URL . 'resources/css/');
//JSURL où se trouve mon javascript
define('JSURL', URL . 'resources/js/');
//JSURL où se trouve mon javascript
define('JSSURL', URL . 'resources/jss/');

//CONTROLLERPATH où se trouvent mes controleurs de page
define('CONTROLLERSPATH', APPATH . 'controllers' . DIRECTORY_SEPARATOR);
//VIEWSPATH où se trouvent mes vues
define('VIEWSPATH', APPATH . 'views' . DIRECTORY_SEPARATOR);
//MODELSPATH où se trouvent mes models
define('MODELSPATH', APPATH . 'functions' . DIRECTORY_SEPARATOR);
//TEMPLATESPATH où se trouvent mes templates
define('TEMPLATESPATH', VIEWSPATH . 'templates' . DIRECTORY_SEPARATOR);
//IMG où se trouvent mes images
define('IMG', URL . 'resources/images/');

//Les informations de connexion
//DB_HOST l'adresse IP ou le nom de la machine qui héberhe le SGBD
define('DB_HOST', 'localhost');
//DB_NAME le nom de la base de données
define('DB_NAME', 'dbs316935-1');
//Le login sur la base
define('DB_LOGIN', 'root');
//Le mot de passe sur la base
define('DB_PASSWORD', '');

