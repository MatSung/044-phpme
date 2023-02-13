<?php
class Bmw extends Car{
    function __construct(private string $model, private int $year)
    {
        parent::__construct('Bmw', $model, $year);
    }
}