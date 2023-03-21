<form id="form-casting" action="index.php?action=addCasting" class="form-style none" method="POST">
    <h4 class="txt-center h4">Attribuer film et role</h4>
    <select name="acteur" id="acteur">
        <option value="" disabled selected>Choisir un acteur</option>
        <?php
        foreach ($requetelistActeur->fetchAll() as $acteur) { ?>
            <option value="<?= $acteur['id_acteur'] ?>"><?= $acteur['identite'] ?></option>
        <?php } ?>
    </select>

    <select name="film" id="film">
        <option disabled selected>Choisir un film</option>
        <?php
        foreach ($requetelistFilm->fetchAll() as $film) { ?>
            <option value="<?= $film['id_film'] ?>"><?= $film['titre'] ?></option>
        <?php } ?>
    </select>

    <select name="role" id="role">
        <option disabled selected>Choisir un role</option>
        <?php
        foreach ($requetelistRole->fetchAll() as $role) { ?>
            <option value="<?= $role['id_role'] ?>"><?= $role['nom_role'] ?></option>
        <?php } ?>
    </select>

    <input type="submit" name="submit" class="btn" value="Ajouter">
</form>