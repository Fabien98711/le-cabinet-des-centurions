<?php


$host = "localhost";
$dbName = "user";
$user = "root";
$pwd = "";

$dsn = "mysql:host=$host;dbname=$dbName;charset=utf8;";
$pdo = new PDO($dsn, $user, $pwd);
?>