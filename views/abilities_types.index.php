<?php include "../templates/header.php" ?>
<main class="container-fluid row p-3 main d-flex align-items-center">
    <?php
    include "../types/form/Form.php";
    include "../types/form/FormTitle.php";
    include "../types/form/FormAction.php";
    include "../types/form/FormInput.php";

    $formTitle = new FormTitle("Registrar nuevo tipo de habilidad", "success");
    $formAction = new FormAction("controllers/types/create_ability_type.php");
    $formFields = [
        new FormInput("Nombre", "type-name", "^[a-zA-Z\s]+$", "Tipo de habilidad", 1)
    ];
    $form = new Form($formTitle, $formAction, $formFields);

    $form->render(); ?>
</main>


<?php include "../templates/footer.php" ?>