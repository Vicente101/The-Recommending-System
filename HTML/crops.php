<?php
    include("db_connection.php")
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>



<?php

$temp = $_GET['temp'];

$hmu = $_GET['humidity'];

$sql = "SELECT * FROM crops  WHERE $temp BETWEEN temp_min AND temp_max";
$result = $conn->query($sql);
if ($result && mysqli_num_rows($result) > 0) {
  
 

  while ($row = mysqli_fetch_assoc($result)) {
   
   echo 'Crop Name: '.  $row['crop_name']. "<br>";
  }

  
}else {
    echo "<p>No matching crops found!</p>";
}
    /*if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $location = $_GET["location"];

        // Fetching data from the API
        $api_key = "48b6a4da649f4320b2e33045232312";
        $url = "https://api.weatherapi.com/v1/current.json?key=$api_key&q=$location";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $data = curl_exec($ch);
        curl_close($ch);

        $data = json_decode($data, true);

        // Storing the values in variables
        $temp_c = $data['current']['temp_c'];
        $temp_f = $data['current']['temp_f'];
        $country = $data['location']['country'];
        $condition = $data['current']['condition']['text'];
        $humidity = $data['current']['humidity'];
        $wind = $data['current']['wind_mph'];

        // Fetching crops from the database
        $crops = [
            ['crop_name' => 'Maize', 'temp_min' => 20, 'temp_max' => 30, 'humidity_min' => 40, 'humidity_max' => 80, 'wind_min' => 5, 'wind_max' => 15, 'climate' => 'Summer'],
            ['crop_name' => 'Cassava', 'temp_min' => 25, 'temp_max' => 29, 'humidity_min' => 50, 'humidity_max' => 90, 'wind_min' => 5, 'wind_max' => 20, 'climate' => 'Summer'],
            // Add more crops here
        ];

        // Finding the crop that meets the current weather conditions
        $crop = null;
        foreach ($crops as $c) {
            if ($temp_c >= $c['temp_min'] && $temp_c <= $c['temp_max'] &&
                $humidity >= $c['humidity_min'] && $humidity <= $c['humidity_max'] &&
                $wind >= $c['wind_min'] && $wind <= $c['wind_max']) {
                $crop = $c;
                break;
            }
        }

        // Displaying the crop that meets the current weather conditions
        if ($crop) {
            echo "The crop that meets the current weather conditions is: ". $crop['crop_name'];
        } else {
            echo "No crop meets the current weather conditions.";
        }
    }

    */
?>


</body>
</html>