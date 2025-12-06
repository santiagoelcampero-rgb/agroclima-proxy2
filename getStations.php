<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

// 🔑 Tus claves completas
$apiKey    = "fy3x1gcft7msajs1pb0vvfgoosucdh2m";
$apiSecret = "capbxzuzpahsktfh49ymwjhu713a3on8";

// Timestamp
$t = time();

// Firma correcta
$signature = hash("sha256", $apiSecret . $t);

// URL para obtener TODAS tus estaciones
$url = "https://api.weatherlink.com/v2/stations?api-key=$apiKey&t=$t&api-signature=$signature";

$response = @file_get_contents($url);

if ($response === FALSE) {
    echo json_encode(["error" => "No se pudo obtener estaciones"]);
    exit;
}

echo $response;
?>
