<?php

class FormTitle
{
    public function __construct(string $title, string $color)
    {
        $this->title = $title;
        $this->color = $color;
    }

    public string $title;
    public string $color;
}
