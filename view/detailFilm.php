<?php ob_start();
$filmDetail = $requeteDetailFilm->fetch();
$filmReal = $requeteReal->fetch();
 ?>
            
            <article>
                <h3><?=  $filmDetail['titre'] ?></h3>
                <p>Année de Sortie : <?= $filmDetail['annee_sortie_film'] ?></p>
                <p>Durée du film : <?= $filmDetail['duree_minute'] ?> minutes</p>
                <p>Note : <?= $filmDetail['note'] ?> </p>
                <h4>Casting :</h4>
                <h4>Réalisateur :</h4>
                <p><a href="index.php?action=detailReal&id=<?= $filmReal['id_realisateur'] ?>"
                 ><?= $filmReal['prenom'], ' ', $filmReal['nom'] ?></a></p>
                 <h4>Genre :</h4>
                 <ul>
                 <?php  
                 foreach($requeteGenre->fetchAll() as $filmGenre){ ?>
                        <li><a href="index.php?action=detailGenre&id=<?= $filmGenre["id_genre"] ?>"><?= $filmGenre['nom_genre'] ?></a></li>
                    
                 <?php } ?>
                 </ul>
                 <h4>Acteurs :</h4>
                <ul>
                <?php
                        foreach($requeteCast->fetchAll() as $castActeur){ ?>
                           
                                <li><a href="index.php?action=detailActeur&id=<?= $castActeur["id_acteur"] ?>"><?= $castActeur["prenom"],' ', $castActeur["nom"] ?></a></li>
                            
                            
                    <?php } ?>
                </ul>
                <h4>Synopsis :</h4>
                <p><?= $filmDetail['synopsis'] ?></p>
                

            </article>
        
   

<?php

$titre = "Fiche film";
$titre_secondaire = "Fiche film";
$contenu = ob_get_clean();
require "view/template.php";

?>