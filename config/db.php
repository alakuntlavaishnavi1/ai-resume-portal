<?php
$host = "mee_remote_host_ikkarayandi";     // e.g. sql12.freemysqlhosting.net
$username = "mee_username_ikkarayandi";  // e.g. sql123456
$password = "mee_password_ikkarayandi";  // Mee password
$database = "mee_database_name_ikkada";  // Database name

$conn = new mysqli(
    $host,
    $username,
    $password,
    $database
);

if ($conn->connect_error) {
    http_response_code(500);
    die("Database connection failed: " . $conn->connect_error);
}

$conn->set_charset("utf8mb4");
?>
