<?php ob_start();

 ?>
            
            <article>
                
                 <table class="uk-table uk-table-striped">
                    <thead>
                        <tr>
                            <th>Role</th>
                            <th>Acteur</th>
                            <th>Film</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach($requeteRole->fetchAll() as $role){ ?>
                            <tr>
                                <td><a href="index.php?action=detailFilm&id=<?= $role["id_film"] ?>"><?= $role["nom_role"] ?></a></td>
                                <td><a href="index.php?action=detailActeur&id=<?= $role["id_acteur"] ?>"><?= $role["identite"] ?></a></td>
                                <td><a href="index.php?action=detailFilm&id=<?= $role["id_film"] ?>"><?= $role["titre"] ?></a></td>
                            </tr>
                    <?php } ?>
                    </tbody>
                </table>

            </article>
        
   

<?php

$titre = "Fiche Role";
$titre_secondaire = "Fiche role";
$contenu = ob_get_clean();
require "view/template.php";

?>