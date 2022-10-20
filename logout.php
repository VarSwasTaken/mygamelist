<?php
    session_start();
    session_unset();
    $_SESSION[] = array();
    session_destroy();
    header('Location: index.php');
    unset($_COOKIE['logged']);
    setcookie('logged', null, -1, '/');
    exit;
?>