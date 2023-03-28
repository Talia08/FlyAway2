<?php

include('init.php'); // Permet de relier le fichier index.php au fichier init.php grâce à la fonction include()

?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceuil</title>
</head>
<body>
    
    <?php
    // Si l'internaute est connecté :
    if(isset($_SESSION['membre'])){
        // J'affiche un lien de déconnexion :
    ?>
    <a href="?action=deconnexion">Déconnexion</a>
    <h2>Bonjour <?php echo $_SESSION['membre']['prenom']; ?></h2>
    <?php
    } else {
    ?>
    <a href="inscription.php">Inscription</a>
    - 
    <a href="connexion.php">Connexion</a>
    <?php
    }
    ?>


</body>
</html>