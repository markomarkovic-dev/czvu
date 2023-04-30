<?php
require_once "shared-config.php";
require_once "config.php";
?>

<!DOCTYPE html>
<html lang=<?= $language ?>>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <link rel="stylesheet" href="<?= $rootPath ?>shared/assets/fonts/stylesheet.css">
    <link rel="stylesheet" href="<?= $rootPath ?>shared/assets/lnclines/lnc_styles.css">
    <link rel="stylesheet" href="<?= $rootPath ?>shared/assets/scss/style.min.css">
</head>

<body>
    <?php
    require_once "shared/templates/header.php";
    ?>
    <main>
        <section class='error'>
            <h1>Stranica ne postoji.</h1>
            <a href='/' class="btn btn-primary"><i class="lnc lnc-home"></i>Vratite se na početnu</a>
        </section>
    </main>
    <footer class="dark-background">
        <?php
        include_once "assets/components/footer-content-$language.php";
        require_once "assets/components/call-center-$language.php";
        ?>
    </footer>
    <script src="<?= $rootPath ?>shared/assets/js/jquery-3.6.4.min.js"></script>
    <script src="<?= $rootPath ?>shared/assets/js/modal.js"></script>
    <script src="<?= $rootPath ?>shared/assets/js/scripts-<?= $fileV ?>.js"></script>
</body>

</html>