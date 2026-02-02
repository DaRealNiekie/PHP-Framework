<?php $this->layout("layout", ["title" => "Homepage"]) ?>

<?php require dirname(__DIR__) . "/header.php"; ?>

<h1>Welcome</h1>

<P>Hello <?= $this->e($name) ?> </P>
<?php require dirname(__DIR__) . "/footer.php"; ?>