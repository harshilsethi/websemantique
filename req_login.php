<?php
session_start();

$email=stripslashes($_POST['email']);
$password=stripslashes($_POST['password']);

// Connect to server and select database.
$dbh = new PDO('mysql:host=localhost;dbname=pictionnary', 'test', 'test');

$sql = $dbh->query("SELECT email, nom, prenom FROM USERS WHERE email='".$email."' AND u.password='".$password."'");
if ($sql->prepare()>=1) {
    header("Location: main.php?erreur=".urlencode("Email ou mot de passe incorrecte"));
}

header("Location: main.php?rowCount=".$sql->rowCount());
?>