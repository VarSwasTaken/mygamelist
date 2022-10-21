<?php
    require_once  'utils.php';

    function login(&$username) {
        if(!validate(['username', 'password'])) throw new Exception('Empty values');


        $username = htmlspecialchars(strip_tags(trim($_POST['username'])));
        $password = htmlspecialchars(strip_tags(trim($_POST['password'])));
        if(!$username || !$password) throw new Exception('Bad input');

        require './config.php';
        $sql = 'SELECT id, password, admin FROM users WHERE username = ?';

        $stmt = $link->prepare($sql);
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $res = $stmt->get_result();
        if($res->num_rows < 1 ) throw new Exception('Incorrect username or password');
        
        $row = $res->fetch_assoc();

        if(!password_verify($password, $row['password'])) throw new Exception('Incorrect username or password');

        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['id'] = $row['id'];
        $_SESSION['admin'] = $row['admin'];

        unset($_COOKIE['loginProgress']);
        setcookie('loginProgress', null, -1, '/');

        setcookie('logged', true);
    }
?>