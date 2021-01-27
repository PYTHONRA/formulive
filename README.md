# Formulive : 
Un formulaire de connexion en HTML (puis on le basculera en JS). 
Le back, toujours en PHP, une petite BDD avec une table utilisateur, dans laquelle il y aura des mots de passes hashés. 

## TODO : 
 [x] la BDD
 [x] le formulaire login.html
 [x] la page de traitement du formulaire : login.php
 [x] Basculer l'envoie du formulaire en JS (peut être une nouvelle branche ???)

## La base de données

### Pour générer un mot de passe hashé (afin d'insérer un utilisateur lors de la création de la base)
```php
$pass = 'password'; 
echo password_hash($pass, PASSWORD_DEFAULT); 
// $2y$10$ZUDnrb5MXGJEXGMpZe/jK.ohuwxPquGo8cAEffq6UfyDd5irrfEGu
```

## Le formulaire 
Sert à envoyer des données sous la forme clé/valeur. 
Si on soumet le formulaire en HTML, la clé est donnée par l'attribut `name` de l'input et la valeur correspond à ce qu'a saisi l'utilisateur. 

## Energistrement des utilisateurs 
 [x] un formulaire d'enregistrement HTML
 [ ] le fichier de traitement des données du formulaire en PHP
    [x] récupérer les données d'enregistrement : pseudo, email, mot de passe (confirmé)
    [x] valider les données d'enregistrement 
        [x] vérifier le format de l'email
        [x] vérifier le nombre maximal de caractères par rapport aux types renseigné lors de la création de la BDD
        [x] vérifier la présence des mots de passe et l'égalité de mdp et de sa confirmation
    [x] hashage du mot de passe
    [x] on vérifie que l'utlisateur (son pseudo où son email n'existe pas déjà)
        [x] = sql, donc pareil qu'en dessous
    [x] insertion des données dans la base de données
        [x] connexion à la base
        [x] configuration (pour les exceptions)
        [x] on écrit la requête d'insertion
        [x] on prépare la requête
        [x] on associe les valeurs (du formulaire) aux paramètres de notre requête préparée (ceux qui commencent pas `:` dans notre requête)
        [x] on execute la requête
        [x] on vérifie le nombre de ligne insérée (1 normalement)

## Téléversement d'image (upload pour les intimes)
Objectif : soumettre une image en ayant la possibilité de lui donner un titre, qui sera indiqué dans l'attribut `alt`. 

Pour envoyer une image, on va devoir : 
 [ ] Rajouter une table pour enregistrer les informations à l'image
 [x] Créer un formulaire de soumission d'image
 [x] Créer un fichier php responsable du traitement du formulaire 
    [x] récupérer le titre s'il y en a
    [x] récupérer le fichier, 
    [x] vérifier son extension
    [x] le stocker quelque part (répertoire upload dans le dossier courant)
    [ ] stocker les informations relative au fichier dans la base de donnée (cf au dessus)
 [ ] Faire une page qui affiche toutes les images