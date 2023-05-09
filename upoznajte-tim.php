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
                <h1 class="section-heading">Meet the <strong>Center for Visual Art</strong></h1>
                <div class="members">
                    <div class="member">
                        <img src="<?= $rootPath ?>shared/assets/images/dragana-purkovic-macan.jpg" alt="">
                    </div>
                </div>
            </section>
        </main>
        <?php
            require_once "shared/templates/footer.php";
        ?>
    </div>
</body>

</html>