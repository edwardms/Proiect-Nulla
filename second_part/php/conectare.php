<?php
    
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $databaseName = 'monkey_tuxedo_database';
    $conectare = mysqli_connect($servername, $username, $password, $databaseName);
    
    if (!$conectare) {
        die("Conectarea la baza de date nu a reusit");
    }

?>
