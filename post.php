<?php
require_once "config.php";
// $title = "Post";
// $description = "Ekskluzivni sportski program, najbolji filmski i serijski program, najnovija izdanja glazbe, svjetski poznati informativni kanal lokaliziran za događaje u Srbiji i regiji.";
$keywords = "s";
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
            <section class="post-section">
                <div id="post"></div>
                <aside id="latest-posts">
                    <h2 class="section-heading">Recent news</h2>
                </aside>
            </section>
            
        </main>
        <?php
            require_once "shared/templates/footer.php";
        ?>
    </div>
    <script>
        var rootPathjs = "<?= $rootPath?>";
    </script>
    <script src="<?= $rootPath ?>shared/assets/js/post.js"></script>
</body>

</html>