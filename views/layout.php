<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>hoi</title>
    <link rel="stylesheet" href="/example.css">
</head>

<body>

    <?php $this->insert("header"); ?>

    <main>
        <?= $this->section('content') ?>
    </main>
    <?php require __DIR__ . '/footer.php'; ?>

</body>

</html>