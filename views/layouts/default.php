<!DOCTYPE html>
<html lang="ca">
<head>
    <title>MVC Framework</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php use App\Core\App;

    require __DIR__ . '/../partials/head.partial.php'; ?>
</head>
<body>
<?php
require __DIR__ . '/../partials/header.partial.php';
?>
<div class="container">
    <?php
    $flash = App::get('flash');
    // If you need to check for errors (eg: when validating a form) you can:
    if ($flash->hasErrors()) {
        // There ARE errors
    } else {
        // There are NOT any errors
    }

    // Wherever you want to display the messages simply call:
    $flash->display();
    ?>
</div>
<?= $mainContent ?>

<?php
require __DIR__ . '/../partials/footer.partial.php'
?>

</body>
