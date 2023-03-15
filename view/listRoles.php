<?php ob_start();
$type = " roles";
 ?>

<p class="uk-label uk-label-warning txt-center">Total : <?= $requete->rowCount() .$type ?></p>

<table class="uk-table uk-table-striped">
    <thead>
        <tr>
            <th>Role</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach($requete->fetchAll() as $role){ ?>
            <tr>
                <td><a href="index.php?action=detailRole&id=<?= $role["id_role"] ?>"><?= $role["nom_role"] ?></a></td>
            </tr>
       <?php } ?>
    </tbody>
</table>


<?php

$titre = "Liste des roles";
$titre_secondaire = "Liste des roles";
$contenu = ob_get_clean();
require "view/template.php";

?>