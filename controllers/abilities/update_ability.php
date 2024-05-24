<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include '../../helpers/Validator.php';
    include '../../data/database.php';
    $id = $_POST['ability-id'] ?? '';
    $name = $_POST['ability-name'] ?? '';
    $abilityTypeId = $_POST['ability-type'] ?? '';
    $power = $_POST['ability-power'] ?? '';
    $page = $_POST['page'] ?? '';
    $nameError = Validator::validateName($name, '/^[a-zA-Z\s]+$/', 1, 'Nombre');
    $powerError = Validator::validatePower($power);


    $errors = array_filter([$nameError, $powerError]);

    if (empty($errors)) {
        $db = new Database();
        $success = $db->updateAbility(intval($id), $name, $abilityTypeId, intval($power));

        if ($success) {
            $successMessage = "La habilidad se ha actualizado correctamente.";
            header("Location: ../../views/abilities.index.php");
            exit();
        } else {
            $errors[] = "Error al actualizar la habilidad en la base de datos.";
        }
    }
}
