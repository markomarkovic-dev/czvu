<?php
session_start(); // Start or resume the current session
$visitor_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$url = strtok($visitor_link, '?');
$language = basename(dirname($url));
$languageCategory = [
    'en' => 'categories=24',
    'sr' => 'categories=24',
];

$apiUrl = 'https://cvu.hardcode.solutions/wp-json/wp/v2/projekti';

$requestUrlProjects = $apiUrl . '?_embed&' . $languageCategory[$language];

$projects = json_decode(file_get_contents($requestUrlProjects), true);

?>

<?php include('includes/global-header.php'); ?>
<div class="layout-container">
    <?php require_once "templates/header.php"; ?>
    <main>
        <section>
            <h1 class="section-heading">Latest <strong>news & activities</strong></h1>
            <div class="projects" id="projects">
            <?php
                foreach ($projects as $project) {

                    $featureMediaImage = isset($project['_embedded']['wp:featuredmedia']) ? $project['_embedded']['wp:featuredmedia'][0]['media_details']['sizes']['full']['source_url'] : 'assets/images/no-image.svg';

                    $projectItem = '
                    <a href="projekat?id=' . $project['slug'] . '" class="block-link" id="theatre-festival">
                        <div class="block-link-left">
                            <h2>' . $project['title']['rendered'] . '</h2>
                            <h3>' . $project['acf']['podnaslov'] . '</h3>
                        </div>
                        <div class="block-link-right">
                            <i class="ri-arrow-right-up-line"></i>
                        </div>
                        <img src="' . $featureMediaImage . '" class="image-background"/>
                    </a>';
                    echo $projectItem;
                }
                ?>
            </div>
        </section>
    </main>
    <?php require_once "templates/footer.php"; ?>
</div>
<?php include('includes/global-footer.php'); ?>
