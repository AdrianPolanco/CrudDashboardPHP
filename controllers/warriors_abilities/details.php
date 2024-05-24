<?php
$main = "../../index.php";
$types = "../../views/abilities_types.index.php";
$logo = "../../assets/logo.png";
$abilities = "../../views/abilities.index.php";
$dashboard = "../../views/dashboard.php";
$warriorsPage = "../../views/warrior_ability.index.php";
include "../../templates/header.php";
include '../../data/database.php';
$db = new Database();
$id = $_GET['id'] ?? '';
$page = $_GET['page'] ?? 1;
$warrior = $db->getWarriorById($id);
["data" => $data, "totalPages" => $totalPages] = $db->getWarriorsAbilitiesByPage($id, intval($page));
?>
<section class="container d-flex flex-column min-vh-100">
    <main class="flex-grow-1 d-flex align-items-center">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title text-center text-danger fs-2">Datos del guerrero</h5>
                <div class="d-flex gap-3">
                    <p class="card-subtitle mb-2 text-body-black text-center fs-4">Nombre:</p>
                    <p class="card-subtitle mb-2 text-body-secondary text-center fs-4"><?= $warrior["nombre"] ?></p>
                </div>
                <div class="d-flex gap-3">
                    <p class="card-subtitle mb-2 text-body-black text-center fs-4">Apellido:</p>
                    <p class="card-subtitle mb-2 text-body-secondary text-center fs-4"><?= $warrior["apellido"] ?></p>
                </div>
                <div class="d-flex gap-3">
                    <p class="card-subtitle mb-2 text-body-black text-center fs-4">Fecha de nacimiento:</p>
                    <p class="card-subtitle mb-2 text-body-secondary text-center fs-4"><?= $warrior["fecha_nacimiento"] ?></p>
                </div>
            </div>
        </div>
        <article class="col-8 p-4 d-flex flex-column align-items-center">
            <table class="table">
                <thead class="table-danger">
                    <th scope="col">Habilidad</th>
                    <th scope="col">Tipo de habilidad</th>
                    <th scope="col">Nivel de poder</th>
                    <th scope="col">Acciones</th>
                </thead>
                <?php if (!$data) : ?>
                    <tbody>
                        <tr class="text-center">
                            <td colspan="5">No hay habilidades registradas para este guerrero</td>
                        </tr>
                    </tbody>
                <?php else : ?>
                    <tbody>
                        <?php foreach ($data as $row) : ?>

                            <tr>
                                <td><?= $row["nombre_habilidad"] ?></td>
                                <td><?= $row["tipo_habilidad"] ?></td>
                                <td><?= $row["nivel_poder"] ?></td>
                                <td>
                                    <a href="./delete_ability_for_warrior?idWarrior=<?= $row["warrior_id"] ?>&idAbility=<?= $row["habilidad_id"] ?>" class="btn btn-small btn-danger"><i class="fa-solid fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td>
                                Poder total:
                            </td>
                            <td></td>
                            <td></td>
                            <td>
                                <?= array_reduce($data, fn ($acc, $row) => $acc + $row["nivel_poder"], 0) ?>
                            </td>
                        </tr>
                    </tfoot>
            </table>
        </article>
    </main>
</section>
<?php include "../../templates/footer.php"; ?>