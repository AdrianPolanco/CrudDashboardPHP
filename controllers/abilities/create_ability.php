<?php

declare(strict_types=1);

include '../../helpers/Validator.php';
include '../../data/database.php';

$errors = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['ability-name'] ?? '';
    $type = $_POST['ability-type'] ?? '';
    $power = $_POST['ability-power'] ?? '';

    $nameError = Validator::validateName($name, '/^[a-zA-Z\s]+$/', 1, 'Nombre');
    $powerError = Validator::validatePower($power);

    $errors = array_filter([$nameError, $powerError]);

    if (empty($errors)) {
        $db = new Database();
        $success = $db->insertAbility($name, $type, intval($power));

        if ($success) {
            $successMessage = "La habilidad se ha registrado correctamente.";
            $lastPage = ceil($db->countAbilities() / 10);
            // Refrescar la página para ver el nuevo registro
            header("Location: ../../views/abilities.index.php?page=$lastPage");
            exit();
        } else {
            $errors[] = "Error al insertar el registro en la base de datos.";
        }
    }
}
