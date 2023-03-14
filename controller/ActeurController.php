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
        SELECT CONCAT(prenom,' ', nom) AS acteur, id_acteur
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
        SELECT id_acteur, nom, prenom, sexe, date_naissance
        FROM personne p
        INNER JOIN acteur a ON p.id_personne = a.id_personne
        WHERE a.id_acteur = :id ");
        $requeteDetail->execute(["id"=>$id]);

        $requeteFilmo = $pdo->prepare("
        SELECT titre, nom_role, f.id_film
        FROM film f
        INNER JOIN casting c ON c.id_film = f.id_film
        INNER JOIN role r ON r.id_role = c.id_role
        INNER JOIN acteur a ON a.id_acteur = c.id_acteur
        WHERE a.id_acteur = :id");
        $requeteFilmo->execute(["id"=>$id]);
        //On relie par un "require" la vue qui nous intéresse (située dans le dossier "view")
        require "view/detailActeur.php";
    }


}


?>