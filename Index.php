<?php

include('init.php'); 

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
    if(isset($_SESSION['membre'])){
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