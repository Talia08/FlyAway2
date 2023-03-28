<?php

include('init.php'); // Permet de relier le fichier index.php au fichier init.php grâce à la fonction include()
if(isset($_SESSION['membre'])){// Si la session membre existe : (Si on est déjà conecté/inscris cette fonction permet de rendre la page connexion inacessible à l'utilisateur)

    header('location:index.php');
}
// Si le form a été posté
if($_POST){
    // Je définie une variable qui me sert à afficher les erreurs :
    $erreur ='';
    // Je vérifie si la prénom n'est pas trop court ou trop long avec la fonction strlen:
    if(strlen($_POST['prenom']) <= 2 || strlen($_POST['prenom']) > 20){
    // Si (if) le prénom posté ($_POST['prenom']) est plus petit ou égal (<=) à 2 caractères ou (||) si le prénom posté est supérieur à 20 caractères
        $erreur .= '<p>Votre prenom est trop court ou trop long.</p>';
    }
    // Je vérifie si l'adresse mail n'est pas déjà utilisé sur un autre compte :
    $r = $pdo->query("SELECT * FROM membre WHERE email = '$_POST[email]'");
    //S'il y a un ou plusieurs résultat, c'est que le compte existe déjà :
    if($r->rowCount() >= 1){
        $erreur .= '<p>Compte déjà existant.</p>';
    }
    // Pour chaque champ je corrige le problème d'apostrophe (ex : aujourd'hui):
    foreach($_POST as $indice => $valeur){
        $_POST[$indice] = addslashes($valeur);
    }
    // Je hash le mot de passe :
    $_POST['mdp'] = password_hash($_POST['mdp'], PASSWORD_DEFAULT);
    // Si la variable erreur est vide :
    if(empty($erreur)){
        // J'enregistre les infos dans la base de données :
        $pdo->exec("INSERT INTO membre (nom, prenom, email, mdp) VALUES ('$_POST[nom]', '$_POST[prenom]', '$_POST[email]', '$_POST[mdp]')");
        // J'ajoute un message de succès :
        $content .= '<p>Votre inscription a bien été prise en compte !</p>';
    }
    // J'ajoute les messages d'erreur dans la variable content :
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