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

    $titleString = strip_tags($post['title']['rendered']);
    $descriptionString = strip_tags($post['excerpt']['rendered']);
    
    $unwantedElements = array("&nbsp;", "<br>", "<br/>", "<p>", "</p>", "<strong>", "</strong>", "[…]");
    
    //Očisti stringove od HTML tagova
    $cleanedDescString = str_replace($unwantedElements, "",  $descriptionString);
    $cleanedTitleString = str_replace($unwantedElements, "",  $titleString);

    $postTitle = $cleanedTitleString;
    $postDescription = $cleanedDescString;

    $postDate = formatDate($post['date']);

    $featureMediaImage = isset($post['_embedded']['wp:featuredmedia']) ? $post['_embedded']['wp:featuredmedia'][0]['source_url'] : 'assets/images/no-image.svg';
    include 'includes/global-header.php';

    //u slučaju da je na wordpressu postavljen direktan link prema fajlu/slici, uredi ga da cilja na backend tj lokaciju Wordpress-a gdje je i sam fajl.
    $postContent = str_replace($siteUrl, $backendUrl, $post['content']['rendered']);   
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
                      <img class="featured-image" src="' . $featureMediaImage . '" alt="' . ($postTitle ? $postTitle : 'article image') . '" />
                      <h1 class="section-heading">' . $postTitle . '</h1>
                      <div class="post-meta">
                        <div class="post-date">' . $postDate . '</div>
                        <div class="post-share">
                          <p>Share: </p>
                          <div class="share-icons">
                            <a href="https://www.facebook.com/sharer.php?u=' . $visitor_link . '&t=' . $postTitle . '&v=3" target="_blank"><i class="ri-facebook-line"></i></a>
                            <a href="https://www.linkedin.com/shareArticle?mini=true&url=' . urlencode($visitor_link) . '&title=' . $postTitle . '" target="_blank"><i class="ri-linkedin-line"></i></a>
                            <a href="https://twitter.com/intent/tweet?text=' . $postTitle . '%20' . $visitor_link . '" target="_blank"><i class="ri-twitter-line"></i></a>
                            <a href="viber://forward?text=' . $visitor_link . '"><img src="assets/icons/viber.svg"></a>
                            <a href="whatsapp://send?text=' . $visitor_link . '"><i class="ri-whatsapp-line"></i></a>
                          </div>
                        </div>
                      </div>
                      <div>' . $postContent . '</div>
                    </div>';
                    echo $postEl;
                    ?>
                </div>
                <aside id="latest-posts">
                    <h2 class="section-heading">Recent news</h2>

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
                </aside>
            </section>

        </main>
        <?php include('includes/global-footer.php'); ?>
    </div>
    <script src="assets/js/gallery-modal.js"></script>