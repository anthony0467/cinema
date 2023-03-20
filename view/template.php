<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="public/css/style.css">
    <script src="public/js/style.js" defer></script>
    <title><?= $titre ?></title>
</head>
<body>
    <header>
        <nav>
            <ul id="nav-large" class="flex flex-center wrap">
                <li>
                    <a href="index.php">Accueil</a>
                </li>
                <li>
                    <a href="index.php?action=listFilms">Films disponibles</a>
                </li>

                <li>
                <a href="index.php?action=listActeurs">Liste des acteurs</a>
                </li>

                <li>
                <a href="index.php?action=listReals">Liste des réalisateurs</a>
                </li>

                <li>
                <a href="index.php?action=listGenres">Liste des genres</a>
                </li>

                <li>
                <a href="index.php?action=listRoles">Liste des roles</a>
                </li>

            </ul>
        </nav>

        <div class="topnav">
        <a href="index.php"s>Accueil</a>
  <!-- Navigation links (hidden by default) -->
             <div id="myLinks">
                <a href="index.php?action=listFilms">Films disponibles</a>
                <a href="index.php?action=listActeurs">Liste des acteurs</a>
                <a href="index.php?action=listReals">Liste des réalisateurs</a>
                <a href="index.php?action=listGenres">Liste des genres</a>
                <a href="index.php?action=listRoles">Liste des roles</a>
                </div>
  <!-- "Hamburger menu" / "Bar icon" to toggle the navigation links -->
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>


    </header>
   <main>
    <div class="flex gap pad-x1">
    <h1>PDO Cinéma</h1>
        <h2><?= $titre_secondaire ?></h2>
    </div>
        
        <div class="container-main"><?= $contenu ?></div>
   </main>
    
</body>
</html>