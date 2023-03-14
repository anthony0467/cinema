<?php ob_start();
$type = " roles";
 ?>

<p class="uk-label uk-label-warning">Il y a <?= $requete->rowCount() .$type ?></p>

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
                <td><a href=""><?= $role["nom_role"] ?></a></td>
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