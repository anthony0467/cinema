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
        FROM film 
        ORDER BY annee_sortie_film DESC");
        //On relie par un "require" la vue qui nous intéresse (située dans le dossier "view")
        require "view/listFilms.php";
    }

    public function detailFilm(){
        // on se connecte et On exécute la requête de notre choix 
        $pdo = Connect::seConnecter();
        $requeteDetail = $pdo->prepare("
        SELECT titre, annee_sortie_film, duree_minute, note, synopsis, affiche, id_film, id_realisateur
        FROM film  ");
        $requeteDetail->execute([]);
        //On relie par un "require" la vue qui nous intéresse (située dans le dossier "view")
        require "view/detailFilm.php";
    }
}


?>