<?php include "./templates/header.php" ?>
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
        <?php


        include 'data/database.php';
        include 'types/table/Table.php';
        include 'types/routes/UpdateRoute.php';
        $db = new Database();
        $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
        ["data" => $data, "totalPages" => $totalPages] = $db->getWarriorsByPage(page: $page);

        $table = new Table(
            columns: ["id", "nombre", "apellido", "fecha_nacimiento"],
            data: $data,
            page: $page,
            totalPages: $totalPages,
            updateRoute: new UpdateRoute(
                "controllers/warriors/get_warrior.php",
                "controllers/warriors/update_warrior.php",
                "id"
            ),
            deleteRoute: "controllers/warriors/delete_warrior.php",
            deleteQueryParameter: "id"
        );

        $table->render();
        ?>

    </article>
</main>
<?php include "./templates/footer.php" ?>
</body>

</html>