<?php
include('includes/global-header.php');

$transMember = array(
    'sr' => array(
        "pozicija",
        ""
    ),
    'rs' => array(
        "позиција",
        "име-презиме"
    ),
    'en' => array(
        "position",
        ""
    )
);

$apiUrl = "$backendUrl/wp-json/wp/v2/clanovi";

$requestUrlMembers = $apiUrl . '?_embed';

$members = json_decode(file_get_contents($requestUrlMembers), true);

?>
    <div class="layout-container">
        <?php
            require_once "templates/header.php";
        ?>
        <main>
            <section>
                <h1 class="section-heading"><?= $lang['global']['heading']?></h1>                
                <div class="background-img background-right">
                    <div class="background-wrapper">
                        <img src="assets/images/grafika-desna.svg" alt="">
                    </div>
                </div>
                <p class="members-subheading"><?= $lang[$pagename]['members-description']?></p>
                <h2 class="section-heading"><?= $lang[$pagename]['founders-of']?></h2>
                <div id="founders" class="members">
                 <?php
                        foreach ($members as $member) {
                            $featureMediaImage = isset($member['_embedded']['wp:featuredmedia']) ? $member['_embedded']['wp:featuredmedia'][0]['media_details']['sizes']['full']['source_url'] : 'assets/images/no-image.svg';

                            $langCheckName = $language === "rs" ? $member["acf"][$transMember[$language][1]] : $member["title"]["rendered"];

                            $memberItem = '
                            <a href="clan?id=' . $member['slug'] . '" class="members">
                                <div class="member">
                                    <div class="member-photo">
                                    <img src="' . $featureMediaImage . '" alt="" />
                                    </div>
                                    <div class="member-data">
                                    <p class="member-name">' . $langCheckName . '</p>
                                    <p class="member-profession">' . $member['acf'][$transMember[$language][0]] . '</p>
                                    </div>
                                </div>
                            </a>';
                            if($member['acf']['clanstvo'] === "osnivac") {
                                echo $memberItem;
                            }
                        }
                    ?>
                </div>
                <h2 class="section-heading"><?= $lang[$pagename]['members-of']?></h2>
                <div id="members" class="members">
                <?php
                        foreach ($members as $member) {

                            $featureMediaImage = isset($member['_embedded']['wp:featuredmedia']) ? $member['_embedded']['wp:featuredmedia'][0]['media_details']['sizes']['full']['source_url'] : 'assets/images/no-image.svg';

                            $langCheckName = $language === "rs" ? $member["acf"][$transMember[$language][1]] : $member["title"]["rendered"];

                            $memberItem = '
                            <a href="clan?id=' . $member['slug'] . '" class="members">
                                <div class="member">
                                    <div class="member-photo">
                                    <img src="' . $featureMediaImage . '" alt="" />
                                    </div>
                                    <div class="member-data">
                                    <p class="member-name">' . $langCheckName  . '</p>
                                    <p class="member-profession">' . $member['acf'][$transMember[$language][0]] . '</p>
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
        <?php include('includes/global-footer.php'); ?>
    </div>