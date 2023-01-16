<?php

require_once 'functions.php';

define('UPLOAD_DIR', __DIR__ . '/uploads');
define('ALLOWED_EXTENSIONS', ['png', 'jpg', 'jpeg', 'pdf']);

if (isset($_FILES['picture'])) {
    $file = [
        'name'     => $_FILES['picture']['name'],
        'type'     => $_FILES['picture']['type'],
        'tmp_name' => $_FILES['picture']['tmp_name'],
        'error'    => $_FILES['picture']['error'],
        'size'     => $_FILES['picture']['size'],
    ];

    try {
        $fullPath = handleFileUpload($file);
        echo "<img src='$fullPath' style='max-width: 300px'>";
    } catch (Exception $e) {
        echo $e->getMessage() . "<br>\n";
    }
}

echo '<h2>' . $_POST['name'] . ' ' . $_POST['surname'] . '</h2>';
echo '<h3>' . $_POST['city'] . '</h3>';
echo '<ul>';
foreach ($_POST['language'] as $value) {
    echo '<li>' . $value . '</li>';
}
echo '</ul>';
