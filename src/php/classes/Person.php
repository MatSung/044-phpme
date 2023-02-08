<?php

class Person{
    function __construct(
        public ?string $name = null,
        public ?string $surname = null,
        public ?int $age = null
    ) {
    }

    public function getDetails(): array
    {
        return [
            'name' => $this->name,
            'surname' => $this->surname,
            'age' => $this->age
        ];
    }
}
