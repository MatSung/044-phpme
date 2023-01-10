<?php

// Sukurkite "a", "b", "c" masyvą. Išveskite masyvo reikšmę naudodami funkciją var_dump().
	
// Naudodamiesi $arr masyvu iš ankstesnės užduoties, išveskite pirmo, antro ir trečio elementų turinį.
	
// Sukurkite masyvą $arr = ['a', 'b', 'c', 'd'] ir panaudoja jį išveskite eilutė 'a + b, c + d'.
	
// Sukurkite $arr masyvą su elementais 2, 5, 3, 9. Padauginkite pirmąjį masyvo elementą iš antrojo, o trečiąjį elementą iš ketvirtojo. Sudėkite rezultatus ir priskirkite kintamajam $result. Išveskite šio kintamojo reikšmę.
	
// Užpildykite $arr masyvą skaičiais nuo 1 iki 5. Nedeklaruokite masyvo elementų, o tiesiog užpildykite jį $arr[] = nauja reikšme.

$arr = ["a", "b", "c"];
var_dump($arr);

echo '<br>';

echo $arr[0] . ' ' . $arr[1] . ' ' . $arr[2];

echo '<br>';

$arr2 = ['a', 'b', 'c', 'd'];

echo $arr2[0] . ' + ' . $arr2[1]. ', ' . $arr2[2] . ' + ' . $arr2[3];

echo '<br>';

$arr3 = [2, 5, 3, 9];

$result = ($arr3[0] * $arr3[1]) + ($arr3[2] * $arr3[3]);

echo $result;

echo '<br>';

$arr4 = [];

for ($i=1; $i <= 5; $i++) { 
    $arr4[$i] = $i;
}

var_dump($arr4);