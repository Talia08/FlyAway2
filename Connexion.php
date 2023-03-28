<?php

include('init.php');

// Si la session membre existe : (Si on est déjà conecté cette fonction permet de rendre la page connexion inacessible à l'utilisateur)
if(isset($_SESSION['membre'])){
    header('location:index.php');
}

// Si le formulaire a été posté
if($_POST){
    $erreur ='';
    // Je récupère en base de données les infos correspondantezs à l'adresse mail rentrée par l'internaute :
    $r = $pdo->query("SELECT * FROM membre WHERE email = '$_POST[email]'");
    // s'il il y a un ou plusieurs résultat, c'est que le compte existe :
    if($r->rowCount() >= 1){
        //Connexion :
        $membre = $r->fetch(PDO::FETCH_ASSOC);
        //var_dump($membre);
        //Je vérifie si le mot de passe est correcte :
        if(password_verify($_POST['mdp'], $membre['mdp'])){
            // Enregistre les infos dans la session :
            $_SESSION['membre']['nom'] = $membre['nom'];
            $_SESSION['membre']['prenom'] = $membre['prenom'];
            $_SESSION['membre']['email'] = $membre['email'];
            //Je redirige l'internaute vers l'index :
            header('location:index.php');
        }else {
            $erreur .= '<p>Mauvais mot de passe</p>'; // .= correspond à ajouter
        }
    }else{
        $erreur .= '<p>Compte innexistant.</p>';
    }
    // J'ajoute les messages d'erreur à la variable content :
    $content .= $erreur;
}



?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Chivo+Mono:wght@200&family=Lato:wght@300&family=Raleway:ital@1&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="lib.css">
    <link rel="stylesheet" href="Connexion.css">
    <title>Connexion</title>
</head>
<body>
    <header>
        <a href="Home_page.html">
        <img class="logo" src="./Image/FlyAway_logo.png" alt="logo">
        </a>
        <div class="search">
        <img class="icone-search" src="./icône/magnifying-glass-solid 2.svg" alt="">
        <form action="">
            <input type="text" placeholder="Recherche...">
        </form>
        </div>
        <ul>
            <li><a href=""><button class="btn-rouge">Publier</button></a></li>
            <li><a href=""><button class="btn-rouge">Mon compte</button></a></li>
            <li><a href=""><button class="btn-rouge"><a href="Connexion.php">Connexion</a></button></a></li>
        </ul>
    </header>

    <main>
        <h1>Connecte-toi à FlyAway</h1>

        <?php echo $content; ?>

        <form class="connexion" method="post">
            <input type="text" placeholder="Adresse mail" required>
            <br>
            <input type="number" placeholder="Mot de passe" required>
            <br>
            <a href="">Mot de pase oublié</a>
            <br>
            <input type="submit" value="Connexion">
            <br>
            <p>Tu n'as pas de compte ?<a href="Inscription.php">Inscription</a></p>
        </form>
    </main>

    <footer>
        <a href="Home_page.html">
        <img class="logo" src="./Image/FlyAway_logo.png" alt="">
        </a>
        <ul>
            <li><a class="propos" href="">A propos</a></li>
            <li><a href="">Mentions légales</a></li>
            <li><a href="">Conditions d'utilisations</a></li>
            <li><a href="">CGU</a></li>
            <li><a href="">Politique de confidentialité</a></li>
        </ul>
        <ul>
            <li><a class="footer-compte" href="">Mon compte</a></li>
            <li><a href="">Mes abonnements</a></li>
            <li><a href="">Mes favoris</a></li>
            <li><a href="">Mes enregistrements</a></li>
            <li><a href="">Mes postes</a></li>
        </ul>
        <div class="newsletter">
            <p>Je m'inscris à la newsletter</p>
            <input type="text" placeholder="Email">
            <input type="submit" value="Inscription">
            <br>
            <input type="checkbox" id="checkbox" name="checkbox" value=">Valeur1">
            <label for="checkbox">Je souhaite recevoir les informations et les nouveautés de FlyAway</label>
    </footer>

</body>
</html>