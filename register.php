<?php
    require_once 'utils.php';

    function register(&$username) {
        if(!validate(['username', 'password'])) throw new Exception('Empty values');

        $username = htmlspecialchars(strip_tags(trim($_POST['username'])));
        $password = htmlspecialchars(strip_tags(trim($_POST['password'])));
        if(!$username || !$password) throw new Exception('Bad input');

        validate_password($password);
        check_duplicates($username);

        add_user($username, $password);
    }

    function validate_password($password) {
        if(strlen($password) < 8) throw new Exception('Password must be at least 8 characters long');

        if(!preg_match('/([0-9])/', $password)) throw new Exception('Password must contain a digit');
        if(!preg_match('/([A-Z])/', $password)) throw new Exception('Password must contain a capital letter');
        if(!preg_match('/([a-z])/', $password)) throw new Exception('Password must contain a lowercase letter');
    }

    function check_duplicates($username) {
        require 'config.php';
        $sql = 'SELECT * FROM users WHERE username = ?';

        $stmt = $link->prepare($sql);
        $stmt->bind_param('s', $username);
        $stmt->execute();

        if($stmt->get_result()->num_rows > 0) throw new Exception('User already exists');
        $stmt->close();
    }

    function add_user($username, $password) {
        require 'config.php';
        $sql = 'INSERT INTO users(username, password, admin) VALUES(?, ?, 0)';

        $password = password_hash($password, PASSWORD_ARGON2ID);

        $stmt = $link->prepare($sql);
        $stmt->bind_param('ss', $username, $password);
        $res = $stmt->execute();

        if(!$res) throw new Exception($res->error);
        $stmt->close();

        $sql = 'SELECT id, admin FROM users WHERE username = ?';

        $stmt = $link->prepare($sql);
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $res = $stmt->get_result();
        $row = $res->fetch_assoc();
        
        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['id'] = $row['id'];
        $_SESSION['admin'] = $row['admin'];

        unset($_COOKIE['loginProgress']);
        setcookie('loginProgress', null, -1, '/');

        setcookie('logged', true);
    }
?>