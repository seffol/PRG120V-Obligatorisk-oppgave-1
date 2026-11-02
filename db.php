<?php
$host = getenv('DB_HOST');
$username = getenv('DB_USER');
$password = getenv('DB_PASSWORD');
$database = getenv('DB_DATABASE');

$db = mysqli_connect($host, $username, $password, $database);

if (!$db) {
    die("Kunne ikke koble til databasen: " . mysqli_connect_error());
}

mysqli_set_charset($db, "utf8mb4");