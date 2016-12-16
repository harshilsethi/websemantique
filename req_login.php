<?php
$email=stripslashes($_POST['email']);
$password=stripslashes($_POST['password']);

try {
    // Connect to server and select database.
    $dbh = new PDO('mysql:host=localhost;dbname=pictionnary', 'test', 'test');

    session_start();

    // Vérifier si un utilisateur avec cette adresse email existe dans la table.
    $sql = $dbh->query("SELECT email, nom, prenom, password FROM users WHERE email ='".$email."' AND password ='".$password."'");
    if ($sql->rowCount()>=1 ) {
        // on récupère la ligne qui nous intéresse avec $sql->fetch(),
        // et on enregistre les données dans la session avec $_SESSION["..."]=...

        $result = $sql->fetch(PDO::FETCH_ASSOC);

        $_SESSION["email"] = $result["email"];
        $_SESSION["nom"] = $result["nom"];
        $_SESSION["prenom"] = $result["prenom"];
        $_SESSION["profilepic"] = $result["profilepic"];
        header("Location: main.php?email=".$email);
    }
    else {
        header("Location: main.php?erreur=".urlencode("un problème est survenu"));
    }
}
catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    $dbh = null;
    die();
}
?>