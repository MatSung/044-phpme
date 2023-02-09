<?php
require_once 'classes/User.php';
require_once 'classes/Student.php';
$student = new Student(100, "kursas");
var_dump($student);