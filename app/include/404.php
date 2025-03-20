<?php require_once(__DIR__ . '/../include/html_start.php') ?>

<h1>404: Pagina niet gevonden</h1>

<?php if (isset($message)): ?>
    <p><?= $message ?></p>
<?php endif ?>

<a href="/">&laquo; Terug naar overzicht</a>

<?php require_once(__DIR__ . '/../include/html_end.php') ?>
