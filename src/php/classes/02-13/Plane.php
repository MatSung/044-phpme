<?php
class Plane extends Vehicle{
    function __construct(
        private string $make,
        private string $model,
        private int $year,
        private int $wheels
    )
    {
        parent::__construct($make, $model, $year);
        $this->wheels = $wheels;
    }

    public function getFuelType(): array
    {
        return [5];
    }
}