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
        SELECT titre, annee_sortie_film, id_film
        FROM film 
        ORDER BY annee_sortie_film DESC");
        //On relie par un "require" la vue qui nous intéresse (située dans le dossier "view")
        require "view/listFilms.php";
    }

    public function detailFilm($id){
        // on se connecte et On exécute la requête de notre choix 
        $pdo = Connect::seConnecter();
        $requeteDetailFilm = $pdo->prepare("
        SELECT titre, annee_sortie_film, duree_minute, note, synopsis, affiche, id_film, id_realisateur
        FROM film 
        WHERE id_film = :id");
        $requeteDetailFilm->execute(["id" => $id]);


        // casting acteur
        $requeteCast = $pdo->prepare("
        SELECT prenom, nom, a.id_acteur, id_realisateur 
        FROM acteur a
        INNER JOIN personne p ON p.id_personne = a.id_personne
        INNER JOIN casting c ON c.id_acteur = a.id_acteur
        INNER JOIN film f ON f.id_film = c.id_film
        WHERE f.id_film = :id");
        $requeteCast->execute(["id"=>$id]);

        // real film
        $requeteReal = $pdo->prepare("
        SELECT prenom, nom, r.id_realisateur 
        FROM realisateur r
        INNER JOIN personne p ON p.id_personne = r.id_personne
        INNER JOIN film f ON f.id_realisateur = r.id_realisateur
        WHERE f.id_film = :id");
        $requeteReal->execute(["id"=>$id]);

        //On relie par un "require" la vue qui nous intéresse (située dans le dossier "view")
        require "view/detailFilm.php";
    }
}


?>