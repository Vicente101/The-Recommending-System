<?php
// Database connection details (replace with your own)
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "weather_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to create database table (if it doesn't exist)
function createTable($conn) {
    $sql = "CREATE TABLE IF NOT EXISTS user_data (
        id INT AUTO_INCREMENT PRIMARY KEY,
        city VARCHAR(255) NOT NULL,
        state VARCHAR(255) NOT NULL,
        zipcode VARCHAR(255) NOT NULL
    )";

    if ($conn->query($sql) === TRUE) {
        echo "Table user_data created successfully";
    } else {
        echo "Error creating table: " . $conn->error;
    }
}

// Function to insert user data
function insertData($conn, $city, $state, $zipcode) {
    $sql = "INSERT INTO user_data (city, state, zipcode)
    VALUES ('$city', '$state', '$zipcode')";

    if ($conn->query($sql) === TRUE) {
        $last_id = $conn->insert_id;
        return $last_id;
    } else {
        echo "Error inserting data: " . $conn->error;
        return false;
    }
}

// Function to retrieve user data
function getUserData($conn, $id) {
    $sql = "SELECT * FROM user_data WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row;
    } else {
        return false;
    }
}

// Create table if it doesn't exist
createTable($conn);

// Get user data from form submission (assuming form submits to weather.php)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $city = $_POST["city"];
    $state = $_POST["state"];
    $zipcode = $_POST["zipcode"];

    // Insert user data and get the inserted ID
    $user_id = insertData($conn, $city, $state, $zipcode);

    if ($user_id) {
        // Redirect to weather page with user ID in the URL (replace "user_id" with actual variable)
        header("Location: weather_display.php?user_id=" . $user_id);
        exit();
    } else {
        echo "Error submitting data";
    }
}

// Close connection
$conn->close();
?>
