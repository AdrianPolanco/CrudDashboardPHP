<?php

class FormInput
{
    public function __construct(
        string $name,
        string $inputName,
        string $pattern,
        string $placeholder,
        int $minLength = 0,
        string $type = "text",
        string $selectName = "",
        array $options = []
    ) {
        $this->name = $name;
        $this->inputName = $inputName;
        $this->pattern = $pattern;
        $this->placeholder = $placeholder;
        $this->minLength = $minLength;
        $this->type = $type;
        $this->selectName = $selectName;
        $this->options = $options;
    }

    public string $name;
    public string $inputName;
    public string $pattern;
    public string $placeholder;
    public int $minLength;
    public string $type;
    public string $selectName;
    public array $options;
}
