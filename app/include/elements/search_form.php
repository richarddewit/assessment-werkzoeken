<form action="/" method="get">
    <label for="search">Wat</label>
    <input type="text" name="search" id="search" value="<?= $search ? htmlspecialchars($search) : '' ?>">
    <label for="location">Waar</label>
    <input type="text" name="location" id="location" value="<?= $location ? htmlspecialchars($location) : '' ?>">
    <button type="submit">Zoeken</button>
</form>
