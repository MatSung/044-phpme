<?php

require_once(__DIR__ . '/classes/Person.php');

require_once(__DIR__ . '/classes/Programmer.php');
require_once(__DIR__ . '/classes/Teacher.php');
require_once(__DIR__ . '/classes/Student.php');

$persons = [
    new Programmer('Dzhonas'),
    new Student('Ponas'),
    new Teacher('Tavo')
];

foreach ($persons as $person) {
    echo $person->greetings() . '<br>';
}
