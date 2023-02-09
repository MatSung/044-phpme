<?php
require_once 'classes/ArrayHelper.php';

$arr1 = [1, 2, 3, 4, 5];
$arr2 = [2, 2, 2, 2];

var_dump(ArrayHelper::getSum($arr1),ArrayHelper::getSum($arr2));
var_dump(ArrayHelper::getAvg($arr1),ArrayHelper::getAvg($arr2));