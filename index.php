<<<<<<< HEAD
<?php
    require_once 'utils.php';

    if(!validate(['username', 'password'])) throw new Exception('Empty values');

    $username = htmlspecialchars(strip_tags(trim($_POST['username'])));
    $password = htmlspecialchars(strip_tags(trim($_POST['password'])));
    if(!$username || !$password) throw new Exception('Bad input');

    require 'config.php';
    $sql = 'SELECT username, id FROM users WHERE username = ? AND password = ?';

    $password = password_hash($password, PASSWORD_ARGON2ID);

    $stmt = $link->prepare($sql);
    $stmt->bind_param('ss', $username, $password);
    $stmt->execute();

    $res = $stmt->get_result();

    if($res->num_rows < 1) throw new Exception('Incorrect username or password');

    $row = $res->fetch_assoc();

    session_start();
    $_SESSION['username'] = $row['username'];
    $_SESSION['id'] = $row['id'];
?>




<form action="index.php" method="POST">
    <input type="text" name="username" id="" value="<?= $username ?>">
    <input type="password" name="password" id="">
    <button type="submit">zarejestruj sie</button>
    <?php echo $message?>
</form>
=======
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
    <title>My Game List</title>
    <script defer src="script.js"></script>
  </head>
  <body class="bg-dark">
    <?php include "navbar.php"?>
    <?php include "popup-login.php"?>
  </body>
</html>
>>>>>>> 0344392825a0545adf0f6b17d94100dc75c9b136
