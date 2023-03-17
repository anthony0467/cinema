<?php 

namespace Controller;
//  accéder à la classe Connect située dans le namespace "Model" 
use Model\Connect;

class RoleController {
    /**
     * Lister des roles
     */
    public function listRoles(){
        // on se connecte et On exécute la requête de notre choix 
        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("
        SELECT nom_role, id_role
        FROM role");
        $requete->execute([]);
        //On relie par un "require" la vue qui nous intéresse (située dans le dossier "view")
        require "view/listRoles.php";
    }

    public function detailRole($id){
         // on se connecte et On exécute la requête de notre choix 
         $pdo = Connect::seConnecter();
         $requeteRole = $pdo->prepare("
         SELECT nom_role, CONCAT(prenom,' ', nom) AS identite , titre, r.id_role, f.id_film, a.id_acteur
            FROM personne p 
            INNER JOIN acteur a ON a.id_personne = p.id_personne
            INNER JOIN casting c ON c.id_acteur = a.id_acteur
            INNER JOIN film f ON f.id_film = c.id_film
            INNER JOIN role r ON r.id_role = c.id_role
            WHERE r.id_role = :id
            ORDER BY annee_sortie_film DESC");
         $requeteRole->execute(["id" => $id]);
         //On relie par un "require" la vue qui nous intéresse (située dans le dossier "view")
         require "view/detailRole.php";
    }

    public function addRole(){
       
        if(isset($_POST["submit"])){

            // on se connecte et On exécute la requête de notre choix 
            $pdo = Connect::seConnecter();
            $nomRole = filter_input(INPUT_POST, "nomRole", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $requeteaddRole = $pdo->prepare("
                INSERT INTO role (nom_role) VALUES (:nomRole);");
            $requeteaddRole->execute(["nomRole" => $nomRole]);
            //On relie par un "require" la vue qui nous intéresse (située dans le dossier "view")
        
            header("Location: index.php?action=listRoles");
      }
    }
}


?>