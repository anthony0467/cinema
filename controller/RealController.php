<?php 

namespace Controller;
//  accéder à la classe Connect située dans le namespace "Model" 
use Model\Connect;

class RealController {
    /**
     * Lister des acteurs
     */
    public function listReals(){
        // on se connecte et On exécute la requête de notre choix 
        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("
        SELECT CONCAT(prenom, ' ', nom) AS realisateur, photo, id_realisateur 
        FROM personne p
        INNER JOIN realisateur r ON p.id_personne = r.id_personne
        WHERE r.id_personne ");
        $requete->execute([]);
        //On relie par un "require" la vue qui nous intéresse (située dans le dossier "view")
        require "view/listReals.php";
    }

    public function detailReal($id){
        // on se connecte et On exécute la requête de notre choix 
        $pdo = Connect::seConnecter();
        $requeteDetail = $pdo->prepare("
        SELECT id_realisateur, nom, prenom, sexe, date_naissance, photo
        FROM realisateur r
        INNER JOIN personne p ON p.id_personne = r.id_personne
        WHERE id_realisateur = :id ");
        $requeteDetail->execute(["id"=>$id]);


        $requeteFilmo = $pdo->prepare("
        SELECT titre, id_film
        FROM film 
        WHERE id_realisateur = :id");
        $requeteFilmo->execute(["id"=>$id]);

        //On relie par un "require" la vue qui nous intéresse (située dans le dossier "view")
        require "view/detailReal.php";
    }

    public function addReal(){

       
        if(isset($_POST["submit"])){

            // on se connecte et On exécute la requête de notre choix 
            $pdo = Connect::seConnecter();
            $nomPersonne = filter_input(INPUT_POST, "nom", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $prenomPersonne = filter_input(INPUT_POST, 'prenom', FILTER_SANITIZE_SPECIAL_CHARS);
            $sexe = filter_input(INPUT_POST, 'sexe',FILTER_SANITIZE_SPECIAL_CHARS);
            $date_naissance = filter_input(INPUT_POST, "date", FILTER_SANITIZE_SPECIAL_CHARS);
            $photo = filter_input(INPUT_POST, "photo", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            if( $nomPersonne && $prenomPersonne && $sexe && $date_naissance && $photo){

            $requeteaddPersonne = $pdo->prepare("
            INSERT INTO personne (nom, prenom, sexe, date_naissance, photo) 
            VALUES (:nom, :prenom, :sexe, :date, :photo);");
            $requeteaddPersonne->execute(["nom" => $nomPersonne, "prenom" => $prenomPersonne, "sexe" => $sexe, "date" => $date_naissance, "photo" => $photo]);

             // méthode pour récupéré l'id de l'element inséré 
             $last_id = $pdo->lastInsertId();

                $requeteAddReal = $pdo->prepare("
                INSERT INTO realisateur (id_personne) 
                VALUES (:personneId)");
                $requeteAddReal->execute(["personneId"=>$last_id]);
            

        
            header("Location: index.php?action=listReals");
        }
        else{
            header("Location: index.php?action=listReals");
        }
      }
   }
}
