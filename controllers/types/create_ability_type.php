<?php

declare(strict_types=1);

include '../../helpers/Validator.php';
include '../../data/database.php';

$errors = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['type-name'] ?? '';
    $nameError = Validator::validateName($name, '/^[a-zA-Z\s]+$/', 1, 'Tipo de habilidad');

    $errors = array_filter([$nameError]);

    if (empty($errors)) {
        $db = new Database();
        $success = $db->insertAbilityType($name);

        if ($success) {
            $successMessage = "El tipo de habilidad se ha registrado correctamente.";
            $lastPage = ceil($db->countAbilityTypes() / 10);
            // Refrescar la página para ver el nuevo registro
            header("Location: ../../views/abilities_types.index.php?page=$lastPage");
            exit();
        } else {
            $errors[] = "Error al insertar el registro en la base de datos.";
        }
    }
}
