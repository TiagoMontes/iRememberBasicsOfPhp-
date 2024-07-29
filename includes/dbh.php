<?php


$dsn = 'mysql:host=localhost;dbname=DoIKnowPhp';
$username = 'root';
$password = '';

try {
    // WE USE PDO to connect to our database
    // PDO represents a connection between PHP and a Database server
    // In other words, defines a lightweight, consistent interface for accessing databases in PHP

    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}