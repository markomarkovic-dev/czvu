<?php
require_once "config.php";
$title = "Vijesti";
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
                <h1 class="section-heading">Latest <strong>news & activities</strong></h1>
                <div class="blog" id="blog"></div>
            </section>
        </main>
        <?php
        require_once "shared/templates/footer.php";
        ?>
    </div>
    <script src="shared/assets/js/all-posts.js"></script>
</body>
</html>