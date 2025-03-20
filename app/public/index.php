<?php
const LIB_DIR = __DIR__ . '/../lib';
const INCLUDE_DIR = __DIR__ . '/../include';

require_once(LIB_DIR . '/utils.php');
require_once(LIB_DIR . '/database.php');

$search = $_GET['search'] ?? null;
$location = $_GET['location'] ?? null;
$page = $_GET['page'] ?? null;
$page = is_numeric($page) ? intval($page) : 1;

$db = connectToDatabase();
$vacancies = getVacancies($db, search: $search, location: $location, page: $page);
$totalVacancies = getVacancyCount($db, search: $search, location: $location);
$totalPages = ceil($totalVacancies / PAGE_SIZE);
var_dump($totalVacancies);

require_once(INCLUDE_DIR . '/html_start.php');
?>

<h1>Vacatures</h1>

<?php require_once(INCLUDE_DIR . '/elements/search_form.php');

require(INCLUDE_DIR . '/elements/pagination.php');

if (empty($vacancies)) {
    echo "<p>Geen vacatures gevonden.</p>";
}

foreach ($vacancies as $vacancy) {
    require(INCLUDE_DIR . '/elements/vacancy_item.php');
}

require(INCLUDE_DIR . '/elements/pagination.php');

require_once(INCLUDE_DIR . '/html_end.php') ?>
