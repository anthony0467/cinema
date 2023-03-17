<?php ob_start();
$type = " genres";
 ?>

<p class="uk-label uk-label-warning txt-center">Total : <?= $requete->rowCount() .$type ?></p>

<form action="index.php?action=addGenre" method="POST">
    <input type="text" name="nomGenre" id="nomGenre" placeholder="Ajouter un genre">
    <input type="submit" name="submit" class="btn" value="Ajouter">
</form>

<table class="uk-table uk-table-striped">
    <thead>
        <tr>
            <th>Genre</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach($requete->fetchAll() as $genre){ ?>
            <tr>
                <td><a href="index.php?action=detailGenre&id=<?= $genre["id_genre"] ?>"><?= $genre["nom_genre"] ?></a></td>
            </tr>
       <?php } ?>
    </tbody>
</table>


<?php

$titre = "Liste des genres";
$titre_secondaire = "Liste des genres";
$contenu = ob_get_clean();
require "view/template.php";

?>