<?php 
$titre = 'Accueil';
$titre_secondaire = 'Accueil';

ob_start()
?>


    <h2>exercice cinéma</h2>


    <?php 
    $contenu = ob_get_clean();
    require "view/template.php";
?>