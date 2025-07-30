<?php
session_start();
// Test auth
if(isset($_SESSION["user_id"]) == false){
    header("Location: login.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="login.php">Se connecter</a>
    <h1>VOD</h1>
    <a href="logout.php">Déconnexion</a>

</body>
</html>