<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de gestion de guerreros Z</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/a177f3304c.js" crossorigin="anonymous"></script>
</head>

<body>
    <h1 class="text-center p-3">Hola Mundo</h1>
    <main class="container-fluid row">

        <form class="col-4">
            <h3 class="text-warning text-center">Registrar nuevo guerrero Z</h3>
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
            <button type="submit" class="btn btn-warning">Registrar</button>
        </form>
        <article class="col-8 p-4">
            <table class="table">
                <thead class="table-warning">
                    <th scope="col">Id</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Fecha de nacimiento</th>
                    <th scope="col">Acciones</th>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                        <td>
                            <a href="" class="btn btn-small btn-warning"><i class="fa-regular fa-pen-to-square"></i></a>
                            <a href="" class="btn btn-small btn-danger"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </article>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>