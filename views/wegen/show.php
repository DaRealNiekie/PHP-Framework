<?php $this->layout("layout", ["title" => "Weg: " . $this->e($weg->getNaam())]) ?>

<h1><?= $this->e($weg->getNaam()) ?></h1>

<ul>
    <li><strong>Locatie:</strong> <?= $this->e($weg->getLocatie()) ?></li>
    <li><strong>Strooiduur:</strong> <?= $this->e($weg->getStrooiduur()) ?> minuten</li>
    <li><strong>Weglengte:</strong> <?= $this->e($weg->getWeglengte()) ?> km</li>
    <li><strong>Huidige temperatuur:</strong> <?= $this->e($weg->getHuidigeTemperatuur()) ?> °C</li>
    <li><strong>hoevaak strooien bij 0°C: </strong> <?= $this->e($weg->getfreq0()) ?>keer</li>
    <li><strong>hoevaak strooien bij -5°C: </strong> <?= $this->e($weg->getfreqM5()) ?> keer</li>
    <li><strong>hoevaak strooien bij -10°C: </strong> <?= $this->e($weg->getfreqM10()) ?> keer</li>
</ul>

<a href="/wegen">Terug naar lijst</a>