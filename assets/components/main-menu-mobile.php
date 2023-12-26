<div class="slide-menu" data-menu="main-menu">

    <div class="slide-menu-body">
        <a href="home">
            <img src="assets/images/logo.svg" alt="" class="logo">
        </a>
        <div class="mobile-menu-items">
            <a href="home" class="slide-menu-item <?= activePage('home'); ?>"><?= $lang['global']['nav-home']?></a>
            <a href="projekti" class="slide-menu-item <?= activePage('projekti'); ?>"><?= $lang['global']['nav-projects']?></a>
            <a href="umjetnici" class="slide-menu-item <?= activePage('umjetnici'); ?>"><?= $lang['global']['nav-artists']?></a>
            <a href="vijesti" class="slide-menu-item <?= activePage('vijesti'); ?>"><?= $lang['global']['nav-news']?></a>
            <div class="slide-menu-accordion accordion">
                <span class="slide-menu-item accordion-name about-page"><?= $lang['global']['nav-about']?></span>
                <div class="accordion-body">
                    <div class="submenu-content">
                        <a href="centar-vizuelnih-umjetnosti" class="submenu-link">
                            <i class="ri-home-smile-2-line"></i>
                            <span><?= $lang['global']['nav-meet-center']?></span>
                        </a>
                        <a href="upoznajte-tim" class="submenu-link">
                            <i class="ri-team-line"></i>
                            <span><?= $lang['global']['nav-meet-team']?></span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="slide-menu-accordion accordion">
                <span class="slide-menu-item accordion-name"><?= $lang['global']['language']?></span>
                <div class="accordion-body">
                    <div class="lang-switch">
                        <a href="<?= switchLang('/' . $language . '/', '/en/')?>" class="language <?= $language === 'en' ? 'active' : '' ?>">ENG</a>
                        <a href="<?= switchLang('/' . $language . '/', '/sr/')?>" class="language <?= $language === 'sr' ? 'active' : '' ?>">LAT</a>
                        <a href="<?= switchLang('/' . $language . '/', '/rs/')?>" class="language <?= $language === 'sr-cir' ? 'active' : '' ?>">ЋИР</a>
                    </div>
                </div>
            </div>
        </div>
        <i class="ri-close-line"></i>
    </div>
</div>