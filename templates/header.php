<?php

declare(strict_types=1);
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de gestion de guerreros Z</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/a177f3304c.js" crossorigin="anonymous"></script>

    <style>
        #submitBtn:disabled {
            opacity: 0.5;
            cursor: not-allowed;
            background-color: #ccc;
            color: #666;
        }

        .main {
            min-height: 750px;
        }

        .btn-outline-warning.enabled {
            font-weight: bold;
        }

        .page-item.warning.active .page-link {
            background-color: #ffc107;
            color: #fff;
            border-color: #ffc107;
        }

        .page-item.success.active .page-link {
            background-color: #2E9C49;
            color: #fff;
            border-color: #2E9C49;
        }

        .page-item.info.active .page-link {
            background-color: #73FFF5;
            color: #fff;
            border-color: #73FFF5;
        }

        .page-item .page-link {
            background-color: #fff;
            color: #ffc107;
        }

        .page-item.disabled .page-link {
            background-color: #F1EAE8;
            color: #D3CFCE;
        }

        .logo {
            width: 40px;
            height: 40px;
        }

        footer {
            background-color: #f4f4f4;
            text-align: center;
            padding: 10px 0;
            position: relative;
            bottom: 0;
            width: 100%;
            display: flex;
            flex-direction: column;
            min-height: 100%;
            flex-grow: 1;
        }

        .image {
            width: 100%;
        }
    </style>
    </style>
</head>

<body>
    <header class="navbar navbar-expand-lg p-3 bg-warning">
        <div class="container-fluid" class="logo">
            <div class="logo">
                <a class="navbar-brand" href="/index.php"><img src="<?= $logo ?>" class="image" /></a>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active text-white" aria-current="page" href="<?= $main ?>"><strong>Registrar nuevo guerrero</strong></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="<?= $abilities ?>"><strong>Habilidades</strong></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="<?= $types ?>"><strong>Tipos</strong></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="<?= $warriorsPage ?>"><strong>Guerreros Z</strong></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="<?= $dashboard ?>"><strong>Dashboard</strong></a>
                    </li>
                </ul>
            </div>
        </div>
    </header>