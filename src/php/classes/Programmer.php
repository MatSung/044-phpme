<?php

class Programmer extends Person
{
    public function greetings(): string
    {
        return 'Hell world I am a programmer called ' . $this->name . '.';
    }
}