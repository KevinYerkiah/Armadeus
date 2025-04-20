<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "login1"; // name of database, you mentioned it's renamed to user1
$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    echo "Failed to connect to db: " . $conn->connect_error;
}

?>