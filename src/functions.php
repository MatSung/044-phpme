<?php

// https://stackoverflow.com/questions/4356289/php-random-string-generator
function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';

    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }

    return $randomString;
}

function handleFileUpload($file) {
    if ($file['error'] == UPLOAD_ERR_OK) {
        // https://www.php.net/manual/en/function.pathinfo.php
        $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
        $ext = strtolower($ext);
        
        if (!in_array($ext, ALLOWED_EXTENSIONS)) {
            throw new Exception('File extension not allowed', 1);
        }
        $currentDate = date('Y/m/d');
        $path = UPLOAD_DIR . '/' . $currentDate;

        // https://www.php.net/manual/en/function.is-dir.php
        if (!is_dir($path)) {
            // https://www.php.net/manual/en/function.mkdir.php
            mkdir($path, 0755, true);
        }

        do {
            $name = generateRandomString(16);

            $path = sprintf('%s/%s.%s', $path, $name, $ext);
        } while (file_exists($path));

        move_uploaded_file($file['tmp_name'], $path);
        return '/uploads/'.$currentDate.'/'.$name.'.'.$ext;
    }
}