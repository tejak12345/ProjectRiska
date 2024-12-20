<?php if ($pager->getPageCount() > 1): ?>
    <nav>
        <ul class="pagination">
            <?php if ($pager->getFirst()): ?>
                <li class="page-item">
                    <a class="page-link" href="<?= $pager->getFirst() ?>" aria-label="First">
                        <span aria-hidden="true">&laquo;&laquo;</span>
                    </a>
                </li>
            <?php endif; ?>

            <?php if ($pager->getPrevious()): ?>
                <li class="page-item">
                    <a class="page-link" href="<?= $pager->getPrevious() ?>" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
            <?php endif; ?>

            <?php foreach ($pager->links() as $link): ?>
                <li class="page-item<?= $link['active'] ? ' active' : '' ?>">
                    <a class="page-link" href="<?= $link['uri'] ?>">
                        <?= $link['title'] ?>
                    </a>
                </li>
            <?php endforeach; ?>

            <?php if ($pager->getNext()): ?>
                <li class="page-item">
                    <a class="page-link" href="<?= $pager->getNext() ?>" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            <?php endif; ?>

            <?php if ($pager->getLast()): ?>
                <li class="page-item">
                    <a class="page-link" href="<?= $pager->getLast() ?>" aria-label="Last">
                        <span aria-hidden="true">&raquo;&raquo;</span>
                    </a>
                </li>
            <?php endif; ?>
        </ul>
    </nav>
<?php endif; ?>