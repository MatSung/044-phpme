<?php

class Student extends Person
{
    public function greetings(): string
    {
        return 'hello, i am just a student named ' . $this->name . '.';
    }
}