<?php 

namespace Controller;
//  accéder à la classe Connect située dans le namespace "Model" 
use Model\Connect;

class CinemaController {
    /**
     * Lister les films
     */
    public function listFilms(){
        // on se connecte et On exécute la requête de notre choix 
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
        SELECT titre, annee_sortie_film
        FROM film");
        //On relie par un "require" la vue qui nous intéresse (située dans le dossier "view")
        require "view/listFilms.php";
    }
}


?>