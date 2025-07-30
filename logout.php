<?php
session_start();
session_destroy(); // Vider $_SESSION
header("Location: login.php");
?>