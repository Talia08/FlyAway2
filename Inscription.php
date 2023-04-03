<?php

// Récupération des données du formulaire
$nom = $_POST['nom'];
$prenom = $_POST['prenom';]
$email = $_POST['email'];
$mot_de_passe = $_POST['mot_de_passe'];
$date_naissance = $_POST['date_naissance'];
$telephone = $_POST['telephone'];
$sexe = $_POST['sexe'];

// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "flyaway";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Insertion des données dans la base de données
$sql = "INSERT INTO formulaire_inscription (nom, prenom, date_naissance, telephone, email, sexe, mot_de_passe)
        VALUES ('$nom', '$prenom', '$date_naissance', '$telephone', '$email', '$sexe', '$mot_de_passe')";

if (mysqli_query($conn, $sql)) {
  echo "Inscription réussie!";
} else {
  echo "Erreur d'inscription: " . mysqli_error($conn);
}

mysqli_close($conn);

?>

