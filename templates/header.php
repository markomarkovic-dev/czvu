<header>
    <div class="header-container">
        <div class="header-left">
            <a href="home">
                <img src="assets/images/logo.svg" alt="CZVU logo" class="logo">
            </a>
        </div>
        <div class="header-center">
            <div class="menu-desktop">
                <a href="home" class="menu-desktop-link <?= activePage('home'); ?>"><?= $lang['global']['nav-home']?></a>
                <a href="projekti" class="menu-desktop-link <?= activePage('projekti'); ?>"><?= $lang['global']['nav-projects']?></a>
                <a href="umjetnici" class="menu-desktop-link <?= activePage('umjetnici'); ?>"><?= $lang['global']['nav-artists']?></a>
                <a href="vijesti" class="menu-desktop-link <?= activePage('vijesti'); ?>"><?= $lang['global']['nav-news']?></a>
                <span class="menu-desktop-link submenu about-page <?= activePage('centar-vizuelnih-umjetnosti'); activePage('upoznajte-tim');?>">

                    <?= $lang['global']['nav-about']?>
                    <div class="submenu-content">
                        <a href="centar-vizuelnih-umjetnosti" class="submenu-link <?= activePage('centar-vizuelnih-umjetnosti.php'); ?>">
                            <i class="ri-home-smile-2-line"></i>
                            <span><?= $lang['global']['nav-meet-center']?></span>
                        </a>
                        <a href="upoznajte-tim" class="submenu-link <?= activePage('upoznajte-tim'); ?>">
                            <i class="ri-team-line"></i>
                            <span><?= $lang['global']['nav-meet-team']?></span>
                        </a>
                    </div>
                </span>
                <a href="kontakt" class="menu-desktop-link <?= activePage('kontakt'); ?>"><?= $lang['global']['nav-contact']?></a>
            </div>
        </div>
        <div class="header-right">
            <div class="navigation">
                <div class="navigation-item open-menu" data-slide="share-menu">
                    <i class="ri-share-line"></i>
                </div>
                <div class="navigation-item open-menu" data-slide="main-menu">
                    <i class="ri-menu-line"></i>
                    <div class="main-menu">
                        <?php
                        require_once "assets/components/main-menu-mobile.php";
                        ?>
                    </div>
                </div>
                <div class="navigation-item open-menu" data-slide="language-menu">
                    <i class="ri-earth-line"></i>
                    <div class="slide-menu" data-menu="language-menu">
                        <div class="slide-menu-body">
                            <a href="<?= switchLang('/' . $language . '/', '/en/')?>" class="slide-menu-item <?= $language === 'en' ? 'active' : '' ?>">ENG</a>
                            <a href="<?= switchLang('/' . $language . '/', '/sr/')?>" class="slide-menu-item <?= $language === 'sr' ? 'active' : '' ?>">LAT</a>
                            <a href="<?= switchLang('/' . $language . '/', '/rs/')?>" class="slide-menu-item <?= $language === 'rs' ? 'active' : '' ?>">ЋИР</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
      require_once "assets/components/share-menu.php";
      require_once "assets/components/main-menu-mobile.php";
    ?>
</header>