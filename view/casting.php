<?php ob_start(); ?>


<form action="index.php?action=addCasting" class="form-style" method="POST">
    <h4 class="txt-center">Créer mon casting</h4>
    <select name="acteur" id="acteur">
        <option value="" disabled selected>Choisir un acteur</option>
    <?php
        foreach($requetelistActeur->fetchAll() as $acteur){ ?>
            <option value="<?= $acteur['id_acteur'] ?>"><?= $acteur['identite'] ?></option>
        <?php } ?>
    </select>
    
    <select name="film" id="film">
    <option  disabled selected>Choisir un film</option>
    <?php
        foreach($requetelistFilm->fetchAll() as $film){ ?>
            <option value="<?= $film['id_film'] ?>"><?= $film['titre'] ?></option>
        <?php } ?>
    </select>

    <select name="role" id="role">
    <option  disabled selected>Choisir un role</option>
    <?php
        foreach($requetelistRole->fetchAll() as $role){ ?>
            <option value="<?= $role['id_role'] ?>"><?= $role['nom_role'] ?></option>
        <?php } ?>
    </select>

    <input type="submit" name="submit" class="btn" value="Ajouter">
</form>


<?php

$titre = "Casting";
$titre_secondaire = "Casting";
$contenu = ob_get_clean();
require "view/template.php";

?>