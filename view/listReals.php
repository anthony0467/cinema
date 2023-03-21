<?php ob_start(); ?>

<p class="uk-label uk-label-warning txt-center">Total : <?= $requete->rowCount() ?> réalisateurs</p>


<form action="index.php?action=addReal" class="form-style" method="POST">
    <h4 class="txt-center h4">Ajouter un réalisateur</h4>
    <input type="text" name="nom" id="nom" placeholder="Ajouter un nom">
    <input type="text" name="prenom" id="prenom" placeholder="Ajouter un prénom">
    <fieldset>
        <legend disabled selected>Sexe :</legend>
        <label for="Homme">
            <input type="radio" name="sexe" value="Homme"> Homme
        </label>
        <label for="Femme">
            <input type="radio" name="sexe" value="Femme"> Femme
        </label>
    </fieldset>
    <input type="date" name="date" id="date" placeholder="01/01/2000">
    <input type="url" name="photo" id="photo" placeholder="image(url)">
    <input type="submit" name="submit" class="btn" value="Ajouter">
</form>

<table class="uk-table uk-table-striped">
    <thead>
        <tr>
            <th>REALISATEUR</th>
        </tr>
    </thead>
    <tbody class="body-actor-real">
        <?php
        foreach ($requete->fetchAll() as $real) { ?>
            <tr>
                <td class="actor-real-list">
                    <a class="flex row align-center gap-05" href="index.php?action=detailReal&id=<?= $real["id_realisateur"] ?>">
                        <img src="<?= $real['photo'] ?>" alt="<?= $real['photo'] ?>" height="auto" width="50px"><?= $real["realisateur"] ?></a>
                </td>
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