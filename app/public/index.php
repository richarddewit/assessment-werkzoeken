<?php
require_once(__DIR__ . '/../lib/utils.php');
require_once(__DIR__ . '/../lib/database.php');

$search = $_GET['search'] ?? null;
$location = $_GET['location'] ?? null;
// TODO: pagination
$page = $_GET['page'] ?? 1;

$db = connectToDatabase();
$vacancies = getVacancies($db, $search, $location);

require_once(__DIR__ . '/../include/html_start.php');
?>

<h1>Vacatures</h1>

<?php require_once(__DIR__ . '/../include/elements/search_form.php') ?>

<?php if (empty($vacancies)): ?>
    <p>Geen vacatures gevonden.</p>
<?php endif ?>

<?php foreach ($vacancies as $vacancy) {
    require(__DIR__ . '/../include/elements/vacancy_item.php');
} ?>

<?php require_once(__DIR__ . '/../include/html_end.php') ?>
