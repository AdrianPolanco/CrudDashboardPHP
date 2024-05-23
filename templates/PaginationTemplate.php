<nav aria-label="<?= $tableName ?> pagination">
    <ul class="pagination">
        <ul class="pagination">
            <li class="page-item <?= $page <= 1 ? 'disabled' : '' ?>">
                <a class="page-link" href="?page=<?= $page - 1 ?>" aria-label="Previous">
                    <span aria-hidden="true">«</span>
                </a>
            </li>
            <?php
            $startPage = max(1, $page - 2);
            $endPage = min($totalPages, $startPage + 4);
            $startPage = max(1, $endPage - 4);

            for ($i = $startPage; $i <= $endPage; $i++) :
            ?>
                <li class="page-item <?= $color ?> <?= $page === $i ? 'active' : '' ?>">
                    <a class="page-link text-<?= $page === $i ? 'white' : $color ?>" href="?page=<?= $i ?>"><?= $i ?></a>
                </li>
            <?php endfor; ?>
            <li class="page-item <?= $page >= $totalPages ? 'disabled' : '' ?>">
                <a class="page-link" href="?page=<?= $page + 1 ?>" aria-label="Next">
                    <span aria-hidden="true">»</span>
                </a>
            </li>
        </ul>
</nav>