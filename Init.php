<?php

// Je me connecte à la base de donées :
$pdo = new PDO('mysql:host=localhost;dbname=exercice', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

// Je vérifie :
//var_dump($pdo);

// J'ouvre une session pour y enregistrer des infos :
session_start();
// S'il y a une action dans l'URL et si elle est égale à déconnexion alors je détruis la session :
if(isset($_GET['action']) && $_GET['action'] == 'deconnexion') {
    session_destroy();
    header('location:index.php');
}

// Création d'une variable qui permettra d'y ajouter du contenu :
$content = ''; 

?>