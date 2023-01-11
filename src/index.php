<?php




// Parašykite funkciją, kuri grąžina skaičiaus kvadratą. Skaičius perduodamas kaip parametras.
	
// Parašykite funkciją, kuri grąžina dviejų skaičių sumą. Skaičiai perduodami funkcijos parametrus.
	
// Parašykite funkciją, kuri iš antro parametro atima pirmą ir padalija iš trečio.
	
// Parašykite funkciją, kuri priima kaip parametrą skaičių nuo 1 iki 7, o grąžina savaitės dieną lietuvių kalba.

function sqr($number){
    return pow($number,2);
}

echo sqr(2);

echo '<br>';

function sum($number, $number2){
    return $number + $number2;
}

echo sum(1,2);


echo '<br>';

function someMath($number1, $number2, $number3){
    return ($number2 - $number1) / $number3;
}

echo someMath(4,5,1);

function dayOfTheWeek($number){
    $arr = [
        'Pirmadienis',
        'Antradienis',
        'Trečiadienis',
        'Ketvirtadienis',
        'Penktadienis',
        'Šeštadienis',
        'Sekmadienis'
    ];
    return $arr[$number-1];
}


echo '<br>';

echo dayOfTheWeek(1);