<?php
// Sukurkite klasę Student, kuri paveldės User klasę ir įneš papildomas viešai neprienamas savybes: stipendija ir kursas bei jiems reikalingus metodus

class Student extends User
{
    private ?int $stipend = null;
    private ?string $course = null;

    function __construct(int $stipend = null, string $course = null)
    {
        $this->stipend = $stipend;
        $this->course = $course;
    }

    public function getStipend(): ?int
    {
        return $this->stipend;
    }
    public function getCourse(): ?string
    {
        return $this->course;
    }
}