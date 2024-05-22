<?php

declare(strict_types=1);

include '../../helpers/Validator.php';
include '../../data/Database.php';

$errors = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'] ?? '';
    $name = $_POST['warrior-name'] ?? '';
    $lastname = $_POST['warrior-lastname'] ?? '';
    $birthDate = $_POST['birth-date'] ?? '';

    $nameError = Validator::validateName($name, '/^[a-zA-Z\s]+$/', 1, 'Nombre');
    $lastnameError = Validator::validateName($lastname, '/^[a-zA-Z\s]+$/', 3, 'Apellido');
    $dateError = Validator::validateDate($birthDate);

    $errors = array_filter([$nameError, $lastnameError, $dateError]);

    if (empty($errors)) {
        $db = new Database();
        $success = $db->updateWarrior(intval($id), $name, $lastname, $birthDate);

        if ($success) {
            $successMessage = "El guerrero Z se ha actualizado correctamente.";
            // Refrescar la página para ver el nuevo registro
            header("Location: ../../index.php");
            exit();
        } else {
            $errors[] = "Error al actualizar el registro en la base de datos.";
        }
    }
}
