<?php
require_once(__DIR__ . '/../lib/utils.php');
require_once(__DIR__ . '/../lib/database.php');

$search = $_GET['search'] ?? null;
$location = $_GET['location'] ?? null;

$db = connectToDatabase();
$vacancies = getVacancies($db, $search, $location);

require_once(__DIR__ . '/../include/html_start.php');
?>

<h1>Vacatures</h1>

<form action="/" method="get">
    <label for="search">Wat</label>
    <input type="text" name="search" id="search" value="<?= htmlspecialchars($search) ?>">
    <label for="location">Waar</label>
    <input type="text" name="location" id="location" value="<?= htmlspecialchars($location) ?>">
    <button type="submit">Zoeken</button>
</form>

<?php foreach ($vacancies as $vacancy): ?>
    <div class="vacancy">
        <h2><?= $vacancy['title'] ?></h2>
        <p>
            <strong><?= $vacancy['company'] ?>, <?= $vacancy['location'] ?></strong>
            <small><abbr title="<?= $vacancy['created_at'] ?>"><?= time_elapsed_string($vacancy['created_at']) ?></abbr></small>
        </p>
        <a href="/vacancy.php?id=<?= $vacancy['id'] ?>">Bekijk vacature</a>
    </div>
<?php endforeach ?>

<?php require_once(__DIR__ . '/../include/html_end.php') ?>
