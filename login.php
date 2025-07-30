<?php
session_start();
if (isset($_SESSION["user_id"]) == true) {
    // Connecté !
    header("Location: index.php");
}

$error = null;
if (
    isset($_POST["email"]) &&
    isset($_POST["password"])
) {
    $database = new PDO("mysql:host=127.0.0.1;dbname=app-database", "root", "root");
    // 1. request
    $request = $database->prepare("SELECT * FROM User WHERE email=?");
    $request->execute([
        $_POST["email"]
    ]);
    // 2. response  
    $user = $request->fetch(PDO::FETCH_ASSOC);
    // var_dump($user); // $user["id"]

    // 3. Authentification password ?
    if (
        password_verify($_POST["password"], $user["password"])
    ) {
        $_SESSION["user_id"] = $user["id"];
        header("Location: index.php");
    } else {
        $error = "Login incorrect";
    }
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
    <h1>Connexion</h1>
    <form action="" method="post">
        <input type="email" name="email">
        <input type="password" name="password">
        <button>Se connecter</button>
    </form>
    <?php if ($error != null): ?>
        <?= $error ?>
    <?php endif; ?>
</body>

</html>