<?php
// Sukukite "ArrayHelper" klasę su 2 statiniais metodais, kurie galetų apskaičiuoti duoto masyvo sumą arba vidurkį. Panaudokite vieną statinį metodą kitame.

class ArrayHelper
{
    public static function getSum(array $arr): float
    {
        return array_sum($arr);
    }
    public static function getAvg(array $arr): float
    {
        return self::getSum($arr) / count($arr);
    }
}
