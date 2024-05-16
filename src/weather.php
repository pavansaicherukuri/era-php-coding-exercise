<?php
require 'vendor/autoload.php';

require 'database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $x = $_POST['x'];
    $y = $_POST['y'];

    $url = "https://api.weather.gov/gridpoints/RNK/$x,$y/forecast";
    $userAgent = 'era-php-coding-exercise';

    // Initialize curl session
    $ch = curl_init();

    // Set curl options
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('User-Agent: ' . $userAgent));

    // Execute curl session
    $response = curl_exec($ch);

    // Check for errors
    if(curl_errno($ch)){
        echo 'Curl error: ' . curl_error($ch);
    }

    // Close curl session
    curl_close($ch);

    // Decode JSON response
    $data = json_decode($response, true);

    // Check if data is valid
    if ($data !== null && isset($data['properties']['periods'][0]['detailedForecast'])) {
        $currentForecast = $data['properties']['periods'][0]['detailedForecast'];
        echo json_encode(['forecast' => $currentForecast]);
    } else {
        // Fallback to mock data in case of API failure
        $mockData = file_get_contents(__DIR__ . '/../data/blacksburg_va_weather_example.json');
        $mockData = json_decode($mockData, true);
        $currentForecast = $mockData['properties']['periods'][0]['detailedForecast'];
        echo json_encode(['forecast' => $currentForecast]);
    }
}
?>
