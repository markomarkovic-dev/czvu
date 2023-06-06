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
                <input type="text" id="search-input" placeholder="Search">
                <button id="search-button">Search</button>
                <button id="delete-button"></button>
                <h2 class="section-heading">Latest news</h2>
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