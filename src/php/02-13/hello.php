<?php
require_once 'classes/Vehicle.php';
require_once 'classes/Car.php';
require_once 'classes/Bmw.php';
require_once 'classes/Boat.php';
require_once 'classes/Bus.php';
require_once 'classes/Motorcycle.php';
require_once 'classes/Plane.php';

$car = new Car('Volkswagerino', 'golferino', 2009);
$bmw = new Bmw('emtrys', 1999);
$bus = new Bus('antras g', 'naujas', 2018, 8);

var_dump($car);
var_dump($bmw);
var_dump($bus);