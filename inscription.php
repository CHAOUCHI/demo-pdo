<?php

$isSuccess = false;
if (
    isset($_POST["email"]) &&
    isset($_POST["password"])
) {
    $database = new PDO("mysql:host=127.0.0.1;dbname=app-database", "root", "root");
    // 1. request
    $request = $database->prepare("INSERT INTO User (email,password) VALUES (?,?)");
    $isSuccess = $request->execute([
        $_POST["email"],
        password_hash($_POST["password"],PASSWORD_DEFAULT)
    ]);

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
    <h1>Se créer un compte</h1>
    <form action="" method="post">
        <input type="email" name="email">
        <input type="password" name="password">
        <button>Se connecter</button>
    </form>
    <?php if($isSuccess):?>
        <p>Création du compte réussi.</p>
    <?php endif;?>
</body>
</html>