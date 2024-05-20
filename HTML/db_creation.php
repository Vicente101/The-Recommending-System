<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "CropsDb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error);
}

$query = "CREATE TABLE IF NOT EXISTS crops (
    id INT AUTO_INCREMENT PRIMARY KEY,
    crop_name VARCHAR(255) NOT NULL,
    temp_min INT NOT NULL,
    temp_max INT NOT NULL,
    humidity_min INT NOT NULL,
    humidity_max INT NOT NULL,
    wind_min INT NOT NULL,
    wind_max INT NOT NULL,
    climate VARCHAR(255) NOT NULL
)";

if ($conn->query($query) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: ". $conn->error;
}

$crops = [
    ['Maize',20, 30, 40, 80, 5, 15, 'Summer'],
    ['Cassava',25, 29, 50, 90, 5, 20, 'Summer'],
    ['Rice',20,35,70,90,2,10, 'Summer'],
    ['Wheat',15,24,40,70,5,15, 'Winter'],
    ['Sorghum',25,35,40,80,5,15, 'Summer'],
    ['Groundnuts (Peanuts)',20,30,40,70,5,15, 'Summer'],
    ['Soybeans',20,30,40,70,5,15, 'Summer'],
    ['Sunflower',20,30,40,70,5,15, 'Summer'],
    ['Cotton',20,30,50,80,5,15, 'Summer'],
    ['Tobacco',20,30,50,80,5,15, 'Summer'],
    ['Sugar cane',20,30,60,90,5,15, 'Summer'],
    ['Coffee',18,24,60,80,2,10, 'Winter'],
    ['Tea',18,30,60,90,2,10, 'Winter'],
    ['Legumes',20,30,40,70,5,15, 'Summer'],
    ['Potatoes',15,20,50,70,2,10, 'Winter'],
    ['Millet',25,35,40,80,5,15, 'Summer'],
    ['Barley',15,20,50,70,2,10, 'Winter'],
    ['Beans',20,30,40,70,5,15, 'Summer'],
    ['Peas',15,20,50,70,2,10, 'Winter']
];

$sql = "INSERT INTO IF NOT EXISTS crops (crop_name, temp_min, temp_max, humidity_min, humidity_max, wind_min, wind_max, climate) VALUES ";
$values = [];

foreach ($crops as $crop) {
    $values[] = "('". $conn->real_escape_string($crop[0]). "', ". 
                 $conn->real_escape_string($crop[1]). ", ". 
                 $conn->real_escape_string($crop[2]). ", ". 
                 $conn->real_escape_string($crop[3]). ", ". 
                 $conn->real_escape_string($crop[4]). ", ". 
                 $conn->real_escape_string($crop[5]). ", ". 
                 $conn->real_escape_string($crop[6]). ", '". $conn->real_escape_string($crop[7]). "')";
}

$sql.= implode(", ", $values);

if ($conn->query($sql) === TRUE) {
    echo "New records inserted successfully";
} else {
    echo "Error: ". $sql. "<br>". $conn->error;
}

$conn->close();
?>