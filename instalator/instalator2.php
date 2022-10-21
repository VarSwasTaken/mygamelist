<?php
    session_start();

    // ini_set('display_errors',1);
    // error_reporting(E_ALL);
    // mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    $file=fopen("config.php","w");
    $config = "<?php
        \$host=\"".$_POST['nazwa-serwera']."\";
        \$user=\"".$_POST['nazwa-user']."\";
        \$password=\"".$_POST['pwd']."\";
        \$dbname=\"".$_POST['nazwa-bazy']."\";
        \$link = mysqli_connect(\$host, \$user, \$password, \$dbname);\n";
    
        $_SESSION['host']=$_POST['nazwa-serwera'];
        $_SESSION['user']=$_POST['nazwa-user'];
        $_SESSION['password']=$_POST['pwd'];
        $_SESSION['dbname']=$_POST['nazwa-bazy'];
        $_SESSION['link'] = mysqli_connect($_SESSION['host'], $_SESSION['user'], $_SESSION['password'], $_SESSION['dbname']);

    if (!fwrite($file, $config)) {
        print "Nie mogę zapisać do pliku ($file), wykonaj poprzedni krok ponownie!";
        exit;
    }
    echo "<p>Krok 3 zakończony: \n";
    echo "Plik konfiguracyjny utworzony</p>";
    echo "<hr>";
    fclose($file);


    if (file_exists("schema.php")) {
        include("schema.php");
        echo "Tworzę tabele bazy: ".$_SESSION['dbname'].".<br>\n";
        mysqli_select_db($_SESSION['link'], $_SESSION['dbname']) or die(mysqli_error($_SESSION['link']));
        for($i=0;$i<count($create);$i++){
                echo "<p>".$i.". <code>".$create[$i]."</code></p>\n";
                mysqli_query($_SESSION['link'], $create[$i]);
                // exit;
        }
    }
?>
<hr>
<form action="instalator3.php" method="post">
    <label>Imię administratora</label><br>
    <input type="text" id="admin-imie" name="admin-imie" required><br>

    <label>Hasło administratora</label><br>
    <input type="password" id="admin-pwd" name="admin-pwd" required><br><br>

    <button>Dalej</button>
</form>