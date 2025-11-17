
document.getElementById("searchBtn").addEventListener("click", function() {
  let city = document.getElementById("cityInput").value;
  let apiKey = "df2f45836d87daaca0cbebee1eef0865"; // from OpenWeatherMap
  let url = `https://api.openweathermap.org/data/2.5/weather?q=${city}&units=metric&appid=${apiKey}`;

  fetch(url)
    .then(response => response.json())
    .then(data => {
      console.log(data); // to see what we get in console

      document.getElementById("cityName").textContent = `${data.name}, ${data.sys.country}`;
      document.getElementById("temperature").textContent = `Temperature: ${data.main.temp}°C`;
      document.getElementById("description").textContent = `Description: ${data.weather[0].description}`;
      document.getElementById("icon").src = `https://openweathermap.org/img/wn/${data.weather[0].icon}@2x.png`;
      document.getElementById("humidity").textContent = `Humidity: ${data.main.humidity}%`;
      document.getElementById("wind").textContent = `Wind speed: ${data.wind.speed} m/s`;
    })
    .catch(error => {
      console.error("Error:", error);
    });
});

