<?php

class Table
{
    public array $columns;
    public array $data;
    public int $page;
    public int $totalPages;
    public ?UpdateRoute $updateRoute;
    public string $deleteRoute;
    public string $deleteQueryParameter;
    public string $color;
    public array $names;

    public function __construct(
        array $columns,
        array $data,
        int $page,
        int $totalPages,
        string $deleteRoute,
        string $deleteQueryParameter,
        string $color,
        array $names = [],
        ?UpdateRoute $updateRoute = null
    ) {
        $this->columns = $columns;
        $this->data = $data;
        $this->page = $page;
        $this->totalPages = $totalPages;
        $this->updateRoute = $updateRoute;
        $this->deleteRoute = $deleteRoute;
        $this->deleteQueryParameter = $deleteQueryParameter;
        $this->color = $color;
        $this->names = $names;
    }

    public function renderPagination(string $tableName, string $templatePaginationRoute = 'templates/PaginationTemplate.php')
    {
        $page = $this->page;
        $totalPages = $this->totalPages;
        $tableName = $tableName;
        $color = $this->color;
        include $templatePaginationRoute;
    }
    public function renderTable(string $templateTableRoute = 'templates/TableTemplate.php')
    {
        $columns = $this->columns;
        $data = $this->data;
        $updateRoute = $this->updateRoute;
        $deleteRoute = $this->deleteRoute;
        $deleteQueryParameter = $this->deleteQueryParameter;
        $page = $this->page;
        $color = $this->color;
        $names = $this->names;
        include $templateTableRoute;
    }
    public function render(string $templateTableRoute = 'templates/TableTemplate.php', string $templatePaginationRoute = 'templates/PaginationTemplate.php', string $tableName = "Warriors")
    {
        $this->renderTable($templateTableRoute);
        $this->renderPagination($tableName, $templatePaginationRoute);
    }
}
