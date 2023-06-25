<div class="slide-menu" data-menu="main-menu">

    <div class="slide-menu-body">
        <a href="<?= $globUrl?>">
            <img src="<?= $rootPath ?>shared/assets/images/logo.svg" alt="" class="logo">
        </a>
        <div class="mobile-menu-items">
            <a href="<?= $globUrl?>" class="slide-menu-item <?= activePage(''); ?>">Naslovna</a>
            <a href="<?= $globUrl?>projekti" class="slide-menu-item <?= activePage('projekti'); ?>">Projekti</a>
            <a href="<?= $globUrl?>umjetnici" class="slide-menu-item <?= activePage('umjetnici'); ?>">Umjetnici</a>
            <a href="<?= $globUrl?>vijesti" class="slide-menu-item <?= activePage('vijesti'); ?>">Vijesti</a>
            <div class="slide-menu-accordion accordion">
                <span class="slide-menu-item accordion-name">O nama</span>
                <div class="accordion-body">
                    <div class="submenu-content">
                        <a href="<?= $globUrl?>centar-vizuelnih-umjetnosti" class="submenu-link">
                            <i class="ri-home-smile-2-line"></i>
                            <span>Upoznajte centar</span>
                        </a>
                        <a href="<?= $globUrl?>upoznajte-tim" class="submenu-link">
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
                        <a href="<?= $globUrl?>en" class="language <?= active("en") ?>">ENG</a>
                        <a href="<?= $globUrl?>" class="language <?= active("sr") ?>">SRB</a>
                    </div>
                </div>
            </div>
        </div>
        <i class="ri-close-line"></i>
    </div>
</div>