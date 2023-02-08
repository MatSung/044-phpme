<?php

require_once(__DIR__ . '/classes/Person.php');

$persons = [
    new Person('Dzhonas', 'Vickas', 45),
    new Person('Ponas', 'makaronas', 19),
    new Person('Tavo', 'Tevai', 100)
];

foreach ($persons as $person) {
    $details = $person->getDetails();
    echo $details['name'] . ' ' . $details['surname'] . ' ' . $details['age'] . '<br>';
}
