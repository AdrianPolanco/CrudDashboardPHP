<table class="table">
    <thead class="table-warning">
        <?php foreach ($columns as $field) : ?>
            <th scope="col"><?= ucfirst($field) ?></th>
        <?php endforeach; ?>
        <th scope="col">Acciones</th>
    </thead>
    <?php if (!$data) : ?>
        <tbody>
            <tr class="text-center">
                <td colspan="5">No hay guerreros registrados</td>
            </tr>
        </tbody>
    <?php else : ?>
        <tbody>
            <?php foreach ($data as $row) : ?>
                <tr>
                    <?php foreach ($columns as $field) : ?>
                        <td><?= $row[$field] ?></td>
                    <?php endforeach; ?>
                    <td>
                        <a href="<?= $updateRoute ?>?<?= $updateQueryParameter ?>=<?= $row["id"] ?>" class="btn btn-small btn-warning"><i class="fa-regular fa-pen-to-square"></i></a>
                        <a href="<?= $deleteRoute ?>?<?= $deleteQueryParameter ?>=<?= $row["id"] ?>&page=<?= $page ?>" class="btn btn-small btn-danger"><i class="fa-solid fa-trash"></i></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>

    <?php endif; ?>

</table>