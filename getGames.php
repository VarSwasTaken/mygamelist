<?php
    session_start();
    if(!$_SESSION['id']) echo json_encode([]);
    else {
        require_once './config.php';
        $sql = 'SELECT DISTINCT gameID FROM usergames WHERE userID = ?';

        $stmt = $link->prepare($sql);
        $stmt->bind_param('i', $_SESSION['id']);
        $stmt->execute();
        $res = $stmt->get_result();

        $response = [];
        while($row = $res->fetch_assoc()) $response[] = $row['gameID'];

        echo json_encode($response);
    }
?>