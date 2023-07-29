<?php
    require_once "config.php";
?>

<!DOCTYPE html>
<html lang=<?= $language ?>>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <link rel="stylesheet" href="assets/scss/style.min.css">
</head>

<body>
   <div class="layout-container">
    <?php
    require_once "shared/templates/header.php";
    ?>
     <main>
            <section class="error-section">
                <h1>Stranica ne postoji.</h1>
                <a href='/' class="btn btn-primary"><i class="lnc lnc-home"></i>Vratite se na početnu</a>
            </section>
     </main>
        <?php
            require_once "shared/templates/footer.php";
        ?>
        <script src="assets/js/jquery-3.7.0.min.js"></script>
        <script src="assets/js/scripts.js" type="module"></script>
    </div>      
</body>

</html>