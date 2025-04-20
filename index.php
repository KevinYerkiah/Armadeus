<?php

session_start();
include("connect.php");
?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Weather App</title>
  <link rel="stylesheet" href="stylesheet.css">
</head>

<body>
  <div class="card">
    <!-- search box -->
    <div class="search">
      <input type="text" placeholder="Enter city name" spellcheck="false">
      <button>
        <img src="images/search.png" alt="Search">
      </button>
    </div>

    <!-- current weather -->
    <div class="weather">
      <img src="images/rain.png" class="weather-icon" alt="Weather icon">
      <h1 class="temp">22°C</h1>
      <h2 class="city">New York</h2>
    </div>

    <!-- additional info row: wind + humidity -->
    <div class="details">
      <!-- wind -->
      <div class="col">
        <img src="images/wind.png" alt="Wind icon">
        <div>
          <p class="wind">15 km/h</p>
          <p>Wind Speed</p>
        </div>
      </div>
      <!-- humidity -->
      <div class="col">
        <img src="images/humidity.png" alt="Humidity icon">
        <div>
          <p class="humidity">65%</p>
          <p>Humidity</p>
        </div>
      </div>
    </div>
  </div>

  <!-- Link to your external JS -->
  <script src="index.js"></script>
</body>

</html>