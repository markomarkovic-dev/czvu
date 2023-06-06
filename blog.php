<?php
require_once "config.php";
$title = "Naslovna";
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
                <h2 class="section-heading">Latest news</h2>
                <div class="blog" id="blog"></div>
                <a href="#" class="action-link blog-more">See more news</a>
            </section>
        </main>
        <?php
        require_once "shared/templates/footer.php";
        ?>
    </div>
    <script>
        $('.main-slider').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            dots: true,
            items: 1,
            autoplay: true,
            autoplayTimeout: 3000
        })
    </script>
    <script src="shared/assets/js/all-posts.js"></script>
</body>

</html>