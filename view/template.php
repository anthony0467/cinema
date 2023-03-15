<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title><?= $titre ?></title>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li>
                    <a href="index.php?action=listFilms">Voir les films disponibles</a>
                </li>

                <li>
                <a href="index.php?action=listActeurs">Voir la liste des acteurs</a>
                </li>

                <li>
                <a href="index.php?action=listReals">Voir la liste des réalisateurs</a>
                </li>

                <li>
                <a href="index.php?action=listGenres">Liste des genres</a>
                </li>

                <li>
                <a href="index.php?action=listRoles">Liste des roles</a>
                </li>
            </ul>
        </nav>


    </header>
   <main>
        <h1>PDO Cinéma</h1>
        <h2><?= $titre_secondaire ?></h2>
        <div><?= $contenu ?></div>
   </main>
    
</body>
</html>