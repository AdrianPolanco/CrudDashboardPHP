<?php

declare(strict_types=1);
include '../data/database.php';

$db = new Database();
$id = $_GET['id'] ?? null;

if ($id) {
    $warrior = $db->deleteRecord(intval($id));

    header("Location: ../index.php");
}
