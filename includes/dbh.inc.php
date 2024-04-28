<?php
// Database connection parameters
$servername = "localhost"
$username = "root";
$password = "";
$dbname = "weatherdb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Checking connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Weather data received 
$humidity = $_POST['humidity'];
$pressure = $_POST['pressure'];
$sunrise = $_POST['sunrise'];
$sunset = $_POST['sunset'];
$wind_speed = $_POST['wind_speed'];

