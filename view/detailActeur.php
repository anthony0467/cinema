<?php ob_start();
$acteurDetail = $requeteDetail->fetch();
$dateActeur = $acteurDetail['date_naissance'];
 ?>
            
            <article>
                <h3><?=  $acteurDetail['prenom'], ' ', $acteurDetail['nom']  ?></h3>
                <img src="<?= $acteurDetail['photo'] ?>" height="auto" width="300px" >
                <p>Sexe: <?= $acteurDetail['sexe']  ?></p>
                 <p>Date de naissance : <?= date('d-m-Y', strtotime($dateActeur)) ?></p>
                 <h3>Filmographie</h3>
                 <table class="uk-table uk-table-striped">
                    <thead>
                        <tr>
                            <th>Film</th>
                            <th>Role</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach($requeteFilmo->fetchAll() as $filmo){ ?>
                            <tr>
                                <td><a href="index.php?action=detailFilm&id=<?= $filmo["id_film"] ?>"><?= $filmo["titre"] ?></a></td>
                                <td><a href="index.php?action=detailRole&id=<?= $filmo["id_role"] ?>"><?= $filmo["nom_role"] ?></a></td>
                            </tr>
                    <?php } ?>
                    </tbody>
                </table>

            </article>
        
   

<?php

$titre = "Fiche acteur";
$titre_secondaire = "Fiche acteur";
$contenu = ob_get_clean();
require "view/template.php";

?>