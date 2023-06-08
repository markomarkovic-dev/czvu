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
                <h1 class="section-heading">We are the <strong>people</strong> who do a lot <strong>for culture</strong></h1>
                <div class="background-img background-right">
                    <div class="background-wrapper">
                        <img src="<?= $rootPath ?>shared/assets/images/grafika-desna.svg" alt="">
                    </div>
                </div>
                <h2 class="section-heading">Founders of the center for visual art</h2>
                <div id="founders" class="members">
                </div>
                <h2 class="section-heading">Members of the center for visual art</h2>
                <div id="members" class="members">
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