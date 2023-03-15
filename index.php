<?php

session_start();


use Controller\CinemaController;
use Controller\RealController;
use Controller\ActeurController;
use Controller\HomeController;
use Controller\GenreController;
use Controller\RoleController;

//On autocharge les classes du projet 
spl_autoload_register(function($class_name){
    include $class_name. '.php';
});
//On instancie le controller Cinema 
$ctrlCinema = new CinemaController();
$ctrlHome = new HomeController();
$ctrReal = new RealController();
$ctrActeur = new ActeurController();
$ctrGenre = new GenreController();
$ctrRole = new RoleController();


$id = (isset($_GET["id"])) ? $_GET["id"] : null ;

if(isset($_GET["action"])){
    switch ($_GET["action"]) {

        case "listFilms" : $ctrlCinema->listFilms(); break;
        case "detailFilm" : $ctrlCinema->detailFilm($id); break;
        case "listActeurs" : $ctrActeur->listActeurs(); break;
        case "detailActeur" : $ctrActeur->detailActeur($id); break;
        case "listReals" : $ctrReal->listReals(); break;
        case "detailReal" : $ctrReal->detailReal($id); break;
        case "listGenres" : $ctrGenre->listGenres(); break;
        case "detailGenre" : $ctrGenre->detailGenre($id); break;
        case "listRoles" : $ctrRole->listRoles(); break;
    }
}

else {
    session_destroy();
    $ctrlHome->getHomepage();
}

?>