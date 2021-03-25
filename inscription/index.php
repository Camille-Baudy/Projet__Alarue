<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
define('FCPATH', realpath(dirname(__FILE__)) . DIRECTORY_SEPARATOR);
define('APPATH', FCPATH . 'application' . DIRECTORY_SEPARATOR);
require_once APPATH . 'config' . DIRECTORY_SEPARATOR . 'constants.php';
//require_once CONTROLLERSPATH . 'c_principal.php';


?>
    
    
<?php
//inclure en utilisant CONTROLLPATH le controleur de page utilisateur.php
if (isset($_GET['module']))
    $module = $_GET['module'];
else
        if (isset($_POST['module']))
    $module = $_POST['module'];
else
    $module = 'c_principal';
//var_dump($_SERVER['REQUEST_URI']);
require_once CONTROLLERSPATH . $module . '.php';
?>