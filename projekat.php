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
            <section id="project">
            </section>
            <div class="background-img background-right">
                    <div class="background-wrapper">
                        <img src="<?= $rootPath ?>shared/assets/images/grafika-desna.svg" alt="">
                    </div>
                </div>
            <section>
                
            </section>
        </main>
        <?php
            require_once "shared/templates/footer.php";

        ?>
    </div>
    <script src="<?= $rootPath ?>shared/assets/js/gallery-modal.js" type="module"></script>
    <script src="<?= $rootPath ?>shared/assets/js/project.js" type="module"></script>

</body>

</html>