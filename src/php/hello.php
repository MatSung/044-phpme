<?php

require_once(__DIR__ . '/classes/User.php');
require_once(__DIR__ . '/classes/Worker.php');
require_once(__DIR__ . '/classes/Driver.php');
require_once(__DIR__ . '/classes/Student.php');


$driver =  new Driver('Dzhonas', 23);
$student = new Student('Ponas', 42);

var_dump($driver, $student);