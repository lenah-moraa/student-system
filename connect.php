<?php
$dns = "mysql:host=127.0.0.1;dbname=simple";

$user = "root";

$password = "";

$options = [
    PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_OBJ,
    PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION
];

$pdo = new PDO($dns, $user, $password,$options);