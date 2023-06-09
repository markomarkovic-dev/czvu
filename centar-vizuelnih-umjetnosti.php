<?php
require_once "config.php";
$title = "Upoznajte centar vizuelne umjetnosti";
$description = "Ekskluzivni sportski program, najbolji filmski i serijski program, najnovija izdanja glazbe, svjetski poznati informativni kanal lokaliziran za događaje u Srbiji i regiji.";
$keywords = "sport, kanali, video";
$rootPage = "transparent";
?>
<!DOCTYPE html>
<html lang=<?= $language ?>>
<?php
require_once "shared/templates/head.php";
?>

<body>
    <div class="layout-container">
        <?php
            require_once "shared/templates/header.php";
        ?>
        <main>
            <div class="background-img background-left">
                <div class="background-wrapper">
                    <img src="<?= $rootPath ?>shared/assets/images/grafika-leva.svg" alt="">
                </div>
            </div>
            <section>
                <h1 class="section-heading">Meet the <strong>Center for Visual Art</strong></h1>
                <div class="section-row">
                    <div class="section-column column-65">
                        <p>Centar za vizuelnu umjetnost osnovan je kao produžena ruka Akademije umjetnosti Univerziteta u Banjoj Luci u februaru 2022. godine. Svrha osnivanja ovog udruženja je proizašla iz potrebe za konstruktivnijim povezivanjem institucija visokog obrazovanja, institucija kulture, osnovnih i srednjih škola, u cilju omogućavanja temeljnijeg istraživačkog i praktičnog rada studenata i mladih umjetnika u oblasti savremenog vizuelnog stvaralaštva, sa namjerom da se podstakne generacijsko profesionalno umrežavanje, kao i praktično ovladavanje metodologijom obrazovne i pedagoške prakse.</p>
                        <p>Osnovni ciljevi udruženja su promocija i razvijanje kulturno-umjetničkih djelatnosti od nacionalnog, regionalnog i međunarodnog značaja. Promocija mladih umjetnika iz oblasti vizuelnih umjetnosti se izvodi kroz različite projekte te pružanje mogućnosti za organizaciju filmskih i pozorišnih projekata, izložbi, objavljivanja dramskih tekstova, različitih stručnih radionica, festivala i predstava. Na ovaj način se podstiče razvoj lokalnih zajednica i povezivanje različitih sektora unutar svake zajednice, što dalje doprinosi razvoju čitave kulturne sredine.</p>
                        <p>Prvi projekti koji nastaju u produkciji Centra za vizuelnu umjetnost u saradnji sa Akademijom umjetnosti u Banjoj Luci su PAF (Pozorišni akademski festival) i Interakcija. Ovi projekti su već dobili podršku Grada Banje Luke, Ministarstva prosvjete i kulture Republike Srpske i Ministarstva civilnih poslova Bosne i Hercegovine. Institucije koje su podržale ove projekte su Narodno pozorište Republike Srpske, Gradsko pozorište „Jazavacˮ, Dječije pozorište Republike Srpske, Muzej savremene umjetnosti Republike Srpske, Banski dvor, Muzej savremene umetnosti u Beogradu, Dom omladine Beograda i Kuća legata u Beogradu. Akademije i fakulteti koji su se povezali ovim projektima su vodeće visokoškolske institucije na državnom i regionalnom nivou.</p>
                    </div>
                    <div class="section-column column-35">
                        <img src="<?= $rootPath ?>shared/assets/images/grafika-leva-color.svg" class="img-fluid img-bck" alt="">
                    </div>
                </div>
            </section>
            <section class="action-cards-container">
                <div class="action-cards">
                    <div class="action-card">
                        <div class="action-card-content">
                            <h3>Interested in culture?</h3>
                            <a href="#" class="action-link">Check out our projects</a>
                        </div>
                        <img src="<?= $rootPath ?>shared/assets/images/picture-silhouette.svg" alt="">
                    </div>
                    <div class="action-card">
                        <div class="action-card-content">
                            <h3>People for culture!</h3>
                            <a href="#" class="action-link">Meet the team</a>
                        </div>
                        <img src="<?= $rootPath ?>shared/assets/images/user-silhouette.svg" alt="">
                    </div>
                </div>
            </section>
        </main>
        <?php
            require_once "shared/templates/footer.php";
        ?>
    </div>
</body>

</html>