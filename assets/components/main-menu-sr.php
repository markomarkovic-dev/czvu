<div class="slide-menu" data-menu="main-menu">

    <div class="slide-menu-body">
        <a href="">
            <img src="<?= $rootPath ?>shared/assets/images/logo.svg" alt="" class="logo">
        </a>
        <div class="mobile-menu-items">
            <a href="<?= $pagedir?>" class="slide-menu-item <?= activePage(''); ?>">Naslovna</a>
            <a href="<?= $pagedir?>/projekti" class="slide-menu-item <?= activePage('projekti'); ?>">Projekti</a>
            <a href="<?= $pagedir?>/umjetnici" class="slide-menu-item <?= activePage('umjetnici'); ?>">Umjetnici</a>
            <a href="<?= $pagedir?>/vijesti" class="slide-menu-item <?= activePage('vijesti'); ?>">Vijesti</a>
            <div class="slide-menu-accordion accordion">
                <span class="slide-menu-item accordion-name">O nama</span>
                <div class="accordion-body">
                    <div class="submenu-content">
                        <a href="<?= $pagedir?>/centar-vizuelnih-umjetnosti" class="submenu-link">
                            <i class="ri-home-smile-2-line"></i>
                            <span>Upoznajte centar</span>
                        </a>
                        <a href="<?= $pagedir?>/upoznajte-tim" class="submenu-link">
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
                        <a href="<?= $pagedir?>/en" class="language <?= activePage("en") ?>">ENG</a>
                        <a href="<?= $pagedir?>/" class="language <?= activePage("sr") ?>">SRB</a>
                    </div>
                </div>
            </div>
        </div>
        <i class="ri-close-line"></i>
    </div>
</div>