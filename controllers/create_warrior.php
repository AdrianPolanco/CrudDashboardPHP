<?php

declare(strict_types=1);

include '../helpers/Validator.php';
include '../data/Database.php';

$errors = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['warrior-name'] ?? '';
    $lastname = $_POST['warrior-lastname'] ?? '';
    $birthDate = $_POST['birth-date'] ?? '';

    $nameError = Validator::validateName($name, '/^[a-zA-Z\s]+$/', 1, 'Nombre');
    $lastnameError = Validator::validateName($lastname, '/^[a-zA-Z\s]+$/', 5, 'Apellido');
    $dateError = Validator::validateDate($birthDate);

    $errors = array_filter([$nameError, $lastnameError, $dateError]);

    if (empty($errors)) {
        $db = new Database();
        $success = $db->insertRecord($name, $lastname, $birthDate);

        if ($success) {
            $successMessage = "El guerrero Z se ha registrado correctamente.";
            // Refrescar la página para ver el nuevo registro
            echo '<script>
                setTimeout(function() {
                    location.reload();
                }, 2000); // 2000 milisegundos = 2 segundos
            </script>';
        } else {
            $errors[] = "Error al insertar el registro en la base de datos.";
        }
    }
}
