<?php

namespace Controller;
//  accéder à la classe Connect située dans le namespace "Model" 
use Model\Connect;

class CinemaController
{
    /**
     * Lister les films
     */
    public function listFilms()
    {
        // on se connecte et On exécute la requête de notre choix 
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
        SELECT titre, annee_sortie_film, id_film
        FROM film 
        ORDER BY annee_sortie_film DESC");

        // list real (formulaire)
        $requetelistReal = $pdo->prepare("
        SELECT CONCAT(prenom, ' ', nom) AS realisateur, id_realisateur 
        FROM personne p
        INNER JOIN realisateur r ON p.id_personne = r.id_personne
        WHERE r.id_personne ");
        $requetelistReal->execute([]);

        //liste genre (formulaire)
        $requeteGenreFilm = $pdo->prepare("
         SELECT nom_genre, id_genre
         FROM genre ");
        $requeteGenreFilm->execute([]);

        //On relie par un "require" la vue qui nous intéresse (située dans le dossier "view")
        require "view/listFilms.php";
    }

    public function detailFilm($id)
    {
        // on se connecte et On exécute la requête de notre choix 
        $pdo = Connect::seConnecter();
        $requeteDetailFilm = $pdo->prepare("
            SELECT titre, annee_sortie_film, TIME_FORMAT(SEC_TO_TIME((duree_minute * 60)), '%H:%i') AS duree_film,  note, synopsis, affiche, id_film, id_realisateur, nb_like
            FROM film 
            WHERE id_film = :id
            ");
        $requeteDetailFilm->execute(["id" => $id]);

        // genre film
        $requeteGenre = $pdo->prepare("
            SELECT nom_genre,  f.id_film, g.id_genre
            FROM film f
            INNER JOIN categoriser c ON c.id_film = f.id_film
            INNER JOIN genre g ON g.id_genre = c.id_genre
            WHERE c.id_film = :id");
        $requeteGenre->execute(["id" => $id]);


        // casting acteur
        $requeteCast = $pdo->prepare("
        SELECT prenom, nom, a.id_acteur, id_realisateur, nom_role, photo
        FROM acteur a
        INNER JOIN personne p ON p.id_personne = a.id_personne
        INNER JOIN casting c ON c.id_acteur = a.id_acteur
        INNER JOIN film f ON f.id_film = c.id_film
        INNER JOIN role r ON r.id_role = c.id_role
        WHERE f.id_film = :id");
        $requeteCast->execute(["id" => $id]);

        // real film
        $requeteReal = $pdo->prepare("
        SELECT prenom, nom, r.id_realisateur 
        FROM realisateur r
        INNER JOIN personne p ON p.id_personne = r.id_personne
        INNER JOIN film f ON f.id_realisateur = r.id_realisateur
        WHERE f.id_film = :id");
        $requeteReal->execute(["id" => $id]);


        //On relie par un "require" la vue qui nous intéresse (située dans le dossier "view")
        require "view/detailFilm.php";
    }

    public function addLike($id)
    {

        if (isset($_POST["submit"])) {

            $pdo = Connect::seConnecter();
            // compteur like

            $requeteLike = $pdo->prepare("
            UPDATE film SET nb_like = nb_like + 1 WHERE id_film = :id");
            $requeteLike->execute(["id" => $id]);
            /* var_dump($id);
            die();*/

            header("Location: index.php?action=detailFilm&id=" . $id);
        }
    }



    public function addFilm()
    {


        if (isset($_POST["submit"])) {

            // on se connecte et On exécute la requête de notre choix 
            $pdo = Connect::seConnecter();
            $nomFilm = filter_input(INPUT_POST, "nomFilm", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $realFilm = filter_input(INPUT_POST, 'realFilm', FILTER_SANITIZE_SPECIAL_CHARS);
            $genreFilm = filter_input(INPUT_POST, 'genre', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
            //var_dump($genreFilm);
            //die();
            $dureeFilm = filter_input(INPUT_POST, "dureeFilm", FILTER_VALIDATE_INT);
            $afficheFilm = filter_input(INPUT_POST, "afficheFilm", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $synopsis = filter_input(INPUT_POST, "synopsis", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $anneeFilm = filter_input(INPUT_POST, "anneeFilm", FILTER_VALIDATE_INT);
            $noteFilm = filter_input(INPUT_POST, "noteFilm", FILTER_VALIDATE_INT);
            $requeteaddFilm = $pdo->prepare("
            INSERT INTO film (titre, id_realisateur, duree_minute, affiche, synopsis, annee_sortie_film, note) VALUES (:nomFilm, :realFilm,  :dureeFilm, :afficheFilm, :synopsis, :anneeFilm, :noteFilm);");
            $requeteaddFilm->execute(["nomFilm" => $nomFilm, "realFilm" => $realFilm, "dureeFilm" => $dureeFilm, "afficheFilm" => $afficheFilm, "synopsis" => $synopsis, "anneeFilm" => $anneeFilm, "noteFilm" => $noteFilm]);

            // méthode pour récupéré l'id de l'element inséré 
            $last_id = $pdo->lastInsertId();


            foreach ($genreFilm as $genre) {
                $requeteAddGenre = $pdo->prepare("
                INSERT INTO categoriser (id_film, id_genre) 
                VALUES (:id, :genreId)");
                $requeteAddGenre->execute(["id" => $last_id, "genreId" => $genre]);
            }





            header("Location: index.php?action=listFilms");
        }
    }
}
