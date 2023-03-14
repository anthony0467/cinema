<?php

session_start();


use Controller\CinemaController;
use Controller\RealController;
use Controller\HomeController;

//On autocharge les classes du projet 
spl_autoload_register(function($class_name){
    include $class_name. '.php';
});
//On instancie le controller Cinema 
$ctrlCinema = new CinemaController();
$ctrlHome = new HomeController();
$ctrReal = new RealController();

if(isset($_GET["action"])){
    switch ($_GET["action"]) {

        case "listFilms" : $ctrlCinema->listFilms(); break;
        //case "listActeurs" : $ctrlCinema->listActeurs(); break;
        case "listReals" : $ctrReal->listReals(); break;
    }
}

else {
    session_destroy();
    $ctrlHome->getHomepage();
}

?>