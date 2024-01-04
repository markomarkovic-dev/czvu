<?php
    require 'post-config.php';

    $languageCategory = [
        'en' => 'categories=15',
        'sr' => 'categories=35',
        'rs' => 'categories=3',
    ];

    $projectLanguageCategory = [
        'en' => 'categories=24',
        'sr' => 'categories=33',
        'rs' => 'categories=22',
    ];

    $apiUrl = "$backendUrl/wp-json/wp/v2/posts";
    $requestUrl4posts = $apiUrl . '?per_page=4&_embed&' . $languageCategory[$postLanguage];
    $posts = json_decode(file_get_contents($requestUrl4posts), true);

    $projectApiUrl = "$backendUrl/wp-json/wp/v2/projekti";
    $requestUrlProjects = $projectApiUrl . '?_embed&' . $projectLanguageCategory[$postLanguage];
    $projects = json_decode(file_get_contents($requestUrlProjects), true);
?>
<?php include('includes/global-header.php'); ?>
    <div class="layout-container">
    <?php 
        //primjer ubacivanja template-a
        include('templates/header.php');
    ?>
        <main>
            <section class="landing-section">
                <div class="owl-carousel owl-theme main-slider">
                    <div class="slide we-are-slide">
                        <h1><?= $lang['global']['heading']?></h1>
                        <a href="upoznajte-tim" class="action-link"><?= $lang[$pagename]['subheading']?></a>
                    </div>
                    <?php
                        foreach ($projects as $project) {

                        $featureMediaImage = isset($project['_embedded']['wp:featuredmedia']) ? $project['_embedded']['wp:featuredmedia'][0]['media_details']['sizes']['full']['source_url'] : 'assets/images/no-image.svg';

                        $projectItem = '
                        <div class="slide project-slide" style="background-image: url('.$featureMediaImage .')">
                            <h1>' . $project['title']['rendered'] . '</h1>
                            <a href="projekat?id=' . $project['slug'] . '" class="action-link">' . $lang[$pagename]['subheading'] . '</a>
                        </div>';
                        echo $projectItem;
                    }
                    ?>
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
                    <a href="#supported-by" class="action-card">
                        <div class="action-card-content">
                            <h3><?= $lang[$pagename]['support-us']?></h3>
                            <p class="action-link"><?= $lang[$pagename]['supporters']?></p>
                        </div>
                        <img src="assets/images/heart-silhouette.svg" alt="">
                    </a>
                    <a href="umjetnici" class="action-card">
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
            <section class="virtual-exhibition">
                <a href="#" class="action-link modal-open" data-trigger="view3d"><?= $lang[$pagename]['virtual-exhibition']?></a>
            </section>
            <div class="background-img background-right">
                <div class="background-wrapper">
                    <img src="assets/images/grafika-desna.svg" alt="">
                </div>
            </div>
            <section id="supported-by">
                <h2 class="section-heading"><?= $lang[$pagename]['supporters']?></h2>
                <div class="support-partners">
                    <img src="assets/images/nprs.png" alt="">
                    <img src="assets/images/ubl.svg" alt="">
                    <img src="assets/images/aubl.svg" alt="">
                    <img src="assets/images/bd.svg" alt="">
                    <img src="assets/images/muzej-savremene-umjetnosti-republike-srpske-banja-luka-logo.svg" alt="">
                    <img src="assets/images/filozofski-fakultet-beograd-logo.svg" alt="">
                </div>
            </section>
        </main>
        <?php include('includes/global-footer.php'); ?>
    </div>
    <div class="modal modal-view3d" data-modal="view3d">
        <div class="modal-content modal-xl">
            <i class="ri-close-line modal-close"></i>
            <div class="modal-content-body">
                <div id="view3d">

                </div>
            </div>
        </div>
    </div>

<script src="assets/js/modal.js"></script>
<script src="assets/js/home.js"></script>

