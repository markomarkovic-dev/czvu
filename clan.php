<?php
require_once "config.php";
$rootPage = "transparent";
$rootPath = '../';

?>
<!DOCTYPE html>
<html lang=<?= $language ?>>
<?php
    require_once "shared/templates/head.php";
?>

<body>
    <div class="layout-container">
        <?php
            require_once "shared/templates/header.php";
        ?>
        <main>
        <div class="background-img background-left">
                <div class="background-wrapper">
                    <img src="<?= $rootPath ?>shared/assets/images/grafika-leva.svg" alt="">
                </div>
            </div>
            <section>
                <div id="member">

                </div>
            </section>
        </main>
        <?php
            require_once "shared/templates/footer.php";
        ?>
    </div>
    <script src="<?= $rootPath ?>shared/assets/js/member.js"></script>
</body>

</html>