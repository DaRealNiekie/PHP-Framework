<?php $this->layout("layout", ["title" => "Nieuwe weg"]) ?>

<h1>Nieuwe weg aanmaken</h1>

<?php if (!empty($errors ?? [])): ?>
    <ul class="errors">
        <?php foreach ($errors as $err): ?>
            <li><?= $this->e($err) ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<form method="post" action="/wegen" id="wegenForm">
    <label>
        Naam
        <input type="text" name="naam" value="<?= $this->e($old['naam'] ?? '') ?>" required>
    </label>

    <label>
        Locatie
        <input type="text" name="locatie" value="<?= $this->e($old['locatie'] ?? '') ?>" required>
    </label>

    <label>
        Strooiduur (min)
        <input type="number" name="strooiduur" value="<?= $this->e($old['strooiduur'] ?? 30) ?>" min="0">
    </label>

    <label>
        Weglengte (km)
        <input type="number" name="weglengte" value="<?= $this->e($old['weglengte'] ?? 0) ?>" min="0">
    </label>

    <label>
        strooien bij 0°C
        <input type="number" name="0_temperatuur" value="<?= $this->e($old['0_temperatuur'] ?? 0) ?>">
    </label>

    <label>
        strooien bij -5°C
        <input type="number" name="-5_temperatuur" value="<?= $this->e($old['-5_temperatuur'] ?? 0) ?>">
    </label>

    <label>
        strooien bij -10°C
        <input type="number" name="-10_temperatuur" value="<?= $this->e($old['-10_temperatuur'] ?? 0) ?>">
    </label>

    <button type="submit" id="submitBtn">Opslaan</button>
</form>

<a href="/wegen">Annuleren</a>

<script>
    document.getElementById('wegenForm').addEventListener('submit', function () {
        document.getElementById('submitBtn').disabled = true;
    });
</script>