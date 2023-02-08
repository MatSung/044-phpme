<?php

//Parašyti PHP klasę, kuri parašytų “Sveiki, mano vardas yra {vardas}”, kur {vardas} būtų metodo argumento vertė klasės viduje

require_once(__DIR__ . '/classes/newClass.php');

$myClass = new newClass('Dzhonas');
$myClass->getName();
