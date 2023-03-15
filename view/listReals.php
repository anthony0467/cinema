<?php ob_start(); ?>

<p class="uk-label uk-label-warning">Il y a <?= $requete->rowCount() ?> réalisateurs</p>

<table class="uk-table uk-table-striped">
    <thead>
        <tr>
            <th>REALISATEUR</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach($requete->fetchAll() as $real){ ?>
            <tr>
                <td><a href="index.php?action=detailReal&id=<?= $real["id_realisateur"] ?>"><?= $real["realisateur"] ?></a></td>
            </tr>
       <?php } ?>
    </tbody>
</table>


<?php

$titre = "Liste des réalisateurs";
$titre_secondaire = "Liste des réalisateurs";
$contenu = ob_get_clean();
require "view/template.php";

?>