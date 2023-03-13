<?php
    //CONNEXION BASE DE DONNEES
    try{
        $mysqlConnection = new PDO(
            'mysql:host=localhost;dbname=cinema_anthony;charset=utf8',
            'root',
            '');
        }
        catch (Exception $e)
{
    // en cas d'erreur on affiche un message et on ne montre pas le password
        die('Erreur : ' . $e->getMessage());     
}


    //On récupère tous le contenu de la table film
    $sqlQuery = 'SELECT titre FROM film ';
    $filmsStatement = $mysqlConnection -> prepare($sqlQuery);
    $filmsStatement-> execute();
    $films = $filmsStatement-> fetchAll();

    foreach($films as $film){
        echo '<p>' .$film['titre'].'</p>';
    }

    ?>