<?php 

namespace Controller;
//  accéder à la classe Connect située dans le namespace "Model" 
use Model\Connect;

class CastingController{
    public function casting(){
        // on se connecte et On exécute la requête de notre choix 
        $pdo = Connect::seConnecter();

         // list real (formulaire)
         $requetelistActeur = $pdo->prepare("
         SELECT CONCAT(prenom, ' ', nom) AS identite, id_acteur
         FROM personne p 
         INNER JOIN acteur a ON a.id_personne = p.id_personne");
         $requetelistActeur->execute([]);

         //list film
         $requetelistFilm = $pdo->prepare("
         SELECT titre, id_film
            FROM film ");
         $requetelistFilm->execute([]);

         //list role
         $requetelistRole = $pdo->prepare("
         SELECT nom_role, id_role
         FROM role ");
         $requetelistRole->execute([]);


        //On relie par un "require" la vue qui nous intéresse (située dans le dossier "view")
        require "view/casting.php";
        //header("Location: index.php?action=listActeurs");
    }

    public function addCasting(){
        if(isset($_POST["submit"])){

            // on se connecte et On exécute la requête de notre choix 
            $pdo = Connect::seConnecter();
            $acteur = filter_input(INPUT_POST, "acteur", FILTER_SANITIZE_SPECIAL_CHARS);
            $film = filter_input(INPUT_POST, 'film', FILTER_SANITIZE_SPECIAL_CHARS);
            $role = filter_input(INPUT_POST, 'role', FILTER_SANITIZE_SPECIAL_CHARS);
            $requeteaddCasting = $pdo->prepare("
            INSERT INTO casting (id_acteur, id_film, id_role) VALUES (:acteur, :film,  :role);");
            $requeteaddCasting->execute(["acteur" => $acteur, "film" => $film, "role" => $role]);


            }

            
            
            
        
            header("Location: index.php?action=listFilms");
      }
    }


?>