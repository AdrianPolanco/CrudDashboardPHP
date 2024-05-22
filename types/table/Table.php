<?php

class Table
{
    public array $columns;
    public array $data;
    public int $page;
    public int $totalPages;
    public UpdateRoute $updateRoute;
    public string $deleteRoute;
    public string $deleteQueryParameter;

    public function __construct(
        array $columns,
        array $data,
        int $page,
        int $totalPages,
        UpdateRoute $updateRoute,
        string $deleteRoute,
        string $deleteQueryParameter
    ) {
        $this->columns = $columns;
        $this->data = $data;
        $this->page = $page;
        $this->totalPages = $totalPages;
        $this->updateRoute = $updateRoute;
        $this->deleteRoute = $deleteRoute;
        $this->deleteQueryParameter = $deleteQueryParameter;
    }

    public function renderPagination(string $tableName, string $templatePaginationRoute = 'templates/PaginationTemplate.php')
    {
        $page = $this->page;
        $totalPages = $this->totalPages;
        $tableName = $tableName;
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
        include $templateTableRoute;
    }
    public function render(string $templateTableRoute = 'templates/TableTemplate.php', string $templatePaginationRoute = 'templates/PaginationTemplate.php', string $tableName = "Warriors")
    {
        $this->renderTable($templateTableRoute);
        $this->renderPagination($tableName, $templatePaginationRoute);
    }
}