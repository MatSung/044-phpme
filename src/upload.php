<?php

define('UPLOAD_DIR', __DIR__ . '/uploads');
define('ALLOWED_EXTENSIONS', ['png', 'jpg', 'jpeg']);

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

if (isset($_FILES['pictures']) && is_array($_FILES['pictures'])) {
    $len = count($_FILES['pictures']['name']);
    $fileData = [];
    for ($i=0; $i < $len; $i++) { 
		$file = [
            'name'     => $_FILES['pictures']['name'][$i],
            'type'     => $_FILES['pictures']['type'][$i],
            'tmp_name' => $_FILES['pictures']['tmp_name'][$i],
            'error'    => $_FILES['pictures']['error'][$i],
            'size'     => $_FILES['pictures']['size'][$i],
        ];

        if ($file['error'] == UPLOAD_ERR_OK) {
            // if it is a single file
            // https://www.php.net/manual/en/function.pathinfo.php
            $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
            $ext = strtolower($ext);
            
            if (!in_array($ext, ALLOWED_EXTENSIONS)) {
                throw new Exception('File extension not allowed', 1);
            }
    
            $path = UPLOAD_DIR . '/' . date('Y/m/d');
    
            // https://www.php.net/manual/en/function.is-dir.php
            if (!is_dir($path)) {
                // https://www.php.net/manual/en/function.mkdir.php
                mkdir($path, 0777, true);
            }
    
            do {
                $name = generateRandomString(16);
    
                $path = sprintf('%s/%s.%s', $path, $name, $ext);
            } while (file_exists($path));
    
            move_uploaded_file($file['tmp_name'], $path);
    
            $publicFilePath = str_replace('/app', '', $path);

            $fileData[] = $publicFilePath;
        } else {
            $fileData[] = $file['error'];
        }
    }
    

    http_response_code(200);

    header('Content-Type: application/json');

    echo json_encode($fileData);
    exit;
}