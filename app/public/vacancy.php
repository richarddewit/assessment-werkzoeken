<?php
require_once(__DIR__ . '/../lib/utils.php');
require_once(__DIR__ . '/../lib/database.php');

$id = $_GET['id'];
if (!is_numeric($id)) {
    raiseNotFound('Vacature bestaat niet.');
}

$db = connectToDatabase();
$vacancy = getVacancy($db, $id);
if (!$vacancy) {
    raiseNotFound('Vacature bestaat niet.');
}

require_once(__DIR__ . '/../include/html_start.php');
?>

<h1><?= $vacancy['title'] ?></h1>

<p>
    <strong><?= $vacancy['company'] ?>, <?= $vacancy['location'] ?></strong>
    <small><abbr title="<?= $vacancy['created_at'] ?>"><?= time_elapsed_string($vacancy['created_at']) ?></abbr></small>
</p>

<p><?= $vacancy['body'] ?></p>
<p><strong>Contactpersoon:</strong> <?= $vacancy['contact'] ?></p>

<a href="/">&laquo; Terug naar overzicht</a>

<?php require_once(__DIR__ . '/../include/html_end.php') ?>
