<?php

declare(strict_types=1);
$id = $_GET['id'] ?? null;
$name = $_GET['name'] ?? '';
$abilityTypeId = $_GET['abilityTypeId'] ?? '';
$power = $_GET['power'] ?? '';
$abilityTypeName = $_GET['abilityTypeName'] ?? '';
$page = $_GET['page'] ?? '';

if ($id & $name & $abilityTypeId & $power & $abilityTypeName) {
    $ability = [
        'id' => $id,
        'nombre_habilidad' => $name,
        'tipo_habilidad_id' => $abilityTypeId,
        'tipo_habilidad' => $abilityTypeName,
        'nivel_poder' => $power,
        'page' => $page
    ];
}
?>

<?php

$main = "../index.php";
$types = "./abilities_types.index.php";
$logo = "../assets/logo.png";
$abilities = "./abilities.index.php";
$dashboard = "./dashboard.php";
$warriorsPage = "./warrior_ability.index.php";
include "../templates/header.php";
?>

<body>
    <main class="row justify-content-center align-items-center h-full" style="min-height: 83vh;">
        <?php
        include "../types/form/Form.php";
        include "../types/form/FormTitle.php";
        include "../types/form/FormAction.php";
        include "../types/form/FormInput.php";
        include '../types/routes/UpdateRoute.php';
        include "../types/form/SelectOption.php";
        include '../data/database.php';

        $db = new Database();
        $formTitle = new FormTitle("Actualizar habilidad", "info");
        $formAction = new FormAction("../controllers/abilities/update_ability.php");
        $ability_types = $db->getAbilitiesTypes();
        $selectOptions = array_map(fn ($ability) => new SelectOption($ability["tipo_habilidad"], strval($ability["id"])), $ability_types);

        $formFields = [
            new FormInput(name: "Id", inputName: "ability-id", pattern: "", placeholder: "", minLength: 1, type: "hidden", value: $ability['id']),
            new FormInput(name: "Nombre", inputName: "ability-name", pattern: "^[a-zA-Z\s]+$", placeholder: "Habilidad", minLength: 1, type: "text", value: $ability['nombre_habilidad']),
            new FormInput(
                "Tipo de habilidad",
                "ability-type",
                "",
                "Tipo de habilidad",
                0,
                "select",
                "ability-type",
                $selectOptions,
                $ability['tipo_habilidad_id']
            ),
            new FormInput(name: "Nivel de Poder", inputName: "ability-power", pattern: "^(100|[1-9]?\d)$", placeholder: "Un numero entre 0 y 100", minLength: 1, type: "text", value: explode(".", $ability['nivel_poder'])[0]),
            new FormInput(name: "Page", inputName: "ability-page", pattern: "", placeholder: "", minLength: 1, type: "hidden", value: $ability['page'])
        ];

        $form = new Form($formTitle, $formAction, $formFields);

        $form->render("../templates/FormTemplate.php");
        ?>
    </main>
    <?php include "../templates/footer.php"; ?>
</body>