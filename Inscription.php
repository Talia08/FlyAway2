<?php

include('init.php'); 
if(isset($_SESSION['membre'])){

    header('location:index.php');
}
if($_POST){
    $erreur ='';
    if(strlen($_POST['prenom']) <= 2 || strlen($_POST['prenom']) > 20){
        $erreur .= '<p>Votre prenom est trop court ou trop long.</p>';
    }
    $r = $pdo->query("SELECT * FROM membre WHERE email = '$_POST[email]'");
    if($r->rowCount() >= 1){
        $erreur .= '<p>Compte déjà existant.</p>';
    }
    foreach($_POST as $indice => $valeur){
        $_POST[$indice] = addslashes($valeur);
    }
    $_POST['mdp'] = password_hash($_POST['mdp'], PASSWORD_DEFAULT);
    if(empty($erreur)){
        $pdo->exec("INSERT INTO membre (nom, prenom, email, mdp) VALUES ('$_POST[nom]', '$_POST[prenom]', '$_POST[email]', '$_POST[mdp]')");
        $content .= '<p>Votre inscription a bien été prise en compte !</p>';
    }
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
    <link rel="stylesheet" href="Inscription.css">
    <title>Inscription</title>
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
        <h1>Inscrit-toi à FlyAway</h1>

        <?php echo $content; ?>

        <form class="inscription" method="post">
            <input type="text" placeholder="Nom et prénom" required>
            <br>
            <input type="text" placeholder="Adresse Mail" required>
            <br>
            <input type="number" placeholder="Mot de passe" required>
            <br>
            <input type="submit" value="Inscription">
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