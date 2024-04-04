<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $city = $_POST["city"];
    $state = $_POST["state"];
    $zipcode = $_POST["zipcode"];

    // Redirect to weather page with form data
    header("Location: weather.php?city=$city&state=$state&zipcode=$zipcode");
    exit();
    }
    ?>