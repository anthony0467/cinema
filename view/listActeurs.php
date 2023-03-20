<?php ob_start(); ?>

<p class="uk-label uk-label-warning txt-center">Total : <?= $requete->rowCount() ?> acteurs</p>

<form action="index.php?action=addActeur" class="form-style" method="POST">
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