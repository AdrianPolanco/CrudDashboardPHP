<?php

declare(strict_types=1);

include '../../helpers/Validator.php';
include '../../data/database.php';

$errors = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['warrior-name'] ?? '';
    $lastname = $_POST['warrior-lastname'] ?? '';
    $birthDate = $_POST['birth-date'] ?? '';

    $nameError = Validator::validateName($name, '/^[a-zA-Z\s]+$/', 1, 'Nombre');
    $lastnameError = Validator::validateName($lastname, '/^[a-zA-Z\s]+$/', 3, 'Apellido');
    $dateError = Validator::validateDate($birthDate);

    $errors = array_filter([$nameError, $lastnameError, $dateError]);

    if (empty($errors)) {
        $db = new Database();
        $success = $db->insertWarrior($name, $lastname, $birthDate);

        if ($success) {
            $successMessage = "El guerrero Z se ha registrado correctamente.";
            $lastPage = ceil($db->countWarriors() / 10);
            // Refrescar la página para ver el nuevo registro
            header("Location: ../../index.php?page=$lastPage");
            exit();
        } else {
            $errors[] = "Error al insertar el registro en la base de datos.";
        }
    }
}
