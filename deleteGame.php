<?php
    $data = json_decode(file_get_contents('php://input'), true);

    if(!is_int($data)) {
        header("HTTP/1.1 400");
        echo json_encode('Error');
    }

    session_start();
    if(!isset($_SESSION['id'])) {
        header("HTTP/1.1 401");
        echo json_encode('Error');
    }

    require_once './config.php';

    $sql = "DELETE FROM usergames WHERE userID = ? AND gameID = ?";

    $stmt = $link->prepare($sql);
    $stmt->bind_param('ii', $_SESSION['id'], $data);
    $res = $stmt->execute();

    if($res) {
        header("HTTP/1.1 200");
        echo json_encode('DELETED');
    }
    else {
        header("HTTP/1.1 500");
        echo json_encode('Error');
    }
?>