<?php
$id = $_GET['id'] ?? null;
$name = $_GET['name'] ?? '';
$lastname = $_GET['lastname'] ?? '';
$birthDate = $_GET['birthDate'] ?? '';

if ($id && $name && $lastname && $birthDate) {
    $warrior = [
        'id' => $id,
        'nombre' => $name,
        'apellido' => $lastname,
        'fecha_nacimiento' => $birthDate
    ];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Guerrero Z</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1 class="text-center my-4">Editar Guerrero Z</h1>
        <?php if (isset($warrior)) : ?>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <form method="post" action="../controllers/warriors/update_warrior.php">
                        <input type="hidden" name="id" value="<?= $warrior['id'] ?>">
                        <div class="mb-3">
                            <label for="warrior-name" class="form-label">Nombre:</label>
                            <input type="text" class="form-control" id="warrior-name" name="warrior-name" value="<?= $name ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="warrior-lastname" class="form-label">Apellido:</label>
                            <input type="text" class="form-control" id="warrior-lastname" name="warrior-lastname" value="<?= $lastname ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="birth-date" class="form-label">Fecha de nacimiento:</label>
                            <input type="date" class="form-control" id="birth-date" name="birth-date" value="<?= $birthDate ?>" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar cambios</button>
                        <a href="../index.php" class="btn btn-secondary">Cancelar</a>
                    </form>
                </div>
            </div>
        <?php else : ?>
            <p class="text-center">No se encontró el guerrero.</p>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>