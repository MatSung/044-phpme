<?php
namespace App\Traits;

trait echoLabel{
    public function label(string $id, string $text){
        return '<label for="' . $id . '>' . $text . '</label>';
    }
}