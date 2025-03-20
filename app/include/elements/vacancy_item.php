<div class="vacancy">
    <h2><?= $vacancy['title'] ?></h2>
    <p>
        <strong><?= $vacancy['company'] ?>, <?= $vacancy['location'] ?></strong>
        <small><abbr title="<?= $vacancy['created_at'] ?>"><?= time_elapsed_string($vacancy['created_at']) ?></abbr></small>
    </p>
    <a href="/vacancy.php?id=<?= $vacancy['id'] ?>&<?= $_SERVER['QUERY_STRING'] ?>">Bekijk vacature &raquo;</a>
</div>
