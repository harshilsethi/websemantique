<?php
if (isset($_GET["erreur"])) {
    echo "<div><span>" . $_GET["erreur"] . "</span></div>";
}

include("header.php");
echo "</br><a href='paint.php'>Dessiner</a>";
?>