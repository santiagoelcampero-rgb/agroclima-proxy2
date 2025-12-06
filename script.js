async function obtenerDatos() {
    try {
        const response = await fetch("proxy.php");
        const data = await response.json();

        console.log("Datos recibidos:", data);

        if (!data || !data.data || !data.data[0]) {
            throw new Error("Datos inválidos de WeatherLink");
        }

        const sensor = data.data[0];

        document.getElementById("temp").innerText = sensor.temp + " °C";
        document.getElementById("humedad").innerText = sensor.hum + " %";
        document.getElementById("presion").innerText = sensor.bar + " hPa";
        document.getElementById("viento").innerText = sensor.wind_speed_last + " km/h";
        document.getElementById("lluvia").innerText = sensor.rain_rate_last + " mm";

    } catch (error) {
        console.error("Error general:", error);
    }
}

obtenerDatos();
setInterval(obtenerDatos, 60000);
