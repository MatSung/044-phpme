<?php
class User{
	function __construct(
        private ?string $name = null,
		private ?int $age = null
    ) {
    }

	public function setName(string $name): void
	{
		$this->name = $name;
	}
	public function getName(): ?string
	{
		return $this->name;
	}
	public function setAge(int $age): void
	{
		$this->age = $age;
	}
	public function getAge(): ?int
	{
		return $this->age;
	}
}