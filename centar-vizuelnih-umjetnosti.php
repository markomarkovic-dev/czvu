<?php include 'includes/global-header.php'; ?>
   <div class="layout-container">
        <?php
            require_once "templates/header.php";
        ?>
        <main>
            <section class="visual-art-section">
                <h1 class="section-heading"><?= $lang[$pagename]['heading']?></h1>
                <div class="background-img background-left">
                    <div class="background-wrapper">
                        <img src="assets/images/grafika-leva.svg" alt="">
                    </div>
                </div>
                <div class="section-row">
                    <div class="section-column column-65">
                    <?= $lang[$pagename]['text']?>
                    </div>
                    <div class="section-column column-35">
                        <img src="assets/images/grafika-leva-color.svg" class="img-fluid img-bck" alt="">
                    </div>
                </div>
            </section>
            <section class="action-cards-container">
                <div class="action-cards">
                    <a href="projekti" class="action-card">
                        <div class="action-card-content">
                            <h3><?= $lang['global']['interested']?></h3>
                            <p class="action-link"><?= $lang['global']['check-projects']?></p>
                        </div>
                        <img src="assets/images/picture-silhouette.svg" alt="">
                    </a>
                    <a href="upoznajte-tim" class="action-card">
                        <div class="action-card-content">
                            <h3><?= $lang[$pagename]['people-culture']?></h3>
                            <p class="action-link"><?= $lang[$pagename]['meet-team']?></p>
                        </div>
                        <img src="assets/images/user-silhouette.svg" alt="">
                    </a>
                </div>
            </section>
        </main>
        <?php
            require_once "templates/footer.php";
        ?>
    </div>
    <?php include 'includes/global-footer.php'; ?>