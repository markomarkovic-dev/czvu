<?php
    require 'post-config.php';
    $backButton = array(
        'sr' => "<a class='back-to' href='upoznajte-tim'><i class='ri-arrow-left-line'></i> Nazad na osnivače i članove</a>",
        'rs' => "<a class='back-to' href='upoznajte-tim'><i class='ri-arrow-left-line'></i> Назад на осниваче и чланове</a>",
        'en' => "<a class='back-to' href='upoznajte-tim'><i class='ri-arrow-left-line'></i> Back to founders and members</a>",
    );    
      
    $transMember = array(
        'sr' => array(
            "pozicija",
            "opis",
        ),
        'rs' => array(
            "позиција",
            "опис",
            "име-презиме"
        ),
        'en' => array(
            "position",
            "description",
        )
    );

    $apiUrl = "$backendUrl/wp-json/wp/v2/osnivaci";

    $queries = array();
    parse_str($_SERVER['QUERY_STRING'], $queries);

    $requestUrl = $apiUrl . '?_embed&slug=' . $queries['id'];

    $data = json_decode(file_get_contents($requestUrl), true);
    $post = $data[0];

    // $shortenedString = substr($post['acf'][$transMember[$postLanguage][1]], 0, 152) . '...';

    $titleString = strip_tags($post['title']['rendered']);
    $descriptionString = strip_tags($post['acf'][$transMember[$postLanguage][1]]);
    
    $unwantedElements = array("&nbsp;", "<br>", "<br/>", "<p>", "</p>", "<strong>", "</strong>", "[…]");
    
    //Očisti stringove od HTML tagova
    $cleanedDescString = str_replace($unwantedElements, "",  $descriptionString);
    $cleanedTitleString = str_replace($unwantedElements, "",  $titleString);

    $shortenedString = substr($cleanedDescString, 0, 180);

    $postTitle = $cleanedTitleString;
    $postDescription = $shortenedString;

    $postDate = formatDate($post['date']);

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
                    global $language;
                    $langCheckName = $language === "rs" ? $post["acf"][$transMember[$language][2]] : $post["title"]["rendered"];
                        $member = '
                        <div class="profile-aside">
                            <img src="' . $featureMediaImage . '" alt="' . ($postTitle ? $postTitle : 'article image') . '" />
                            ' . $backButton[$language] . '
                        </div>
                        <div class="post-wrapper">
                            <h1 class="section-heading">' . $langCheckName . '</h1>
                            <h2 class="section-heading">' . $post['acf'][$transMember[$language][0]] . '</h2>
                            <div class="member-desc">' . $post['acf'][$transMember[$language][1]] . '</div>
                        </div>';
                    echo $member;
                    ?>
                </div>
            </section>
        </main>
        
    <?php include('includes/global-footer.php'); ?>
    </div>

    <script src="assets/js/gallery-modal.js"></script>
    <script>
        $(".about-page").addClass("active");
    </script>