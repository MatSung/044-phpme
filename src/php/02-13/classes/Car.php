<?php
class Car extends Vehicle
{
    function __construct(
        private string $make,
        private string $model,
        private int $year
    ) {
        parent::__construct($make, $model, $year);

        $this->wheels = 4;
    }

    public function getFuelType(): array
    {
        return [1, 2];
    }
}
