<?php

class FormAction
{
    public function __construct(string $action, string $method = "post")
    {
        $this->action = $action;
        $this->method = $method;
    }

    public string $action;
    public string $method;
}
