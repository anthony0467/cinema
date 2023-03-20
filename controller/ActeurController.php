<?php 

namespace Controller;
//  accéder à la classe Connect située dans le namespace "Model" 
use Model\Connect;

class ActeurController {
    /**
     * Lister des acteurs
     */
    public function listActeurs(){
        // on se connecte et On exécute la requête de notre choix 
        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("
        SELECT CONCAT(prenom,' ', nom) AS acteur, photo, id_acteur
        FROM personne p
        INNER JOIN acteur a ON p.id_personne = a.id_personne
        WHERE a.id_personne ");
        $requete->execute([]);
        //On relie par un "require" la vue qui nous intéresse (située dans le dossier "view")
        require "view/listActeurs.php";
    }


    public function detailActeur($id){
        // on se connecte et On exécute la requête de notre choix 
        $pdo = Connect::seConnecter();
        $requeteDetail = $pdo->prepare("
        SELECT id_acteur, nom, prenom, sexe, date_naissance, photo
        FROM personne p
        INNER JOIN acteur a ON p.id_personne = a.id_personne
        WHERE a.id_acteur = :id ");
        $requeteDetail->execute(["id"=>$id]);

        $requeteFilmo = $pdo->prepare("
        SELECT titre, nom_role, f.id_film, r.id_role
        FROM film f
        INNER JOIN casting c ON c.id_film = f.id_film
        INNER JOIN role r ON r.id_role = c.id_role
        INNER JOIN acteur a ON a.id_acteur = c.id_acteur
        WHERE a.id_acteur = :id");
        $requeteFilmo->execute(["id"=>$id]);
        //On relie par un "require" la vue qui nous intéresse (située dans le dossier "view")
        require "view/detailActeur.php";
    }


    public function addActeur(){

       
        if(isset($_POST["submit"])){

            // on se connecte et On exécute la requête de notre choix 
            $pdo = Connect::seConnecter();
            $nomPersonne = filter_input(INPUT_POST, "nom", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $prenomPersonne = filter_input(INPUT_POST, 'prenom', FILTER_SANITIZE_SPECIAL_CHARS);
            $sexe = filter_input(INPUT_POST, 'sexe',FILTER_SANITIZE_SPECIAL_CHARS);
            $date_naissance = filter_input(INPUT_POST, "date", FILTER_SANITIZE_SPECIAL_CHARS);
            $photo = filter_input(INPUT_POST, "photo", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $requeteaddPersonne = $pdo->prepare("
            INSERT INTO personne (nom, prenom, sexe, date_naissance, photo) 
            VALUES (:nom, :prenom, :sexe, :date, :photo);");
            $requeteaddPersonne->execute(["nom" => $nomPersonne, "prenom" => $prenomPersonne, "sexe" => $sexe, "date" => $date_naissance, "photo" => $photo]);

             // méthode pour récupéré l'id de l'element inséré 
             $last_id = $pdo->lastInsertId();

                $requeteAddReal = $pdo->prepare("
                INSERT INTO acteur (id_personne) 
                VALUES (:personneId)");
                $requeteAddReal->execute(["personneId"=>$last_id]);
            

        
            header("Location: index.php?action=listActeurs");
      }
   }


}


?>