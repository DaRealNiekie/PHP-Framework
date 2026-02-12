<?php $this->layout("layout", ["title" => "Homepage"]) ?>

<h1>Welkom</h1>

<div class="home">
    <p class="homelinks"><?= $totaalStrooiBeurten ?></p>
    <p class="homebovenlinks">Totaal benodigde strooiwagens voor alle <?= $aantalWegen ?> wegen</p>
    <p class="homerechts"><?= $lText ?></p>
    <p class="homebovenrechts"><?= $lkop ?></p>
</div>