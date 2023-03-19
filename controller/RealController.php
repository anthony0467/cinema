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
}


?>