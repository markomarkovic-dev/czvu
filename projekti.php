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
                <div id="projects"></div>
            </section>
        </main>
        <?php
            require_once "shared/templates/footer.php";

        ?>
    </div>
    <script>
        var rootPathjs = "<?= $rootPath?>";
    </script>
    <script src="<?= $rootPath ?>shared/assets/js/projects.js" type="module"></script>
</body>

</html>