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