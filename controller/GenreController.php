<?php 

namespace Controller;
//  accéder à la classe Connect située dans le namespace "Model" 
use Model\Connect;

class GenreController {
    /**
     * Lister des genres
     */
    public function listGenres(){
        // on se connecte et On exécute la requête de notre choix 
        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("
        SELECT nom_genre, id_genre
        FROM genre ");
        $requete->execute([]);
        //On relie par un "require" la vue qui nous intéresse (située dans le dossier "view")
        require "view/listGenres.php";
    }

    public function detailGenre($id){
          // on se connecte et On exécute la requête de notre choix 
          $pdo = Connect::seConnecter();
          $requeteNameGenre = $pdo->prepare("
          SELECT nom_genre, f.id_film
            FROM film f
            INNER JOIN categoriser c ON c.id_film = f.id_film
            INNER JOIN genre g ON g.id_genre = c.id_genre
            WHERE c.id_genre = :id");
          $requeteNameGenre->execute(["id"=> $id]);


          $requeteFilter = $pdo->prepare("
          SELECT  titre, f.id_film
            FROM film f
            INNER JOIN categoriser c ON c.id_film = f.id_film
            INNER JOIN genre g ON g.id_genre = c.id_genre
            WHERE c.id_genre = :id 
            ORDER BY annee_sortie_film DESC ");
          $requeteFilter->execute(["id"=> $id]);
          //On relie par un "require" la vue qui nous intéresse (située dans le dossier "view")
          require "view/detailGenre.php";
    }

    public function addGenre(){
       
      if(isset($_POST["submit"])){

          // on se connecte et On exécute la requête de notre choix 
          $pdo = Connect::seConnecter();
          $nomGenre = filter_input(INPUT_POST, "nomGenre", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
          $requeteaddGenre = $pdo->prepare("
          INSERT INTO genre (nom_genre) VALUES (:nomGenre);");
          $requeteaddGenre->execute(["nomGenre" => $nomGenre]);
          //On relie par un "require" la vue qui nous intéresse (située dans le dossier "view")
      
          header("Location: index.php?action=listGenres");
    }
  }
}


?>