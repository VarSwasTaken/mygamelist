<?php
    require_once'login.php';
    require_once 'register.php';
    $message = '';
    $username = '';
    try{
        if($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['action-type'])) {
            if($_POST['action-type'] === 'sign in') login($username);
            if($_POST['action-type'] === 'sign up') register($username);
        }
    }
    catch(Exception $e) {
        $message = $e->getMessage();
    }

    session_start();
    if($_SERVER['REQUEST_METHOD'] === "POST" && !isset($_SESSION['username'])) {
        if($_POST['action-type'] === 'sign in') setcookie('loginProgress', 'sign in');
        if($_POST['action-type'] === 'sign up') setcookie('loginProgress', 'sign up');
    }
?>

<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="UTF-8" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@100;300;400;700;900&family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="./style.css" rel="stylesheet" />
    <script defer src="script.js"></script>
    <script defer src="index.js"></script>
    <title>My Game List</title>
  </head>
  <body class="bg-dark">
    <?php include "navbar.php"?>
    <?php include "content.php"?>
    <?php include "popup-login.php"?>
  </body>
</html>
