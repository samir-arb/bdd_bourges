/* Supprimer la base si elle existe déjà */
DROP DATABASE IF EXISTS bdd_bourges;

/* Créer la base de données dans le cas où celle-ci n'existe pas */
CREATE DATABASE IF NOT EXISTS bdd_bourges;
ALTER DATABASE bdd_bourges charset=utf8mb4;

/* Prévenir le système que nous allons utiliser cette BDD pour les opérations suivantes */
USE bdd_bourges;

/* Supprimer les tables identifiées dans la commande avant leur création */
DROP TABLE IF EXISTS
    genres,
    livres,
    livres_genres,
    auteurs,
    livres_auteurs,
    types,
    abonnes,
    livres_abonnes,
    civilites;


/* Création de la table genres */ 
CREATE TABLE genres (
    PRIMARY KEY (id_genre),
    id_genre                    INT AUTO_INCREMENT,
    genre_nom                   VARCHAR(30) NOT NULL,
    genre_description           TEXT NULL
);

/* Création de la table livres */ 
CREATE TABLE livres (
    PRIMARY KEY (id_livre),
    id_livre                    INT AUTO_INCREMENT,
    livre_titre                 VARCHAR(100) NOT NULL,
    livre_synopsis              TEXT NULL,
    livre_date_create           DATE NOT NULL,
    livre_img_ouvrage           VARCHAR(255) NULL,
    id_type                     INT NOT NULL
);

/* Création de la table livres_genres */ 
CREATE TABLE livres_genres (
    PRIMARY KEY (id_livre_genre),
    id_livre_genre              INT AUTO_INCREMENT,
    id_genre                    INT NOT NULL,
    id_livre                    INT NOT NULL
);

/* Création de la table auteurs */ 
CREATE TABLE auteurs (
    PRIMARY KEY (id_auteur),
    id_auteur                   INT AUTO_INCREMENT,
    auteur_nom                  VARCHAR(30) NOT NULL,
    auteur_prenom               VARCHAR(30) NOT NULL,
    auteur_date_naissance       DATE NULL,
    auteur_bio                  TEXT NULL,
    auteur_nbre_ouvrage         INT NULL,
    auteur_img                  VARCHAR(255) NULL,
    auteur_prix                 FLOAT NULL,
    auteur_create_date          DATETIME DEFAULT CURRENT_TIMESTAMP
);

/* Création de la table livres_auteurs */ 
CREATE TABLE livres_auteurs (
    PRIMARY KEY (id_livre_auteur),
    id_livre_auteur             INT AUTO_INCREMENT,
    id_livre                    INT NOT NULL,
    id_auteur                   INT NOT NULL
);

/* Création de la table types */ 
CREATE TABLE types (
    PRIMARY KEY (id_type),
    id_type                     INT AUTO_INCREMENT,
    type_nom                    VARCHAR(50) NOT NULL,
    type_description            TEXT NULL

);

/* Création de la table abonnes */ 
CREATE TABLE abonnes (
    PRIMARY KEY (id_abonne),
    id_abonne                   INT AUTO_INCREMENT,
    abonne_nom                  VARCHAR(30) NOT NULL,
    abonne_prenom               VARCHAR(30) NOT NULL,
    abonne_date_naissance       DATE NOT NULL,
    id_civilite                 INT NOT NULL
);

/* Création de la table livres_abonnes */ 
CREATE TABLE livres_abonnes (
    PRIMARY KEY (id_livre_abonne),
    id_livre_abonne             INT AUTO_INCREMENT,
    id_livre                    INT NOT NULL,
    id_abonne                   INT NOT NULL,
    livre_abonne_date_depart    DATETIME DEFAULT CURRENT_TIMESTAMP,
    livre_abonne_date_retour    DATETIME NULL
);

/* Création de la table civilites */ 
CREATE TABLE civilites (
    PRIMARY KEY (id_civilite),
    id_civilite                 INT AUTO_INCREMENT,
    civilite_nom                VARCHAR(30) NOT NULL,
    civilite_titre              VARCHAR(20) NOT NULL
);

/* Création des clés étrangères (foreign key) */
ALTER TABLE livres_genres ADD FOREIGN KEY (id_genre) REFERENCES genres (id_genre);
ALTER TABLE livres_genres ADD FOREIGN KEY (id_livre) REFERENCES livres (id_livre);

ALTER TABLE livres_auteurs ADD FOREIGN KEY (id_auteur) REFERENCES auteurs (id_auteur);
ALTER TABLE livres_auteurs ADD FOREIGN KEY (id_livre) REFERENCES livres (id_livre);

ALTER TABLE livres_abonnes ADD FOREIGN KEY (id_abonne) REFERENCES abonnes (id_abonne);
ALTER TABLE livres_abonnes ADD FOREIGN KEY (id_livre) REFERENCES livres (id_livre);

ALTER TABLE livres ADD FOREIGN KEY (id_type) REFERENCES types (id_type);
ALTER TABLE abonnes ADD FOREIGN KEY (id_civilite) REFERENCES civilites (id_civilite);
