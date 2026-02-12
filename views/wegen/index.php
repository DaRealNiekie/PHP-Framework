<?php $this->layout("layout", ["title" => "Wegen"]) ?>

<h1>Wegen</h1>

<a href="/wegen/nieuw">Nieuwe weg</a>
<table class="wegen-tabel">
    <thead>
        <tr>

            <th>Naam</th>
            <th>Locatie</th>
            <th>Strooiduur (min)</th>
            <th>Weglengte (km)</th>
            <th>Huidige temperatuur</th>

        </tr>
    </thead>
    <tbody class="wegen">
        <?php foreach (($wegen ?? []) as $weg): ?>
            <tr>
                <td>
                    <a href="/wegen/<?= $this->e($weg->getId()) ?>">
                        <?= $this->e($weg->getNaam()) ?>
                    </a>
                </td>
                <td><?= $this->e($weg->getLocatie()) ?></td>
                <td><?= $this->e($weg->getStrooiduur()) ?></td>
                <td><?= $this->e($weg->getWeglengte()) ?></td>
                <td><?= $this->e($weg->getHuidigeTemperatuur()) ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>