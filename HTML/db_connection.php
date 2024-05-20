<?php
$servername = "localhost";
$username = "batcall";
$password = "nnnnnnnn";
$dbname = "crops";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
 die("Connection failed: " . $conn->connect_error);
}
?>
