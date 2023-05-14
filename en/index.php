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
require_once "../shared/templates/head.php";
?>

<body>
    <div class="layout-container">
        <?php
        require_once "../shared/templates/header.php";
        ?>
        <main>
            <section class="landing-section">
                <div class="owl-carousel main-slider">
                    <div class="slide we-are-slide">
                        <h1>We are the <strong>people</strong> who do a lot <strong>for culture!</strong></h1>
                        <a href="#" class="action-link">Check us out</a>
                    </div>
                </div>
            </section>
            <section class="action-cards-container">
                <div class="action-cards">
                    <div class="action-card">
                        <div class="action-card-content">
                            <h3>Interested in culture?</h3>
                            <a href="#" class="action-link">Check out our projects</a>
                        </div>
                        <img src="<?= $rootPath ?>shared/assets/images/picture-silhouette.svg" alt="">
                    </div>
                    <div class="action-card">
                        <div class="action-card-content">
                            <h3>Want to get involved?</h3>
                            <a href="#" class="action-link">Make a move, call us</a>
                        </div>
                        <img src="<?= $rootPath ?>shared/assets/images/s-silhouette.svg" alt="">
                    </div>
                    <div class="action-card">
                        <div class="action-card-content">
                            <h3>Want to support?</h3>
                            <a href="#" class="action-link">See who else did it</a>
                        </div>
                        <img src="<?= $rootPath ?>shared/assets/images/heart-silhouette.svg" alt="">
                    </div>
                    <div class="action-card">
                        <div class="action-card-content">
                            <h3>Artists who participated?</h3>
                            <a href="#" class="action-link">Check them out</a>
                        </div>
                        <img src="<?= $rootPath ?>shared/assets/images/user-silhouette.svg" alt="">
                    </div>
                </div>
            </section>
            <div class="background-img background-right">
                <div class="background-wrapper">
                    <img src="<?= $rootPath ?>shared/assets/images/grafika-desna.svg" alt="">
                </div>
            </div>
            <section>
                <h2 class="section-heading">Latest news</h2>
                <div class="blog-latest" id="blog-latest"></div>
                <a href="#" class="action-link blog-more">See more news</a>
            </section>
            <div class="background-img background-left">
                <div class="background-wrapper">
                    <img src="<?= $rootPath ?>shared/assets/images/grafika-leva.svg" alt="">
                </div>
            </div>
            <section class="testimonial-section">
                <h2 class="section-heading">What they say about us</h2>
                <div class="testimonials">
                    <div class="testimonials-images">
                        <img src="<?= $rootPath ?>shared/assets/images/testimonials.png" alt="">
                    </div>
                    <div class="testimonials-rows">
                        <div class="testimonial">
                            <div class="testimonial-quotes">“</div>
                            <div class="testimonial-content">
                                <p>It was such a pleasure to be involved with the CVU. The project was amazing, and the organization was top notch. I loved getting to hear so many wonderful minds, and work with CVU crew. Congratulations to all involved for producing such a tremendous event.</p>
                                <div class="testimonial-author">
                                    <strong>Mladen Miljanović</strong> / <span>Akademija umjetnosti Univerziteta u Banjoj Luci</span>
                                </div>
                            </div>
                        </div>
                        <div class="testimonial">
                            <div class="testimonial-quotes">“</div>
                            <div class="testimonial-content">
                                <p>I always look forward to involve my students with CVU projects because I know they are going to have a wonderful experience. The adjudicators are of the highest caliber, and the students get to experience different cultural forms! They are a highly organized and well-run organisation.</p>
                                <div class="testimonial-author">
                                    <strong>Jelena Grubor</strong> / <span>Akademija umjetnosti Univerziteta u Banjoj Luci</span>
                                </div>
                            </div>
                        </div>
                        <div class="testimonial">
                            <div class="testimonial-quotes">“</div>
                            <div class="testimonial-content">
                                <p>Thanks again for a great experience. We had a super time and were pleased with the friendly yet very educational experience. The featured performers were also first-rate and a tremendous inspiration.</p>
                                <div class="testimonial-author">
                                    <strong>Goran Damjanac</strong> / <span>Akademija umjetnosti Univerziteta u Banjoj Luci</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <div class="background-img background-right">
                <div class="background-wrapper">
                    <img src="<?= $rootPath ?>shared/assets/images/grafika-desna.svg" alt="">
                </div>
            </div>
            <section>
                <h2 class="section-heading">Who supported us</h2>
                <div class="support-partners">
                    <img src="<?= $rootPath ?>shared/assets/images/nprs.png" alt="">
                    <img src="<?= $rootPath ?>shared/assets/images/ubl.svg" alt="">
                    <img src="<?= $rootPath ?>shared/assets/images/aubl.svg" alt="">
                    <img src="<?= $rootPath ?>shared/assets/images/bd.svg" alt="">
                </div>
            </section>
        </main>
        <?php
        require_once "../shared/templates/footer.php";
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
    <script src="<?= $rootPath ?>shared/assets/js/posts-4.js"></script>
</body>

</html>