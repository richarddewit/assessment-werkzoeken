<button class="apply-btn">Solliciteer!</button>

<div class="popup">
    <span class="close">&times;</span>
    <h2>Solliciteer op deze vacature</h2>

    <div class="message"></div>

    <form action="/apply.php" method="post" enctype="multipart/form-data" id="application">
        <input type="hidden" name="id" value="<?= $vacancy['id'] ?>">

        <div>
            <label for="name">Naam</label>
            <input type="text" name="name" id="name" required>
        </div>

        <div>
            <label for="email">E-mailadres</label>
            <input type="email" name="email" id="email" required>
        </div>

        <div>
            <label for="motivation">Motivatie</label>
            <textarea
                name="motivation"
                id="motivation"
                rows="5"
                minlength="20"
                maxlength="400"
                required
            ></textarea>
            <small class="motivation-length"></small>
        </div>

        <div>
            <label for="cv">CV</label>
            <input type="file" name="cv" id="cv" required>
        </div>

        <button type="submit">Verstuur</button>
    </form>
</div>
