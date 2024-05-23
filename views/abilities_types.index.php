<?php
$main = "../index.php";
$types = "abilities_types.index.php";
$logo = "../assets/logo.png";
include "../templates/header.php" ?>
<main class="container-fluid row p-3 main d-flex align-items-center">
    <?php
    include "../types/form/Form.php";
    include "../types/form/FormTitle.php";
    include "../types/form/FormAction.php";
    include "../types/form/FormInput.php";

    $formTitle = new FormTitle("Registrar nuevo tipo de habilidad", "success");
    $formAction = new FormAction("../controllers/types/create_ability_type.php");
    $formFields = [
        new FormInput("Nombre", "type-name", "^[a-zA-Z\s]+$", "Tipo de habilidad", 1)
    ];
    $form = new Form($formTitle, $formAction, $formFields);

    $form->render("../templates/FormTemplate.php"); ?>

    <article class="col-8 p-4 d-flex flex-column align-items-center">

        <?php
        include '../data/database.php';
        include '../types/table/Table.php';

        $db = new Database();
        $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
        ["data" => $data, "totalPages" => $totalPages] = $db->getAbilityTypesByPage(page: $page);

        $table = new Table(
            columns: ["id", "tipo_habilidad"],
            data: $data,
            page: $page,
            totalPages: $totalPages,
            deleteRoute: "../controllers/types/delete_ability_type.php",
            deleteQueryParameter: "id",
            color: "success"
        );

        $table->render("../templates/TableTemplate.php", "../templates/PaginationTemplate.php", "Ability types");
        ?>
    </article>
</main>


<?php include "../templates/footer.php" ?>