<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

// 🔑 TUS CREDENCIALES
$apiKey    = "fy3x1gcft7msajs1pb0vvfgoosucdh2m";
$apiSecret = "ala6h05kg7oeavpd28nalhrm7m2uqvml";
$stationId = "173982";

// Obtener timestamp del servidor (Render tiene la hora correcta)
$t = time();

// Firma correcta: SHA256(apiSecret + t)
$signature = hash("sha256", $apiSecret . $t);

// URL API WeatherLink
$url = "https://api.weatherlink.com/v2/current/$stationId?api-key=$apiKey&t=$t&api-signature=$signature";

// Obtener respuesta
$response = @file_get_contents($url);

if ($response === FALSE) {
    echo json_encode(["error" => "No se pudo obtener datos desde WeatherLink API"]);
    exit;
}

echo $response;
?>
