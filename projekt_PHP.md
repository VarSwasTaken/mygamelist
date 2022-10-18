# Projekt PHP
## Konfiguracja środowiska

### MariaDB, MySQL
- zainstalować HeidiSQL
- skonfigurować bazę danych
- uzupełnić plik config.php

### PHP
- pobrać PHP 8.1
- pobrać wtyczkę PHP Extension Pack do VS Code
- może być konieczne odkomentowanie pakietu mysqli

#### Serwer lokalny

    php -S 127.0.0.1:8000

## Zadanie
- stworzyć aplikację, która będzie zapisywała i wyświetlała dane wprowadzone przez użytkowników np. portal do obsługi biblioteki
- stworzyć odpowiednią strukturę bazy danych
- stworzyć moduł logowania (dodatkowe punktu za hashowanie haseł)
- wykorzystać bootstrap5 do stylowania
- wykorzystać ciasteczka lub sesje
- obsłużyć wyjątki i błędy
- zaangażować do projektu GIT
- stworzyć dokumentację zaprojektowanego portalu

### Przydatne funkcje
Sesje - *session_start()* **musi** pojawić się na samym początku

    session_start();
    session_destroy();

Wyświetlanie błędów

    ini_set('display_errors',1); 
    error_reporting(E_ALL);
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

Mysqli

    mysqli_connect($host, $user, $password, $dbname);
    mysqli_query($link, $query);

Echo

    echo "<a>Hello</a> World";

## Equal !== Identical
W języku PHP komparatory == oraz === zachowują się inaczej. == to słaby komparator, a === to mocny komparator. === zwraca true gdy porównywane obiekty mają nie tylko tożsamą wartość ale również typ.

20 == '20' to true

20 === '20' to false
