<?php
    require 'post-config.php';

    $languageCategory = [
        'en' => 'categories=15',
        'sr' => 'categories=3',
        'rs' => 'categories=3',
    ];

    $apiUrl = "$backendUrl/wp-json/wp/v2/posts";

    $requestUrl4posts = $apiUrl . '?per_page=4&_embed&' . $languageCategory[$postLanguage];

    $posts = json_decode(file_get_contents($requestUrl4posts), true);

?>
<?php include('includes/global-header.php'); ?>
    <div class="layout-container">
    <?php 
        //primjer ubacivanja template-a
        include('templates/header.php');
    ?>
        <main>
            <section class="landing-section">
                <div class="owl-carousel main-slider">
                    <div class="slide we-are-slide">
                        <h1><?= $lang['global']['heading']?></h1>
                        <a href="upoznajte-tim" class="action-link"><?= $lang[$pagename]['subheading']?></a>
                    </div>
                </div>
            </section>
            <section class="action-cards-container">
                <div class="action-cards">
                    <a href="projekti" href="projekti" class="action-card">
                        <div class="action-card-content">
                            <h3><?= $lang['global']['interested']?></h3>
                            <p class="action-link"><?= $lang['global']['check-projects']?></p>
                        </div>
                        <img src="assets/images/picture-silhouette.svg" alt="">
                    </a>
                    <a href="kontakt" class="action-card">
                        <div class="action-card-content">
                            <h3><?= $lang[$pagename]['involved']?></h3>
                            <p class="action-link"><?= $lang[$pagename]['call-us']?></p>
                        </div>
                        <img src="assets/images/s-silhouette.svg" alt="">
                    </a>
                    <a href="vijesti" class="action-card">
                        <div class="action-card-content">
                            <h3><?= $lang[$pagename]['support-us']?></h3>
                            <p class="action-link"><?= $lang[$pagename]['supporters']?></p>
                        </div>
                        <img src="assets/images/heart-silhouette.svg" alt="">
                    </a>
                    <a href="upoznajte-tim" class="action-card">
                        <div class="action-card-content">
                            <h3><?= $lang[$pagename]['participated']?></h3>
                            <p class="action-link"><?= $lang[$pagename]['participants']?></p>
                        </div>
                        <img src="assets/images/user-silhouette.svg" alt="">
                    </a>
                </div>
            </section>
            <div class="background-img background-right">
                <div class="background-wrapper">
                    <img src="assets/images/grafika-desna.svg" alt="">
                </div>
            </div>
            <section>
                <h2 class="section-heading"><?= $lang[$pagename]['latest-news']?></h2>
                <div class="blog-latest" id="blog-latest">
                <?php
                    foreach ($posts as $post4) {
                    $postDate = formatDate($post4['date']);

                        $featureMediaImage4 = isset($post4['_embedded']['wp:featuredmedia']) ? $post4['_embedded']['wp:featuredmedia'][0]['media_details']['sizes']['medium']['source_url'] : 'assets/images/no-image.svg';

                        $postRecent = '
                          <article class="post">
                              <div class="post-image">
                              <img src="' . $featureMediaImage4 . '" />
                              </div>
                              <div class="post-body">
                                  <a href="post?id=' . $post4['slug'] . '" class="post-title">' . $post4['title']['rendered'] . '</a>
                                  <div class="post-meta">
                                      <span class="post-date">' . $postDate . '</span>
                                  </div>
                              </div>
                          </article>';
                        echo $postRecent;
                    }
                    ?>
                </div>
                <a href="vijesti" class="action-link blog-more"><?= $lang[$pagename]['more-news']?></a>
            </section>
            <div class="background-img background-left">
                <div class="background-wrapper">
                    <img src="assets/images/grafika-leva.svg" alt="">
                </div>
            </div>
            <section class="testimonial-section">
                <h2 class="section-heading"><?= $lang[$pagename]['others-say']?></h2>
                <div class="testimonials">
                    <div class="testimonials-images">
                        <img src="assets/images/testimonials.png" alt="">
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
                    <img src="assets/images/grafika-desna.svg" alt="">
                </div>
            </div>
            <section>
                <h2 class="section-heading"><?= $lang[$pagename]['supporters']?></h2>
                <div class="support-partners">
                    <img src="assets/images/nprs.png" alt="">
                    <img src="assets/images/ubl.svg" alt="">
                    <img src="assets/images/aubl.svg" alt="">
                    <img src="assets/images/bd.svg" alt="">
                </div>
            </section>
        </main>
        <?php
            require_once "templates/footer.php";
        ?>
    </div>

    <?php include('includes/global-footer.php'); ?>
    <script>
        $('.main-slider').owlCarousel({
            loop: false,
            margin: 10,
            nav: true,
            dots: true,
            items: 1,
            autoplay: true,
            autoplayTimeout: 3000
        })
    </script>