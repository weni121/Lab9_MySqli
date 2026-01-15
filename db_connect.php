<?php
$conn = new mysqli("localhost", "root", "", "your_database");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$conn->set_charset("utf8");
