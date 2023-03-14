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
        SELECT CONCAT(prenom, ' ', nom) AS realisateur, id_realisateur 
        FROM personne p
        INNER JOIN realisateur r ON p.id_personne = r.id_personne
        WHERE r.id_personne ");
        $requete->execute([]);
        //On relie par un "require" la vue qui nous intéresse (située dans le dossier "view")
        require "view/listReals.php";
    }
}


?>