<?php
$host = '127.0.0.1';
$dbname = 'todo_practice';
$username = 'root';
$password = '';

$dsn = "mysql:host={$host};dbname={$dbname};charset=utf8mb4";

$pdo = new PDO($dsn, $username, $password, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
]);