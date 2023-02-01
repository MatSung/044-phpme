<?php

require_once 'random-string.php';

require_once 'resizer.php';

define('UPLOAD_DIR', __DIR__ . '/../uploads');
define('ALLOWED_EXTENSIONS', ['png', 'jpg', 'jpeg']);
define('ERROR_IMG_PATH', 'logos/error.png');

$data = [
    'name' => $_POST['name'] ?? 'error',
    'surname' => $_POST['surname'] ?? 'error',
    'imagePath' => 'error',
    'languages' => $_POST['languages'] ?? 'error',
    'final' => 'error'
];

$path;

if(isset($_FILES['picture'])){
    $file = [
        'name' => $_FILES['picture']['name'],
        'type'     => $_FILES['picture']['type'],
        'tmp_name' => $_FILES['picture']['tmp_name'],
        'error'    => $_FILES['picture']['error'],
        'size'     => $_FILES['picture']['size']
    ];
    // var_dump($_FILES['picture']);
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

        $path = generateFileName($path, $ext);

        move_uploaded_file($file['tmp_name'], $path);

        $publicFilePath = str_replace('/app', '', $path);
        $data['imagePath'] = $publicFilePath;
    }
}

$imageProfilePath = __DIR__ . '/../generated-profiles';
$imageProfilePath = generateFileName($imageProfilePath,'png');

if(applyData($data['name'], $data['surname'], $data['languages'], $imageProfilePath, $path, $ext)){
    $data['final'] = str_replace('/app', '', $imageProfilePath);
}

http_response_code(200);

header('Content-Type: application/json');

echo json_encode($data);
exit;