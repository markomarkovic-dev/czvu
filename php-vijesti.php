<?php
session_start(); // Start or resume the current session
$visitor_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "http" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$url = strtok($visitor_link, '?');
$language = basename(dirname($url));
$languageCategory = [
    'en' => 'categories=15',
    'sr' => 'categories=15',
];

$postMeta = array(
    'title' => isset($title) ? $title : 'CZVU', // Set a default value if $title is not defined
    'description' => isset($description) ? $description : 'CZVU', // Set a default value if $description is not defined
);

$apiUrl = 'https://cvu.hardcode.solutions/wp-json/wp/v2/posts';

$posts_per_page = 4; // Number of posts to fetch per request
$currentPage = isset($_GET['page']) ? intval($_GET['page']) : 1;

// Calculate the offset based on the current page
$offset = ($currentPage - 1) * $posts_per_page;

// If this is the first page, reset the stored posts
if ($currentPage === 1) {
    $_SESSION['loaded_posts'] = array();
}

$requestUrl4posts = $apiUrl . '?per_page=' . $posts_per_page . '&offset=' . $offset . '&_embed&' . $languageCategory[$language];

$posts = json_decode(file_get_contents($requestUrl4posts), true);

// Store the loaded posts in the session
$_SESSION['loaded_posts'] = array_merge($_SESSION['loaded_posts'], $posts);
?>

<?php include('includes/global-header.php'); ?>
<div class="layout-container">
    <?php
    require_once "templates/header.php";
    ?>
    <main>
        <section>
            <h1 class="section-heading">Latest <strong>news & activities</strong></h1>
            <div class="blog" id="blog">
                <?php
                foreach ($_SESSION['loaded_posts'] as $post4) {
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
            </div>
            <?php
            // Check if there are more posts to load
            $nextPage = $currentPage + 1;
            $nextOffset = $offset + $posts_per_page;
            $nextRequestUrl = $apiUrl . '?per_page=' . $posts_per_page . '&offset=' . $nextOffset . '&_embed&' . $languageCategory[$language];
            $nextPosts = json_decode(file_get_contents($nextRequestUrl), true);

            if (count($nextPosts) > 0) {
                ?>
                <div class="load-more-container">
                    <a href="?page=<?php echo $nextPage; ?>" class="load-more-button">Load More</a>
                </div>
            <?php } ?>
        </section>
    </main>
    <?php
    require_once "templates/footer.php";
    ?>
</div>
<?php include('includes/global-footer.php'); ?>
