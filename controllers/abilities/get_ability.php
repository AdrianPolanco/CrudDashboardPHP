<?php

declare(strict_types=1);
include '../../data/database.php';

$db = new Database();
$id = $_GET['id'] ?? null;
$page = $_GET['page'] ?? 1;

if ($id) {
    $ability = $db->getAbilityById(intval($id));
    if ($ability) {
        $name = $ability['nombre_habilidad'];
        $abilityTypeId = $ability['tipo_habilidad_id'];
        $abilityTypeName = $ability['tipo_habilidad'];
        $power = $ability['nivel_poder'];
    }

    header("Location: ../../views/update_ability.php?id=$id&name=$name&abilityTypeId=$abilityTypeId&power=$power&abilityTypeName=$abilityTypeName&page=$page");
}
