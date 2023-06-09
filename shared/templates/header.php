<header>
    <div class="header-container">
        <div class="header-left">
            <a href="/<?php
                        if ($language !== 'sr') {
                            echo $language;
                        }
                        ?>">
                <img src="<?= $rootPath ?>shared/assets/images/logo.svg" alt="CZVU logo" class="logo">
            </a>
        </div>
        <div class="header-center">
            <div class="menu-desktop">
                <a href="/" class="menu-desktop-link <?= activePage(''); ?>">Naslovna</a>
                <a href="projekti" class="menu-desktop-link <?= activePage('projekti.php'); ?>">Projekti</a>
                <a href="umjetnici" class="menu-desktop-link <?= activePage('umjetnici.php'); ?>">Umjetnici</a>
                <a href="vijesti" class="menu-desktop-link <?= activePage('vijesti.php'); ?>">Vijesti</a>
                <span href="#" class="menu-desktop-link submenu">
                    O nama
                    <div class="submenu-content">
                        <a href="centar-vizuelnih-umjetnosti" class="submenu-link <?= activePage('centar-vizuelnih-umjetnosti.php'); ?>">
                            <i class="ri-home-smile-2-line"></i>
                            <span>Upoznajte centar</span>
                        </a>
                        <a href="upoznajte-tim" class="submenu-link <?= activePage('upoznajte-tim.php'); ?>">
                            <i class="ri-team-line"></i>
                            <span>Upoznajte tim</span>
                        </a>
                    </div>
                </span>

                <a href="#" class="menu-desktop-link">Contact</a>
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