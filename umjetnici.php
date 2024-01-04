<?php
include('includes/global-header.php');

$transMember = array(
    'sr' => array(
        "pozicija",
        "opis",
    ),
    'rs' => array(
        "позиција",
        "опис",
        "име-презиме",
    ),
    'en' => array(
        "position",
        "description",
    )
);

$apiUrl = "$backendUrl/wp-json/wp/v2/umjetnici";

$requestUrlMembers = $apiUrl . '?_embed';

$members = json_decode(file_get_contents($requestUrlMembers), true);

?>
    <div class="layout-container">
        <?php
            require_once "templates/header.php";
        ?>
        <main>
            <section>
                <h1 class="section-heading"><?= $lang[$pagename]['artists-title']?></h1>                
                <div class="background-img background-right">
                    <div class="background-wrapper">
                        <img src="assets/images/grafika-desna.svg" alt="">
                    </div>
                </div>
                <p class="members-subheading"><?= $lang[$pagename]['artists-desc']?></p>
                <h2 class="section-heading"><?= $lang[$pagename]['title']?></h2>
                <div id="members" class="members">
                    <?php
                        foreach ($members as $member) {

                            $featureMediaImage = isset($member['_embedded']['wp:featuredmedia']) ? $member['_embedded']['wp:featuredmedia'][0]['media_details']['sizes']['full']['source_url'] : 'assets/images/no-image.svg';

                            $langCheckName = $language === "rs" ? $member["acf"][$transMember[$language][2]] : $member["title"]["rendered"];

                            $memberItem = '
                            <div class="member artist-profile modal-open" data-trigger="artist">
                                <div class="member-photo">
                                <img src="' . $featureMediaImage . '" alt="" />
                                </div>
                                <div class="member-data">
                                <p class="member-name">' . $langCheckName  . '</p>
                                <p class="member-profession">' . $member['acf'][$transMember[$language][0]] . '</p>
                                <div class="member-desc">'. $member['acf'][$transMember[$language][1]] .'</div>
                                </div>
                            </div>';
                            
                            echo $memberItem;
                        }
                    ?>
                </div>
            </section>
        </main>
        <div class="modal" data-modal="artist">
            <div class="modal-content modal-l">
                <i class="ri-close-line modal-close"></i>
                <div class="modal-content-body">
                    <div id="member" class="artist-modal">
                        <div class="profile-aside">
                            <img src="" class="artist-photo"/>
                        </div>
                        <div class="post-wrapper">
                            <h1 class="section-heading"></h1>
                            <h2 class="section-heading"></h2>
                            <div class="member-desc"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include('includes/global-footer.php'); ?>
    </div>
    <script src="assets/js/modal.js"></script>
    <script src="assets/js/artists.js"></script>
