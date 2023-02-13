<?php
class Bus extends Vehicle{
    function __construct(
        private string $make,
        private string $model,
        private int $year,
        protected ?int $wheels
    )
    {
        parent::__construct($make, $model, $year);
        $this->wheels = $wheels;
    }

    public function getFuelType(): array
    {
        return [2, 3];
    }
}