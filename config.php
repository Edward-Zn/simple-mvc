<?php

// MySQL configuration
$dbHost = 'localhost';
$dbName = 'simple-mvc';
$dbUser = 'root';
$dbPassword = '';

// MySQL connection
try {
    $pdo = new PDO("mysql:host=$dbHost;dbname=$dbName;charset=utf8mb4", $dbUser, $dbPassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}