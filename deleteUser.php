<?php
    require_once './config.php';
    require_once './utils.php';

    if(!validate(['username'])) throw new Exception('Empty field');

    $sql = 'DELETE g FROM usergames g
    INNER JOIN users u
    ON u.id = g.userID 
    WHERE u.username = ?';
    $sql2 = 'DELETE FROM users 
    WHERE username = ?';
    
    $stmt = $link->prepare($sql);
    $stmt->bind_param('s', $_POST['username']);
    $res = $stmt->execute();

    $stmt->close();
    
    $stmt = $link->prepare($sql2);
    $stmt->bind_param('s', $_POST['username']);
    $res2 = $stmt->execute();
    
    if($res && $res2) throw new Exception('User "'.$_POST['username'].'" removed');
    else throw new Exception("Error");
?>