<?php 
    if($language == "sr") {
        $copyLink = "Kopiraj link";
    } else if ($language == "en") {
        $copyLink = "Copy link";
    }
?>

<div class="slide-menu" data-menu="share-menu">
    <div class="slide-menu-header">
        <i class="lnc lnc-x close-menu"></i>
    </div>
    <div class="slide-menu-body">
        <div class="slide-menu-item copy-link" data-link="https://czvu.com/"><i class="ri-file-copy-line"></i> <?= $copyLink?></div>
        <a href="https://www.facebook.com/sharer.php?u=https://czvu.com//&t=Home&v=3" target="_blank" class="slide-menu-item"><i class="ri-facebook-line"></i> Facebook</a>
        <a href="https://www.linkedin.com/shareArticle?mini=true&url=https://czvu.com//&title=Home" target="_blank" class="slide-menu-item copy-link"><i class="ri-linkedin-line"></i> Linkedin</a>
        <a href="https://twitter.com/intent/tweet?text=Home%20https://czvu.com//" target="_blank" class="slide-menu-item"><i class="ri-twitter-line"></i> Twitter</a>
        <a href="viber://forward?text=https://czvu.com/" target="_blank" class="slide-menu-item"><img src="<?= $rootPath ?>shared/assets/icons/viber.svg"></i> Viber</a>
        <a href="whatsapp://send?text=https://czvu.com/" target="_blank"  class="slide-menu-item"><i class="ri-whatsapp-line"></i> Whatsapp</a>
    </div>
</div>