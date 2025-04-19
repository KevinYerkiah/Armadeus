const apiKey   = "daeb2d01656479147be3b408c720dd6a";
const apiUrl   = "https://api.openweathermap.org/data/2.5/weather?units=metric&q=";

const searchBox   = document.querySelector(".search input");
const searchBtn   = document.querySelector(".search button");
const weatherIcon = document.querySelector(".weather-icon");
const weatherDiv  = document.querySelector(".weather");

async function checkWeather(city) {
  try {
    const response = await fetch(apiUrl + city + `&appid=${apiKey}`);
    if (!response.ok) throw new Error("City not found");
    const data = await response.json();

    // update text fields
    document.querySelector(".city").textContent     = data.name;
    document.querySelector(".temp").textContent     = Math.round(data.main.temp) + "°C";
    document.querySelector(".humidity").textContent = data.main.humidity + "%";
    document.querySelector(".wind").textContent     = data.wind.speed + " km/h";

    // update icon
    const main = data.weather[0].main;
    if      (main === "Clouds")  weatherIcon.src = "images/clouds.png";
    else if (main === "Clear")   weatherIcon.src = "images/clear.png";
    else if (main === "Rain")    weatherIcon.src = "images/rain.png";
    else if (main === "Drizzle") weatherIcon.src = "images/drizzle.png";
    else if (main === "Mist")    weatherIcon.src = "images/mist.png";
    else                          weatherIcon.src = "images/default.png";

    // show weather
    weatherDiv.style.display = "block";
  } catch (err) {
    alert(err.message);
  }
}

searchBtn.addEventListener("click", () => {
  const city = searchBox.value.trim();
  if (city) checkWeather(city);
});

// Hide weather block on initial load
weatherDiv.style.display = "none";
