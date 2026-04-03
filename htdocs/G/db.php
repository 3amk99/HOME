<?php
$host = "localhost";
$user = "root";
$pass = "baba123";
$db   = "solicode_project";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
}
?>