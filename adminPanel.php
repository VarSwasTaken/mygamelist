<?php 
    session_start();
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
    <script defer src="addGame.js"></script>
    <title>My Game List</title>
  </head>
  <body class="bg-dark">
    <?php include "navbar.php"?>
    <main class="container">
        <div class="admin-panel">
            <h2>Usuń użytkownika oraz jego informacje:</h2>
            Nazwa użytkownika: 
            <form class="me-3" role="search">
                <input type="search" class="form-control" placeholder="Wpisz nazwę użytkownika..." aria-label="Search">
            </form>   
        </div>
    </main>
    <?php include "popup-login.php"?>
  </body>
</html>
