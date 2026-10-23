<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pagetitle . " - SIRUKA" ?? "SIRUKA" ?></title>
    <?php if (isset($pageCSS)): ?>
        <link rel="stylesheet" href="assets/css/<?= $pageCSS ?>">
    <?php endif; ?>
    <?php if (isset($layoutCSS)): ?>
        <link rel="stylesheet" href="assets/css/layout.css">
    <?php endif; ?>
</head>