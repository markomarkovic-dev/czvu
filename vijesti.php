<?php include('includes/global-header.php'); ?>
    <div class="layout-container">
        <?php
        require_once "templates/header.php";
        ?>
        <main>
            <section>
                <h1 class="section-heading">Latest <strong>news & activities</strong></h1>
                <div class="blog" id="blog"></div>            
                <div id="loader">
                    <span class="circle"></span>
                </div>
            </section>
        </main>
        <?php
        require_once "templates/footer.php";
        ?>
    </div>
    <script src="assets/js/all-posts.js" type="module"></script>

<?php include('includes/global-footer.php'); ?>