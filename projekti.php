<?php
require_once "config.php";
$title = "Upoznajte tim";
$description = "Ekskluzivni sportski program, najbolji filmski i serijski program, najnovija izdanja glazbe, svjetski poznati informativni kanal lokaliziran za događaje u Srbiji i regiji.";
$keywords = "sport, kanali, video";
$rootPage = "transparent";
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
            <section>
                <div class="background-img background-left">
                    <div class="background-wrapper">
                        <img src="<?= $rootPath ?>shared/assets/images/grafika-leva.svg" alt="">
                    </div>
                </div>
                <h1 class="section-heading"><strong>Projekti</strong> koje smo <strong>oživjeli</strong></h1>
                <div class="block-link" id="theatre-festival">
                    <div class="block-link-left">
                        <h2>PAF</h2>
                        <h3>Theatre Academic festival</h3>
                    </div>
                    <div class="block-link-right">
                        <i class="ri-arrow-right-up-line"></i>
                    </div>
                </div>
            </section>
        </main>
        <?php
            require_once "shared/templates/footer.php";

        ?>
    </div>
    <script src="shared/assets/js/members.js"></script>
</body>

</html>