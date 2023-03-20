<?php ob_start();
$filmDetail = $requeteDetailFilm->fetch();
$filmReal = $requeteReal->fetch();
 ?>
            <h3 class="txt-center"><?=  $filmDetail['titre'] ?></h3>
            <article class="flex row flex-center align-start gap wrap">
                <figure>
                    <img src="<?= $filmDetail['affiche'] ?>" height="auto" width="300px" alt="affiche cinéma" title="<?=  $filmDetail['titre'] ?>">
                </figure>
                <div class="width-600 pad-x2">
                    
                    <p>Année de Sortie : <?= $filmDetail['annee_sortie_film'] ?></p>
                    <p>Durée du film : <?= $filmDetail['duree_film'] ?></p>
                    <p>Note : <?php for ($i = 1; $i <= 5; $i++) { // systeme de notation étoile
                                    if ($i <= $filmDetail['note']) {
                                        echo '<i class="fa fa-star"></i>'; // utiliser l'icône d'étoile de Font Awesome
                                    } else {
                                        echo '<i class="fa-regular fa-star"></i>'; // utiliser l'icône d'étoile vide de Font Awesome
                                    }
                                } ?> </p>
                    <div class="flex row wrap">
                        <h4>Genre : </h4>
                        <ul class="flex row wrap">
                        <?php  
                        foreach($requeteGenre->fetchAll() as $filmGenre){ ?>
                                <li class="pad-025"><a href="index.php?action=detailGenre&id=<?= $filmGenre["id_genre"] ?>"> <?= $filmGenre['nom_genre'] ?></a></li>
                            
                        <?php } ?>
                        </ul>
                    </div>
                    <h4>Casting :</h4>
                    <h4>Réalisateur :</h4>
                    <p><a href="index.php?action=detailReal&id=<?= $filmReal['id_realisateur'] ?>"
                    ><?= $filmReal['prenom'], ' ', $filmReal['nom'] ?></a></p>
                    <h4>Acteurs :</h4>
                    <ul>
                    <?php
                            foreach($requeteCast->fetchAll() as $castActeur){ ?>
                            
                                    <li class="flex wrap">
                                        <a href="index.php?action=detailActeur&id=<?= $castActeur["id_acteur"] ?>"><?= $castActeur["prenom"],' ', $castActeur["nom"] ?></a>
                                        <p>( <?= $castActeur['nom_role'] ?>)</p>
                                    </li>
                                
                                
                        <?php } ?>
                    </ul>
                    <h4>Synopsis :</h4>
                    <p><?= $filmDetail['synopsis'] ?></p>
                </div>

            </article>
        
   

<?php

$titre = "Fiche film";
$titre_secondaire = "Fiche film";
$contenu = ob_get_clean();
require "view/template.php";

?>