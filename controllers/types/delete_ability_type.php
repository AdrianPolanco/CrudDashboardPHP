<?php

declare(strict_types=1);
include '../../data/database.php';

$db = new Database();
$id = $_GET['id'] ?? null;
$page = $_GET['page'] ?? 1;

if ($id) {
    $warrior = $db->deleteAbilityType(intval($id));

    header("Location: ../../views/abilities_types.index.php?page=$page");
}
