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

// Insert data into the database table
$sql = "INSERT INTO weather_data(humidity, pressure, sunrise, sunset, wind_speed)
VALUES ('$humidity', '$pressure', '$sunrise', '$sunset', '$wind_speed')";

if ($conn->query($sql) === True){
   echo " Weather data inserted successfully";
}  else{ 
   echo "Error:" . $sql . "<br>" . $conn->error;
}

$conn->close();
?>