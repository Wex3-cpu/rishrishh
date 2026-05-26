<?php

$docker_host = 'mysql';
$xampp_host = 'localhost';

try {
    $pdo = new PDO("mysql:host=$xampp_host;dbname=portfolio_db", 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $env = 'xampp';
} catch(PDOException $e) {
    // If XAMPP fails, try Docker
    try {
        $pdo = new PDO("mysql:host=$docker_host;dbname=portfolio_db", 'root', 'root');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $env = 'docker';
    } catch(PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    }
}

// Optional: store environment for debugging (pwedeng idelete later)
// error_log("Connected using: " . $env);
?>