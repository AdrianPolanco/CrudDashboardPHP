<?php
$main = "../index.php";
$types = "./abilities_types.index.php";
$abilities = "./abilities.index.php";
$logo = "../assets/logo.png";
$dashboard = "./dashboard.php";
$warriorsPage = "./warrior_ability.index.php";
include "../templates/header.php";
?>
<main class="container-fluid row p-3 main d-flex align-items-center justify-content-center">
    <?php
    include "../types/form/Form.php";
    include "../types/form/FormTitle.php";
    include "../types/form/FormAction.php";
    include "../types/form/FormInput.php";
    include '../types/routes/UpdateRoute.php';
    include "../types/form/SelectOption.php";
    include '../data/database.php';

    $db = new Database();
    $formTitle = new FormTitle("Registrar nueva habilidad a guerrero", "danger");
    $formAction = new FormAction("../controllers/warriors_abilities/create_ability_for_warrior.php");
    $abilitiesForWarrior = $db->getAbilities();
    $selectOptionsAbilities = array_map(fn ($ability) => new SelectOption($ability["nombre_habilidad"], $ability["id"]), $abilitiesForWarrior);
    $selectOptionsWarriors = array_map(fn ($warrior) => new SelectOption($warrior["nombre"] . " " . $warrior["apellido"], $warrior["id"]), $db->getWarriors());

    $formFields = [
        new FormInput(
            "Guerrero",
            "warrior",
            "",
            "Goku",
            0,
            "select",
            "warrior",
            $selectOptionsWarriors
        ),
        new FormInput(
            "Habilidad",
            "ability",
            "",
            "Kaioken",
            0,
            "select",
            "ability",
            $selectOptionsAbilities
        )
    ];

    $form = new Form($formTitle, $formAction, $formFields, false);

    $form->render("../templates/FormTemplate.php"); ?>
</main>