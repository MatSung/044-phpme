<?php

function array_flat($array, $prefix = '')
{
    $result = array();

    foreach ($array as $key => $value) {
        $new_key = $prefix . (empty($prefix) ? '' : '.') . $key;

        if (is_array($value)) {
            $result = array_merge($result, array_flat($value, $new_key));
        } else {
            $result[$new_key] = $value;
        }
    }
    return $result;
}

$url = 'http://nginx/php/curl_server.php';
//curl myself
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($ch);
curl_close($ch);

$details = json_decode($result, 1)['results'][0];

$flattenedArray = array_flat($details);

$fileLocation = 'myfile.csv';
$handle = fopen($fileLocation, 'a');

$arrayKeys = array_keys($flattenedArray);
$arrayValues = array_values($flattenedArray);

$finalArray = [
    $arrayKeys,
    $arrayValues
];
foreach ($finalArray as $fields) {
    fputcsv($handle, $fields);
}

fclose($handle);

echo "success, file saved in $fileLocation";