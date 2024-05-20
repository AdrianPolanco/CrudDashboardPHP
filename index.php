<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de gestion de guerreros Z</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <h1 class="text-center p-3">Hola Mundo</h1>
    <section class="container-fluid row">
        <h3 class="text-warning">Registrar nuevo guerrero Z</h3>
        <form class="col-4">
            <div class="mb-3">
                <label for="warrior-name" class="form-label">Nombre: </label>
                <input type="text" class="form-control" name="warrior-name">
            </div>
            <div class="mb-3">
                <label for="warrior-lastname" class="form-label">Apellido: </label>
                <input type="text" class="form-control" name="warrior-lastname">
            </div>
            <div class="mb-3">
                <label for="datePicker" class="form-label">Fecha de nacimiento</label>
                <input type="date" class="form-control" id="datePicker" name="birth-date">
            </div>
            <button type="submit" class="btn btn-warning">Submit</button>
        </form>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>