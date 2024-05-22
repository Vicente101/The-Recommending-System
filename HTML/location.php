<?php
include("db_connection.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Location-page</title>
    <link rel="stylesheet" href="location.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>
    <!--Nav bar-->
    <nav class="navbar">
        <div class="nav-logo">
            <a href="index.php"><img src="images/company_logo.png" alt="Company Logo"></a>
        </div>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="location.php">Weather</a></li>
            <li><a href="crops.php">Crops</a></li>
            <li><a href="#resources">Resources</a></li>
            <li><a href="contacts.php">Contact</a></li>
        </ul>
    </nav>

    <section class="main">
        <header>
            <section class="hero">
                <div class="hero-content">
                    <h1>Weather got you stumped?</h1>
                    <p>Find the right crops for your climate with one click. Let's grow!</p>
                </div>
            </section>

            <div class="placeholder"></div>
        </header>
        <!-- Weather Section -->

        <section class="container">
            <form action="crops.php" method="post">
                <div id="input-info">
                    <input required class="city-input" type="text" id="input" name="location" placeholder="Enter your Location" autofocus />
                    <button class="get-weather"><span>Get Weather</span><i></i></button>
                </div>
            </form>
        </section>

        <section class="data">
            <div class="date-container">
                <div class="time" id="time">
                    12:30 <span id="am-pm">PM</span>
                </div>
            </div>
            <section class="weather-info">
                <h3 id="title"></h3>
                <div class="grid-container">
                    <div class="weather">
                        <img src="https://cdn-icons-png.flaticon.com/128/7916/7916710.png" alt="image" width="100" height="100" />
                        <div class="forecast"><i class="fas fa-thermometer-half"></i> Current Temperature in Celsius: </div>

                        <img src="https://cdn-icons-png.flaticon.com/128/1163/1163717.png" alt="image" width="100" height="100" />
                        <div class="fahrenheit"><i class="fas fa-thermometer-full"></i> Current Temperature in Fahrenheit: </div>
                    </div>

                    <div class="weather">
                        <div class="detail">
                            <img src="https://cdn-icons-png.flaticon.com/128/2343/2343852.png" alt="image" width="100" height="100" />
                            <div class="country"><i class="fas fa-globe"></i> Country: </div>
                        </div>

                        <div class="detail">
                            <img src="https://cdn-icons-png.flaticon.com/128/8996/8996145.png" alt="image" width="100" height="100" />
                            <div class="condition"><i class="fas fa-cloud"></i> Condition: </div>
                        </div>
                    </div>

                    <div class="weather">
                        <img src="https://cdn-icons-png.flaticon.com/128/11129/11129172.png" alt="image" width="100" height="100" />
                        <div class="humidity"><i class="fas fa-tint"></i> Humidity: </div>

                        <img src="https://cdn-icons-png.flaticon.com/128/7236/7236728.png" alt="image" width="100" height="100" />
                        <div class="wind"><i class="fas fa-wind"></i> Wind: </div>


                    </div>
                </div>
            </section>

            <!--CLIMATE FORECAST-->

            <h1 class="mid-header">Learn more about the upcoming weather for this week.</h1>
            <p class="mid-text">More details about the weeky weather so you do not miss out and prepare<br> with accurate insight. Grow More!</p>


            <section class="climate">
                <div class="container">

                    <div class="current-info">

                        <!--Time and Date-->
                        <div class="date-container">
                            <div class="date" id="date">
                                Monday, 25 May
                            </div>

                            <div class="others" id="current-weather-items">


                            </div>
                        </div>

                        <div class="place-container">
                            <div class="time-zone" id="time-zone">Your Location</div>
                            <div id="country" class="country">IN</div>
                        </div>
                    </div>
                </div>

                <!--WEEKLY WEATHER-->
                <div class="future-forecast">
                    <div class="today" id="current-temp">
                        <img src="https://cdn-icons-png.flaticon.com/128/8996/8996145.png" alt="weather icon" class="w-icon">
                        <div class="other">
                            <div class="day">Monday</div>
                            <div class="temp">Night - 25.6&#176; C</div>
                            <div class="temp">Day - 35.6&#176; C</div>
                        </div>
                    </div>

                    <div class="weather-forecast" id="weather-forecast">
                        <div class="weather-forecast-item">
                            <div class="day">Tue</div>
                            <img src="https://cdn-icons-png.flaticon.com/128/8996/8996145.png" alt="weather icon" class="w-icon">
                            <div class="temp">Night - 25.6&#176; C</div>
                            <div class="temp">Day - 35.6&#176; C</div>
                        </div>
                        <div class="weather-forecast-item">
                            <div class="day">Wed</div>
                            <img src="https://cdn-icons-png.flaticon.com/128/8996/8996145.png" alt="weather icon" class="w-icon">
                            <div class="temp">Night - 25.6&#176; C</div>
                            <div class="temp">Day - 35.6&#176; C</div>
                        </div>
                        <div class="weather-forecast-item">
                            <div class="day">Thur</div>
                            <img src="https://cdn-icons-png.flaticon.com/128/8996/8996145.png" alt="weather icon" class="w-icon">
                            <div class="temp">Night - 25.6&#176; C</div>
                            <div class="temp">Day - 35.6&#176; C</div>
                        </div>
                        <div class="weather-forecast-item">
                            <div class="day">Fri</div>
                            <img src="https://cdn-icons-png.flaticon.com/128/8996/8996145.png" alt="weather icon" class="w-icon">
                            <div class="temp">Night - 25.6&#176; C</div>
                            <div class="temp">Day - 35.6&#176; C</div>
                        </div>
                        <div class="weather-forecast-item">
                            <div class="day">Sat</div>
                            <img src="https://cdn-icons-png.flaticon.com/128/8996/8996145.png" alt="weather icon" class="w-icon">
                            <div class="temp">Night - 25.6&#176; C</div>
                            <div class="temp">Day - 35.6&#176; C</div>
                        </div>

                    </div>
                </div>

            </section>
        </section>
    </section>
    </section>
    <br><br>
    <section class="how-it-works">
        <h2>How It Works</h2>
        <p>Our system works by analyzing weather data for your location and recommending the most suitable crops for planting. Simply enter your location, and we'll provide personalized recommendations based on the current season.</p>

        <br><br><br><br><br>

                <!--  Footer Section -->
        <footer class="footer">
                <div class="footer-content">
                    <div class="logo">
                        <img src="images/company_logo.png" alt="Company Logo" />
                    </div>
                    <div class="contact-info">
                        <p>Email: croprecommendation@gmail.com</p>
                    </div>
                    <div class="contact-button">
                        <a href="contacts.php" class="btn">Contact Us</a>
                    </div>
                </div>
        </footer>
    </section>
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="location.js "></script>
</body>

</html>