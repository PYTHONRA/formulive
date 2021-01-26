# Formulive : 
Un formulaire de connexion en HTML (puis on le basculera en JS). 
Le back, toujours en PHP, une petite BDD avec une table utilisateur, dans laquelle il y aura des mots de passes hashés. 

## TODO : 
 [x] la BDD
 [x] le formulaire login.html
 [x] la page de traitement du formulaire : login.php
 [ ] Basculer l'envoie du formulaire en JS (peut être une nouvelle branche ???)

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

## Passage au JS : 

On rajoute un id sur le bouton de soumission pour pouvoir gérer l'évènement de soumission. 
Lors du clique sur ce bouton, on effectura la requête de connexion. 

On importe le script `login.js` dans notre fichier `login.html`. 