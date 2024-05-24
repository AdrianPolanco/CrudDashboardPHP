<?php

class SelectOption
{
    public function __construct(string $optionName, string $optionValue)
    {
        $this->optionName = $optionName;
        $this->optionValue = $optionValue;
    }

    public string $optionName;
    public string $optionValue;
}
