<?php
$main = "../index.php";
$types = "./abilities_types.index.php";
$abilities = "./abilities.index.php";
$logo = "../assets/logo.png";
include "../templates/header.php";
?>
<main class="container-fluid row p-3 main d-flex align-items-center">
    <?php
    include "../types/form/Form.php";
    include "../types/form/FormTitle.php";
    include "../types/form/FormAction.php";
    include "../types/form/FormInput.php";
    include '../types/routes/UpdateRoute.php';
    include "../types/form/SelectOption.php";
    include '../data/database.php';

    $db = new Database();
    $formTitle = new FormTitle("Registrar nueva habilidad", "info");
    $formAction = new FormAction("../controllers/abilities/create_ability.php");
    $ability_types = $db->getAbilitiesTypes();
    $selectOptions = array_map(fn ($ability) => new SelectOption($ability["tipo_habilidad"], $ability["id"]), $ability_types);

    $formFields = [
        new FormInput("Nombre", "ability-name", "^[a-zA-Z\s]+$", "Habilidad", 1),
        new FormInput(
            "Tipo de habilidad",
            "ability-type",
            "",
            "Tipo de habilidad",
            0,
            "select",
            "ability-type",
            $selectOptions
        ),
        new FormInput("Nivel de Poder", "ability-power", "^(100|[1-9]?\d)$", "Un numero entre 0 y 100"),
    ];

    $form = new Form($formTitle, $formAction, $formFields);

    $form->render("../templates/FormTemplate.php"); ?>

    <article class="col-8 p-4 d-flex flex-column align-items-center">

        <?php
        include '../types/table/Table.php';

        $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
        ["data" => $data, "totalPages" => $totalPages] = $db->getAbilitiesByPage(page: $page);

        $table = new Table(
            columns: ["id", "nombre_habilidad", "tipo_habilidad", "nivel_poder"],
            data: $data,
            page: $page,
            totalPages: $totalPages,
            deleteRoute: "../controllers/abilities/delete_ability.php",
            deleteQueryParameter: "id",
            color: "info",
            names: ["id" => "Id", "nombre_habilidad" => "Nombre", "tipo_habilidad_id" => "Tipo de habilidad", "nivel_poder" => "Nivel de poder"],
            updateRoute: new UpdateRoute("../controllers/abilities/get_ability.php", "../controllers/abilities/update_ability.php", "id"),
        );

        $table->render("../templates/TableTemplate.php", "../templates/PaginationTemplate.php", "Abilities");
        ?>
    </article>