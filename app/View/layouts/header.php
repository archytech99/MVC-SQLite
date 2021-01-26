<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="<?= asset('media/set_of_three_books-512.webp'); ?>">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= asset_vendor('bootstrap/css/bootstrap.css'); ?>" >

    <?php
        if (isset($data['judul'])) {
            echo "<title>{$data['judul']}</title>";
        } else {
            echo "<title>" . APP_NAME . "</title>";
        }
    ?>

</head>
<body>
<?php view('layouts/navbar'); ?>