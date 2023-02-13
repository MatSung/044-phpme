<?php
class Boat extends Vehicle{
    public function getWheelsNumber(): string|int
    {
        return 'Are you serious?';
    }

    public function getType(): string
    {
        return 'Cruiser';
    }

    public function getFuelType(): array
    {
        return [2];
    }

}