<?php

class Student extends User
{
    private ?string $course = null;
    private ?int $stipend = null;
    function __construct(string $name, int $age) {
        parent::__construct($name,$age);
    }
    public function setCourse(string $course): void
	{
		$this->course = $course;
	}
	public function getCourse(): ?string
	{
		return $this->course;
	}
	public function setStipend(int $stipend): void
	{
		$this->stipend = $stipend;
	}
	public function getStipend(): ?int
	{
		return $this->stipend;
	}
}