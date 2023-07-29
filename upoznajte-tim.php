<?php include('includes/global-header.php'); ?>
    <div class="layout-container">
        <?php
            require_once "templates/header.php";
        ?>
        <main>
            <section>
                <h1 class="section-heading">We are the <strong>people</strong> who do a lot <strong>for culture</strong></h1>
                <div class="background-img background-right">
                    <div class="background-wrapper">
                        <img src="assets/images/grafika-desna.svg" alt="">
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
            require_once "templates/footer.php";
        ?>
    </div>
    <script src="assets/js/members.js"></script>
    <?php include('includes/global-footer.php'); ?>