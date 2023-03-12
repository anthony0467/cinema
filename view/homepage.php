<?php 
$titre = 'Accueil';
$titre_secondaire = 'Accueil';

ob_start()
?>


    <a href="index.php?action=listFilms">Voir les films disponibles</a>
    <br>
    <a href="">Voir la liste des acteurs</a>
    <br>
    <a href="">Voir la liste des réalisateurs</a>


    <?php 
    $contenu = ob_get_clean();
    require "view/template.php";
?>