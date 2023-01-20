<?php
function generateRandomString($length = 10)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';

    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }

    return $randomString;
}

function generateFileName($path, $ext)
{
    do {
        $name = generateRandomString(16);
        $path = sprintf('%s/%s.%s', $path, $name, $ext);
    } while (file_exists($path));
    return $path;
}
