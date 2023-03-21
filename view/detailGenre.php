<?php ob_start();
$genreDetail = $requeteNameGenre->fetch();
?>

<article>
    <h3 class="txt-center"><?= $genreDetail['nom_genre'] ?></h3>
    <table width="100%" class="uk-table uk-table-striped">
        <thead>
            <tr>
                <th>Film</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($requeteFilter->fetchAll() as $genre) { ?>
                <tr>
                    <td><a href="index.php?action=detailFilm&id=<?= $genre["id_film"] ?>"><?= $genre["titre"] ?></a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

</article>



<?php

$titre = "Film classé par genre";
$titre_secondaire = "Film par genre";
$contenu = ob_get_clean();
require "view/template.php";

?>