<?php

namespace App\Traits;

trait submitMaker
{
    public function submit(string $text): string
    {
        return '<button>'.$text.'</button>';
    }
}
