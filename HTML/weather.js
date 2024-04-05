// Get the weather data for the specified city
function getWeather() {

    // Construct the URL for the current weather API request
    const currentWeatherUrl = `https://api.openweathermap.org/data/2.5/weather?q=${city}&appid=${apikey}`;

    // Construct the URL for the monthly forecast API request
    const ForecastUrl = `https://api.openweathermap.org/data/2.5/forecast?q=${city}&appid=${apikey}`;

    // Check if the city input is empty
    if (!city) {
        alert("Please  enter a valid city");
        return;
    }

    // Set the API key and city variables
    const apikey = "adc39b547d5bd7ec7e2795c9d3dbf587";
    const city = document.getElementById('city').value;

    // Fetch the current weather data
    fetch(currentWeatherUrl)
        .then(response => response.json())
        .then(data => { displayWeather(data); })

    // Handle any errors fetching the current weather data
    .catch(error => {
        console.error("Error fetching weather data: ", error);
        alert("Error fetching weather data. Please try again later.");
    });

    // Fetch the monthly forecast data
    fetch(ForecastUrl)
        .then(response => response.json())
        .then(data => { displayMontlyForecast(data.list); })

    // Handle any errors fetching the monthly forecast data
    .catch(error => {
        console.error("Error fetching monthly data: ", error);
        alert("Error fetching monthly data. Please try again later.");
    });

}

// Display the current weather data
function displayWeather(data) {
    if (data.cod == '404') {
        weatherInfoDiv.innerHTML = `<P>${data.message}</p>`;
    } else {
        const cityName = data.name;
        const temperature = Math.round(data.main.temp - 273.15);
        const description = data.weather[0].description;
        const iconCode = data.weather[0].icon;
        const iconUrl = `http://openweathermap.org/img/wn/${iconCode}@4x.png`;

        // Display the temperature
        const temperatureHTML = `<p>${temperature}  &#8451;</p>`;

        // Display the city name and weather description
        const weatherHTML = `<P>${cityName}</P>
                            <P>${description}</P>`;

        // Display the temperature and weather information
        tempDivInfo.innerHTML = temperatureHTML;
        weatherInfoDiv.innerHTML = weatherHTML;

        // Display the weather icon
        weatherIcon.src = iconUrl;
        weatherIcon.alt = description;

        // Display the current image and data in the HTML page
        showImage();
    }

    // Get the HTML elements for displaying the weather information
    const tempDivInfo = document.getElementById('temp-div');
    const weatherInfoDiv = document.getElementById('weather-info');
    const weatherIcon = document.getElementById('weather-icon');
    const montlyForecast = document.getElementById('monthly-forecast');

    // Clear any previous weather information
    weatherInfoDiv.innerHTML = '';
    montlyForecast.innerHTML = '';
    tempDivInfo.innerHTML = '';
}

// Display the monthly forecast data
function displayMontlyForecast(monthlyData) {
    const monthlyForecastDiv = document.getElementById('monthly-forecast');
    const next30Days = monthlyData.slice(0, 30);

    // Loop through the next 30 days of forecast data
    next30Days.forEach(item => {
        const dateTime = new Date(item.dt * 1000);
        const dayOfWeek = dateTime.toLocaleString('en-US', { weekday: 'long' });
        const temperature = Math.round(item.temp.day);
        const iconCode = item.weather[0].icon;
        const iconUrl = `https://openweathermap.org/img/wn/${iconCode}.png`;

        const monthlyItemHtml = `
            <div class="monthly-item">
                <span>${dayOfWeek}</span>
                <img src="${iconUrl}" alt="${iconCode}"/>
                <span> ${temperature}&#8451;</span>
            </div>
        `;

        monthlyForecastDiv.innerHTML += monthlyItemHtml;
    });
}

// Display current image and data in HTML page
function showImage() {
    const imgElement = document.getElementById('weather-icon');
    weatherIcon.style.display = 'block';

}