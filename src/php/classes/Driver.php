<?php
class Driver extends Worker
{
    public ?int $experience;
    public ?string $category;
    function __construct(?string $name, ?int $age)
    {
        parent::__construct($name, $age);
    }
}
