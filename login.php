<?php 
    include_once('bdd.php'); // n'inclut le fichier que s'il n'a pas déjà été inclut

    // Récupérer les données du formulaire : (méthode POST)
    var_dump($_POST);
   // var_dump($_REQUEST);
   // var_dump(getallheaders());
    $pseudo = $_POST['pseudo'];
    $password = $_POST['motdepasse']; 
    try {
        // Connexion à la base de donnée
        $connexionSQL = new PDO('mysql:host=' . $db_url .';dbname='. $db_name, $db_user, $db_pass );
        $connexionSQL->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Indique que les problèmes rencontrés seront des exceptions pour pouvoir utliser les blocs try/catch
        
        // Vérifier que son pseudo est bien sur la même ligne que son mot de passe

        // On prépare une requête, en construisant une chaîne de caractère contenant la requête SQL
        $rqt = "SELECT pseudo, password FROM utilisateurs WHERE pseudo = :pseudo LIMIT 1"; //:pseudo est un paramètre de requête préparée dont on donnera la valeur au moment de l'éxectution
        // LIMIT 1 sert à être sûr qu'on ne récupère qu'une seule ligne; 
        // On va préparer la requête à partier de notre connexion à la base de données. Cette requête préparée s'appelle un statement
        $requetePreparee = $connexionSQL->prepare($rqt); 
        // On indique la valeur de :pseudo en passant celle qu'on a récupéré dans les données soumises du formulaires
        $requetePreparee->bindParam(':pseudo', $pseudo);
        //On peut executer la requête 
        $requetePreparee->execute(); 

        // On récupère les résultats : fetch() permet de récupérer une ligne, fetchAll() toutes les lignes
        // PDO::FETCH_ASSOC les résultats sont sous forme de tableau associatif (clé/valeur), 
        $resultat = $requetePreparee->fetch(PDO::FETCH_ASSOC);
        var_dump($resultat);

    } catch (Exception $e) {
        echo $e->getMessage();
    }

    // Ici, on test si notre résultat contient quelque chose. 
    // S'il ne contient rien, le pseudo n'a pas été trouvé en base.
    if(!empty($resultat['pseudo']) && !empty($resultat['password'])) {
        $hash = $resultat['password']; 
        // Test du mot de passe 
        $ok = password_verify($password, $hash);
    } 
     
    if($ok) {
        echo "Youpi, c'est la pause !!!! "; 
    } else {
         echo "Dommage, t'es pas bon!!";
    }
    