<?php
    $host = "localhost";
    $user = "root";
    $password = "";
    $dbname = "dream_reg";
    $dsn = "mysql:host={$host}; dbname={$dbname}";

    $pdo = new PDO($dsn, $user, $password);
    $pdo -> exec("SET Time_zone = '+08:00';");

 ?>