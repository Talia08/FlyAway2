-- Base de données pour le réseau social FlyAway --

-- Création de la base de données --
CREATE DATABASE flyaway;

-- Création de la table user --
CREATE TABLE user (
    id INT NULL AUTO_INCREMENT,
    mail VARCHAR(50) NULL,
    login VARCHAR(50) NULL,
    profilPicture VARCHAR(50) NULL,
    firstname VARCHAR(50) NULL,
    lastname VARCHAR(50) NULL,
    status VARCHAR(100) NULL,
    PRIMARY KEY id (id)
) ENGINE=InnoDB;

-- Creation de la table posts --
CREATE TABLE posts (
    id INT NULL AUTO_INCREMENT,
    user_id INT NOT NULL,
    title VARCHAR(150) NULL,
    body VARCHAR(250) NULL,
    date DATE NULL,
    time TIME NULL,
    state INT NOT NULL,
    PRIMARY KEY id (id)
) ENGINE=InnoDB;

-- Creation de la table share --
CREATE TABLE share (
    id INT NULL AUTO_INCREMENT,
    user_id INT NULL,
    album_id INT NULL,
    post_id INT NULL,
    group_id INT NOT NULL,
    date DATE NULL,
    time TIME NULL,
    PRIMARY KEY id (id)
) ENGINE=InnoDB;


-- Creation de la table pictures --
CREATE TABLE pictures (
    id INT NULL AUTO_INCREMENT,
    path VARCHAR(50) NULL,
    name VARCHAR(50) NULL,
    album_id INT NOT NULL,
    PRIMARY KEY id (id)
) ENGINE=InnoDB;

-- Creation de la table friends --
CREATE TABLE Friends (
    id INT NULL AUTO_INCREMENT,
    user_id INT NOT NULL,
    user_id2 INT NOT NULL,
    state INT NOT NULL,
    PRIMARY KEY id (id)
) ENGINE=InnoDB;