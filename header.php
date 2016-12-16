<?php
session_start();
if(isset($_SESSION['email']))
{
    $prenom = $_SESSION['prenom'];
    $profilepic = $_SESSION['profilepic'];
    echo "Bonjour, ".$prenom." !   Votre photo de profil : ";
    echo '<img src="'.$profilepic.'" />';
    echo '<a href="logout.php" >Deconnexion</a>';
}
else
{
    echo '<form method="post" action="req_login.php">

        <label for="email">Login</label>
        <input type="text" name="email" id="email"/>

        <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password"/>

        <input type="submit" value="Se connecter"/>
        
        <a href="inscription.php">Inscription</a>
    </form>';
}
?>
