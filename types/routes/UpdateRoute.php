<?php

class UpdateRoute
{
    function __construct(string $form, string $controller, string $queryParameter)
    {
        $this->form = $form;
        $this->controller = $controller;
        $this->queryParameter = $queryParameter;
    }

    public string $form;
    public string $controller;
    public string $queryParameter;
}
