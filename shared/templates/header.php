<header>
    <div class="header-container">
        <div class="header-left">
            <a href="<?= $pagedir?>/<?php
                        if ($language !== 'sr') {
                            echo $language;
                        }
                        ?>">
                <img src="<?= $rootPath ?>shared/assets/images/logo.svg" alt="CZVU logo" class="logo">
            </a>
        </div>
        <div class="header-center">
            <div class="menu-desktop">
                <a href="<?= $pagedir?>/" class="menu-desktop-link <?= activePage(''); ?>">Naslovna</a>
                <a href="<?= $pagedir?>/projekti" class="menu-desktop-link <?= activePage('projekti'); ?>">Projekti</a>
                <a href="<?= $pagedir?>/umjetnici" class="menu-desktop-link <?= activePage('umjetnici'); ?>">Umjetnici</a>
                <a href="<?= $pagedir?>/vijesti" class="menu-desktop-link <?= activePage('vijesti'); ?>">Vijesti</a>
                <span href="#" class="menu-desktop-link submenu <?= activePage('centar-vizuelnih-umjetnosti'); activePage('upoznajte-tim'); ?>">
                    O nama
                    <div class="submenu-content">
                        <a href="<?= $pagedir?>/centar-vizuelnih-umjetnosti" class="submenu-link <?= activePage('centar-vizuelnih-umjetnosti.php'); ?>">
                            <i class="ri-home-smile-2-line"></i>
                            <span>Upoznajte centar</span>
                        </a>
                        <a href="<?= $pagedir?>/upoznajte-tim" class="submenu-link <?= activePage('upoznajte-tim'); ?>">
                            <i class="ri-team-line"></i>
                            <span>Upoznajte tim</span>
                        </a>
                    </div>
                </span>
                <a href="<?= $pagedir?>/kontakt" class="menu-desktop-link <?= activePage('kontakt'); ?>">Kontakt</a>
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
                        require_once "assets/components/main-menu-$language.php";
                        ?>
                    </div>
                </div>
                <div class="navigation-item open-menu" data-slide="language-menu">
                    <i class="ri-earth-line"></i>
                    <div class="slide-menu" data-menu="language-menu">
                        <div class="slide-menu-body">
                            <a href="<?= $pagedir?>/en" class="slide-menu-item <?= active("en") ?>">ENG</a>
                            <a href="<?= $pagedir?>/" class="slide-menu-item <?= active("sr") ?>">SRB</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    if ($language !== 'sr') {
        require_once "../shared/components/share-menu.php";
    } else {
        require_once "shared/components/share-menu.php";
    }
    require_once "assets/components/main-menu-$language.php";
    ?>
</header>