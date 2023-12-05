<?php
include 'post-config.php';
$apiUrl = "$backendUrl/wp-json/wp/v2/projekti";

$queries = array();
parse_str($_SERVER['QUERY_STRING'], $queries);

$requestUrl = $apiUrl . '?_embed&slug=' . $queries['id'];

$data = json_decode(file_get_contents($requestUrl), true);
$post = $data[0];

//povezani projekti, prošlogodišnji projekti
$includeIDs = is_array($post["acf"]["povezani_projekti"]) ? implode(',', $post["acf"]["povezani_projekti"]) : $post["acf"]["povezani_projekti"];
$requestUrlRelatedPost = $apiUrl . '?_embed&include=' . $includeIDs;
$dataRelatedPost = json_decode(file_get_contents($requestUrlRelatedPost), true);

$titleString = strip_tags($post['title']['rendered']);
$descriptionString = strip_tags($post['excerpt']['rendered']);

$unwantedElements = array("&nbsp;", "<br>", "<br/>", "<p>", "</p>", "<strong>", "</strong>", "[…]");

//Očisti stringove od HTML tagova
$cleanedDescString = str_replace($unwantedElements, "",  $descriptionString);
$cleanedTitleString = str_replace($unwantedElements, "",  $titleString);

$postTitle = $cleanedTitleString;
$postDescription = $cleanedDescString;

$featureMediaImage = isset($post['_embedded']['wp:featuredmedia']) ? $post['_embedded']['wp:featuredmedia'][0]['source_url'] : 'assets/images/no-image.svg';
include('includes/global-header.php');

//u slučaju da je na wordpressu postavljen direktan link prema fajlu/slici, uredi ga da cilja na backend tj lokaciju Wordpress-a gdje je i sam fajl.
$postContent = str_replace($siteUrl, $backendUrl, $post['content']['rendered']);
?>

<div class="layout-container">
    <?php
    require_once "templates/header.php";
    ?>
    <main>
        <section id="project">
            <div id="post">
                <div class="post-wrapper">
                    <div class="project-header">
                        <div class="project-title">
                            <h1><?= $postTitle ?></h1>
                            <h2><?= $post['acf']['podnaslov'] ?></h2>
                        </div>
                        <i class="ri-arrow-down-line"></i>
                        <img src="<?= $featureMediaImage ?>" />
                    </div>
                    <div><?= $postContent ?></div>
                    <?php if ($post["acf"]["povezani_projekti"] !== "") : ?>
                        <div class="related-posts">
                            <?php foreach ($dataRelatedPost as $relatedPost) : ?>
                                <?php
                                $featureRelatedMediaImage = isset($relatedPost['_embedded']['wp:featuredmedia']) ? $relatedPost['_embedded']['wp:featuredmedia'][0]['source_url'] : 'assets/images/no-image.svg';
                                ?>
                                <article class="post">
                                    <div class="post-image">
                                        <img src="<?= $featureRelatedMediaImage ?>">
                                    </div>
                                    <div class="post-body">
                                        <a href="projekat?id=<?= $relatedPost["slug"] ?>" class="post-title"><?= $relatedPost["title"]["rendered"] ?></a>
                                    </div>
                                </article>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="background-img background-right">
                    <div class="background-wrapper">
                        <img src="assets/images/grafika-desna.svg" alt="">
                    </div>
                </div>
            </div>
        </section>

    </main>
    <?php include('includes/global-footer.php'); ?>
</div>
<script src="assets/js/gallery-modal.js"></script>