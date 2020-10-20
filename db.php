<?php
    
    $server = 'localhost';
    $username = 'ejemplo';
    $password = '123456';
    $database = 'examen';

    try {
        $conn = new PDO("mysql:host=$server; dbname=$database;",$username,$password);
    } catch (\PDOException $th) {
        die('Conexion fallida '.$th->getMessage());
    }
?>