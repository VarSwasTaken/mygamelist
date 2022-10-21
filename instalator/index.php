<?php
    session_start();

    // ini_set('display_errors',1);
    // error_reporting(E_ALL);
    // mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    // $file=__DIR__."/config.php";
    // chmod($file, 0666);
?>

<h1>Krok 1</h1>
<p>Utwórz plik config.php</p>
<hr>

<h1>Krok 2</h1>
<p>Zmień uprawnienia pliku config.php</p>
<p>np. chmod o+w config.php</p>
<hr>

<h1>Krok 3</h1>
<p>Uzupełnij formularz</p>
<form action="instalator2.php" method="post">
    <label>Nazwa lub adres serwera</label><br>
    <input type="text" id="nazwa-serwera" name="nazwa-serwera" required><br>

    <label>Nazwa bazy danych</label><br>
    <input type="text" id="nazwa-bazy" name="nazwa-bazy" required><br>

    <label>Nazwa użytkownika</label><br>
    <input type="text" id="nazwa-user" name="nazwa-user" required><br>

    <label>Hasło</label><br>
    <input type="password" id="pwd" name="pwd" required><br>

    <button type="submit">Dalej</button>
</form>
<hr>