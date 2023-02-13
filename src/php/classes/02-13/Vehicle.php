<?php
class Vehicle{
    protected ?int $wheels;
    function __construct(
        private ?string $make,
        private ?string $model,
        private ?int $year
    ){

    }

    public function setWheelsNumber($wheels): void
    {
        $this->wheels = $wheels;
    }

    public function getIntroduction(): ?string
    {
        return $this->make . ' ' . $this->model;
    }

    public function getAge(): int
    {
        return intval(date('Y')) - $this->year;
    }

    public function getAgeText(): string
    {
        if ($this->getAge() <= 10){
            return '10 years or newer';
        }else{
            return '11 years or older';
        }
    }

    public function getWheelsNumber(): int|string 
    {
        return isset($this->wheels) ? $this->wheels : 0; 
    }

    public function getWheelsNumberText(): string
    {
        return get_class($this) .' has ' . $this->getWheelsNumber() . ' wheels';
    }

    public function getFuelType() {
        throw new Exception('Fuel type not found');
    }
}