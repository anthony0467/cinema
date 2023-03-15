<?php ob_start();
$realDetail = $requeteDetail->fetch();
$dateReal = $realDetail['date_naissance'];
 ?>
            
            <article>
                <h3><?=  $realDetail['prenom'], ' ', $realDetail['nom']  ?></h3>
                <p>Sexe: <?= $realDetail['sexe']  ?></p>
                 <p>Date de naissance : <?= date('d-m-Y', strtotime($dateReal)) ?></p>
                 <h3>Filmographie</h3>
                 <table class="uk-table uk-table-striped">
                    <thead>
                        <tr>
                            <th>Film</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach($requeteFilmo->fetchAll() as $filmo){ ?>
                            <tr>
                                <td><a href="index.php?action=detailFilm&id=<?= $filmo["id_film"] ?>"><?= $filmo["titre"] ?></a></td>
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