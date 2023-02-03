<?php
$cURLConnection = curl_init();
curl_setopt($cURLConnection, CURLOPT_URL, 'https://randomuser.me/api/');
curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);
$apiData = curl_exec($cURLConnection);
curl_close($cURLConnection);
try {
    $details = json_decode($apiData, 1)['results'][0];
} catch (Exception $e) {
    echo 'Fetch failed with error: ' . $e;
    die();
}


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

$flattenedArray = array_flat($details);


$fileLocation = 'myfile.csv';
$handle = fopen($fileLocation, 'a');

$arrayKeys = array_keys($flattenedArray);
$arrayValues = array_values($flattenedArray);

$finalArray = array(
    $arrayKeys,
    $arrayValues
);
foreach ($finalArray as $fields) {
    fputcsv($handle, $fields);
}

fclose($handle);

echo "success, file saved in $fileLocation";