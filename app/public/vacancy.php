<?php
const LIB_DIR = __DIR__ . '/../lib';
const INCLUDE_DIR = __DIR__ . '/../include';

require_once(LIB_DIR . '/utils.php');
require_once(LIB_DIR . '/database.php');

$id = $_GET['id'];
if (!is_numeric($id)) {
    raiseNotFound('Vacature bestaat niet.');
}

$db = connectToDatabase();
$vacancy = getVacancy($db, $id);
if (!$vacancy) {
    raiseNotFound('Vacature bestaat niet.');
}

$backlink = '/' . ($_SERVER['QUERY_STRING'] ? '?' . $_SERVER['QUERY_STRING'] : '');
$backlink = str_replace('id=' . $id, '', $backlink);

$title = $vacancy['title'];
require_once(INCLUDE_DIR . '/html_start.php');
?>

<h1><?= $vacancy['title'] ?></h1>

<p>
    <strong><?= $vacancy['company'] ?>, <?= $vacancy['location'] ?></strong>
    <small><abbr title="<?= $vacancy['created_at'] ?>"><?= time_elapsed_string($vacancy['created_at']) ?></abbr></small>
</p>

<a href="<?= $backlink ?>">&laquo; Terug naar overzicht</a>
<hr>


<p><?= $vacancy['body'] ?></p>
<hr>
<p><strong>Contactpersoon:</strong> <?= $vacancy['contact'] ?></p>


<?php require_once(INCLUDE_DIR . '/html_end.php') ?>
