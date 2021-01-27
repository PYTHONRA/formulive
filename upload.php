<?php

    // Pour s'aider : https://www.php.net/manual/fr/features.file-upload.post-method.php

    // récupérer le titre s'il y en a
    $titre = $_POST['titre'];

    // On teste que l'image est bien présente
    if(empty($_FILES['image'])) {
        echo "Hého, pose ton image"; 
        exit;
    }
    if($_FILES['image']['error'] != 0) {
        echo "Y a une erreur : " . $_FILES['image']['error'] .  ". Pour savoir ce qu'il se passe, va voir là : https://www.php.net/manual/fr/features.file-upload.errors.php"; 
        echo "error";
        var_dump($_FILES);
        exit;
    }
    // récupérer le fichier, 
    $image_file = $_FILES['image']; 
    $nomOrigine = $_FILES['image']['name']; // Nom du fichier tel qu'il est nommé sur l'ordinateur du client 
    // vérifier son extension
    $mimeType = $_FILES['image']['type']; // on va accepter image/jpeg image/png
    if($mimeType != 'image/jpeg' && $mimeType != 'image/png') {
        echo "Format de fichier incorrect, faudrait un peu faire gaffe !";
        exit;
    }
    // le stocker quelque part
    // L'image va partir sous un nom temporaire quelque part sur le serveur (en général dans /tmp)
    $tmpName = $_FILES['image']['tmp_name'];
    $destination = 'upload/' . $nomOrigine; 

    if(move_uploaded_file($tmpName, $destination)) {
        echo "L'image a bien été uploadée";
    } else {
        echo "HOho,y a un problème";
        exit;
    }

    // stocker les informations relative au fichier dans la base de donnée (cf au dessus)