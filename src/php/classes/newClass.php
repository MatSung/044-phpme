<?php

class newClass
{
    function __construct(
        public ?string $name = null
    ) {
    }

    public function getName(): void
    {
        echo "Sveiki, mano vardas yra $this->name";
    }
}
