<?php

class Teacher extends Person
{
    public function greetings(): string
    {
        return 'sup children, i\'m yo teacher ' . $this->name . '.';
    }
}