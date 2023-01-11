<?php

// Sukurkite dvimatį masyvą. Pirmieji du raktai yra lt ir en.

// Raktai turi savaitės dienų vardų masyvus lietuviškai ir angliškai.

// Naudodamiesi šiuo masyvu, pirmadienį parodykite lietuvių kalba, o trečiadienį - anglų kalba.

// Sukurkite kintamuosius lang (reikšmės lt arba en) ir parodykite dieną

$arr = [

    'lt' => [
        'Pirmadienis',
        'Antradienis',
        'Trečiadienis',
        'Ketvirtadienis',
        'Penktadienis',
        'Šeštadienis',
        'Sekmadienis'
    ],
    'en' => [
        'Monday',
        'Tuesday',
        'Wednesday',
        'Thursday',
        'Friday',
        'Saturday',
        'Sunday'
    ]
];

echo $arr['lt'][0];
echo '<br>';
echo $arr['en'][2];
echo '<br><br>';

$lang = 'lt';

echo $arr[$lang][date('N')-1];