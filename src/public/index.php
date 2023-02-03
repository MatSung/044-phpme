<?php

define('ROOT_PATH', dirname(__DIR__));

$module = $_GET['page'] ?? 'index';

$modulePath = ROOT_PATH . '/html/stuffs.html';

if($module !== 'index'){
    if(substr($module, -3) === '.js'){
        header('Content-type: text/javascript');
        $modulePath = ROOT_PATH . '/js/'.$module;
    } else if(substr($module, -4) === '.png'){
        header('Content-type: image/png');
        $modulePath = ROOT_PATH.'/'.$module;
    }
    else {
        $modulePath = ROOT_PATH . '/php/'.$module.'.php';
    }
    
}


$module = $_GET['page'] ?? 'index';

if (is_file($modulePath)) {
	require_once $modulePath;
} else {
	http_response_code(404);
	echo 'Page not found';

	exit;
}