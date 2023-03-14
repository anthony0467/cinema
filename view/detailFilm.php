<?php ob_start();
$filmDetail = $requeteDetailFilm->fetch();

 ?>
            
            <article>
                <h3><?=  $filmDetail['titre'] ?></h3>
                <p>Année de Sortie : <?= $filmDetail['annee_sortie_film'] ?></p>
                <p>Durée du film : <?= $filmDetail['duree_minute'] ?> minutes</p>
                <p>Note : <?= $filmDetail['note'] ?> </p>
                <h4>Casting :</h4>
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