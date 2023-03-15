<?php 
$titre = 'Accueil';
$titre_secondaire = 'Accueil';

ob_start()
?>

    <div class="container-home flex column flex-center">
        <h2 class="title-home txt-center">Éxercice cinéma</h2>
    </div>


    <?php 
    $contenu = ob_get_clean();
    require "view/template.php";
?>