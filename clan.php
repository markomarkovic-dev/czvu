<?php
    require 'post-config.php';
    $backButton = array(
        'sr' => "<a class='back-to' href='upoznajte-tim'><i class='ri-arrow-left-line'></i> Nazad na osnivače i članove</a>",
        'en' => "<a class='back-to' href='upoznajte-tim'><i class='ri-arrow-left-line'></i> Back to founders and members</a>",
    );    
      
    $transMember = array(
        'sr' => array(
            "pozicija",
            "opis"
        ),
        'en' => array(
            "position",
            "description"
        )
    );

    $apiUrl = "$backendUrl/wp-json/wp/v2/clanovi";

    $queries = array();
    parse_str($_SERVER['QUERY_STRING'], $queries);

    $requestUrl = $apiUrl . '?_embed&slug=' . $queries['id'];

    $data = json_decode(file_get_contents($requestUrl), true);
    $post = $data[0];

    $shortenedString = substr($post['acf'][$transMember[$postLanguage][1]], 0, 152) . '...';

    $postTitle = $post['title']['rendered'];
    $postDescription = $shortenedString;
    
    $date = new DateTime($post['date']);
    $day = $date->format('d');
    $month = $date->format('m');
    $year = $date->format('Y');
    $formattedDate = $day . '.' . $month . '.' . $year . '.';

    $featureMediaImage = isset($post['_embedded']['wp:featuredmedia']) ? $post['_embedded']['wp:featuredmedia'][0]['source_url'] : 'assets/images/no-image.svg';
    include('includes/global-header.php');
?>
    <div class="layout-container">
        <?php
            require_once "templates/header.php";
        ?>
        <main>
        <div class="background-img background-left">
                <div class="background-wrapper">
                    <img src="assets/images/grafika-leva.svg" alt="">
                </div>
            </div>
            <section>
                <div id="member">
                <?php
                    global $postLanguage;
                    $member = '
                    <div class="profile-aside">
                    <img src="' . $featureMediaImage . '" alt="' . ($post['title']['rendered'] ? $post['title']['rendered'] : 'article image') . '" />
                    ' . $backButton[$postLanguage] . '
                    </div>
                    <div class="post-wrapper">
                    <h1 class="section-heading">' . $post['title']['rendered'] . '</h1>
                    <h2 class="section-heading">' . $post['acf'][$transMember[$postLanguage][0]] . '</h2>
                    <div>' . $post['acf'][$transMember[$postLanguage][1]] . '</div>
                    </div>';

                    echo $member;
                    ?>
                </div>
            </section>
        </main>
        <?php
            require_once "templates/footer.php";
        ?>
    </div>

    <script src="assets/js/gallery-modal.js"></script>
    <?php include('includes/global-footer.php'); ?>