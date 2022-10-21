<?php
    session_start();
    
    // ini_set('display_errors',1);
    // error_reporting(E_ALL);
    // mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    $dbname=$_SESSION['dbname'];
    $prefix=$_SESSION['prefix'];

    
    $insert[] = "INSERT INTO users (`username`, `password`, `admin`) VALUES ('".$_POST['admin-imie']."','".password_hash($_POST['admin-pwd'], PASSWORD_ARGON2ID)."', 1);";

    $link = mysqli_connect($_SESSION['host'], $_SESSION['user'], $_SESSION['password'], $_SESSION['dbname']);
    mysqli_select_db($link, $dbname) or die(mysqli_error($link));
    for($i=0;$i<count($insert);$i++){
      echo "<p>".$i.". <code>".$insert[$i]."</code></p>\n";
      mysqli_query($link, $insert[$i]);
    }
    $link -> close();
    echo "Utworzono konto administratora, instalacja zakończona";
?>