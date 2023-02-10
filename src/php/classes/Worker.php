<?php
class Worker extends User{
    private ?int $salary;
    function __construct(?string $name, ?int $age)
    {
        parent::__construct($name,$age);
    }
    public function getSalary(): ?int
    {
        return $this->salary;
    }
    public function setSalary(int $salary): void
    {
        $this->salary = $salary;
    }
}