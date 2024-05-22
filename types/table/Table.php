<?php

class Table
{
    public array $columns;
    public array $data;
    public int $page;
    public int $totalPages;
    public string $updateRoute;
    public string $deleteRoute;
    public string $updateQueryParameter;
    public string $deleteQueryParameter;

    public function __construct(
        array $columns,
        array $data,
        int $page,
        int $totalPages,
        string $updateRoute,
        string $updateQueryParameter,
        string $deleteRoute,
        string $deleteQueryParameter
    ) {
        $this->columns = $columns;
        $this->data = $data;
        $this->page = $page;
        $this->totalPages = $totalPages;
        $this->updateRoute = $updateRoute;
        $this->deleteRoute = $deleteRoute;
        $this->updateQueryParameter = $updateQueryParameter;
        $this->deleteQueryParameter = $deleteQueryParameter;
    }

    public function renderPagination(string $templatePaginationRoute = 'templates/PaginationTemplate.php')
    {
        $columns = $this->columns;
        $data = $this->data;
        $page = $this->page;
        $totalPages = $this->totalPages;
        include $templatePaginationRoute;
    }
    public function renderTable(string $templateTableRoute = 'templates/TableTemplate.php')
    {
        $columns = $this->columns;
        $data = $this->data;
        $deleteRoute = $this->deleteRoute;
        $updateRoute = $this->updateRoute;
        $deleteQueryParameter = $this->deleteQueryParameter;
        $updateQueryParameter = $this->updateQueryParameter;
        $page = $this->page;
        include $templateTableRoute;
    }
    public function render(string $templateTableRoute = 'templates/TableTemplate.php', string $templatePaginationRoute = 'templates/PaginationTemplate.php')
    {
        $this->renderTable($templateTableRoute);
        //$this->renderPagination($templatePaginationRoute);
    }
}
