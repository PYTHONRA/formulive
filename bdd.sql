DROP DATABASE IF EXISTS formulive; 
CREATE DATABASE formulive; 
USE formulive; 

CREATE USER IF NOT EXISTS misteryman@localhost IDENTIFIED BY 's3cr3tp4ssw0rd';

GRANT ALL ON formulive.* TO misteryman@localhost ; 
DROP TABLE IF EXISTS utilisateurs;
CREATE TABLE utilisateurs (
    id INT PRIMARY KEY AUTO_INCREMENT, 
    pseudo VARCHAR(255) UNIQUE, 
    email VARCHAR(255) UNIQUE, 
    password VARCHAR(255)
); 

INSERT INTO utilisateurs(pseudo, email, password) VALUES('james','james@bond.uk','$2y$10$ZUDnrb5MXGJEXGMpZe/jK.ohuwxPquGo8cAEffq6UfyDd5irrfEGu'); -- password


-- date_adhesion DATE DEFAULT (current_date()),