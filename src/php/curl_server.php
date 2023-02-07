<?php
$apiData;
try {
    $cURLConnection = curl_init();
    curl_setopt($cURLConnection, CURLOPT_URL, 'https://randomuser.me/api/');
    curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);
    $apiData = curl_exec($cURLConnection);
    curl_close($cURLConnection);
} catch (Exception $e) {
    echo 'Fetch failed with error: ' . $e;
    die();
}

header('Content-Type: application/json');
http_response_code(404);
echo $apiData;
