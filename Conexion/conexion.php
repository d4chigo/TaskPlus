<?php
    $host = 'localhost'; 
    $dbname = 'TaskPlus';
    $username = 'root';
    $password = '';
    
    try {
        $base = new PDO("mysql:host=$host;dbname=$dbname", $username, $password); 
        $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
    } catch (PDOException $e) {
        die("Error de conexión: " . $e->getMessage());
    }
?>