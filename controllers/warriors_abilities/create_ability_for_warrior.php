<?php

declare(strict_types=1);

include '../../data/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $warriorId = $_POST['warrior'] ?? '';
    $abilityId = $_POST['ability'] ?? '';


    $db = new Database();
    $success = $db->addAbilityToWarrior(intval($warriorId), intval($abilityId));

    if ($success) {
        $successMessage = "La habilidad se ha registrado correctamente.";
        // Refrescar la página para ver el nuevo registro
        header("Location: ../../index.php");
        exit();
    } else {
        $errors[] = "Error al insertar el registro en la base de datos.";
    }
}
