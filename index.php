<?php
session_start();
// Test auth
if(isset($_SESSION["user_id"]) == false){
    header("Location: login.php");
    exit();
}

// Voir toutes les taches DE L'UTILISATEUR
    $database = new PDO("mysql:host=127.0.0.1;dbname=app-database", "root", "root");
    $request = $database->prepare("SELECT * FROM Task WHERE user_id=?");
    $request->execute([
        $_SESSION["user_id"]
    ]);
    $tasks = $request->fetchAll(PDO::FETCH_ASSOC);

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
    <a href="logout.php">Déconnexion</a>
    <h1>TaskList</h1>
    <a href="add-task.php">Ajouter une tache</a>

    <?php foreach($tasks as $task):?>
        <div class="task">
            <p class="task_title"><?= $task["title"] ?></p>
        </div>
    <?php endforeach; ?>

</body>
</html>