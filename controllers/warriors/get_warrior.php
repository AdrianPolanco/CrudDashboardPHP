<?php

declare(strict_types=1);
include '../../data/database.php';

$db = new Database();
$id = $_GET['id'] ?? null;

if ($id) {
    $warrior = $db->getWarriorById(intval($id));
    if ($warrior) {
        $name = $warrior['nombre'];
        $lastname = $warrior['apellido'];
        $birthDate = $warrior['fecha_nacimiento'];
    }

    header("Location: ../../views/update_warrior.php?id=$id&name=$name&lastname=$lastname&birthDate=$birthDate");
}
