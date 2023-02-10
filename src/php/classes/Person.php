<?php

abstract class Person{
    abstract function greetings();
    function __construct(
        public ?string $name = null
    ) {
        $this->name = $name;
    }
}
