<?php ob_start(); ?>

<p class="uk-label uk-label-warning txt-center">Total : <?= $requete->rowCount() ?> acteurs</p>

<table class="uk-table uk-table-striped">
    <thead>
        <tr>
            <th>ACTEUR</th>
        </tr>
    </thead>
    <tbody class="body-actor-real">
        <?php
        foreach($requete->fetchAll() as $acteur){ ?>
            <tr>
                <td class="actor-real-list"><img src="<?= $acteur['photo'] ?>" alt="<?= $acteur['photo'] ?>" height="auto" width="50px"><a href="index.php?action=detailActeur&id=<?= $acteur["id_acteur"] ?>"><?= $acteur["acteur"] ?></a></td>
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