<?php

namespace App;

use App\Traits\{echoLabel,submitMaker};

class FormBuilder
{

    use echoLabel, submitMaker;

    public function open(string $name, string $method): string
    {
        return '<form method="'. $method . '" action="' . $name . '">';
    }

    public function input(string $type, string $placeholder, string $value): string
    {
        return '<input type="' . $type. '" placeholder="' . $placeholder . '" value="' . $value . '">';
    }

    public function textarea(string $placeholder): string
    {
        return '<textarea placeholder="' .$placeholder. '"></textarea>';
    }

    public function password(string $placeholder): string
    {
        return '<input type=password placeholder="' . $placeholder . '">';
    }

    public function close(): string
    {
        return '</form>';
    }
    

}
