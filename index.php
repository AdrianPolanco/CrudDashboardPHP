<?php

declare(strict_types=1); ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de gestion de guerreros Z</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/a177f3304c.js" crossorigin="anonymous"></script>
    <style>
        .btn-outline-warning:disabled {
            opacity: 0.5;
            cursor: not-allowed;
            background-color: #ccc;
            color: #666;
        }

        .btn-outline-warning.enabled {
            font-weight: bold;
        }

        .page-item.active .page-link {
            background-color: #ffc107;
            color: #fff;
            border-color: #ffc107;
        }

        .page-item .page-link {
            background-color: #fff;
            color: #ffc107;
        }

        .page-item.disabled .page-link {
            background-color: #F1EAE8;
            color: #D3CFCE;
        }
    </style>
    </style>
</head>

<body>
    <h1 class="text-center p-3">Hola Mundo</h1>
    <main class="container-fluid row">
        <form class="col-4 needs-validation" method="post" action="controllers/create_warrior.php" novalidate>
            <h3 class="text-warning text-center">Registrar nuevo guerrero Z</h3>
            <div class="mb-3">
                <label for="warrior-name" class="form-label">Nombre: </label>
                <input type="text" class="form-control" name="warrior-name" required pattern="^[a-zA-Z\s]+$" minlength="1">
                <div class="invalid-feedback">
                    El nombre solo puede contener letras y espacios, y debe tener al menos 1 carácter.
                </div>
            </div>
            <div class="mb-3">
                <label for="warrior-lastname" class="form-label">Apellido: </label>
                <input type="text" class="form-control" name="warrior-lastname" required pattern="^[a-zA-Z\s]+$" minlength="5">
                <div class="invalid-feedback">
                    El apellido solo puede contener letras y espacios, y debe tener al menos 5 caracteres.
                </div>
            </div>
            <div class="mb-3">
                <label for="datePicker" class="form-label">Fecha de nacimiento</label>
                <input type="date" class="form-control" id="datePicker" name="birth-date" required max="<?php echo date('Y-m-d'); ?>">
                <div class="invalid-feedback">
                    La fecha de nacimiento es obligatoria y no puede estar en el futuro.
                </div>
            </div>
            <button type="submit" class="btn btn-outline-warning enabled" id="submitBtn" disabled>Registrar</button>
        </form>
        <article class="col-8 p-4 d-flex flex-column align-items-center">
            <table class="table">
                <thead class="table-warning">
                    <th scope="col">Id</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Fecha de nacimiento</th>
                    <th scope="col">Acciones</th>
                </thead>
                <?php


                include 'data/database.php';
                $db = new Database();
                $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
                ["data" => $data, "totalPages" => $totalPages] = $db->getRecordsByPage(page: $page);
                ?>
                <?php if (!$data) : ?>
                    <tbody>
                        <tr class="text-center">
                            <td colspan="5">No hay guerreros registrados</td>
                        </tr>
                    </tbody>
                <?php else : ?>
                    <tbody>
                        <?php foreach ($data as $row) : ?>
                            <tr>
                                <th scope="row"><?= $row["id"] ?></th>
                                <td><?= $row["nombre"] ?></td>
                                <td><?= $row["apellido"] ?></td>
                                <td><?= $row["fecha_nacimiento"] ?></td>
                                <td>
                                    <a href="./controllers/get_warrior.php?id=<?= $row["id"] ?>" class="btn btn-small btn-warning"><i class="fa-regular fa-pen-to-square"></i></a>
                                    <a href="./controllers/delete_warrior.php?id=<?= $row["id"] ?>" class="btn btn-small btn-danger"><i class="fa-solid fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                <?php endif; ?>

            </table>
            <nav aria-label="Warriors pagination">
                <ul class="pagination">
                    <ul class="pagination">
                        <li class="page-item <?= $page <= 5 ? 'disabled' : '' ?>">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">«</span>
                            </a>
                        </li>
                        <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
                            <li class="page-item <?= $page === $i ? 'active' : '' ?>">
                                <a class="page-link text-<?= $page === $i ? 'white' : 'warning' ?>" href="?page=<?= $i ?>"><?= $i ?>
                                </a>
                            </li>
                        <?php endfor ?>
                        <li class="page-item <?= $page >= $totalPages - 5 ? 'disabled' : '' ?>">
                            <a class="page-link" href="?page=<?= $page + 1 ?>" aria-label="Next">
                                <span aria-hidden="true">»</span>
                            </a>
                        </li>
                    </ul>
            </nav>
        </article>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        (function() {
            'use strict';

            const form = document.querySelector('.needs-validation');
            const submitBtn = document.getElementById('submitBtn');

            function validateForm() {
                if (form.checkValidity() === false) {
                    submitBtn.disabled = true;
                    submitBtn.classList.remove('enabled');
                } else {
                    submitBtn.disabled = false;
                    submitBtn.classList.add('enabled');
                }
            }

            form.addEventListener('input', validateForm, false);
            form.addEventListener('submit', function(event) {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        })();
    </script>
</body>

</html>