<?php if ($totalPages <= 1) {
    return;
} ?>

<div class="pagination">
    <?php foreach (range(1, $totalPages) as $pageNumber): ?>
        <a href="/<?= formatPageLink($page, $pageNumber) ?>" class="<?= $pageNumber == $page ? 'active' : '' ?>">
            <?= $pageNumber ?>
        </a>
    <?php endforeach ?>
</div>
