<?php ob_start(); ?>


<p class="uk-label uk-label-warning txt-center">Total : <?= $requete->rowCount() ?> films</p>

<div class="container-formFilm">

<table class="uk-table uk-table-striped table-film">
    <thead>
        <tr>
            <th>TITRE</th>
            <th>ANNEE SORTIE</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach($requete->fetchAll() as $film){ ?>
            <tr>
                <td><a href="index.php?action=detailFilm&id=<?= $film["id_film"] ?>"><?= $film["titre"] ?></a></td>
                <td class="txt-center"><?= $film["annee_sortie_film"] ?></td>
            </tr>
       <?php } ?>
    </tbody>
</table>



<form action="index.php?action=addFilm" method="POST" class="flex  column gap form-style">
    <h3 class="txt-center">Ajouter un film</h3>
    <input type="text" name="nomFilm" id="nomFilm" placeholder="Ajouter un titre">
    <select name="realFilm" id="realFilm">
        <option  value="" disabled selected>Réalisateur</option>
        
    <?php
        foreach($requetelistReal->fetchAll() as $realList){ ?>
                <option value="<?= $realList["id_realisateur"] ?>"><?= $realList["realisateur"] ?></option>
    <?php } ?>

    </select>
    <fieldset>
        <legend disabled selected>Genre</legend>

    <?php
        foreach($requeteGenreFilm->fetchAll() as $genreList){ ?>
                <label for="<?= $genreList["id_genre"] ?>">
                    <input type="checkbox" name="genre[]" value="<?= $genreList["id_genre"] ?>" id="<?= $genreList["id_genre"] ?>"><?= $genreList["nom_genre"] ?>
            </label>
    <?php } ?>

        </fieldset>
    <input type="number" name="dureeFilm" id="dureeFilm" min="60" placeholder="Durée du film en minutes">
    <input type="text" name="afficheFilm" id="afficheFilm" placeholder="image(url)">
    <input type="number" name="anneeFilm" id="anneeFilm" min="1900" placeholder="Année de sortie">
    <input type="number" name="noteFilm" id="noteFilm" min="1" max="5" placeholder="Note du film(entre 1 et 5)">
    <textarea id="synopsis" name="synopsis" rows="4" cols="30" placeholder="Synopsis"></textarea>
    <input type="submit" name="submit" class="btn" value="Ajouter">
</form>

</div>

<?php

$titre = "Liste des films";
$titre_secondaire = "Liste des films";
$contenu = ob_get_clean();
require "view/template.php";

?>