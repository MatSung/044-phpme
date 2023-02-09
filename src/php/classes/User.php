<?php
class User{
    public ?string $name = NULL;
	public static ?int $age = NULL;
	public const PROFESSION = 'DEV';

	public function setName(string $name): void
	{
		$this->name = $name;
	}

	public static function setAge(int $age): void
	{
		self::$age = $age;
	}

	public function getGreetings(): string
	{
		return sprintf("Hello, My name is %s. I'm %d yeas old.", $this->name, self::$age);
	}
}