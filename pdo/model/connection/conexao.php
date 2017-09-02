<?php

function Conectar() {
    $user = "root";
    $password = "";
    $dbname = "estudosphp";
    $host = "localhost";
    $mysql = "mysql:host={$host};dbname={$dbname}";

    try {
        $pdo = new PDO($mysql, $user, $password);
    } catch (PDOException $ex) {
        echo "Exception: {$ex->getMessage()}";
        var_dump($ex);
    }
    
    return $pdo;
}
