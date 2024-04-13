////////////////////////////////////////////////////////////
///FETCHING DATA FOR CURRENT WEATHER
////////////////////////////////////////////////////////////
//Grab data
const button = document.querySelector("button");
const forecast = document.querySelector(".forecast");
const country = document.querySelector(".country");
const farenheit = document.querySelector(".fahrenheit");
const condition = document.querySelector(".condition");
const humidity = document.querySelector(".humidity");
const wind = document.querySelector(".wind");
const data_wrap = document.querySelector(".data");
const image = document.querySelector("img");
const mainTitle = document.querySelector("h1");
const placeEffect = document.querySelector(".placeholder");

//Refresh page
mainTitle.addEventListener("click", () => {
    location.reload();

});

//Fetching forecast
function data(resp) {
    fetch(
            `https://api.weatherapi.com/v1/current.json?key=48b6a4da649f4320b2e33045232312&q=${resp}`
        )
        .then((response) => {
            if (!response.ok) {
                throw new Error('Invalid location or Network error. Please enter a valid location or check your internet connectivity.');
            }
            return response.json();
        })
        .then((data) => {
            forecast.innerHTML = `<i class="fas fa-thermometer-half"></i> Current Temperature in Celsius: ${data.current.temp_c} ºC`;
            farenheit.innerHTML = `<i class="fas fa-thermometer-full"></i> Current Temperature in Fahrenheit: ${data.current.temp_f} ºF`;
            country.innerHTML = `<i class="fas fa-globe"></i> Country: ${data.location.country}`;
            condition.innerHTML = `<i class="fas fa-cloud"></i> Condition: ${data.current.condition.text}`;
            humidity.innerHTML = `<i class="fas fa-tint"></i> Humidity: ${data.current.humidity}`;
            wind.innerHTML = `<i class="fas fa-wind"></i> Wind: ${data.current.wind_mph}`;
        })
        .catch((error) => {
            console.error(error);
            // Display error message
            forecast.innerHTML = `<span style="color: red;">Error: ${error.message}</span>`;
            farenheit.innerHTML = '';
            country.innerHTML = '';
            condition.innerHTML = '';
            humidity.innerHTML = '';
            wind.innerHTML = '';
        });
}

button.addEventListener("click", () => {
    let input = document.querySelector("#input").value;

    if (!input) {
        alert("Missing data");
    }

    image.style.visibility = "visible";
    placeEffect.style.visibility = "hidden";

    data(input);

    data_wrap.classList.add("active");
    document.querySelector("#title").innerHTML = `${input}`;
    document.querySelector("#input").value = "";
});

/////////////////////////////////////////////////////////////////
////FETCHING MONTHLY DATA
/////////////////////////////////////////////////////////////////

const timeEl = document.getElementById('time');
const dateEl = document.getElementById('date');
const currentWeatherItemsEl = document.getElementById('current-weather-items');
const timezone = document.getElementById('time-zone');
const countryEl = document.getElementById('country');
const weatherForecastEl = document.getElementById('weather-forecast');
const currentTempEl = document.getElementById('current-temp');
const form = document.getElementById('input');


const days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday']
const months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

const API_KEY = '49cc8c821cd2aff9af04c9f98c36eb74';

setInterval(() => {
    const time = new Date();
    const month = time.getMonth();
    const date = time.getDate();
    const day = time.getDay();
    const hour = time.getHours();
    const hoursIn12HrFormat = hour >= 13 ? hour % 12 : hour
    const minutes = time.getMinutes();
    const ampm = hour >= 12 ? 'PM' : 'AM'

    timeEl.innerHTML = (hoursIn12HrFormat < 10 ? '0' + hoursIn12HrFormat : hoursIn12HrFormat) + ':' + (minutes < 10 ? '0' + minutes : minutes) + ' ' + `<span id="am-pm">${ampm}</span>`

    dateEl.innerHTML = days[day] + ', ' + date + ' ' + months[month]

}, 1000);

getWeatherData()

function getWeatherData() {
    navigator.geolocation.getCurrentPosition((success) => {

        latitude = -12.95867;
        longitude = 28.63659;

        fetch(`https://api.openweathermap.org/data/2.5/onecall?lat=${latitude}&lon=${longitude}&exclude=hourly,minutely&units=metric&appid=${API_KEY}`).then(res => res.json()).then(data => {

            console.log(data)
            showWeatherData(data);
        })

    })
}

function showWeatherData(data) {
    let { humidity, pressure, sunrise, sunset, wind_speed } = data.current;

    timezone.innerHTML = data.timezone;
    countryEl.innerHTML = data.lat + 'N ' + data.lon + 'E'

    currentWeatherItemsEl.innerHTML =
        `<div class="weather-item">
        <div>Humidity</div>
        <div>${humidity}%</div>
    </div>
    <div class="weather-item">
        <div>Pressure</div>
        <div>${pressure}</div>
    </div>
    <div class="weather-item">
        <div>Wind Speed</div>
        <div>${wind_speed}</div>
    </div>

    <div class="weather-item">
        <div>Sunrise</div>
        <div>${window.moment(sunrise * 1000).format('HH:mm a')}</div>
    </div>
    <div class="weather-item">
        <div>Sunset</div>
        <div>${window.moment(sunset*1000).format('HH:mm a')}</div>
    </div>
    
    
    `;

    let otherDayForcast = ''
    data.daily.forEach((day, idx) => {
        if (idx == 0) {
            currentTempEl.innerHTML = `
            <img src="http://openweathermap.org/img/wn//${day.weather[0].icon}@4x.png" alt="weather icon" class="w-icon">
            <div class="other">
                <div class="day">${window.moment(day.dt*1000).format('dddd')}</div>
                <div class="temp">Night - ${day.temp.night}&#176;C</div>
                <div class="temp">Day - ${day.temp.day}&#176;C</div>
            </div>
            
            `
        } else {
            otherDayForcast += `
            <div class="weather-forecast-item">
                <div class="day">${window.moment(day.dt*1000).format('ddd')}</div>
                <img src="http://openweathermap.org/img/wn/${day.weather[0].icon}@2x.png" alt="weather icon" class="w-icon">
                <div class="temp">Night - ${day.temp.night}&#176;C</div>
                <div class="temp">Day - ${day.temp.day}&#176;C</div>
            </div>
            
            `
        }
    })


    weatherForecastEl.innerHTML = otherDayForcast;
}