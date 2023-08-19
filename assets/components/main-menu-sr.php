<div class="slide-menu" data-menu="main-menu">

    <div class="slide-menu-body">
        <a href="home">
            <img src="assets/images/logo.svg" alt="" class="logo">
        </a>
        <div class="mobile-menu-items">
            <a href="home" class="slide-menu-item <?= activePage('home'); ?>">Naslovna</a>
            <a href="projekti" class="slide-menu-item <?= activePage('projekti'); ?>">Projekti</a>
            <a href="vijesti" class="slide-menu-item <?= activePage('vijesti'); ?>">Vijesti</a>
            <div class="slide-menu-accordion accordion">
                <span class="slide-menu-item accordion-name">O nama</span>
                <div class="accordion-body">
                    <div class="submenu-content">
                        <a href="centar-vizuelnih-umjetnosti" class="submenu-link">
                            <i class="ri-home-smile-2-line"></i>
                            <span>Upoznajte centar</span>
                        </a>
                        <a href="upoznajte-tim" class="submenu-link">
                            <i class="ri-team-line"></i>
                            <span>Upoznajte tim</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="slide-menu-accordion accordion">
                <span class="slide-menu-item accordion-name">Jezik</span>
                <div class="accordion-body">
                    <div class="lang-switch">
                        <a href="<?= $cleanUrl?>en/home" class="language <?= $language === 'en' ? 'active' : '' ?>">ENG</a>
                        <a href="<?= $cleanUrl?>sr/home" class="language <?= $language === 'sr' ? 'active' : '' ?>">SRB</a>
                    </div>
                </div>
            </div>
        </div>
        <i class="ri-close-line"></i>
    </div>
</div>