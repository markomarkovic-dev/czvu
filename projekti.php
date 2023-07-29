<?php include('includes/global-header.php'); ?>
    <div class="layout-container">
        <?php
            require_once "templates/header.php";
        ?>
        <main>
            <section>
                <div class="background-img background-left">
                    <div class="background-wrapper">
                        <img src="assets/images/grafika-leva.svg" alt="">
                    </div>
                </div>
                <h1 class="section-heading"><strong>Projekti</strong> koje smo <strong>oživjeli</strong></h1>
                <div id="projects"></div>
            </section>
        </main>
        <?php
            require_once "templates/footer.php";

        ?>
    </div>
    <script>
        var rootPathjs = "<?= $rootPath?>";
    </script>
    <script src="assets/js/projects.js" type="module"></script>

    <?php include('includes/global-footer.php'); ?>