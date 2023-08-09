<?php
session_start(); // Start or resume the current session
$visitor_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$url = strtok($visitor_link, '?');
$language = basename(dirname($url));
// $languageCategory = [
//     'en' => 'categories=24',
//     'sr' => 'categories=24',
// ];

$apiUrl = 'https://cvu.hardcode.solutions/wp-json/wp/v2/clanovi';

$requestUrlMembers = $apiUrl . '?_embed';

$members = json_decode(file_get_contents($requestUrlMembers), true);

?>

<?php include('includes/global-header.php'); ?>
    <div class="layout-container">
        <?php
            require_once "templates/header.php";
        ?>
        <main>
            <section>
                <h1 class="section-heading">We are the <strong>people</strong> who do a lot <strong>for culture</strong></h1>
                <div class="background-img background-right">
                    <div class="background-wrapper">
                        <img src="assets/images/grafika-desna.svg" alt="">
                    </div>
                </div>
                <h2 class="section-heading">Founders of the center for visual art</h2>
                <div id="founders" class="members">
                 <?php
                        foreach ($members as $member) {

                            $featureMediaImage = isset($member['_embedded']['wp:featuredmedia']) ? $member['_embedded']['wp:featuredmedia'][0]['media_details']['sizes']['full']['source_url'] : 'assets/images/no-image.svg';

                            $memberItem = '
                            <a href="clan?id=' . $member['slug'] . '" class="members">
                                <div class="member">
                                    <div class="member-photo">
                                    <img src="' . $featureMediaImage . '" alt="" />
                                    </div>
                                    <div class="member-data">
                                    <p class="member-name">' . $member['title']['rendered'] . '</p>
                                    <p class="member-profession">' . $member['acf']['pozicija'] . '</p>
                                    </div>
                                </div>
                            </a>';
                            
                            if($member['acf']['clanstvo'] === "osnivac") {
                                echo $memberItem;
                            }
                        }
                    ?>
                </div>
                <h2 class="section-heading">Members of the center for visual art</h2>
                <div id="members" class="members">
                <?php
                        foreach ($members as $member) {

                            $featureMediaImage = isset($member['_embedded']['wp:featuredmedia']) ? $member['_embedded']['wp:featuredmedia'][0]['media_details']['sizes']['full']['source_url'] : 'assets/images/no-image.svg';

                            $memberItem = '
                            <a href="clan?id=' . $member['slug'] . '" class="members">
                                <div class="member">
                                    <div class="member-photo">
                                    <img src="' . $featureMediaImage . '" alt="" />
                                    </div>
                                    <div class="member-data">
                                    <p class="member-name">' . $member['title']['rendered'] . '</p>
                                    <p class="member-profession">' . $member['acf']['pozicija'] . '</p>
                                    </div>
                                </div>
                            </a>';
                            
                            if($member['acf']['clanstvo'] === "clan") {
                                echo $memberItem;
                            }
                        }
                    ?>
                </div>
            </section>
        </main>
        <?php
            require_once "templates/footer.php";
        ?>
    </div>
    <?php include('includes/global-footer.php'); ?>