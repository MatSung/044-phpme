<?php

require_once(__DIR__ . '/classes/User.php');
require_once(__DIR__ . '/classes/Worker.php');
require_once(__DIR__ . '/classes/Driver.php');
require_once(__DIR__ . '/classes/Student.php');


$driver =  new Driver('Dzigitas', 23);
$student = new Student('Bambalijonas', 42);
$driver->setSalary(23);
$student->setCourse('Kebabo kursai');
$student->setStipend(30);

var_dump($driver, $student);