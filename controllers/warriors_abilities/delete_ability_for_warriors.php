<?php

declare(strict_types=1);
include '../../data/database.php';

$db = new Database();
$id = $_GET['id'] ?? null;
$page = $_GET['page'] ?? 1;

if ($id) {
    $ability = $db->deleteAbility(intval($id));

    header("Location: ../controllers/warriors_abilities/details?id=$id&page=$page");
}
