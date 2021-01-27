-- Comme on est phase de développement, 
-- à chaque exectution de ce script on choisi de tout supprimer et de recommencer
-- Il ne faut pas faire cela avec des bases de données déjà existantes et qui contiennent des données
-- Car cela supprime tout
DROP DATABASE IF EXISTS formulive;  -- supprime la base formulive si elle existe
CREATE DATABASE formulive; -- on peut recréer la base
USE formulive; -- On se positionne sur la base de données formulive

-- On crée un utilisateur de base de données
CREATE USER IF NOT EXISTS misteryman@localhost IDENTIFIED BY 's3cr3tp4ssw0rd'; 

-- Ici donne l'accès à la base formulive (et toutes ses tables *) à l'utilisateur mysteryman, 
-- On lui donne même tous les droits (ALL)
GRANT ALL ON formulive.* TO misteryman@localhost ; 

-- GRANT et REVOKE sont les instructions SQL qui permettent de gérer des droits

DROP TABLE IF EXISTS utilisateurs;
CREATE TABLE utilisateurs (
    id INT PRIMARY KEY AUTO_INCREMENT, -- id est la colonne qui permettre d'indentifier de manière unique un utilisateur
    -- Pour cela on indique que cette colonne est la clé primaire. Une clé primaire est unique, et ne peut pas être NULL (vide)
    pseudo VARCHAR(255) UNIQUE, 
    email VARCHAR(255) UNIQUE, 
    password VARCHAR(255)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;  
-- ENGINE est le moteur de base de données utilisé : ici c'est un moteur nommé InnoDB. 
-- InnoDB permet par exemple, de gérer les clés étrangère. 
-- Il existe d'autre, par exemple MyISAM, qui lui ne gère pas les clés étrangères. 

INSERT INTO utilisateurs(pseudo, email, password) VALUES('james','james@bond.uk','$2y$10$ZUDnrb5MXGJEXGMpZe/jK.ohuwxPquGo8cAEffq6UfyDd5irrfEGu'); -- password


-- date_adhesion DATE DEFAULT (current_date()),