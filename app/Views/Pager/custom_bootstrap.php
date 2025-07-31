<?php
$pager->setSurroundCount(1);
?>

<?php if ($pager->hasPrevious()) : ?>
    <li class="page-item">
        <a class="page-link" href="<?= $pager->getFirst() ?>" aria-label="First">
            «
        </a>
    </li>
    <li class="page-item">
        <a class="page-link" href="<?= $pager->getPrevious() ?>" aria-label="Previous">
            ‹
        </a>
    </li>
<?php endif ?>

<?php foreach ($pager->links() as $link): ?>
    <li class="page-item <?= $link['active'] ? 'active' : '' ?>">
        <a class="page-link" href="<?= $link['uri'] ?>">
            <?= $link['title'] ?>
        </a>
    </li>
<?php endforeach ?>

<?php if ($pager->hasNext()) : ?>
    <li class="page-item">
        <a class="page-link" href="<?= $pager->getNext() ?>" aria-label="Next">
            ›
        </a>
    </li>
    <li class="page-item">
        <a class="page-link" href="<?= $pager->getLast() ?>" aria-label="Last">
            »
        </a>
    </li>
<?php endif ?>
