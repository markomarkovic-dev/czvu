<?php
    include 'post-config.php';
    $apiUrl = "$backendUrl/wp-json/wp/v2/projekti";

    $queries = array();
    parse_str($_SERVER['QUERY_STRING'], $queries);

    $requestUrl = $apiUrl . '?_embed&slug=' . $queries['id'];

    $data = json_decode(file_get_contents($requestUrl), true);
    $post = $data[0];

    $descriptionString = strip_tags($post['excerpt']['rendered']);
    $unwantedElements = array("&nbsp;", "<br>", "<br/>", "<p>", "</p>");
    $cleanedString = str_replace($unwantedElements, "",  $descriptionString);

    $title = $post['title']['rendered'];
    $description = $cleanedString;
    
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
            <section id="project">
                <div id="post">
                    <?php
                    $postEl = '
                    <div class="post-wrapper">
                        <div class="project-header">
                        <div class="project-title">
                            <h1>' . $post['title']['rendered'] . '</h1>
                            <h2>' . $post['acf']['podnaslov'] . '</h2>
                        </div>
                        <i class="ri-arrow-down-line"></i>
                        <img src="' . $featureMediaImage . '" />
                        </div>
                        <div>' . $post['content']['rendered'] . '</div>
                    </div>';
                    echo $postEl;
                    ?>
                </div>
                <div class="background-img background-right">
                    <div class="background-wrapper">
                        <img src="assets/images/grafika-desna.svg" alt="">
                    </div>
                </div>
            </section>

        </main>
        <?php
        require_once "templates/footer.php";
        ?>
    </div>
    <script src="assets/js/gallery-modal.js"></script>
    <?php include('includes/global-footer.php'); ?>