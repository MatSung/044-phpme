<?php

class Tag
{
    private array $attributes = [];
    private string $innerText;
    function __construct(private string $element)
    {
    }

    public function setText($text): self
    {
        $this->innerText = $text;
        return $this;
    }

    public function setAttr($attr, $value): self
    {
        $this->attributes[$attr] =  $value;
        return $this;
    }

    public function get(): string
    {
        $result = '<' . $this->element;
        foreach ($this->attributes as $key => $value) {
            $result .= ' ' . $key . '="' . $value . '"';
        }
        $result .= '>';
        $result .= $this->innerText;
        $result .= '</' . $this->element . '>';
        return $result;
    }

    public function show(): void
    {
        echo $this->get();
    }
}
