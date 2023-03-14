<?php ob_start(); ?>

<p class="uk-label uk-label-warning">Il y a <?= $requete->rowCount() ?> acteurs</p>

<table class="uk-table uk-table-striped">
    <thead>
        <tr>
            <th>ACTEUR</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach($requete->fetchAll() as $acteur){ ?>
            <tr>
                <td><a href="index.php?action=detailActeur&id=<?= $acteur["id_acteur"] ?>"><?= $acteur["acteur"] ?></a></td>
            </tr>
       <?php } ?>
    </tbody>
</table>


<?php

$titre = "Liste des acteurs";
$titre_secondaire = "Liste des acteurs";
$contenu = ob_get_clean();
require "view/template.php";

?>