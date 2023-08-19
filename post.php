<?php
    require 'post-config.php';

    $postLanguageCategory = [
        'en' => 'categories=15',
        'sr' => 'categories=3',
    ];

    $apiUrl = "$backendUrl/wp-json/wp/v2/posts";

    $queries = array();
    parse_str($_SERVER['QUERY_STRING'], $queries);

    $requestUrl = $apiUrl . '?_embed&slug=' . $queries['id'];
    $requestUrl4posts = $apiUrl . '?per_page=4&_embed&' . $postLanguageCategory[$postLanguage];

    $posts = json_decode(file_get_contents($requestUrl4posts), true);
    $data = json_decode(file_get_contents($requestUrl), true);
    $post = $data[0];

    $descriptionString = strip_tags($post['excerpt']['rendered']);
    $unwantedElements = array("&nbsp;", "<br>", "<br/>", "<p>", "</p>");
    $cleanedString = str_replace($unwantedElements, "",  $descriptionString);

    $postTitle = $post['title']['rendered'];
    $postDescription = $cleanedString;
    
    $date = new DateTime($post['date']);
    $day = $date->format('d');
    $month = $date->format('m');
    $year = $date->format('Y');
    $formattedDate = $day . '.' . $month . '.' . $year . '.';

    $featureMediaImage = isset($post['_embedded']['wp:featuredmedia']) ? $post['_embedded']['wp:featuredmedia'][0]['source_url'] : 'assets/images/no-image.svg';
    include 'includes/global-header.php';
?>

    <div class="layout-container">
        <?php
        require_once "templates/header.php";
        ?>
        <main>
            <section class="post-section">
                <div id="post">
                    <?php
                    $postEl = '
                    <div class="post-wrapper">
                      <img class="featured-image" src="' . $featureMediaImage . '" alt="' . ($post['title']['rendered'] ? $post['title']['rendered'] : 'article image') . '" />
                      <h1 class="section-heading">' . $post['title']['rendered'] . '</h1>
                      <div class="post-meta">
                        <div class="post-date">' . $formattedDate . '</div>
                        <div class="post-share">
                          <p>Share: </p>
                          <div class="share-icons">
                            <a href="https://www.facebook.com/sharer.php?u=' . $visitor_link . '&t=' . $post['title']['rendered'] . '&v=3" target="_blank"><i class="ri-facebook-line"></i></a>
                            <a href="https://www.linkedin.com/shareArticle?mini=true&url=' . $visitor_link . '&title=' . $post['title']['rendered'] . '" target="_blank"><i class="ri-linkedin-line"></i></a>
                            <a href="https://twitter.com/intent/tweet?text=' . $post['title']['rendered'] . '%20' . $visitor_link . '" target="_blank"><i class="ri-twitter-line"></i></a>
                            <a href="viber://forward?text=' . $visitor_link . '"><img src="assets/icons/viber.svg"></a>
                            <a href="whatsapp://send?text=' . $visitor_link . '"><i class="ri-whatsapp-line"></i></a>
                          </div>
                        </div>
                      </div>
                      <div>' . $post['content']['rendered'] . '</div>
                    </div>';
                    echo $postEl;
                    ?>
                </div>
                <aside id="latest-posts">
                    <h2 class="section-heading">Recent news</h2>

                    <?php
                    foreach ($posts as $post4) {
                        $date = new DateTime($post4['date']);
                        $day = $date->format('d');
                        $month = $date->format('m');
                        $year = $date->format('Y');
                        $formattedDate = $day . '.' . $month . '.' . $year . '.';

                        $featureMediaImage4 = isset($post4['_embedded']['wp:featuredmedia']) ? $post4['_embedded']['wp:featuredmedia'][0]['media_details']['sizes']['medium']['source_url'] : 'assets/images/no-image.svg';

                        $postRecent = '
                          <article class="post">
                              <div class="post-image">
                              <img src="' . $featureMediaImage4 . '" />
                              </div>
                              <div class="post-body">
                                  <a href="post?id=' . $post4['slug'] . '" class="post-title">' . $post4['title']['rendered'] . '</a>
                                  <div class="post-meta">
                                      <span class="post-date">' . $formattedDate . '</span>
                                  </div>
                              </div>
                          </article>';
                        echo $postRecent;
                    }
                    ?>
                </aside>
            </section>

        </main>
        <?php
        require_once "templates/footer.php";
        ?>
    </div>
    <script src="assets/js/gallery-modal.js"></script>
    <?php include('includes/global-footer.php'); ?>