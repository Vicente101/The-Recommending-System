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

//Fetching image
async function cityImage() {}

button.addEventListener("click", () => {
    let input = document.querySelector("#input").value;

    if (!input) {
        alert("Missing data");
    }

    image.style.visibility = "visible";
    placeEffect.style.visibility = "hidden";

    cityImage();
    data(input);

    data_wrap.classList.add("active");
    document.querySelector("#title").innerHTML = `${input}`;
    document.querySelector("#input").value = "";
});