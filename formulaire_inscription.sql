-- Création de la base de données --
CREATE DATABASE formulaire_connexion;

-- Utilisation de la base de données --
USE formulaire_inscription;

-- Création de la table utilisateurs --
CREATE TABLE utilisateurs (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    mot_de_passe VARCHAR(255) NOT NULL,
    date_naissance DATE NOT NULL,
    pays VARCHAR(50) NOT NULL,
    ville VARCHAR(50) NOT NULL,
    adresse VARCHAR(100) NOT NULL,
    code_postal VARCHAR(10) NOT NULL,
    telephone VARCHAR(20) NOT NULL,
    sexe VARCHAR(10) NOT NULL,
    newsletter TINYINT(1) NOT NULL,
    date_inscription DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
) ENGINE=InnoDB;




































