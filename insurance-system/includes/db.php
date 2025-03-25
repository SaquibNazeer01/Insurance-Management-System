<?php
$host = 'localhost';
$db = 'insurance_db';
$user = 'root';
$pass = 'Bhatskb@19140';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>