<?php include "./components/header.php" ?>
<main class="container-fluid row p-3 main d-flex align-items-center">
    <?php
    include "./types/form/Form.php";
    include "./types/form/FormTitle.php";
    include "./types/form/FormAction.php";
    include "./types/form/FormInput.php";
    // Define los datos del formulario
    $formTitle = new FormTitle("Registrar nuevo guerrero Z", "warning");
    $formAction = new FormAction("controllers/warriors/create_warrior.php");
    $formFields = [
        new FormInput("Nombre", "warrior-name", "^[a-zA-Z\s]+$", "Adrian", 1),
        new FormInput("Apellido", "warrior-lastname", "^[a-zA-Z\s]+$", "Polanco", 2),
        new FormInput("Fecha de nacimiento", "birth-date", date("Y-m-d"), "Cumpleaños", 10, "date")
    ];
    $form = new Form($formTitle, $formAction, $formFields);
    $form->render();
    ?>
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
                                <a href="./controllers/warriors/get_warrior.php?id=<?= $row["id"] ?>" class="btn btn-small btn-warning"><i class="fa-regular fa-pen-to-square"></i></a>
                                <a href="./controllers/warriors/delete_warrior.php?id=<?= $row["id"] ?>" class="btn btn-small btn-danger"><i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            <?php endif; ?>

        </table>
        <nav aria-label="Warriors pagination">
            <ul class="pagination">
                <ul class="pagination">
                    <li class="page-item <?= $page <= 1 ? 'disabled' : '' ?>">
                        <a class="page-link" href="?page=<?= $page - 1 ?>" aria-label="Previous">
                            <span aria-hidden="true">«</span>
                        </a>
                    </li>
                    <?php
                    $startPage = max(1, $page - 2);
                    $endPage = min($totalPages, $startPage + 4);
                    $startPage = max(1, $endPage - 4);

                    for ($i = $startPage; $i <= $endPage; $i++) :
                    ?>
                        <li class="page-item <?= $page === $i ? 'active' : '' ?>">
                            <a class="page-link text-<?= $page === $i ? 'white' : 'warning' ?>" href="?page=<?= $i ?>"><?= $i ?></a>
                        </li>
                    <?php endfor; ?>
                    <li class="page-item <?= $page >= $totalPages ? 'disabled' : '' ?>">
                        <a class="page-link" href="?page=<?= $page + 1 ?>" aria-label="Next">
                            <span aria-hidden="true">»</span>
                        </a>
                    </li>
                </ul>
        </nav>
    </article>
</main>
<?php include "./components/footer.php" ?>
</body>

</html>